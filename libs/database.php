<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* This is a Summary.A simple class to extends PDO
* Use some constants to set parameters to connect (set in config/config.inc.php)
*
* @todo Write to extend a simple model to change database (or databases) for write, read, cache, etc.
*/
class DataBase{
	private $pdo
	 public static function Connect()
		{
			$pdo = new PDO('mysql:host='.host_db.';dbname='.database.';charset='.charset_db, database_user, database_pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
	public function __CONSTRUCT()	{
		try	 {
			     $this->pdo = DataBase::Connect();
		     }
		catch(Exception $e){
			die($e->getMessage());
		  }
	  }
}
;?>
