<?php

class Application_Model_User extends Zend_Db_Table_Abstract
{
	protected $_name= 'user' ;
	
	function addUser($user_date)
	{
		$row = $this->createRow();
		$row->username = $user_date['username'];
		$row->fname = $user_date['firstname'];
		$row->lname = $user_date['lastname'];
		$row->email = $user_date['email'];
		$row->password = md5($user_date['password']);
		return $row->save(); 
	
	}

	function listUsers()
	{

		return $this->fetchAll()->toArray();
	}
	function getUserById($id)
	{
		return $this->find($id)->toArray();
	}

		
	function getuserbyname($name)
	{
		

        $select = $this->_db->select()->from($this->_name)->where('username= ?', $name);

		$result = $this->getAdapter()->fetchAll($select);

		return $result;
	}

	function getrole($name)
	{
		

        $select = $this->_db->select()->from($this->_name, array("role"))->where('username= ?', $name);

		$result = $this->getAdapter()->fetchAll($select);

		return $result[0]['role'];
	}

	function getId($name)
	{
		

        $select = $this->_db->select()->from($this->_name, array("id"))->where('username= ?', $name);

		$result = $this->getAdapter()->fetchAll($select);

		return $result[0]['id'];
	}
	
	
	function deleteUser($id){
		$this->delete("id=$id");
	}
}
