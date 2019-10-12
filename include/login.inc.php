<?php
require_once "../helper/autoloader.php";




$username = $_POST['username'];
$password = $_POST['password'];  
$login_type = $_POST['login_type'];
// $_SESSION['name'] = $username;
// $_SESSION['login_type'] = $login_type;


// $_SESSION['login_type'] = $res['uid'];
// $_SESSION['name'] = $res['name'];
// $_SESSION['type'] = $res['type'];

$user = new User;
$user->login($username, $password);

header("Location: ../welcome.php?");
// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->