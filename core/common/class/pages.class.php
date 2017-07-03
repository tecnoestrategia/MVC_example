<?php
/**
* This file is = core/common/class/pages.class.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
namespace TE\core;

class pages extends DataBase {
  public function ShowPage($id){
    $query =  "
        select
          pages.id_page as idpage,
          pages.title as page_title,
          pages.content as page_content,
          pages.meta_description as meta_description,
          pages.meta_title as meta_title,
          pages.create_on as page_data_creation,
          DATEDIFF(CURRENT_TIME(),pages.create_on) as days_of_life
        from
          pages
        where
          pages.id_page = $id
                  ";
    try	{
      $stmt = $this->pdo->prepare($query);
      $stmt->execute(array($data));
      return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    catch (\Exception $e){
      die($e->getMessage());
    }
  }

  public function CreatePage($data){
    try	{
      $sql = "INSERT INTO pages (title,content,create_on) VALUES (?, ?, ?)";
      $this->pdo->prepare($sql)->execute(array(
                    $data->title,
                    $data->content,
                    $data->create_on
                  )
                );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function UpdatePage($data){
    try	{
      $sql = "UPDATE pages SET
                title = ?,
                content = ?
              WHERE pages.id_page = $data->id";
      $this->pdo->prepare($sql)->execute(array(
                    $data->title,
                    $data->content
                  )
                );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function DeletePage($id){
    try {
      $sql = "DELETE FROM pages WHERE pages.id_page = $id";
      $this->pdo->prepare($sql)->execute();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function CountPages(){
    $query =  "
            select
               count(*) as r
            from
              pages
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
