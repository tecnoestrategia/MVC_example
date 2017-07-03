<?php
namespace TE\entity;

require_once 'entity/model/author.php';

class authorController{
	private $model;
	public function __CONSTRUCT(){
        $this->model = new author();
    }

	//The default view
    public function Index(){
		$AuthorsData = $this->model->ShowAuthors();
		require_once 'entity/view/header.php';
    require_once 'entity/view/author/menu.php';
		require_once 'entity/view/author/index.php';
    require_once 'entity/view/footer.php';
    }

	public function GetAuthorByid(){
		if(isset($_REQUEST['id'])){
            $AuthorData = $this->model->ShowAuthor($_REQUEST['id']);
						$NumberBooks = $this->model->CountBooks($_REQUEST['id']);
						$BooksAuthor = $this->model->ListBooksAuthor($_REQUEST['id']);
        }
    require_once 'entity/view/header.php';
    require_once 'entity/view/author/menu.php';
		require_once 'entity/view/author/author.php';
    require_once 'entity/view/footer.php';
    }

	public function CreateAuthor(){
		$GetListCountrys = $this->model->ShowListCountrys();
		require_once 'entity/view/header.php';
    require_once 'entity/view/author/menu.php';
		require_once 'entity/view/author/create.php';
    require_once 'entity/view/footer.php';
	}

	public function NewAuthor(){
		$this->model->Create($data);
		header('Location: index.php?c=author&a=CreateAuthorOk');
	}

	public function CreateAuthorOk(){
		require_once 'entity/view/header.php';
    require_once 'entity/view/author/menu.php';
		require_once 'entity/view/author/createok.php';
    require_once 'entity/view/footer.php';
	}

	public function UpdateAuthor(){
		$GetListCountrys = $this->model->ShowListCountrys();
		$AuthorData = $this->model->ShowAuthor($_REQUEST['id']);
		require_once 'entity/view/header.php';
		require_once 'entity/view/author/menu.php';
		require_once 'entity/view/author/update.php';
		require_once 'entity/view/footer.php';
	}

	public function EditAuthor($data){
		$this->model->Update($data);
		header('Location: index.php?c=author&a=UpdateAuthorOk');
	}

	public function UpdateAuthorOk(){
		require_once 'entity/view/header.php';
    require_once 'entity/view/author/menu.php';
		require_once 'entity/view/author/updateok.php';
    require_once 'entity/view/footer.php';
	}


	public function DeleteAuthor(){
		if(isset($_REQUEST['id'])){
			$this->model->Delete($_REQUEST['id']);
			header('Location: index.php?c=author&a=DeleteAuthorOk');
		}
	}

	public function DeleteAuthorOk(){
		require_once 'entity/view/header.php';
    require_once 'entity/view/author/menu.php';
		require_once 'entity/view/author/deleteok.php';
    require_once 'entity/view/footer.php';
	}
}
