<?php
error_reporting(0);

/*$user = "root";
$password = "";
$database = "safe_trade";
$host = "localhost";*/

$user = "comp606A2";
$password = "123";
$database = "safe_trade";
$servername = "localhost";

$mysqli = mysqli_connect($host, $user, $password, $database);
if ($mysqli == false){
    echo "<h2>Site is down</h2>";
    header("Location: sitedown.php");
}

$mysqli->autocommit(true);

error_reporting(E_ALL);

?>
