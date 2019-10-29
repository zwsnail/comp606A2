<?php

/*
    This is Database class connects with the database

*/

class Database
{
  public $db;

  public function  __construct()
  {
    $username = "comp606A2";
    $password = "123";
    $servername = "localhost";

    try 
    {

      $this->db = new PDO("mysql:host=$servername; dbname=safe_trade", $username, $password);
    
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
       header("Location: sitedown.php");
    }
  }


}
