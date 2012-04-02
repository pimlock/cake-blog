<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {
    public $name = 'Posts';
    public $helpers = array('Html', 'Form', 'Time' => array('niceFormat' => '%e %b %Y, %H:%M'));
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Post.created' => 'desc'
        ),
    );
    var $components = array('PaginationBack');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    /**
     * index method
     *
     * @return mixed
     */
    public function index() {
        return $this->_getPostsList();
    }

    private function _getPostsList() {
        $this->setTitle('Lista postów');
        $posts = $this->paginate('Post');

        $this->_checkPageNumber();

        if (isset($this->params['requested'])) {
            return $posts;
        }
        $this->set('posts', $posts);
    }

    private function _checkPageNumber() {
        $pagingOptions = $this->request['paging'][$this->modelClass];

        $selectedPage = $pagingOptions['page'];
        $totalPagesCount = $pagingOptions['pageCount'];

        if ($selectedPage > $totalPagesCount) {
            $this->Session->delete("Pagination.{$this->modelClass}");

            $this->Session->setFlash(__('Invalid page number %s', $selectedPage));
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $this->Post->read(null, $id));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->paginate['limit'] = 10;

        $this->Post->recursive = 0;
        $this->set('posts', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $this->Post->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Post->create();

            $this->_savePost();
        }
    }

    private function _savePost() {
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash(__('The post has been saved'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The post could not be saved. Please, try again.'));
        }
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->_savePost();
        } else {
            $this->request->data = $this->Post->read(null, $id);
        }
    }

    /**
     * admin_delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        if ($this->Post->delete()) {
            $this->Session->setFlash(__('Post deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Post was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
