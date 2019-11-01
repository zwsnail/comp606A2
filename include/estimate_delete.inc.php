<?php
session_start();
include_once "../helper/autoloader.php";


//getting id of the data from url
$estimate_id = $_GET['id'];
$job_id = $_GET['job_id'];
//$job_status = $_GET['job_status'];

$estimate = Estimate::trademan_delete_bid($mysqli, $estimate_id, $job_id);

header("Location: ../trademan_bid_joblist.php");
