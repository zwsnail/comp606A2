<?php
session_start();
include_once "autoload.php";
include('header.php');



$type = $_SESSION['type'];
$user_id = $_SESSION['uid'];
$name = $_SESSION['name'];


echo '<h1>Welcome to SafeTrade! '.$name.'</h1>';

if(isset($type) && $type == 'customer')
{
  
        
    echo '<h2 class="">If you are looking for a trademan, create you job first.</h2>
    <a href="create_job.php"><button>Create my job!</button></a>
    <a href="customer_job_detail.php"><button>My job list</button></a>';
        
}
else
{

    echo '<h2 class="">Are you looking for a job to do?</h2>
    <a href="trademan_bid_joblist.php"><button>View my bid job!</button></a>
    ';

}
?>


<!-- display the jobs -->



</div>