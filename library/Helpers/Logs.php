<?php

class Helper_Logs extends Zend_Controller_Action_Helper_Abstract {
    
    protected $_appIni = null;
    
    public function __construct() {
        $currentEnv = getenv('APPLICATION_ENV');
        try {
            $this->_appIni = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', $currentEnv);
            $this->_appIni = $this->_appIni->debug;
        } catch (Exception $exc) {
            $this->_appIni = null;
        }
    }
    
    public function direct($message, $data) {
        if($this->_appIni !== null && $this->_appIni->allow) {
            file_put_contents($this->_appIni->filePath . '/debug.log', PHP_EOL . $message . ' ===== ' . print_r($data, true) . PHP_EOL . PHP_EOL, FILE_APPEND);
        }
    }

    public function writeLog($message, $data, $exit = false) {
        if($this->_appIni !== null && $this->_appIni->allow) {
            echo '<pre>' . $message . ' ==== ';
            print_r($data);
            echo '</pre>';
            if($exit) {
                exit;
            }
        }
    }

}