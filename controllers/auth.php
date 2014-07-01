<?php

class auth {

	public function __construct(){}
	public function login(){

		define("CSS_CLASS","login");

		$users = load_model("users");
		if(isset($_POST['email']) && isset($_POST['password'])){

			$user = $users->login($_POST['email'],$_POST['password']);
			
			if($user){
				$_SESSION['login'] = TRUE;
				$_SESSION['commonname'] = $user['commonname'];
			}
		}

		include("views/header.php");
		include("views/login.php");
		include("views/footer.php");
	}


	public function logout(){

		define("CSS_CLASS","logout");

		session_unset();

		include("views/header.php");
		include("views/logout.php");
		include("views/footer.php");
	}
}