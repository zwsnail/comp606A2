<?php
session_start();
include_once "../helper/autoloader.php";




$job_id = $_GET['job_id'];

$job = Job::admin_delete_job($mysqli, $job_id);


// $uid = $_SESSION['uid'];
// $name = $_SESSION['name'];

header("Location: ../admin_management.php");
// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->
