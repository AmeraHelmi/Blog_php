<?php

class Application_Form_Addcat extends Zend_Form
{

  
 public function init()  
    {  
        // Set the method for the display form to POST  
        $this->setMethod('post');  
  
        // Add a name element  
              $this->addElement('text', 'name', array(  
            'label' => 'enter name of category:',  
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

