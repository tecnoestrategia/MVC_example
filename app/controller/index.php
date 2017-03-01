<?php
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
* The views be found in app/views/name_of_entity or, if you want, in otherwise.
* we used this model for the easy way to extends the concept of "separated views", of course this is only a example, but it's
* possible use with templates like twig or similar.
*/
require_once 'app/model/index.php';
class indexController{
	/**
	* Instance the model class (app/model/entity) to make the diferents views
	* @example When the users invoke some action like this http://yoursite.com/?c=controller&a=some_action, you can see "some_action" its a function of this class
	* The first parameter is index and its fixed in the front controller @see index.php
	*/
	private $model;
	public function __CONSTRUCT(){
        $this->model = new index();
    }

    public function Index(){
		$GeneralData = $this->model->ShowId(1);/*Metohd from the model class (app/model/entity.php) */
		$ShowNameOf = $this->model->ShowAll();/*Metohd from the model class (app/model/entity.php) */
        require_once 'app/view/header.php';
        require_once 'app/view/index/menu.php';
				require_once 'app/view/index/index.php';
        require_once 'app/view/footer.php';

    }
	/**
	* @return array the fields of the select
	* @access public
	* @example This is another action, in this case you can use this url "?c=index&a=GetById&id=1"
	*/
	public function GetById(){
		if(isset($_REQUEST['id'])){
            $ShowData = $this->model->ShowId($_REQUEST['id']);/*Metohd from the model class (app/model/entity.php) */
        }
        require_once 'app/view/header.php';
        require_once 'app/view/index/menu.php';
				require_once 'app/view/index/details.php';
        require_once 'app/view/footer.php';

    }
}
;?>
