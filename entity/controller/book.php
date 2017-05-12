<?php
/**
* Sumary Instance the model class (entity/model/) to make the diferents views
* @example When the users invoke some action like this http://yoursite.com/?c=controller&a=some_action, you can see "some_action" its a function of this class
* The first parameter is index and its fixed in the front controller @see index.php
*/
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

		public function NewBook($data){

			$data = new book();
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

			$this->model->Create($data);
			header('Location: index.php?c=book&a=CreateBookOk');
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
;?>
