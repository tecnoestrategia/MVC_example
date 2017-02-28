<?php
require_once 'app/model/index.php';
class indexController{
	private $model;
	public function __CONSTRUCT(){
        $this->model = new index();
    }
	//This is the default action or "index" action
    public function Index(){
		$GeneralData = $this->model->ShowId(1);
		$ShowNameOf = $this->model->ShowAll();
        require_once 'app/view/header.php';
        require_once 'app/view/index/menu.php';
		require_once 'app/view/index/index.php';
        require_once 'app/view/footer.php';

    }
	//This is another action, in this case you can use this url "?c=index&a=GetById&id=1"
	public function GetById(){
		if(isset($_REQUEST['id'])){
            $ShowData = $this->model->ShowId($_REQUEST['id']);
        }		
        require_once 'app/view/header.php';
        require_once 'app/view/index/menu.php';
		require_once 'app/view/index/details.php';
        require_once 'app/view/footer.php';

    }		
}
;?>