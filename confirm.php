<?php 
/*
   This page is for displaying customer confirmation of an estimate.
*/
session_start();
include_once "database/autoloader.php";
include_once "database/connection.php";
require_once "header.php";

echo '<br>';
echo '<div class="container text-center">';
echo '<h2 class="text-success">Congratulation！</h2>';
echo '<h3 class="font-italic text-info">If you have issue in your service, please contact us. We like to hear your feedback!</h3>';

$job_id = $_SESSION['job_id'];


//if the estimate got confrimed 
if(isset($_GET['trademan_id']))
{
    $trademan_id = $_GET['trademan_id'];
    $bid = Estimate::customer_confrim($mysqli, $job_id, $trademan_id);
    
}

$bid = Estimate::customer_view_estimate($mysqli, $job_id);
