<?php

class Application_Form_Login extends Zend_Form
{

   public function init()
    {
        /* Form Elements & Other Definitions Here ... */
      		$this->setMethod('POST');
 
        	$this->addElement(
            'text', 'username', array(
                'label' => 'Username:','class' => 'form-control',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
 
        	$this->addElement('password', 'password', array(
            'label' => 'Password:',
            'required' => true,
            ));
 
        	$this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
            ));
 
    }


}

