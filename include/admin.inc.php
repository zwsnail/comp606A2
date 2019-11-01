<?php
include_once "../helper/autoloader.php";
$username = $_POST['username'];
$password = $_POST['password'];  
$usertype = $_SESSION['usertype'];
$admin = User::admin_login($mysqli, $username,$password);
if(is_null($admin)) {
    header("Location: ../admin_login.php?error");
} else {
    echo "<h2>Admin Login successfully</h2>";
    header("Location: ../admin_management.php?");
}

// $uid = $_SESSION['uid'];
// $name = $_SESSION['name'];


// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->
