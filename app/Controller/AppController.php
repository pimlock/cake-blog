<?php
/**
 * Simple Blog Engine
 *
 * @author Piotr Młocek
 */
App::uses('Controller', 'Controller');

class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index', 'admin' => true),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin' => true)
        )
    );

    public function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
    }

    public function beforeFilter() {
        if (isset($this->request->params['admin']) && $this->request->params['admin']) {
            $this->layout = 'admin';
        }
    }

    public function setTitle($title) {
        $this->set('title_for_layout', $title);
    }
}
