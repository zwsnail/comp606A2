<?php

include_once "../autoload.php";
session_start();

$job_id = $_SESSION['job_id'];
// $_SESSION['job_location'] = $job_location;
// $_SESSION['job_description'] = $job_description;
// $_SESSION['job_price'] = $job_price;
// $_SESSION['job_start_date'] = $job_start_date;
// $_SESSION['job_expire_date'] = $job_expire_date;

$job = new Job();


if(isset($_POST['change_job']))
{	
    // $job_id = $_POST['id'];
    $job_id = $_SESSION['job_id'];
    $job_location = $_POST['location'];
    $job_description = $_POST['description'];
	$job_price = $_POST['price'];
	$job_start_date = $_POST['start'];
	$job_expire_date = $_POST['expire'];
	
	
	
    //updating the table
    $job = new Job;
    $job ->customer_edit_job($job_id, $job_location, $job_description, $job_price, $job_start_date, $job_expire_date);


    $_SESSION['user_id'] = $user_id;
    $user_id = $uid;
    // $uid = $_SESSION['user_id'];
    $name = $_SESSION['name'];
    $login = $_SESSION['type'];
    var_dump($uid);
    
    // header("Location: ../customer_job_datail.php?uid=<?php echo $uid    &type=customer");

	
}