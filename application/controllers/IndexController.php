<?php


class IndexController extends Zend_Controller_Action
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
           	$post_model = new Application_Model_Post();
		 	$this->view->posts = $post_model->listPosts();
		  	$namespace = new Zend_Session_Namespace(); 
            $this->view->role=$namespace->role;
            $this->view->username=$namespace->username;
        }
        else
        {
        	$post_model = new Application_Model_Post();	
		 	$this->view->posts = $post_model->listPosts();
           	$this->view->msg="not login";
        }

    }


}

