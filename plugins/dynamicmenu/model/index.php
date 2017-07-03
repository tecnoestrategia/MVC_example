<?php
/**
* This file is = entity/model/about.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
namespace TE\plugins;

class dynamicmenu {

  public function ShowAllPages($page){
    $active = "active";
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    if (ereg($page,$url)){
        return $active;
      }
	}
}
