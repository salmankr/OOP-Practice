<?php
include "../helpers/init.php";
unset($_SESSION['email']);
unset($_SESSION['userID']);
unset($_SESSION['userName']);
header("location:" .base_uri. "sign_in.php");
?>