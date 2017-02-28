<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* This is a Summary.A simple class to extends PDO used mixed patterns
* Use some constants to set parameters to connect (set in config/config.inc.php)
* @todo May be use multiton pattern to connect two o more databases
*/
abstract class DataBase{
	
	  protected static $pdo = null;
	  	  
	   final private function Connect()
		{
			$pdo = new PDO('mysql:host='.host_db.';dbname='.database.';charset='.charset_db, database_user, database_pass); 
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;			
		}	

	  public function __CONSTRUCT(){
			try	 {
				if (self::$pdo === null) {
					$this->pdo = DataBase::Connect();
				}
					$this->pdo = DataBase::Connect();
			}
			catch(Exception $e){
				die($e->getMessage());
			}
		} 
		
	public function __wakeup(){
        throw new Exception('Class  '.__CLASS__ . 'cannot be unserialized');
		}
 
    public function __sleep(){
        throw new Exception('Class  '.__CLASS__ . 'cannot be serialized');
		}	
	
	public function __clone(){
		throw new Exception('Class  '.__CLASS__ . 'cannot be cloned');
		}			  
}
;?>
