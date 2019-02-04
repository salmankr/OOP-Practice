<?php
include "../helpers/init.php";
class postLikesController extends controller{
	public function postLikes(){
		$postID = $_GET['postID'];
		$query = "SELECT signup.f_name, signup.l_name FROM signup INNER JOIN user_likes ON signup.id = user_likes.user_id WHERE user_likes.post_id = '$postID' AND user_likes.like_status = '1' ";
		$run = $this->connection->conn->query($query);
		if ($run->num_rows > 0) {
			while ($row = $run->fetch_object()) {
				$f_name = $row->f_name;
				$l_name = $row->l_name;
				$response = '<p>'.$f_name. ' ' . $l_name. '</p>';
				echo $response;
			}
		}else{
			echo "No one liked this post yet!";
		}
	}
}
$execute = new postLikesController;
$execute->postLikes();
?>