<?php
require_once "../function/init.php";
$user_details = new user_session();
$user_details->logout();
header("Location: login.php");


?>