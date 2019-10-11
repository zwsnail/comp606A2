<?php
require_once "../helper/autoloader.php";



$username = $_POST['username'];
$_SESSION['name'] = $username;

$password = $_POST['password'];

$user = new User;
$user->login($username, $password);
header("Location: ../welcome.php?");
// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->