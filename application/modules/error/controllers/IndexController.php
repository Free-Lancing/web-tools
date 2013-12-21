<?php

class Error_IndexController extends Zend_Controller_Action {

    /**
     * 
     */
    public function indexAction() {
        $request = $this->getRequest();
        $error = $request->getParam('params');
        echo '<pre>error == ';
        print_r($error['error']);
        echo '</pre>';
        exit;
    }

}

?>
