<?php
session_start();
include_once "../autoload.php";


//getting id of the data from url
$estimate_id = $_GET['id'];
$job_id = $_GET['job_id'];
$job_status = $_GET['job_status'];


$estimate = new Estimate;
$estimate->trademan_delete_bid($estimate_id, $job_id);


header("Location: ../trademan_bid_joblist.php");
