<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
* This is a Summary.A simple class to make a controller, in the controller you can put all actions about entity
* @example In this class you can set and access to some actions, like this http://yoursite.com/?c=controller&a=action
* action its a public function of this class, in this example the CRUD model and variations like index or list
* @example Also in the functions of the class you can set the views from the action
* The views can be found in entity/views/name_of_entity or, if you want, in otherwise.
* We used this model for the easy way to extends the concept of "separated views", of course this is only a example, but it's
* possible use with templates like twig or similar.
* BE CAREFUL, in this example you can delete or modifiy, etc, ANY table or SQL schema only typing a SIMPLE URL
* DON'T USE in real enviorment.
*/
namespace TE\entity;

require_once 'entity/model/bookcategory.php';

class bookCategoryController{
	private $model;
		public function __CONSTRUCT(){
        $this->model = new bookCategory();
    }

	//The default view
    public function Index(){
			$ListCategories = $this->model->ShowCategories();
			require_once 'entity/view/header.php';
	    require_once 'entity/view/bookcategory/menu.php';
			require_once 'entity/view/bookcategory/index.php';
	    require_once 'entity/view/footer.php';
    }

	//actions invoke in ?c=bookcategory&a=GetBookById=$id
		public function GetCategoryById(){
			if(isset($_REQUEST['id'])){
            $CategoryData = $this->model->ShowCategory($_REQUEST['id']);
						$CategoryInfo = $this->model->ShowInfo($_REQUEST['id']);
        }
    	require_once 'entity/view/header.php';
    	require_once 'entity/view/bookcategory/menu.php';
			require_once 'entity/view/bookcategory/category.php';
    	require_once 'entity/view/footer.php';
    }

	//frm to create new category
	public function CreateCategory(){
		require_once 'entity/view/header.php';
		require_once 'entity/view/bookcategory/menu.php';
		require_once 'entity/view/bookcategory/create.php';
		require_once 'entity/view/footer.php';
	}

	//register new category
	public function NewCategory(){
		$this->model->Create($data);
		header('Location: index.php?c=bookcategory&a=CreateCategoryOk');
	}

	public function CreateCategoryOk(){
		require_once 'entity/view/header.php';
		require_once 'entity/view/bookcategory/menu.php';
		require_once 'entity/view/bookcategory/createok.php';
		require_once 'entity/view/footer.php';
	}

	//update a existent category
	public function UpdateCategory(){
		$CategoryInfo = $this->model->ShowInfo($_REQUEST['id']);
		require_once 'entity/view/header.php';
		require_once 'entity/view/bookcategory/menu.php';
		require_once 'entity/view/bookcategory/update.php';
		require_once 'entity/view/footer.php';
	}

	//modify a existent category
	public function ModCategory(){
		$this->model->Update($data);
		header('Location: index.php?c=bookcategory&a=UpdateCategoryOk');
	}

	public function UpdateCategoryOk(){
		require_once 'entity/view/header.php';
		require_once 'entity/view/bookcategory/menu.php';
		require_once 'entity/view/bookcategory/updateok.php';
		require_once 'entity/view/footer.php';
	}

	//delete category
	public function DeleteCategory(){
		$this->model->Delete($_REQUEST['id']);
		header('Location: index.php?c=bookcategory&a=DeleteCategoryOk');
	}

	public function DeleteCategoryOk(){
		require_once 'entity/view/header.php';
		require_once 'entity/view/bookcategory/menu.php';
		require_once 'entity/view/bookcategory/deleteok.php';
		require_once 'entity/view/footer.php';
	}

}
