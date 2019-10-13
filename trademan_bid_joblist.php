<?php
include_once __DIR__ . "/autoload.php";
session_start();
include('header.php');


$uid = $_SESSION['uid'];



echo '<h2>The jobs I have bid</h2>';
$estimate = new Estimate;
$estimate->view_estimate($uid);

echo '<br>';



echo '<h2>Total jobs in SafeTrade</h2>';

$job = new Job;
$job->trademan_view_job($uid);



