<?php
include_once "../autoload.php";




$username = $_POST['username'];
$password = $_POST['password'];  
// var_dump($username);


$user = new User;
$user->login($username, $password);


$type = $_SESSION['type'];
$uid = $_SESSION['uid'];
$name = $_SESSION['name'];
// var_dump($type);
header("Location: ../welcome.php?");
// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->