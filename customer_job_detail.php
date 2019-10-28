<?php

/*
    This page is for displaying customer's posted jobs
*/

session_start();
include_once "autoload.php";
include('header.php');

//Save the session 
$type = $_SESSION['type'];
$user_id = $_SESSION['uid'];
$name = $_SESSION['name'];



//If customer logged in, he/she could view what jobs he/she created
if(isset($type) && $type == 'customer')
{
?>
    <div class="container text-center">
    <h1 class="font-weight-bold text-primary">Hi! <?php echo $name;?></h1>
    <h2 class="font-italic text-success">Those Jobs are You Created:</h2>
    <a href="create_job.php"><button class="btn btn-outline-primary"> Create more jobs!</button></a> 
    <br>
    <br>
    <!-- display the jobs -->
    <?php
    $job = new Job;
    $job->customer_view_job($_SESSION['uid']);
}
else
{echo 'something wrong';}



