<?php
/**
* This file is = core/common/interfaces/pages.interface.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
namespace TE\core;

interface Page{
  public static function GetAllRecords();
  public static function CountPages();
  public static function UpdatePage($data);
  public static function CreatePage($data);
  public static function DeletePage($id);
  public static function ShowPage($id);
  public static function UpdateOk($id);
  public static function CreateOk($id);
  public static function DeleteOk($id);
  public static function UpdateKo($id);
  public static function CreateKo($id);
  public static function DeleteKo($id);
}
