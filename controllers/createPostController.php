<?php
include "../helpers/init.php";
class createPostController extends controller{
    public function insertPost(){
    	if (isset($_POST['submit'])) {
    		$userID = $_SESSION['userID'];
    		$postName = $_POST['post_name'];
    		$postDescription = $_POST['post_description'];
    		$query = "INSERT INTO posts (user_id, name, description) VALUES ('$userID', '$postName', '$postDescription')";
    		$run = $this->connection->conn->query($query);
    		if ($run) {
    			$postID = $this->connection->conn->insert_id;
    			$query = "INSERT INTO post_likes (post_id, likes) VALUES ('$postID', '0')";
    			$run = $this->connection->conn->query($query);
    			if ($run) {
    				$this->msg->session('SucsMsg', 'Your Post has been added!');
    			}
    		}
    	}
        unset($_SESSION['noPostMsg']);
    	header("location:" .base_uri. "createPost.php");
    }
}
$execute = new createPostController;
$execute->insertPost();
?>