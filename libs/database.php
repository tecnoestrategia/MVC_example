<?php
/**
* @autor TecnoEstrategia <develop@tecnoestrategia.com>
* 
*/
class DataBase{
	
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