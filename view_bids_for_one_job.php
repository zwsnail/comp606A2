<?php 
/*
    This is page for displaying all bids by only single job.
*/
session_start();
require_once "autoload.php";
require_once "header.php";

$job_id = $_GET['job_id'];
$job_description = $_GET['job_description'];
$job_status = $_GET['job_status'];




if($job_status == 'Got bid')
{
    echo '<div class="container text-center">';
    echo '<h2 class="font-italic text-success">Your job '.$job_description.' got bid! Below are the details: </h2><br>';
    echo '<h6>Tip: You can find the contact by clicking the trademan ID :)</h6>';
    $bid = new Estimate;
    $bid->customer_view_estimate($job_id);
}else
{
    echo '<br><br>';
    echo '<div class="container text-center">';
    echo '<h4 class="text-dark">So far no one bid this job yet ￣へ￣</h6>';
    echo '<h4 class="text-dark"><a href="customer_job_detail.php">Click here</a> to go back~</h6>';
    echo '</div>';
} 


