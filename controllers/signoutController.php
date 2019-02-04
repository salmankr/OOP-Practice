<?php
include "../helpers/init.php";
// unset($_SESSION['email']);
// unset($_SESSION['userID']);
// unset($_SESSION['userName']);
// unset($_SESSION['noPostMsg']);
session_destroy();
header("location:" .base_uri. "sign_in.php");
?>