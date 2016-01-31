<?php

class Application_Model_Post extends Zend_Db_Table_Abstract
{
	protected $_name= 'post' ;
	
	function addPost($post_date,$user_id,$cat_id)
	{
		$row = $this->createRow();
		$row->title= $post_date['title'];
		$row->body = $post_date['body'];
		$row->publish_date ="2012-12-31";
		$row->user_id = 15;
		$row->category_id = 2;
		return $row->save(); 
	
	}


	function listPosts()
	{

		return $this->fetchAll()->toArray();
	}
	function deletePost($id)
	{
		$this->delete("id=$id");
	}
	

}

