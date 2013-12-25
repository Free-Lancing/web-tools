<?php

class Error_IndexController extends Zend_Controller_Action {

    /**
     * 
     */
    public function indexAction() {
        $request = $this->getRequest();
        $error = $request->getParams();
        $this->view->error = $error;
    }

}

?>
