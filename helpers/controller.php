<?php
class controller{
	public $connection;
	public $session;
	public $msg;
	public function __construct(){
		$this->connection = new db_connection;
		$this->session = new sessions;
		$this->msg = new sessions;
	}
}
?>