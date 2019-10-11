<?php
require_once "../helper/autoloader.php";
require_once "../database/connection.php";

$location = $_POST['location'];
$price = $_POST['price'];
$description = $_POST['description'];
$start = $_POST['start'];
$expire = $_POST['expire'];

if(isset($_SESSION['uid']))   
{ 
    $job = new Job;
    $result = $job->create_job($_SESSION['uid'], $location, $description, $price, $start, $expire);
 
    header("Location: ../welcome.php?");
}else
    echo "something wrong";


    

