<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* This is a Summary.This class its the model for the respective controller
* Extends the abstract class DataBase to do some actions like show pages, or something you need inside the "entity"
* @access public
* @version 0.1
* @since 01/02/2017
*/
class about extends DataBase {
  /**
  * Returns a simple page obtained from mysql select
  * @param int $id The id of the page in bd
  * @return array the fields of the select
  * @access public
  */
    public function ShowPage($id){
		$query =  "
					select
						pages.id_page as idpage,
						pages.title as page_title,
						pages.content as page_content,
						pages.create_on as page_data_creation,
						DATEDIFF(CURRENT_TIME(),pages.create_on) as days_of_life,
						users.name as name_of_creator,
						users.avatar as avatar_of_creator
					from
						pages
					left join users on (users.id_user = pages.id_user)
					where
						pages.id_page = $id
										";
		try	{
			$stmt = $this->pdo->prepare($query);
			$stmt->execute(array($data));
			return $stmt->fetch(PDO::FETCH_OBJ);
		  }
		catch (Exception $e){
			die($e->getMessage());
		  }
	}
}
;?>
