<?php
/**
* This file is = entity/model/contact.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
namespace TE\entity;
class contact {
public function ShowPage() {
    $ShowPageData = new \TE\core\pages(); //Class to show common pages
    return $ShowPageData->ShowPage(4);
  }
 }
