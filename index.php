<?php
  //Default config
  require_once 'config/config.inc.php';

  //Default controller
  $controller = 'index';

  /**
  * @example http://yoursite/?c=$controller
  * If var c not exists, set initial controller to index
  */
  if(!isset($_REQUEST['c']))
	{
		require_once "app/controller/$controller.php";
		$controller = ucwords($controller) . 'Controller';
		$controller = new $controller;
		$controller->Index();
	}
  else
	{
		//Action to default charge if not set any action ->set  name index in any controller its the page for default controller
		$controller = strtolower($_REQUEST['c']);
		$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
		
		require_once "app/controller/$controller.php";
		$controller = ucwords($controller) . 'Controller';
		$controller = new $controller;
		
		//Call to action
		call_user_func( array( $controller, $action ) );
	}
;?>
