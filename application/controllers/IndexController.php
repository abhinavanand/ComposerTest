<?php

require_once 'Zend/Db.php';
Zend_Loader::loadClass('Zend_Controller_Action');
Zend_Loader::loadClass('Zend_View');
Zend_Loader::loadClass('Zend_Registry');

class IndexController extends Zend_Controller_Action
{
    
    public function indexAction()
    {
    	   	
    	$db = Zend_Registry::get('db');
    	$select = $db->select();
    	$select->from('employee2','*');    	
    	$row=$db->fetchAll($select); 
    	$this->view->row = $row;
    	    	
   	 }
    
    public function addAction()
    {
    	  
    	$this->view->title='Add a new record';  	
    	$this->view->FirstName = '';    	
    	$this->view->LastName = '';
    	
    }
    
    public function insertAction()
    {
    	if(isset($_POST['Submit']))
    	{    
    		$db = Zend_Registry::get('db');
    
    		$check_roles = implode(',', $_POST['Hobby']);
    		$row=array(
    				'FirstName' => $_POST['FirstName'],
    				'LastName' => $_POST['LastName'],
    				'Hobby' => $check_roles
    		);
    
    		$table = 'employee2';
    		$rowsAffected = $db->insert($table, $row);
    		    		    	 		
    	}
    }
    
    public function editAction()
    {
    	
    	$id=$_GET['id'];
    	$db = Zend_Registry::get('db');
    	$select = $db->select();
    	$select->from('employee2','*');
    	$select->where('id=?',$id);
    	$row=$db->fetchAll($select);
    	foreach($row as $value)
    	{    	
       	$this->view->title='Update the entry';
    	$this->view->id=$value['id'];
    	$this->view->FirstName=$value['FirstName'];
    	$this->view->LastName=$value['LastName'];
    	$this->view->Hobby=$value['Hobby'];
    	}
    	
    }
    
    public function updateAction()
    {
    	if(isset($_POST['submit']))
    	{    
    		$db = Zend_Registry::get('db');
    		
    		$hobby=$_POST['Hobby'];
    		$check_roles = implode(',', $hobby);
    		$row1=array(
    				'FirstName' => $_POST['FirstName'],
    				'LastName' => $_POST['LastName'],
    				'Hobby' => $check_roles
    		);
    		
    		$id=$_POST['id'];
    		
    		$table = 'employee2';
    		#$where=$table->quoteInto('id=?',$id);
    		#$where=array();
    		$where['id=?']=$id;
    		$rowsAffected = $db->update($table, $row1, $where);
    		    	    	
    	}
    }
    
    public function deleteAction()
    {
    	$db = Zend_Registry::get('db');    
    	$table='employee2';    	
    	$where['id=?']=$_GET['id'];
    	$rowsAffected=$db->delete($table,$where);
    	  
    }
}

