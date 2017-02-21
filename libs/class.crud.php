<?php
class CRUD
	{
	private $pdo;
	public $num_rows;
		
	public function __CONSTRUCT()	{
		try	 {
			     $this->pdo = DataBase::Connect();
		     }
		catch(Exception $e){
			die($e->getMessage());
		  }
	  }
	
	public function Select($query){
		try	{
			$stmt = $this->pdo->prepare(" $query ");
			$num_rows = $stmt->rowCount();
			$result = $stmt->execute(array($data));
			 if( 0 < $num_rows && $result){
				return $num_rows == 2 ? $this->pdo->fetch() : $this->pdo->fetchAll();
			 }
			return $result;
		  }
		catch (Exception $e){
			die($e->getMessage());
		  }
	   }  
	   
	/*
	public function Create($query){
	
	}  
	 
	public function Update ($query) {
		
	}
	
	public function Delete ($query) {
		
	}
	*/	
}
;?>