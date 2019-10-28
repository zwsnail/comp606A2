<?php
/*
    This page is for display trademan's information
*/
session_start();
include_once "autoload.php";

include('header.php');


$uid = $_SESSION['uid'];


echo '<div class="container text-center"';
echo '<h2 class="text-primary">The jobs you have bid</h2>';



$estimate = new Estimate;
$estimate->view_estimate($uid);


echo '</div>';
echo '<br>';
echo '<br>';


echo '<div class="container text-center"';
echo '<h1>Total jobs in SafeTrade</h1>';
echo '<h4 class="font-italic text-success">Please click the <b>Bid Bottom</b> if you are intested in the job!</h4>';

$job = new Job;
$job->trademan_view_job($uid);
echo '</div>';

// include('footer.php');



