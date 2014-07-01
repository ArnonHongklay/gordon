<?php


class users {
	public function __construct(){}

	public function login($username, $password){

		global $dbo;

		$sql = "
			SELECT * 
			FROM users
			WHERE (username=? OR commonname=?)
			AND password = MD5(?)";

		$stmt = $dbo->prepare($sql);
		$stmt->execute(array($username, $username, $password));

		return $stmt->fetch();

	}
}

?>