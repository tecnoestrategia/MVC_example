<?php
require_once 'app/model/about.php';
class aboutController{
	private $model;
	public function __CONSTRUCT(){
        $this->model = new about();
    }
	public function index(){
		$ShowIndex = $this->model->ShowPage(3);
		require_once 'app/view/header.php';
        require_once 'app/view/about/menu.php';
		require_once 'app/view/about/index.php';
        require_once 'app/view/footer.php';
    }	
};
?>