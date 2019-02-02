<?php
session_start();
class sessions{
	public function session($sessionVar, $msg){
        $_SESSION[$sessionVar] = $msg;
	}
}
?>