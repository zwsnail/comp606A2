<?php
session_start();
include_once "autoload.php";
require_once "header.php";

echo '<div class="container text-center">';
$job = new Job;
$job->admin_view_job();