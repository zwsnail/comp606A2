<?php 
session_start();
require_once "autoload.php";
require_once "header.php";

$trademan_id = $_GET['trademan_id'];


echo '<div class="p-3 mb-2 bg-danger text-white">Please respect people\'s privacy. The usage of this contact only regarding to your post job!</div><br>';

if($trademan_id != 0)
{
    $trademan = new User;
    $trademan ->view_trademan_contact($trademan_id);
    $bid = new Estimate;
    $bid->customer_view_estimate($customerid);
}else{
    echo '<div class="container text-center">';
    echo '<h4 class="text-dark">So far no one bid this job yet ￣へ￣</h6>';
    echo '<h4 class="text-dark"><a href="customer_job_detail.php">Click here</a> to go back~</h6>';
    echo '</div>';
} 


