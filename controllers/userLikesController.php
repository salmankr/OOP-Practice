<?php
include "../helpers/init.php";
class userLikeController extends controller{
	public function userLike(){
		$postID = $_GET['postID'];
		$likeStatus = $_GET['likeStatus'];
		$userID = $_SESSION['userID'];
		$query = "SELECT * FROM user_likes WHERE post_id = '$postID' AND user_id = '$userID'";
		$run = $this->connection->conn->query($query);
		if ($run->num_rows > 0) {
			$query2 = "UPDATE user_likes SET like_status = '$likeStatus' WHERE post_id = '$postID' AND user_id = '$userID'";
			$run2 = $this->connection->conn->query($query2);
			if ($run) {
				$query3 = "SELECT * FROM post_likes WHERE post_id = $postID";
				$run3 = $this->connection->conn->query($query3);
				while ($row = $run3->fetch_object()) {
					$likes = $row->likes;
				}
			}
			if ($likeStatus == 1) {
				$likes = $likes + 1;
				echo 1;
			}else{
				$likes = $likes - 1;
				echo 0;
			}
		}else{
			$query4 = "INSERT INTO user_likes (post_id, user_id, like_status) VALUES ('$postID', '$userID', '1')";
			$run4 = $this->connection->conn->query($query4);
			if ($run4) {
				$query3 = "SELECT * FROM post_likes WHERE post_id = $postID";
				$run3 = $this->connection->conn->query($query3);
				while ($row = $run3->fetch_object()) {
					$likes = $row->likes;
				}
				$likes = $likes + 1;
				echo 1;
			}
		}
		
		$query5 = "UPDATE post_likes SET likes = '$likes' WHERE post_id = '$postID'";
		$run5 = $this->connection->conn->query($query5);
	}
}
$execute = new userLikeController;
$execute->userLike();
?>