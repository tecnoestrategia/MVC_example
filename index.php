<?php
/**
* This is a Summary.A simple index file to set MVC pattern
*
* Use some constants to set parameters like bd, url, language, etc (set in config/config.inc.php)
*/
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* @var string $controller the name of the controller, list of controllers in app/controller/
* @example http://yoursite/?c=$controller If var c not exists, set initial controller to index through var $Controller
* @var string $action the name of the action in the controller, see functions inside the class of app/controller
* @example http://yoursite/?c=$controller&a=$action If the action it's empty set action to default action = index*
*/
  require_once 'config/config.inc.php';
  $controller = 'index';

  if(!isset($_REQUEST['c']))
	{
		require_once "app/controller/$controller.php";
		$controller = ucwords($controller) . 'Controller';
		$controller = new $controller;
		$controller->Index();
	}
  else
	{
		$controller = strtolower($_REQUEST['c']);
		$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

		require_once "app/controller/$controller.php";
		$controller = ucwords($controller) . 'Controller';
		$controller = new $controller;

		call_user_func(array($controller,$action));
	}
;?>
