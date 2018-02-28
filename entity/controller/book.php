<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* This is a Summary.A simple class to make a controller (in this case the index front/default controller)
* @example In this class you can set and access to some actions, like this http://yoursite.com/?c=controller&a=action
* action its a public function of this class, in this example the "index" and "team" functions
* @example Also in the functions of the class you can set the views from the action
* The views be found in entity/views/name_of_entity or, if you want, in otherwise.
* we used this model for the easy way to extends the concept of "separated views", of course this is only a example, but it's
* possible use with templates like twig or similar.
*/
namespace TE\entity;

require_once 'entity/model/book.php';

class bookController{
	private $model;
	public function __CONSTRUCT(){
        $this->model = new book();
    }
	//The default view
    public function Index(){
		$CatalogData = $this->model->ShowCatalog();
		require_once 'entity/view/header.php';
    require_once 'entity/view/book/menu.php';
		require_once 'entity/view/book/index.php';
    require_once 'entity/view/footer.php';

    }
	//actions invoke in ?c=book&a=GetBookById=$id
	public function GetBookById(){
		if(isset($_REQUEST['id'])){
            		$BookData = $this->model->ShowBook($_REQUEST['id']);
       		 }
    		require_once 'entity/view/header.php';
    		require_once 'entity/view/book/menu.php';
		require_once 'entity/view/book/book.php';
    		require_once 'entity/view/footer.php';
    }

		public function CreateBook(){
			$GetListAuthors = $this->model->ShowListAuthors();
			$GetListCategories = $this->model->ShowListCategories();
			require_once 'entity/view/header.php';
	    		require_once 'entity/view/book/menu.php';
			require_once 'entity/view/book/create.php';
	    		require_once 'entity/view/footer.php';
	  }

		public function UpdateBook(){
			$GetListAuthors = $this->model->ShowListAuthors();
			$GetListCategories = $this->model->ShowListCategories();
			$BookData = $this->model->ShowBook($_REQUEST['id']);
			require_once 'entity/view/header.php';
	   		require_once 'entity/view/book/menu.php';
			require_once 'entity/view/book/update.php';
	   		require_once 'entity/view/footer.php';
	  }

		public function NewBook($data){
			$this->model->Create($data);
			header('Location: index.php?c=book&a=CreateBookOk');
	  }

		public function EditBook($data){
			$this->model->Update($data);
			header('Location: index.php?c=book&a=UpdateBookOk');
	  }

		public function DeleteBook(){
			$this->model->Delete($_REQUEST['id']);
			header('Location: index.php?c=book&a=DeleteBookOk');
	  }

		public function CreateBookOk (){
			require_once 'entity/view/header.php';
	    		require_once 'entity/view/book/menu.php';
			require_once 'entity/view/book/createok.php';
	    		require_once 'entity/view/footer.php';
		}

		public function UpdateBookOk (){
			require_once 'entity/view/header.php';
	    		require_once 'entity/view/book/menu.php';
			require_once 'entity/view/book/updateok.php';
	    		require_once 'entity/view/footer.php';
		}

		public function DeleteBookOk (){
			require_once 'entity/view/header.php';
	    		require_once 'entity/view/book/menu.php';
			require_once 'entity/view/book/deleteok.php';
	    		require_once 'entity/view/footer.php';
		}
}
