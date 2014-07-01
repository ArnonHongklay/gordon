<?php 

class tags {

	public function __construct(){}

	public function index($args = NULL){
		define("CSS_CLASS","tags");

		if($args[1] != '') $this->detail($args[1]);
		else {

			$tags = load_model("tagging");

			$a = array();
			$a['code'] = 1;
			$a['idTag'] = $_POST['idTag'];
			$a['idMenu'] = $_POST['idMenu'];

			switch($_POST['action']){
				case 'remove':{
					$tags->remove($_POST['idTag'], $_POST['idMenu']);
				}break;

				case 'add':{
					$tags->add($_POST['idTag'], $_POST['idMenu']);

					$search = $tags->search("tid={$_POST['idTag']} AND mid={$_POST['idMenu']}");
					$a['content'] = $search[0]['name'];
				}break;
				case 'create':{
					$a['idTag'] = $_POST['idTag'] = $tags->create($_POST['content']);

					$tags->add($_POST['idTag'], $_POST['idMenu']);

					$search = $tags->search("tid={$_POST['idTag']} AND mid={$_POST['idMenu']}");
					$a['content'] = $search[0]['name'];
				}break;
			}

			$a['contenturl'] = $a['content'];
			echo json_encode($a);
		}
	}

	public function detail($title){

		define("CSS_CLASS","tags");

		$tagging = load_model("tagging");

		$tags = $tagging->byTag($title);

		include('views/header.php');
		include('views/tag.php');
		include('views/footer.php');
	}
}