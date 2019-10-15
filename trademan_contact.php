<?php 
session_start();
require_once "autoload.php";
require_once "header.php";

$trademan_id = $_SESSION['trademan_id'];

echo '<div class="p-3 mb-2 bg-danger text-white">Please respect people\'s privacy. The usage of this contact only regarding to your post job!</div><br>';


$trademan = new User;
$trademan ->view_trademan_contact($trademan_id);
