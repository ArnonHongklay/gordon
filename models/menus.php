<?php

class menus {
	public function __construct(){}

	public function all(){
		global $dbo;

		$sql = "SELECT * FROM menus";

		$stmt = $dbo->query($sql);
		return $stmt->fetchAll();
	}

	public function search($query){

		global $dbo;

		$sql = "SELECT * FROM menus WHERE {$query}";

		$stmt = $dbo->query($sql);
		return $stmt->fetchAll();
	}

	public function showCate(){

		global $dbo;

		$sql = "SELECT category FROM menus GROUP BY category ORDER by category";

		$stmt = $dbo->query($sql);
		return $stmt->fetchAll();
	}
}