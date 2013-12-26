<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    public $_debug = true;

    protected function _initAutoload() {
        $this->bootstrap('FrontController');
        $frontController = $this->getResource('FrontController');
        $router = $frontController->getRouter();

        $uri = ltrim($_SERVER["REQUEST_URI"], "/");
        $uriArray = explode('/', $uri);
        $routes = null;
        $uriMatched = false;
        $myRoutes = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routing.ini');

        // Use this only if your require to redirect to error if invalid url and redirect to home page if just url specified without any controller or action 
        if((!empty($myRoutes)) && (empty($uriArray[0]))) {
            // No controller is specified, hence redirect to home controller (Home page has session handling wherein if user is not logged in he is redirected to the login page)
            $routes = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routing.ini', 'home');
            $uriArray[1] = null;
        }

        if((!empty($uriArray[1]))) {
            // Current url has the first key
            if(($routes === null) && (!empty($myRoutes)) && (!empty($uriArray)) && (!empty($myRoutes->{$uriArray[0]})) && (!empty($myRoutes->{$uriArray[0]}->routes->{$uriArray[1]}))) {
                // routing.ini file found and not empty, current node found, sub node found
                $uriMatched = $this->checkMatchingUri($uri, $myRoutes->{$uriArray[0]}->routes->{$uriArray[1]}->route);

                if($uriMatched) {
                    // urls are matching and as per the set up in the routing.ini
                    $routes = $myRoutes->{$uriArray[0]};
                }
            }
        }


        if(($routes === null)) {
            // Invalid controller
            $routes = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routing.ini', 'error');
            $uriArray[1] = null;
        }

        $router->addConfig($routes, 'routes', $uriArray[1]);
    }

    protected function _initFrontControllerPlugins() {
        $frontControllerInstance = Zend_Controller_Front::getInstance();
        $frontControllerInstance->registerPlugin(new Plugin_AjaxCheck());
    }

    protected function _initActionHelpers() {
        Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH . '/../library/Helpers', 'Helper_');
    }

    public function checkMatchingUri($uri, $checkUri) {
        // with multiple params /:username/:password & normal without any params
        return (count(array_values(array_filter(explode('/', $checkUri)))) === count(array_values(array_filter(explode('/', $uri)))));
    }

}
