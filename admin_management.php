<?php
session_start();
include_once "autoload.php";

$job = new Job;
$job->admin_view_job();