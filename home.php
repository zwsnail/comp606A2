<?php
session_start();
include_once "autoload.php";
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

    $job = new Job;
    $result = $job->public_view_job();









include('footer.php');
?>