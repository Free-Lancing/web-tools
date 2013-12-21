<?php

class SocialNetwork_TwitterController extends Zend_Controller_Action {
    
    /**
     * @url http://web-tools.local/social/twitter_follow
     */
    public function followAction() {
        $request = $this->getRequest();
        $data = $request->getParams();
        echo '<pre>data == ';
        print_r($data);
        echo '</pre>';
    }

}

?>
