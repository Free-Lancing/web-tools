<?php

class IndexController extends Zend_Controller_Action {

    /**
     * @url : http://web-tools.local/login/user/{user_name}/{password}
     */
    public function indexAction() {
        $request = $this->getRequest();
        $userName = $request->getParam('username');
        $password = $request->getParam('password');
        $loginModel = new Login_Model_LoginDbFunctions();
        $sql = $loginModel->userDetails($userName);
        $this->_helper->logs->writeLog('sql', $sql);
        echo 'index action - login';
        echo '<pre> Username: ';
        print_r($userName);
        echo '<br /> Password: ';
        print_r($password);
        echo '</pre>';
    }

}

?>
