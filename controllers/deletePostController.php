<?php
include "../helpers/init.php";
class deletePostController extends controller{
	function deletePost(){
		$postID = $_GET['postID'];
		$query = "DELETE FROM posts WHERE id = '$postID'";
		$run = $this->connection->conn->query($query);
		if ($run) {
			$query = "DELETE FROM post_likes WHERE post_id = '$postID'";
			$run2 = $this->connection->conn->query($query);
			if ($run2) {
				$query = "DELETE FROM user_likes WHERE post_id = '$postID'";
				$run3 = $this->connection->conn->query($query);
			}
		}
	}
}
$execute = new deletePostController;
$execute->deletePost();
?>