<?php
/*
    This page is for display trademan's information
*/
session_start();
include_once "autoload.php";

include('header.php');


$uid = $_SESSION['uid'];


echo '<div class="container text-center"';
echo '<h1 class="font-weight-bold text-primary">The jobs you have bid</h1>';


$estimate = new Estimate;
$estimate->view_estimate($uid);

echo '<br>';
echo '</div>';


echo '<div class="container text-center"';
echo '<h1 class="font-weight-bold text-primary">Total jobs in SafeTrade</h1>';
echo '<h2 class="font-italic text-success">Please click the <b>Bid Bottom</b> if you are intested in the job!</h2>';

$job = new Job;
$job->trademan_view_job($uid);
echo '</div>';

// include('footer.php');



