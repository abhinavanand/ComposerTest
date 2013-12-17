<?php

Zend_Loader::loadClass('Zend_Controller_Action');
Zend_Loader::loadClass('Zend_View');

class UserController extends Zend_Controller_Action
{
	

 public function homeAction()
{
	echo "Hi!";
	$FirstName='Abhinav';
	$LastName='Anand';
	$this->view->FirstName=$FirstName;
	$this->view->LastName=$LastName;
}
}