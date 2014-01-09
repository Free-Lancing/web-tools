<?php

class Plugin_PreDispatchCheck extends Zend_Controller_Plugin_Abstract {

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        parent::preDispatch($request);
        // Check if valid session or not
        $validSession = false;

        if(!$validSession) {
            if(($request->getModuleName() === 'login' && $request->getControllerName() === 'index' && $request->getActionName() === 'index') || ($request->getModuleName() === 'error' && $request->getControllerName() === 'index' && $request->getActionName() === 'index')) {
                
            } else {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
                
                if($request->isXmlHttpRequest()) {                   
                    $redirector->gotoUrl('error/index/401');
                    return false;
                } else {
                    /* @var $redirector Zend_Controller_Action_Helper_Redirector */
                    $redirector->gotoUrl('login/index');
                }
            }
        }

        //If the request is not an XHR, do nothing.
        if(!$request->isXmlHttpRequest()) {
            return false;
        }

        $layout = Zend_Layout::getMvcInstance();
        $layout->disableLayout();
        $layout->setLayout('ajax');
    }

}

?>