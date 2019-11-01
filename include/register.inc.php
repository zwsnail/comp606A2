<?php
session_start();
include_once "../helper/autoloader.php";


$username = $_POST['name'];
$_SESSION['name'] = $username;

$mobile = $_POST['mob_number'];
$email = $_POST['email'];
$type = $_POST['type'];
$_SESSION['type'] = $type;
$password =  md5($_POST['pass']);

/*$user = new User;
$user->register($username, $mobile, $email, $type, $password); */

$newUser = User::register($mysqli, $username,$mobile,$email,$type,$password);

/*if (is_null($newUser)){
    "<h2>failed to create new student</h2>";
} else {
    echo "<h2>New User Registered</h2>";
   
}*/


if (is_null($newUser)) {
    //"Registration Failed";
    header("Location: ../login_register.php?fail");
  }
  elseif ($newUser=='0') {
    //  "alredy prenst"
    header("Location: ../login_register.php?already");
  }
  else {
    // Registration Success
    header("Location: ../login_register.php?");
  }
