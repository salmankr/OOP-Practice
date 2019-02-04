<?php
include "../helpers/init.php";
class getUpdatePostController extends controller{
	public function updatePost(){
		$postID = $_GET['postID'];
		$query = "SELECT * FROM posts WHERE id = '$postID'";
		$run = $this->connection->conn->query($query);
		while ($row = $run->fetch_object()) {
			$response = array('name' => $row->name, 'desc' => $row->description);
			print_r(json_encode($response, JSON_FORCE_OBJECT));
		}
	}
}
$execute = new getUpdatePostController;
$execute->updatePost();
?>