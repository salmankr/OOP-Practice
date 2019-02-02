<?php
include_once "../config.php";
class db_connection{
	private $server = SERVER_NAME;
	private $user = DB_USER;
	private $password = DB_PASSWORD;
	private $db = DB_NAME;
	public $conn;
    
    public function __construct(){
        $this->conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        if (mysqli_connect_error()) {
            die("connection not found");		
        }
    }
}

?>