<?php


define("CSS_CLASS","menu");
class menu {

	public function __construct(){}
	public function index($args = NULL){


		if($args[1] != '') $this->detail($args[1]);
		else {
			$menus = load_model("menus");
			$rates = load_model("rates");

			$allCate = $menus->showCate();

			include("views/header.php");
			include("views/menu.php");
			include("views/footer.php");
		}
	}

	public function detail($title){

			$menus = load_model("menus");
			$rates = load_model("rates");

			$search = $menus->search(sprintf("image='%s.jpg'",$title));
			$menu = $search[0];

			if($_POST['rating']){
				if(!$rates->search("mid={$menu['id']} AND sessionid='".session_id()."'")){
					if($_POST['captcha_input'] == $_SESSION['captcha']){
						$rates->add($menu['id'], session_id(), $_POST['rating']);
					}
				}
			}

			$search = $menus->search(sprintf("image='%s.jpg'",$title));
			$menu = $search[0];

			$tagging = load_model("tagging");

			$unuse = $tagging->unuse("mid={$menu['id']}");
			$tags = $tagging->search("mid={$menu['id']}");

			include("views/header.php");
			include("views/menudetail.php");
			include("views/footer.php");

	}

}