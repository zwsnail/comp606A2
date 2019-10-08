<?php
require_once "../helper/autoloader.php";



$username = $_POST['name'];
$_SESSION['name'] = $username;

$mobile = $_POST['mob_number'];
$email = $_POST['email'];
$type = $_POST['type'];
$password = $_POST['pass'];

$user = new User;
$user->register($username, $mobile, $email, $type, $password);
header("Location: ../welcome.php?");
// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->