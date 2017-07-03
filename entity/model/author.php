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

class author extends \TE\core\DataBase {
  /**
  * Returns a book obtained from mysql select
  * @param int $id The id of the book in bd
  * @return array the fields of the select
  * @access public
  */
  public function ShowAuthors(){
    $query =  "
              select
                author.name as name,
                author.photo as photo,
                author.id_author as idauthor,
                author.death_data as deathdata,
                (author.death_data IS NOT NULL) AS authorisdead,
                TIMESTAMPDIFF(YEAR,author.born_data,author.death_data) as ageatdead,
                TIMESTAMPDIFF(YEAR,author.born_data,CURDATE()) AS age,
                countrys.id_country as idcountry,
                countrys.iso as isocountry,
                countrys.name as namecountry
              from
                author
              left join countrys on (author.id_country = countrys.id_country)
                          order by author.name DESC
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

  public function ShowAuthor($id){
		$query =  "
                select
                  author.name as name,
                  author.photo as photo,
                  author.id_author as idauthor ,
                  author.born_data as borndata,
                  author.bio as bio,
                  author.death_data as deathdata,
                  (author.death_data IS NOT NULL) AS authorisdead,
                  TIMESTAMPDIFF(YEAR,author.born_data,author.death_data) as ageatdead,
                  TIMESTAMPDIFF(YEAR,author.born_data,CURDATE()) AS age,
                  countrys.id_country as idcountry,
                  countrys.iso as isocountry,
                  countrys.name as namecountry
                from
                  author
                left join countrys on (author.id_country = countrys.id_country)
                WHERE author.id_author = $id
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

  public function ListBooksAuthor($id){
    $query =  "
              select
                books.id_book as idbook,
                books.title as title,
                books.photo as photo,
                books.isbn as isbn,
                books.year as year,
                books.number_of_pages as numberofpages,
                author.name as authorname,
                author.id_author as idauthor,
                book_categories.title as categorytitle,
                book_categories.id_category as idcategory
              from
                books
              left join author on (author.id_author = books.id_author)
              left join book_categories on (book_categories.id_category = books.id_category)

              where books.id_author = $id
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

  public function Create($data){
    try	{
      $data->name = $_REQUEST['name'];
			$data->idcountry = $_REQUEST['idcountry'];
			$data->borndata = $_REQUEST['borndata'];
      $data->bio = $_REQUEST['bio'];

      if (isset ($_REQUEST['deathdata'])){
        $data->deathdata = $_REQUEST['deathdata'];
      } else {
        $data->deathdata = NULL;
      }

			$uploader = new \TE\core\Uploader();
			$uploader->setDir('data/images/entitys/author/');
			$uploader->setExtensions(array('jpg','jpeg','png','gif'));
			$uploader->setMaxSize(.5);

      if($uploader->uploadFile('photo')){
			    $image  =   $uploader->getUploadName();
					$data->photo = $image;
			}else{//upload failed
			    $uploader->getMessage();
			}

      $sql = "INSERT INTO author (name,id_country,born_data,death_data,bio,photo)
              VALUES (?, ?, ?, ?, ?, ? )";
      $this->pdo->prepare($sql)->execute(array(
                    $data->name,
                    $data->idcountry,
                    $data->borndata,
                    $data->deathdata,
                    $data->bio,
                    $data->photo
                  )
                );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  Public function Delete($id){
    try {
      $sql = "DELETE FROM author WHERE author.id_author = $id";
      $this->pdo->prepare($sql)->execute();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  Public function Update($data){
    try {

      $data->idauthor = $_REQUEST['id'];
      $data->name = $_REQUEST['name'];
			$data->idcountry = $_REQUEST['idcountry'];
			$data->borndata = $_REQUEST['borndata'];
      $data->bio = $_REQUEST['bio'];

      if (isset ($_REQUEST['deathdata'])){
        $data->deathdata = $_REQUEST['deathdata'];
      } else {
        $data->deathdata = NULL;
      }

      if (is_uploaded_file ($_FILES['photo']['tmp_name'])){
        $uploader = new \TE\core\Uploader();
        $uploader->setDir('data/images/entitys/author/');
        $uploader->setExtensions(array('jpg','jpeg','png','gif'));
        $uploader->setMaxSize(.5);
        if($uploader->uploadFile('photo')){
            $image  =   $uploader->getUploadName();
            $data->photo = $image;
        }else{
            $uploader->getMessage();
        }
      } else {
        //User not set new file, reasigned old filename
        $data->photo = $_REQUEST['OriginalPhoto'];
      }

      $sql = "UPDATE author SET
                name = ?,
                id_country = ?,
                born_data = ?,
                death_data = ?,
                bio = ?,
                photo = ?
              WHERE author.id_author = $data->idauthor ";
      $this->pdo->prepare($sql)->execute(array(
                    $data->name,
                    $data->idcountry,
                    $data->borndata,
                    $data->deathdata,
                    $data->bio,
                    $data->photo
                  )
                );

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function ShowListCountrys(){
    $query = "SELECT
              countrys.id_country as idcountry,
              countrys.name as countryname
            from
              countrys
            ORDER BY name ASC
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

  public function CountBooks($id){
		$query =  "
            select
	             count(*) as r
	          from
	            books
	          where books.id_author =  $id
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
}
