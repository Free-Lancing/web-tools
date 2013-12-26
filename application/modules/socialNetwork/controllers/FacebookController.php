<?php

class SocialNetwork_FacebookController extends Zend_Controller_Action {

    /**
     * @url http://web-tools.local/social/facebook_like
     */
    public function likeAction() {
        echo '<br />like action - facebook';
        $this->_helper->logs('data1', 'data1');
        $this->_helper->logs->writeLog('data1', 'data1');
    }

}

?>
