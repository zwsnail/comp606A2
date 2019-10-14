<?php
session_start();
include_once "autoload.php";
require_once "header.php";

$job = new Job;
$job->admin_view_job();