<?php
/**
 * Simple Blog Engine
 *
 * @author Piotr Młocek
 */
class PaginationBackComponent extends Component {
    public $components = array('Session');

    /**
     * @param Controller $controller
     * @return void
     */
    public function initialize($controller) {
        /* @var CakeRequest $request */
        $request = $controller->request;

        $options = $controller->passedArgs;
        if (isset($request->params['requested'])) {
            return;
        }

        $vars = array('page');
        $options = array_intersect_key($options, array_flip($vars));

        /* @var SessionComponent $session */
        $session = $this->Session;
        
        $sessionKey = "Pagination.{$controller->modelClass}.options";
        if ($options) {
            if ($session->check($sessionKey)) {
                $options = array_merge($session->read($sessionKey), $options);
            }
            $session->write($sessionKey, $options);
        }

        if ($session->check($sessionKey)) {
            $options = $session->read($sessionKey);
            $request['named'] = array_merge($request['named'], $options);
        }
    }
}