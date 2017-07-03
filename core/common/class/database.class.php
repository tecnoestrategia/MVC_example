<?php
/**
* Abstract class to connect to mysql, used parts of singleton pattern but not all (because global space, tdd, etc)
*/
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* @todo May be use multiton pattern to connect two o more databases
* @package common class
*/
namespace TE\core;

abstract class DataBase{
	/**
	* Establish the mysql connection
	*/
	/**
	* @return array DataBase connection
	* @access private
	*/
	  protected static $pdo = null;

	   final private function Connect()	{
			/**
			* Establish the mysql connection
			*/
			/**
	 		* @return array DataBase connection
	 		* @access private
	 		*/
			$pdo = new \PDO('mysql:host='.host_db.';dbname='.database.';charset='.charset_db, database_user, database_pass);
			$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}

	  public function __CONSTRUCT(){
			/**
			* Public constructor, chek if private method Connect exist.
			*/
			/**
	 		* @return array  All options
	 		* @access public
	 		*/
			try	 {
				if (self::$pdo === null) {
					$this->pdo = DataBase::Connect();
				}
					$this->pdo = DataBase::Connect();
			}
			catch(\Exception $e){
				die($e->getMessage());
			}
		}

	public function __wakeup(){
		/**
		* Don't unserialized
		*/
		/**
		* @return string Error message
		* @access public
		*/
        throw new Exception('Class  '.__CLASS__ . 'cannot be unserialized');
		}

    public function __sleep(){
			/**
			* Don't serialized
			*/
			/**
			* @return string Error message
			* @access public
			*/
        throw new Exception('Class  '.__CLASS__ . 'cannot be serialized');
		}

	public function __clone(){
		/**
		* To not allowed clone
		*/
		/**
		* @return string Error message
		* @access public
		*/
		throw new Exception('Class  '.__CLASS__ . 'cannot be cloned');
	}
 }
