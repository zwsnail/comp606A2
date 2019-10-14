<?php
session_start();
include_once "../autoload.php";




$job_id = $_GET['job_id'];

$job = new Job;
$job->admin_delete_job($job_id);

// $uid = $_SESSION['uid'];
// $name = $_SESSION['name'];

header("Location: ../admin_management.php");
// header("Location: ../welcome.php?<?php echo '$username';?>");
<!-- header("Location: ../index.php?error=sqlerror"); -->