<?php

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity())
        {
        	$this->view->identity = $auth->getIdentity();
        
        }
        $namespace = new Zend_Session_Namespace(); 
 
        $this->view->username=$namespace->username;
        $this->view->role=$namespace->role;

    }

    public function profileAction()
    {
        // action body
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()) 
        {
            $user_model = new Application_Model_User();
            $namespace = new Zend_Session_Namespace();
            $this->view->users = $user_model->getuserbyname($namespace->username);
            $this->view->id=$user_model->getID($namespace->username);
            $namespace->id=$user_model->getID($namespace->username);
            $this->view->role=$namespace->role;
		 	$this->view->Allusers = $user_model->listUsers();
        }
        else
        {
            $this->_redirect('/users/login');
        }
        
    }

    public function loginAction()
    {
        // action body
    $auth = Zend_Auth::getInstance();
    if($auth->hasIdentity()) 
    {
        $this->_redirect('/users/index');          
    }
    else
    {
        $db = $this->_getParam('user');
        $loginForm = new Application_Form_Login();
        if ($loginForm->isValid($_POST)) 
            {
                $adapter = new Zend_Auth_Adapter_DbTable($db,'user','username','password');
                $adapter->setIdentity($loginForm->getValue('username'));
                $pass=md5($loginForm->getValue('password'));
                $adapter->setCredential($pass);
                $auth   = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);
                $namespace = new Zend_Session_Namespace(); 
                $namespace->username = $loginForm->getValue('username');
                $namespace->password=$loginForm->getValue('password');
                if($namespace->username =="amera" && $namespace->password =="amera123")
            		{
            			$namespace->role="admin";
            		} 
            	else
            		{
            			$namespace->role="editor";
            		}
                $this->view->username=$namespace->username;
                if ($result->isValid()) 
                {
                    $this->_helper->FlashMessenger('Successful Login');
                    $this->_redirect('/users/index');
                    return;
                }
                else
                {
                    $this->view->loginForm = $loginForm;
                }
            }
 
        $this->view->loginForm = $loginForm;
    
    }

}
    public function logoutAction()
    {
        // action body
    	$authAdapter = Zend_Auth::getInstance();
    	$authAdapter->clearIdentity();
        $this->_redirect('/users/login');
    }

    public function registerAction()
    {
        // action body
        $this->view->page_title = "Registration Form";
        $user_form = new Application_Form_Register();

       	if($this->getRequest()->isPost())
       	{
            if($user_form->isValid($_POST))
            {
                $user_model = new Application_Model_User();
                $this->view->success = $user_model->addUser($user_form->getValues());
                $auth   = Zend_Auth::getInstance();
                $namespace = new Zend_Session_Namespace(); 
                $namespace->username = $user_form->getValue('username');
                $namespace->password=$user_form->getValue('password');
                $namespace->id=$user_model->getID($namespace->username);
                $this->view->username=$namespace->username;
                $this->_redirect('/users/index');
            }
        }
        
        $this->view->form = $user_form;
        
    }

    public function listAction()
    {
        // action body

         $user_model = new Application_Model_User();
		 $this->view->users = $user_model->listUsers();
    }

    public function editAction()
    	{
			$id = $this->_request->getParam('id');
			$this->view->action = 'edit';
			if(!empty($id))
			{
				$user_model = new Application_Model_User();
				$userinfo = $user_model->getUserById($id);
				$this->view->user = $userinfo[0];
			}
			if($this->_request->isPost())
			{
        		$user_data = $this->_request->getParams();
				$user_model = new Application_Model_User();
				$user_model->editUser($user_data);
			}
			$this->render('add');
		}

	public function deleteAction()
    	{
			$id = $this->_request->getParam('id');
			if(!empty($id)){
				$user_model = new Application_Model_User();
				$user_model->deleteUser($id);
			}
			$this->redirect('/Users/profile/');
	}


}













