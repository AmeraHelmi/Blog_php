<?php

class Application_Form_Register extends Zend_Form
{

  
 public function init()  
    {  
        // Set the method for the display form to POST  
        $this->setMethod('post');  
  
        
            $this->addElement('text', 'firstname', array(  
            'label' => 'Your first name:',  
            'required' => true,  
            'filters' => array('StringTrim'),  
            'validators' => array(  
                'NotEmpty',  
            )  
        ));
            $this->addElement('text', 'lastname', array(  
            'label' => 'Your last name:',  
            'required' => true,  
            'filters' => array('StringTrim'),  
            'validators' => array(  
                'NotEmpty',  
            )  
        ));
        	$this->addElement('text', 'username', array(  
            'label' => 'Your username:',  
            'required' => true,  
            'filters' => array('StringTrim'),  
            'validators' => array(  
                'NotEmpty',  
            )  
        ));  
		
        	$this->addElement('password', 'password', array(  
            'label' => 'Your password:',  
            'required' => true,  
            'filters' => array('StringTrim'),  
            'validators' => array(  
                'NotEmpty',  
            )  
        ));  
  
        
        	$this->addElement('email', 'email', array(  
            'label' => 'Your email address:',  
            'required' => true,  
            'filters' => array('StringTrim'),  
            'validators' => array(  
                'EmailAddress',  
            )  
        ));  
  
        // // Add a captcha  
        // $this->addElement('captcha', 'captcha', array(  
        //     'label' => 'Please enter the 5 letters displayed below:',  
        //     'required' => true,  
        //     'captcha' => array(  
        //         'captcha' => 'Figlet',  
        //         'wordLen' => 5,  
        //         'timeout' => 300  
        //     )  
        // ));  
  
        // Add the submit button  
        	$this->addElement('submit', 'submit', array(  
            'ignore' => true,  
            'label' => 'Register',  
        ));  
  
        // And finally add some CSRF protection  
        	$this->addElement('hash', 'csrf', array(  
            'ignore' => true,  
        ));  
    }  



}

