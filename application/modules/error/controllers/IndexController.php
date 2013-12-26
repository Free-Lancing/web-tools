<?php

class Error_IndexController extends Zend_Controller_Action {

    /**
     * 
     */
    public function indexAction() {
        $request = $this->getRequest();
        $error = $request->getParams();
        $errorCode = (int) $error['params']['error'];
        $this->_response->setHttpResponseCode($errorCode);
        $this->view->errorCode = $errorCode;
    }

}

?>
