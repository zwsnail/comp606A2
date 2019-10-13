<?php
include_once "../autoload.php";




$username = $_POST['username'];
$password = $_POST['password'];  



$user = new User;
$user->admin_login($username, $password);

// $uid = $_SESSION['uid'];
// $name = $_SESSION['name'];

header("Location: ../admin_management.php?");
// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->