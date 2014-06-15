<?php

class Application_Model_DbTable_Utente extends Zend_Db_Table_Abstract {

    
    function logIn($email, $password) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable(
                $db, 'utenti', 'email', 'password'
        );
        $authAdapter
                ->setIdentity($email)
                ->setCredential($password);
        $result = $authAdapter->authenticate();
        if ($result->isValid()) {
            $auth = Zend_Auth::getInstance();
            $storage = $auth->getStorage();
            $storage->write($authAdapter->getResultRowObject());

            return 1;
        } else {
            return 0;
        }
    }

}
