<?php
// require "helper/autoloader.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SafeTrade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
<!-- logo -->
    <img src="images/logo.jpg" width="40" height="40" alt="">
  <a class="navbar-brand text-white" href="home.php">Safe Trade</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-warning" href="home.php">Home</a>
      </li>
    </ul>


    <?php
  
    if(!isset($_SESSION['name']))
    {
        
        echo '<a class="nav-link text-right">Want to post?</a>';
        echo '<a href="login_register.php"><button type="submit" class="btn btn-outline-warning text-right" name="loginbtn">Login</button></a>';
    }
    else
    {
       
        echo '<a href="home.php"><button type="submit" class="btn btn-outline-warning text-right" name="loginbtn">Logout</button></a>';
    }

  ?>

    <a class="nav-link text-right" href="admin_login.php"><button class="btn btn-outline-warning text-right">admin</button></a>
  

  </div>
</nav>
