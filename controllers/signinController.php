<?php
include "../helpers/init.php";
class UserSignin{
	public $connection;
	public $session;
	public function __construct(){
		$this->connection = new db_connection;
		$this->session = new sessions;
	}
	public function signinQuery(){
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$query = "SELECT * FROM signup WHERE email = '$email' AND password = '$password'";
			$run = $this->connection->conn->query($query);
			if ($run->num_rows > 0) {
				while ($row = $run->fetch_assoc()) {
					$userID = $row['id'];
					$userName = $row['f_name'];
				}
				$this->session->session('email', $email);
				$this->session->session('userID', $userID);
				$this->session->session('userName', $userName);
		        header("location: ".base_uri);
			}else{
				$this->session->session('ErrMsg', 'Email or password is incorrect');
				header("location: ".base_uri."sign_in.php");
			}
		}
	}
}
$execute = new UserSignin;
$execute->signinQuery();
?>