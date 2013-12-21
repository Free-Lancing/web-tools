<?php

class IndexController extends Zend_Controller_Action {

    /**
     * @url : http://web-tools.local/login/user/rachit/password
     */
    public function indexAction() {
        $request = $this->getRequest();
        $username = $request->getParam('username');
        $password = $request->getParam('password');
        echo 'index action - login';
        echo '<pre> Username: ';
        print_r($username);
        echo '<br /> Password: ';
        print_r($password);
        echo '</pre>';
        exit;
    }

}

?>
