<?php
require_once "../helper/autoloader.php";
session_start();


$username = $_POST['username'];
$login_type = $_POST['login_type'];

$_SESSION['name'] = $username;
$_SESSION['login_type'] = $login_type;

$password = $_POST['password'];

$user = new User;
$user->login($username, $password);
header("Location: ../welcome.php?");
// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->