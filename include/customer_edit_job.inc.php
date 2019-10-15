<?php
session_start();
include_once "../autoload.php";


$job_id = $_SESSION['job_id'];





if(isset($_POST['change_job']))
{	

    $job_location = $_POST['location'];
    $job_description = $_POST['description'];
	$job_price = $_POST['price'];
	$job_start_date = $_POST['start'];
	$job_expire_date = $_POST['expire'];
	
	
	
    //updating the table
    $job = new Job;
    $job ->customer_edit_job($job_id, $job_location, $job_description, $job_price, $job_start_date, $job_expire_date);


    $type = $_SESSION['type'];
    $user_id = $_SESSION['uid'];
    $name = $_SESSION['name'];

    // var_dump($user_id);
    // var_dump($name);

    // header("Location: ../customer_job_datail.php");
    header("Location: ../welcome.php");



	
}