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

class book extends \TE\core\DataBase {
  public function ShowCatalog(){
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

  public function ShowBook($id){
		$query =  "
                select
                  books.title as title,
                  books.photo as photo,
                  books.isbn as isbn,
                  books.year as year,
                  books.number_of_pages as numberofpages,
                  books.description as description,
                  books.id_book as idbook,
                  author.name as authorname,
                  author.id_author as idauthor,
                  book_categories.title as categorytitle,
                  book_categories.id_category as idcategory
                from
                  books
                  left join author on (author.id_author = books.id_author)
                  left join book_categories on (book_categories.id_category = books.id_category)
                WHERE books.id_book = $id
                  order by books.year DESC
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

  public function ShowListAuthors (){
    $query =  "
                select
                  author.name as authorname,
                  author.id_author as idauthor
                from
                  author
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

  public function ShowListCategories (){
    $query =  "
                select
                  book_categories.title as categorytitle,
                  book_categories.id_category as idcategory
                from
                  book_categories
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

  public function Create ($data){
    try	{
      $data->title = $_REQUEST['title'];
			$data->idcategory = $_REQUEST['idcategory'];
			$data->idauthor = $_REQUEST['idauthor'];
			$data->isbn = $_REQUEST['isbn'];
			$data->ypublish = $_REQUEST['ypublish'];
			$data->npages = $_REQUEST['npages'];
			$data->description = $_REQUEST['description'];
			$uploader = new \TE\core\Uploader();
			$uploader->setDir('data/images/entitys/books/');
			$uploader->setExtensions(array('jpg','jpeg','png','gif'));
			$uploader->setMaxSize(.5);
			if($uploader->uploadFile('cover')){
			    $image  =   $uploader->getUploadName();
					$data->cover = $image;
			}else{//upload failed
			    $uploader->getMessage();
			}
      $sql = "INSERT INTO books (description,title,id_category,number_of_pages,isbn,id_author,year,photo)
              VALUES (?, ?, ?, ?, ?, ?, ?, ? )";
      $this->pdo->prepare($sql)->execute(array(
                    $data->description,
                    $data->title,
                    $data->idcategory,
                    $data->npages,
                    $data->isbn,
                    $data->idauthor,
                    $data->ypublish,
                    $data->cover
                  )
                );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Update ($data){
    try	{
      $data->id = $_REQUEST['id'];
      $data->title = $_REQUEST['title'];
      $data->idcategory = $_REQUEST['idcategory'];
      $data->idauthor = $_REQUEST['idauthor'];
      $data->isbn = $_REQUEST['isbn'];
      $data->ypublish = $_REQUEST['ypublish'];
      $data->npages = $_REQUEST['npages'];
      $data->description = $_REQUEST['description'];

      if (is_uploaded_file ($_FILES['cover']['tmp_name'])){
        $uploader = new \TE\core\Uploader();
        $uploader->setDir('data/images/entitys/books/');
        $uploader->setExtensions(array('jpg','jpeg','png','gif'));
        $uploader->setMaxSize(.5);
        if($uploader->uploadFile('cover')){
            $image  =   $uploader->getUploadName();
            $data->cover = $image;
        }else{
            $uploader->getMessage();
        }
      }else{
        //User not set new file, reasigned old filename
        $data->cover = $_REQUEST['OriginalCover'];
      }

      $sql = "UPDATE books SET
                title = ?,
                description = ?,
                id_category = ?,
                number_of_pages = ?,
                isbn = ?,
                id_author = ?,
                year = ?,
                photo = ?
              WHERE books.id_book = $data->id";
      $this->pdo->prepare($sql)->execute(array(
                    $data->title,
                    $data->description,
                    $data->idcategory,
                    $data->npages,
                    $data->isbn,
                    $data->idauthor,
                    $data->ypublish,
                    $data->cover
                  )
                );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Delete($id){
    try {
      $sql = "DELETE FROM books WHERE books.id_book = $id";
      $this->pdo->prepare($sql)->execute();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function CountAllBooks(){
    $query =  "
            select
               count(*) as r
            from
              books
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
