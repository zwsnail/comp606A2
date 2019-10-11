<?php

include_once("classes/User.php");
include_once("classes/Job.php");
// require_once "database/connection.php";
include('header.php');


?>

<div class="">
<h1 class="">Welcome to SafeTrade! "$username here"</h1>
<h2 class="">Those Jobs are You Created:</h2>
</div>
<!-- display the jobs -->
<?php
$job = new Job;
$result = $job->view_job($_SESSION['uid']);



