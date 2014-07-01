<?php

class rates {
	public function __construct(){}

	public function rate($category){
		global $dbo;
		
		$sql = "SELECT 
					SUM(rating) as rating,
					SUM(ratetime) as ratetime
		 		FROM menus
		 		WHERE category=?
		 ";


		$stmt = $dbo->prepare($sql);
		$stmt->execute(array($category));

		return $stmt->fetch();
	}

	public function search($query){

		global $dbo;

		$sql = "SELECT * FROM rates WHERE {$query}";

		$stmt = $dbo->query($sql);

		return $stmt->fetchAll();

	}

	public function add($mid, $sessionid, $score){

		global $dbo;

		$sql = "
			UPDATE menus SET
				rating = rating+{$score},
				ratetime = ratetime+1
			WHERE 
				menus.id={$mid}
		";

		$dbo->query($sql);

		$sql = "INSERT INTO rates VALUES(?,?)";

		$stmt = $dbo->prepare($sql);
		$stmt->execute(array($mid, $sessionid));

	}
}