<?php
/**
* This file is = core/common/interfaces/crud.interface.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
namespace TE\core;
interface Crud{
  public static function GetAllRecords();
  public static function Count();
  public static function Update($data);
  public static function Create($data);
  public static function Delete($id);
  public static function GetById($id);
  public static function UpdateOk($id);
  public static function CreateOk($id);
  public static function DeleteOk($id);
  public static function UpdateKo($id);
  public static function CreateKo($id);
  public static function DeleteKo($id);
}
