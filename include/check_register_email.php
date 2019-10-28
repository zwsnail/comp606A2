<?php
session_start();
include_once "../autoload.php";
if (isset($_POST['email'])){ 
    $email = $_POST['email'];
}
$user = new User;
$user->checkemail($email);
//header("Location: ../login_register.php?");