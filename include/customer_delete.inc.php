<?php
session_start();
include_once "../autoload.php";


//getting id of the data from url
$job_id = $_GET['job_id'];


$job = new Job;
$job->customer_delete_job($job_id);


header("Location: ../customer_job_detail.php");
