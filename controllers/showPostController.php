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
				$data = "<tr><td>".$key."</td><td>".$name."</td><td>".$description."</td><td>".$likes."</td></tr>";
				$key++;
				echo $data;
			}
		}
	}
}
$execute = new showPost;
$execute->showPost();
?>