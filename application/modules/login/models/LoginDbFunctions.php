<?php

class Login_Model_LoginDbFunctions extends Zend_Db_Table_Abstract {

    function userDetails($userName) {
        $query = $this->_db->select()
                ->from(array('u' => 'users'), array('user_id', 'user_name', 'first_name', 'last_name', 'status'))
                ->where('u.user_name="' . $userName . '"');

        $result = $this->_db->fetchrow($query);
        return $result;
    }

}
