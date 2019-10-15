<?php
session_start();
include_once "autoload.php";

include('header.php');


$uid = $_SESSION['uid'];



echo '<h2>The jobs I have bid</h2>';
$estimate = new Estimate;
$estimate->view_estimate($uid);

echo '<br>';



echo '<h2>Total jobs in SafeTrade</h2>';
echo '<h2 class="">Please click the <b>Bid Bottom</b> if you are intested in the job!</h2>';

$job = new Job;
$job->trademan_view_job($uid);



