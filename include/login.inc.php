<?php
include_once "../helper/autoloader.php";
$username = $_POST['username'];
$password = md5($_POST['password']);  
// var_dump($username);
/*$user = new User;
$user->login($username, $password);*/
$type = $_SESSION['type'];
$uid = $_SESSION['uid'];
$name = $_SESSION['name'];
$newUser = User::login($mysqli, $username,$password);
//print_r($newUser);
//var_dump($newUser);
//die("m here");

if(is_null($newUser)) {
    header("Location: ../login_register.php?error");
} else {
    echo "<h2>Login successfully</h2>";
    header("Location: ../welcome.php?");
}
