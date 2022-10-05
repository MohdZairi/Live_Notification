<?php 
include "inc/config.php";
session_start();
session_unset();
session_destroy();

$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration for 1 month
$cookie_expiration_time = $current_time - (30*24*60*60);  

setcookie('member_login', $row['ID'],$cookie_expiration_time);
setcookie('random_password', $random_password,$cookie_expiration_time);
setcookie('random_selector', $random_selector,$cookie_expiration_time);


header("Location: login.php");