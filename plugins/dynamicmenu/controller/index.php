<?php
/**
* This file is = plugins/dynamicmenu/controller/index.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
namespace TE\plugins;

require_once 'plugins/dynamicmenu/model/index.php';

class dynamicmenuController extends \TE\core\DataBase {

  private $model;

    public function __CONSTRUCT(){
        $this->model = new dynamicmenu();
    }

    public function showmenu (){
      $ShowMenuData = $this->model->ShowAllPages();
			require_once 'plugins/dynamicmenu/view/showallpages.php';
    }
}
