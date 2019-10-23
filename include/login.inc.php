<?php
include_once "../autoload.php";




$username = $_POST['username'];
$password = md5($_POST['password']);  
// var_dump($username);


$user = new User;
$user->login($username, $password);


$type = $_SESSION['type'];
$uid = $_SESSION['uid'];
$name = $_SESSION['name'];
if(isset($name))
{
    header("Location: ../welcome.php?");
}else{
    header("Location: ../login_register.php?error");
}

// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->
