<?php 
/*
    This page receives bid information.
    Then use the class Job 'create_estimate' function to create a bid in the database
    Then use the class Job 'trademan_bid' function to change the job status from "No one bid" to "Got a bid"
*/
session_start();
include_once "../helper/autoloader.php";

$job_id= $_SESSION['job_id'];
// var_dump($job_id);

$user_id = $_SESSION['user_id'];
// var_dump($user_id);
$name = $_SESSION['name'];

$trademan_id = $_SESSION['uid'];
// var_dump($trademan_id);

$job_status = $_SESSION['job_status'];
//var_dump($job_status);

$material_cost = $_POST['material_price'];
$labor_cost = $_POST['labor_price'];
$total_cost = $_POST['toal_price'];
$starting_date = $_POST['start_time'];
$expiring_date = $_POST['expire_time'];


$estimate = Estimate::create_estimate($mysqli, $job_id, $trademan_id, $material_cost, $labor_cost, $total_cost, $starting_date, $expiring_date);
// $job = new Job;
// $job->trademan_bid($job_id, $trademan_id, $user_id, $job_status);

header("Location: ../trademan_bid_joblist.php?bid=$name");
