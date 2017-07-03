<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia/mvcexample This source code
*/
  require_once 'config/config.inc.php';
  require_once 'config/autoload.php';

  if(!isset($_REQUEST['c']))
	{
    $controller = 'index';
		require_once "entity/controller/$controller.php";
		$controller = 'TE\entity\\'.ucwords($controller) . 'Controller';
		$controller = new $controller;
		$controller->Index();
	}
  else
	{
		$FrontController = strtolower($_REQUEST['c']);
		$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
		require_once "entity/controller/$FrontController.php";
		$controller = 'TE\entity\\'.ucwords($FrontController) . 'Controller';
    $controller = new $controller;
		call_user_func(array($controller,$action));
	}
