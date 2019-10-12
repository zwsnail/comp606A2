<?php
include('header.php');
?>

<div class="">
<h1 class="">Welcome to SafeTrade!</h1>
<h2 class="">Latest Jobs</h2>


</div>


<?php

if(isset($db))
{
?>
    <div class="">
    <h1 class="">Welcome to SafeTrade! </h1>
    <h2 class="">Please login to post or bid the job if you are intested!</h2>
    </div>
    <!-- display the jobs -->
    <?php
    $job = new Job;
    $result = $job->public_view_job();



}








include('footer.php');
?>