
<?php
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Db');
Zend_Loader::loadClass('Zend_Controller_Front');
Zend_Loader::loadClass('Zend_Registry');

function __autoload($class)
{
	require_once 'Zend/Loader.php';
	Zend_Loader::loadClass($class);
}


$params = array(
		'host' => 'localhost:8080',
		'username' => 'root',
		'password' => 'root',
		'dbname' => 'employee'
);
$db = Zend_Db::factory('Pdo_Mysql', $params);
Zend_Registry::set('db', $db);
#$baseURL = str_replace('/index.php','/',$_SERVER['PHP_SELF']);
#Zend_Registry::set('baseURL', $baseURL);

$front = Zend_Controller_Front::getInstance();
#$front->setBaseUrl($baseURL);
$front->setControllerDirectory('../application/controllers');
$front->setParam('noViewRenderer', true);
$front->dispatch();
?>