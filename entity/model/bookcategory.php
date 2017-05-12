<?php
/**
* This is a Summary.This class its the model for the respective controller
* Extends the abstract class DataBase to do some actions like show pages, or something you need inside the "entity"
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* @access public
*/
namespace TE\entity;

class bookCategory extends \TE\core\DataBase {
  /**
  * Returns a book obtained from mysql select
  * @param int $id The id of the book in bd
  * @return array the fields of the select
  * @access public
  */
  public function ShowCategories(){
    $query =  "
              select
                book_categories.title as categorytitle,
                book_categories.id_category as idcategory
              from
                book_categories
              order by book_categories.id_category DESC
                    ";
    try	{
      $stmt = $this->pdo->prepare($query);
      $stmt->execute(array($data));
      return $stmt->fetchAll(\PDO::FETCH_OBJ);
      }
    catch (Exception $e){
      die($e->getMessage());
      }
  }

  public function ShowCategory($id){
		$query =  "select
              	books.title as title,
              	books.photo as photo,
              	books.isbn as isbn,
              	books.year as year,
                books.id_book as idbook,
              	books.number_of_pages as numberofpages,
              	books.description as description,
              	author.name as authorname,
              	author.id_author as idauthor,
              	book_categories.title as categorytitle,
              	book_categories.id_category as idcategory
              from
              	books
              left join author on (author.id_author = books.id_author)
              left join book_categories on (book_categories.id_category = books.id_category)

              WHERE book_categories.id_category = $id

              order by books.year DESC

										";
		try	{
			$stmt = $this->pdo->prepare($query);
			$stmt->execute(array($data));
			return $stmt->fetchAll(\PDO::FETCH_OBJ);
		  }
		catch (Exception $e){
			die($e->getMessage());
		  }
	}

  public function ShowInfo($id){
    $query =  "
            select
              id_category as id,
	            title as title,
              description as description
	          from
	            book_categories
	          where book_categories.id_category =  $id
            ";
    try	{
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
        }
    catch (Exception $e){
        die($e->getMessage());
        }
  }

  public function CountBooks($id){
    $query =  "
            select
               count(*) as r
            from
              books
            where books.id_category =  $id
            ";
    try	{
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($data));
        return $stmt->fetch(\PDO::FETCH_OBJ);
        }
    catch (Exception $e){
        die($e->getMessage());
        }
  }

  public function Create($data){
    try	{
			$sql = "INSERT INTO book_categories (title,description) VALUES (?, ?)";
			$this->pdo->prepare($sql)->execute(array(
                    $data->name,
                    $data->desc
                  )
			          );
		} catch (Exception $e) {
			die($e->getMessage());
		}
  }

  public function Delete($id){
    try {
      $sql = "DELETE FROM book_categories WHERE book_categories.id_category = $id";
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
  }

  public function Update($data){
    try	{
			$sql = "UPDATE book_categories SET
                title = ?,
                description = ?
              WHERE book_categories.id_category = $data->id";
			$this->pdo->prepare($sql)->execute(array(
                    $data->name,
                    $data->desc
                  )
			          );
		} catch (Exception $e) {
			die($e->getMessage());
		}
  }

}
;?>
