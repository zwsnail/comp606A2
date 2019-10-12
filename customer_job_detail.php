<?php

include "database/connection.php";
include_once("classes/User.php");
include_once("classes/Job.php");
include('header.php');


?>
<?php 

$uid = $_SESSION['uid'];
$name = $_SESSION['name'];
$_SESSION['login_type'] = $login_type;


if(isset($login_type) && $login_type == 'customer')
{
?>
    <div class="">
    <h1 class="">Welcome to SafeTrade! "$costomer's name here"</h1>
    <h2 class="">Those Jobs are You Created:</h2>
    </div>
    <!-- display the jobs -->
    <?php
    $job = new Job;
    $result = $job->customer_view_job($_SESSION['uid']);
}

if(isset($login_type) && $login_type == 'trademan')
{
?>
    <div class="">
    <h1 class="">Welcome to SafeTrade! "$trademan'a name here"</h1>
    <h2 class="">Please click the <b>Bid Bottom</b> if you are intested in the job!</h2>
    </div>
    <!-- display the jobs -->
    <?php
    $job = new Job;
    $result = $job->trademan_view_job($_SESSION['uid']);



}



