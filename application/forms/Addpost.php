<?php

class Application_Form_Addpost extends Zend_Form
{

  
 public function init()  
    {  
        // Set the method for the display form to POST  
        $this->setMethod('post');  
  
        // Add a name element  
            $this->addElement('text', 'title', array(  
            'label' => 'title:',  
            'required' => true,  
            'filters' => array('StringTrim'),  
            'validators' => array(  
                'NotEmpty',  
            )  
        ));
            $this->addElement('text', 'body', array(  
            'label' => 'body:',  
            'required' => true,  
            'filters' => array('StringTrim'),  
            'validators' => array(  
                'NotEmpty',  
            )  
        ));
        
        // Add the submit button  
            $this->addElement('submit', 'submit', array(  
            'ignore' => true,  
            'label' => 'Post',  
        ));  
  
        // And finally add some CSRF protection  
            $this->addElement('hash', 'csrf', array(  
            'ignore' => true,  
        ));  
    }  



}

