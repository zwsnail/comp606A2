<?php
include_once "../helper/autoloader.php";
session_start();


$location = $_POST['location'];
$price = $_POST['price'];
$description = $_POST['description'];
$start = $_POST['start'];
$expire = $_POST['expire'];



if(isset($_SESSION['uid']))   
{ 
    $job = Job::create_job($mysqli, $_SESSION['uid'], $location, $description, $price, $start, $expire);
   /* $job = new Job;
    $result = $job->create_job($_SESSION['uid'], $location, $description, $price, $start, $expire);*/
 
    header("Location: ../customer_job_detail.php?");
}else{
    echo "something wrong";
}

    

