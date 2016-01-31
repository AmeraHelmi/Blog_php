<?php

class CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $cat_model = new Application_Model_Category();
		$this->view->cats = $cat_model->listCats();
		$namespace = new Zend_Session_Namespace(); 
        $this->view->role=$namespace->role;
	}

    public function addAction()
    {
        // action body
       $cat_form = new Application_Form_Addcat();
       if($this->getRequest()->isPost())
       {
            if($cat->isValid($_POST))
            {
                $cat_model = new Application_Model_Category();
                $this->view->success = $cat_model->addCat($cat_form->getValues());
               	$this->_redirect('/Category/list');
            }
        }
        
        $this->view->form = $user_form;
        
    }
    public function deleteAction()
    {
        // action body
        $id = $this->_request->getParam('id');
		if(!empty($id)){
			$cat_model = new Application_Model_Category();
			$cat_model->deleteCat($id);
		}
		$this->redirect('/Category');
    }


}



