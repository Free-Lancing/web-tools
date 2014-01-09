<?php

class Error_IndexController extends Zend_Controller_Action {

    /**
     * 
     */
    public function indexAction() {
        $request = $this->getRequest();
        $error = $request->getParams();
        
        if(!empty($error['params'])) {
            $errorCode = (int) $error['params']['error'];
        } else {
            $errorCode = (int) $error['error'];
        }
        
        $this->_response->setHttpResponseCode($errorCode);
        $this->view->errorCode = $errorCode;
    }

}

?>
