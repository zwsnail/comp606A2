<?php
include('header.php');

?>


<h1 class="">Welcome to SafeTrade! <?php echo '$_SESSION["user_id"]';?></h1>

<?php 
if(isset($_SESSION['type']))
{
    if($_SESSION['type']== 'costomer'))
        {
            echo '<h2 class="">If you are looking for a trademan, create you job first.</h2>
            <a href="create_job.php"><button>Create my job!</button></a>
            <a href="customer_job_detail.php"><button>My job list</button></a>';
        }
}
else
{

}
?>


<!-- display the jobs -->



</div>