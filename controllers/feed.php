<?php

class feed {
	
	public function __construct(){}

	public function index(){

		$menus = load_model("menus");

		$allFeed = $menus->all();

		include("views/feed.php");
	} 

}

?>