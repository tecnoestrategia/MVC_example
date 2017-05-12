<?php
/**
* A simple index file to set MVC pattern.
* Use some constants to set parameters like bd, url, language, etc (set in config/config.inc.php)
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia/mvcexample This source code
* @var string $controller the name of the controller, list of controllers in entity/controller/
* @example http://yoursite/?c=$controller, If var c not exists, set initial controller to index through var $controller
* @var string $action the name of the action in the controller, see functions inside the class of entity/controller
* @example http://yoursite/?c=$controller&a=$action If the action it's empty set action to default action = index*
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
;?>
