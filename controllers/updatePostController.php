<?php
include "../helpers/init.php";
class updatePostController extends controller{
	public function updatePost(){
		$postID = $_POST['postID'];
		$name = $_POST['postName'];
		$description = $_POST['postDesc'];
		$query = "UPDATE posts SET name = '$name', description = '$description' WHERE id = '$postID'";
		$run = $this->connection->conn->query($query);
	}
}
$execute = new updatePostController;
$execute->updatePost();
?>