<?php
session_start();
include_once "autoload.php";
include('header.php');


$type = $_SESSION['type'];
$user_id = $_SESSION['uid'];
$name = $_SESSION['name'];




if(isset($type) && $type == 'customer')
{
?>
    <div class="">
    <h1 class="">Hi! <?php echo $name;?></h1>

    <h2 class="">Those Jobs are You Created:</h2>
   
    </div>
    <!-- display the jobs -->
    <?php
    $job = new Job;
    $job->customer_view_job($_SESSION['uid']);
}
else
{echo 'down';}



