<?php
include "../helpers/init.php";
class UserSignup{
	public $connection;
	public $msg;
   public $session;
	public function __construct(){
		$this->connection = new db_connection;
		$this->msg = new sessions;
      $this->session = new sessions;

	}
	public function signupQuery(){
		if (isset($_POST['submit'])) {
			$first_name = $_POST['first_name'];
   			$last_name = $_POST['last_name'];
   			$email = $_POST['email'];
   			$password = $_POST['password'];
   			$confirm_password = $_POST['confirm_password'];
   			if ($password != $confirm_password) {
   				$this->msg->session('ErrMsg', 'password does not match');
   			}
   			else
   			{
   				$query = "SELECT * FROM signup WHERE email = '$email'";
   				$run = $this->connection->conn->query($query);
   				if ($run->num_rows > 0) {
   					$this->msg->session('ErrMsg', 'Email already existed');
   				}else{
   					$query = "INSERT INTO signup (f_name, l_name , email, password, c_password) VALUES ('$first_name', '$last_name', '$email', '$password', '$confirm_password')";
   					$run = $this->connection->conn->query($query);
                  $userID = $this->connection->conn->insert_id;
   					if ($run) {
                      $this->session->session('email', $email);
                      $this->session->session('userID', $userID);
   					    $this->session->session('userName', $first_name);
   					}
   				}
   			}
		}
		header("location: ../views/sign_up.php");
	}
}
$execute = new UserSignup;
$execute->signupQuery();
?>