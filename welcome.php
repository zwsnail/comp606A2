<?php
/*
    This page welcome login customer/trademan
    By different type, it displays different information
*/
session_start();
include_once "autoload.php";
include('header.php');



$type = $_SESSION['type'];
$user_id = $_SESSION['uid'];
$name = $_SESSION['name'];

echo '<div class="container text-center" id="welcome-box">';
echo '<h1 class="font-weight-bold text-primary">Welcome to SafeTrade! '.$name.'</h1>';

if(isset($type) && $type == 'customer')
{
  
        
    echo '<h2 class="font-italic text-success">If you are looking for a trademan, create you job first.</h2>
    <a href="create_job.php"><button class="btn btn-outline-primary">Create my job!</button></a>
    <a href="customer_job_detail.php"><button class="btn btn-outline-primary">My job list</button></a>';
        
}
else
{

    echo '<h2 class="font-italic text-success">Are you looking for a job to do?</h2>
    <a href="trademan_bid_joblist.php"><button class="btn btn-outline-primary"> Bid job!</button></a>
    ';

}


echo '</div>';

