<?phpclass index extends DataBase {    public function ShowAll(){		try	{			$sql ="select * from general";			$stmt = $this->pdo->prepare($sql);			$stmt->execute(array($data));			return $stmt->fetchAll(PDO::FETCH_OBJ);		  }		catch (Exception $e){			die($e->getMessage());		  }	   }  	     public function ShowId($id){		try	{			$sql = "select * from general where id_general = $id ";			$stmt = $this->pdo->prepare($sql);			$stmt->execute(array($data));			return $stmt->fetch(PDO::FETCH_OBJ);		  }		catch (Exception $e){			die($e->getMessage());		  }	   }  };?>