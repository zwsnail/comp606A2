<?php
/*
    This page is for display trademan's information
*/
session_start();
include_once "database/autoloader.php";
include_once "database/connection.php";

include('header.php');


$uid = $_SESSION['uid'];

echo '<div class="container text-center">';
// echo '<h1 class="font-weight-bold text-primary">The jobs you have bid </h1>';
echo '<h2 class="text-primary">The jobs you have bid</h2>';

$estimate = Estimate::trademan_view_estimate($mysqli, $uid);
echo '</div>';
echo '<br>';
echo '<br>';


echo '<div class="container text-center"';
echo '<p> </p>';
echo '<h2 class="text-primary">Total jobs in SafeTrade</h2>';
echo '<h4 class="font-italic text-success">Please click the <b>Bid Bottom</b> if you are intested in the job!</h4>';

$job = Job::trademan_view_job($mysqli, $uid);

// include('footer.php');



