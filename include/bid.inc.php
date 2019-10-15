<?php 
session_start();
require_once "../autoload.php";

$job_id= $_SESSION['job_id'];

$user_id = $_SESSION['user_id'];
var_dump($user_id);
$name = $_SESSION['name'];

$trademan_id = $_SESSION['uid'];
var_dump($trademan_id);

$material_cost = $_POST['material_price'];
$labor_cost = $_POST['labor_price'];
$total_cost = $_POST['toal_price'];
$starting_date = $_POST['start_time'];
$expiring_date = $_POST['expire_time'];

$estimate = new Estimate;
$estimate->create_estimate($job_id, $trademan_id, $material_cost, $labor_cost, $total_cost, $starting_date, $expiring_date) ;
$job = new Job;
$job->trademan_bid($trademan_id, $user_id);

header("Location: ../trademan_bid_joblist.php");
