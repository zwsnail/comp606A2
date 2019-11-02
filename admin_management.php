<?php
session_start();
include_once "database/autoloader.php";
include_once "database/connection.php";
require_once "header.php";

echo '<div class="container text-center">';
$job = Job::admin_view_job($mysqli);
