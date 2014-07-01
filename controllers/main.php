<?php

class main {
	
	public function __construct(){}

	public function index(){

		define("CSS_CLASS","home");

		include("views/header.php");
		include("views/main.php");
		include("views/footer.php");
	} 

}

?>