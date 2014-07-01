<?php 

class tagging {

	public function __construct(){}

	public function byTag($name) {
		global $dbo;

		$sql = "SELECT * 
				FROM tags
					INNER JOIN tagging ON tagging.tid=tags.id
					INNER JOIN menus ON menus.id=tagging.mid
				WHERE tags.name=?";

		$stmt = $dbo->prepare($sql);
		$stmt->execute(array($name));

		return $stmt->fetchAll();
	}

	public function search($query){
		global $dbo;

		$sql = "SELECT * 
				FROM tags 
					INNER JOIN tagging ON tagging.tid=tags.id
				WHERE {$query}";

		$stmt = $dbo->query($sql);

		return $stmt->fetchAll();
	}

	public function unuse($query){
		global $dbo;

		$sql = "SELECT * 
				FROM tags 
				WHERE tags.id NOT IN(
						SELECT tagging.tid FROM tagging
						WHERE {$query}
					)";

		$stmt = $dbo->query($sql);

		return $stmt->fetchAll();
	}


	public function create($content){
		global $dbo;

		$sql = "INSERT INTO tags(name) VALUES(?)";
		$stmt = $dbo->prepare($sql);
		$stmt->execute(array($content));

		return $dbo->lastInsertId();
	}

	public function add($tid, $mid){
		global $dbo;

		$sql = "INSERT INTO tagging VALUES(?,?)";
		$stmt = $dbo->prepare($sql);
		$stmt->execute(array($tid, $mid));
	}

	public function remove($tid, $mid){
		global $dbo;

		$sql = "DELETE FROM tagging WHERE tid=? AND mid=?";
		$stmt = $dbo->prepare($sql);
		$stmt->execute(array($tid, $mid));
	}
	


}