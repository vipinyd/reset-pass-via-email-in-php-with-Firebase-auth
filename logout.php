<?php
session_start();
unset($_SESSION['verified_user_id']);
unset($_SESSION['user']);
header('location:login.php');

$_SESSION['status'] = "logged out"; 
header('location:login.php');
exit();
?>
