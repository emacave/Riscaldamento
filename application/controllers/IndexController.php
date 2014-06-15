<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            $email = $this->getRequest()->getPost('username');
            $password = $this->getRequest()->getPost('password');
            
            $db = new Application_Model_DbTable_Utente();
            $utente = $db->logIn($email, $password);

            if ($utente == 1) {
                $this->redirect('/home');
            }
            else
            {
                $this->view->error=1;
            }
        }
    }


}

