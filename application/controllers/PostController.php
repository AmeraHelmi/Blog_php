<?php

class PostController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        // action body
    }

    public function addAction()
    {
        // action body
        $namespace = new Zend_Session_Namespace(); 
		$this->view->test=$namespace->id;
        if($this->_request->isPost())
        {
        	$data = $this->_request->getParams();
			$post_model=new Application_Model_Post();
			$namespace = new Zend_Session_Namespace(); 
 			$this->view->test=$namespace->id;
        	$user_id=intval($namespace->id);
 			$post_model->AddPost($data,$user_id,1);
		    $this->redirect('/');    	
		}
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
        $id = $this->_request->getParam('id');
		if(!empty($id)){
			$post_model = new Application_Model_Post();
			$post_model->deletePost($id);
		}
		$this->redirect('/');
    }


}









