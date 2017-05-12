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

	//actions invoke in ?c=book&a=GetBookById=$id
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
}
;?>
