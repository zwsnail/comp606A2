<?php
session_start();
include_once "../helper/autoloader.php";


//getting id of the data from url
$job_id = $_GET['job_id'];
$job = Job::customer_delete_job($mysqli, $job_id);

header("Location: ../customer_job_detail.php");
