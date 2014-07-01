<?php

class contact {
	
	public function __construct(){}

	public function index(){

		define("CSS_CLASS","contact");

		include("views/header.php");
		include("views/contact.php");
		include("views/footer.php");
	} 

}

?>