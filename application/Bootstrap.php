<?php
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Db');
Zend_Loader::loadClass('Zend_Controller_Front');
Zend_Loader::loadClass('Zend_Registry');

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function __autoload($class)
	{
		require_once 'Zend/Loader.php';
		Zend_Loader::loadClass($class);
	}
	
	protected function _initDb()
	{
		#define('ROOT_DIR', dirname(__FILE__));
		$params = array(
				'host' => 'localhost',
				'username' => 'root',
				'password' => 'root',
				'dbname' => 'employee'
		);
		$db = Zend_Db::factory('Pdo_Mysql', $params);
		Zend_Db_Table::setDefaultAdapter($db);
		Zend_Registry::set('db', $db);
		
		$front = Zend_Controller_Front::getInstance();
		#$front->setBaseUrl($baseURL);
		$front->setControllerDirectory('../application/controllers');
		#$front->setParam('noViewRenderer', true);
		#$front->dispatch();
	}
		/*$con = mysql_connect("localhost","root","root",;
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}*/
		
		/*$config = new Zend_Config_Ini(ROOT_DIR.'/application.ini', APPLICATION_ENV);
		Zend_Registry::set("Demo", $config);
		$configObj = Zend_Registry::get("Demo");
		
		try{
			$db = Zend_Db::factory($configObj->database->adapter, $configObj->database->params->toArray());
			Zend_Db_Table::setDefaultAdapter($db);
		
			Zend_Registry::set('db', $db);
			return $db;
			}catch(Exception $e){
				return null;
			}
	}*/
	
	/*protected function _initPluginload()
	{
		#$baseURL = str_replace('/index.php','/',$_SERVER['PHP_SELF']);
		#Zend_Registry::set('baseURL', $baseURL);
		$front = Zend_Controller_Front::getInstance();
		#$front->setBaseUrl($baseURL);
		$front->setControllerDirectory('../application/controllers');
		$front->setParam('noViewRenderer', true);
		$front->dispatch();
	}*/
	
}

