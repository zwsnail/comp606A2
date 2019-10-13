<?php
session_start();
include_once "autoload.php";
include('header.php');


?>
<?php 

$uid = $_SESSION['uid'];
$name = $_SESSION['name'];
$login = $_SESSION['type'];




if(isset($login) && $login == 'customer')
{
?>
    <div class="">
    <h1 class="">Hi! <?php echo $name;?></h1>

    <h2 class="">Those Jobs are You Created:</h2>
   
    </div>
    <!-- display the jobs -->
    <?php
    $job = new Job;
    $result = $job->customer_view_job($_SESSION['uid']);
}

if(isset($login) && $login == 'trademan')
{
?>
    <div class="">
    <h1 class="">Welcome to SafeTrade!   <?php echo $name;?></h1>
    <h2 class="">Please click the <b>Bid Bottom</b> if you are intested in the job!</h2>
    </div>
    <!-- display the jobs -->
    <?php
    $job = new Job;
    $result = $job->trademan_view_job($_SESSION['uid']);



}



