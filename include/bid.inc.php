<?php 
session_start();
require_once "../autoload.php";

$user_id = $_SESSION['uid'];
$name = $_SESSION['name'];

$material_cost = $_POST['material_price'];
$labor_cost = $_POST['labor_price'];
$total_cost = $_POST['toal_price'];
$starting_date = $_POST['start_time'];
$expiring_date = $_POST['expire_time'];

$estimate = new Estimate;
$estimate->create_estimate($material_cost, $labor_cost, $total_cost, $starting_date, $expiring_date) ;
$job = new Job;
$job->someone_bid($user_id);
header("Location: ../trademan_bid_joblist.php");
