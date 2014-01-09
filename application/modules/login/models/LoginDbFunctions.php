<?php

class Login_Model_LoginDbFunctions extends Zend_Db_Table_Abstract {

    function userDetails($userName, $password) {
        $query = $this->_db->select()
                ->from(array('u' => 'users'), array('user_id', 'user_name', 'first_name', 'last_name'))
                ->where('u.user_name="' . $userName . '" AND u.password = "' . $password . '"');
        
        $result = $this->_db->fetchrow($query);
        return $result;
    }

}
