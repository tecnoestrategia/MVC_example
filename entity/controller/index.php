<?php
/**
* Sumary Instance the model class (entity/model/) to make the diferents views
* @example When the users invoke some action like this http://yoursite.com/?c=controller&a=some_action, you can see "some_action" its a function of this class
* The first parameter is index and its fixed in the front controller @see index.php
*/
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* This is a Summary.A simple class to make a controller (in this case the index front/default controller)
* @example In this class you can set and access to some actions, like this http://yoursite.com/?c=controller&a=action
* action its a public function of this class, in this example the "index" and "team" functions
* @example Also in the functions of the class you can set the views from the action
* The views be found in entity/views/name_of_entity or, if you want, in otherwise.
* we used this model for the easy way to extends the concept of "separated views", of course this is only a example, but it's
* possible use with templates like twig or similar.
*/
namespace TE\entity;

require_once 'entity/model/index.php';

class indexController{
	private $model;

	public function __CONSTRUCT(){
        $this->model = new index();
  }

  public function Index(){
			$ShowPageData = $this->model->ShowPage();
			require_once 'entity/view/header.php';
    	require_once 'entity/view/index/menu.php';
			require_once 'entity/view/index/index.php';
    	require_once 'entity/view/footer.php';
  }

	public function admin(){
			$ShowPageData = $this->model->ShowPage();
			require_once 'entity/view/header.php';
			require_once 'entity/view/index/menu.php';
			require_once 'entity/view/index/admin.php';
			require_once 'entity/view/footer.php';
	}

}
