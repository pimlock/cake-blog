<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {
    public $name = 'Post';

    public $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'on' => 'update'
            ),
        ),
        'title' => array(
            'maxlength' => array(
                'rule' => array('maxlength', 100),
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'intro' => array(
            'maxlength' => array(
                'rule' => array('maxlength', 255),
                'allowEmpty' => true,
            ),
        ),
        'body' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'created' => array(
            'rule' => 'blank',
            'on' => 'create'
        )
    );

    public function beforeSave() {
        if (empty($this->data[$this->alias]['id'])) {
            // dodawanie nowego posta
            $this->_makeIntroIfEmpty();
        }
        return true;
    }

    private function _makeIntroIfEmpty() {
        if (empty($this->data[$this->alias]['intro'])) {
            $body = $this->data[$this->alias]['body'];
            
            App::uses('Sanitize', 'Utility');
            $body = Sanitize::html($body, array('remove' => true));

            $this->data[$this->alias]['intro'] = substr($body, 0, 255) . ' ...';
        }
    }
}