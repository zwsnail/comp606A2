<?php
session_start();
include_once "../autoload.php";


$username = $_POST['name'];
$_SESSION['name'] = $username;

$mobile = $_POST['mob_number'];
$email = $_POST['email'];
$type = $_POST['type'];
$_SESSION['type'] = $type;
$password = $_POST['pass'];

$user = new User;
$user->register($username, $mobile, $email, $type, $password);
header("Location: ../login_register.php?");
