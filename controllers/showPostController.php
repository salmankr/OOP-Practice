<?php
include "../helpers/init.php";
class showPost{
	public $connection;
	public function __construct(){
		$this->connection = new db_connection;
	}
	public function showPost(){
		$query = "SELECT posts.name, posts.description, posts.id, post_likes.likes FROM posts INNER JOIN post_likes ON posts.id = post_likes.post_id";
		$run = $this->connection->conn->query($query);
		if ($run->num_rows > 0) {
			$key = 1;
			while ($row = $run->fetch_object()) {
				$name = $row->name;
				$description = $row->description;
				$likes = $row->likes;
				$postID = $row->id;
				if (isset($_SESSION['email'])) {
				$userID = $_SESSION['userID'];
				$query2 = "SELECT * FROM user_likes WHERE user_id = '$userID' AND post_id = '$postID'";
				$run2 = $this->connection->conn->query($query2);
				if ($run2->num_rows > 0) {
					while ($row2 = $run2->fetch_object()) {
						$likeStatus = $row2->like_status;
					}
					if ($likeStatus == false) {
						$btn = '<button type="button" class="btn btn-primary" onclick="likeFunction('.$postID.', 1)">Like</button>';
					}else{
						$btn = '<button type="button" class="btn btn-success" onclick="likeFunction('.$postID.', 0)">Liked</button>';
					}
				}else{
					$btn = '<button type="button" class="btn btn-primary" onclick="likeFunction('.$postID.', 1)">Like</button>';
				}
				// if (isset($_GET['likeStatus'])) {
				// 	$userID = $_SESSION['userID'];
				// 	$likeStatus = $_GET['likeStatus'];
				// 	$que2 = "SELECT * FROM user_likes WHERE post_id = '$postID' AND user_id = '$userID'";
				// 	$run2 = $this->connection->conn->query($que2);
				// 	if ($run2->num_rows > 0) {
				// 		$query = "UPDATE user_likes SET like_status = '$likeStatus' WHERE post_id = '$postID' AND user_id = '$userID'";
				// 		$run = $this->connection->conn->query($query);
				// 		if ($run) {
				// 			$q1 = "SELECT * FROM post_likes WHERE post_id = $postID";
				// 			$r1 = $this->connection->conn->query($q1);
				// 			while ($row1 = $r1->fetch_object()) {
				// 				$likes = $row1->likes;
				// 			}
				// 			if ($likeStatus == 1) {
				// 				$likes = $likes+1;
				// 				$btn = '<button type="button" class="btn btn-success" onclick="likeFunction(0)">Liked</button>';
				// 			}else{
				// 				$likes = $likes-1;
				// 				$btn = '<button type="button" class="btn btn-primary" onclick="likeFunction(1)">Like</button>';
				// 			}
				// 		}
				// 	}else{
    //                     $query = "INSERT INTO user_likes (post_id, user_id, like_status) VALUES ('$postID', '$userID', '1')";
    //                     $run = $this->connection->conn->query($query);
    //                     $likes = $likes + 1;
    //                     $btn = '<button type="button" class="btn btn-success" onclick="likeFunction(0)">Liked</button>';
				// 	}
				// 	$q2 = "UPDATE post_likes SET likes = '$likes' WHERE post_id = '$postID'";
				// 	$r2 = $this->connection->conn->query($q2);	
				// }
                
				
				
					$data = "<tr><td>".$key."</td><td>".$name."</td><td>".$description."</td><td>".$btn."</td><td>".$likes."</td></tr>";
				}else{
					$data = "<tr><td>".$key."</td><td>".$name."</td><td>".$description."</td><td>".$likes."</td></tr>";
				}
				$key++;
				$response =  array($data, $likes);
				print_r($response);
			}

				
		}
	}
}
$execute = new showPost;
$execute->showPost();
?>