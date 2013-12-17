<?php
class Model
{
	public function add()
	{
		$db = Zend_Db::factory('Pdo_Mysql', array(
				'host'     => 'localhost:3306',
				'username' => 'root',
				'password' => 'root',
				'dbname'   => 'employee'));
		
		$sql = 'SELECT * FROM employee2';
	}
	
	
}