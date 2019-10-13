<?php
include_once "../autoload.php";
session_start();


$location = $_POST['location'];
$price = $_POST['price'];
$description = $_POST['description'];
$start = $_POST['start'];
$expire = $_POST['expire'];


var_dump($uid);
if(isset($_SESSION['uid']))   
{ 
    $job = new Job;
    $result = $job->create_job($_SESSION['uid'], $location, $description, $price, $start, $expire);
 
    header("Location: ../customer_job_detail.php?");
}else
    echo "something wrong";


    

