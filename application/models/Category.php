<?php

class Application_Model_Category extends Zend_Db_Table_Abstract
{

	protected $_name= 'category' ;
	
	function addCat($cat_date)
	{
		$row = $this->createRow();
		$row->name = $cat_date['name'];
		
		return $row->save(); 
	
	}

	function listCats()
	{

		return $this->fetchAll()->toArray();
	}
	function deleteCat($id)
	{
		$this->delete("id=$id");
	}
}

