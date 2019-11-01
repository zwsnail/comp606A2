<?php
session_start();
include_once "database/autoloader.php";
include_once "database/connection.php";
include('header.php');

?>




<?php

?>
    <div class="container text-center">
    <h1 class="font-weight-bold text-primary">Welcome to SafeTrade! </h1>
    <h2 class="font-italic text-success">Please login to post or bid the job if you are intested!</h2>
    </div>
    <!-- display the jobs -->
    <?php
    $job = Job::public_view_job($mysqli);
    $result = $job;

//include('footer.php');
?>
