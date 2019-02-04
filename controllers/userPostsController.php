<?php
include "../helpers/init.php";
class userPostsController extends controller{
	public function userPosts(){
		if (isset($_SESSION['email'])) {
			$userID = $_SESSION['userID'];
			$query = "SELECT * FROM posts WHERE user_id = '$userID'";
			$run = $this->connection->conn->query($query);
			if ($run->num_rows > 0) {
				$key = 1;
				while ($row = $run->fetch_object()) {
					$name = $row->name;
					$description = $row->description;
					$postID = $row->id;
					$buttons = '<button type="button" class="btn btn-primary mr-2" onclick = "getUpdatePost('.$postID.')">Update</button><button type="button" class="btn btn-danger" onclick = "postDelete('.$postID.')">Delete</button>';
					$data = '<tr><td>'.$key.'</td><td>'.$name.'</td><td>'.$description.'</td><td>'.$buttons.'</td></tr>';
					$key++;
					echo $data;
				}
			}else{
				echo 0;
			}
		}
		
	}
}
$execute = new userPostsController;
$execute->userPosts();
?>