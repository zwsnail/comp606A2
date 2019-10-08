<?php 
require_once "../database/connection.php";

class User extends Database
{

    public function register($username, $mobile, $email, $type, $password) 
    {

        $sql = "INSERT INTO user VALUES ('0', '$username', '$mobile', '$email', '$type', '$password')";
        $result = $this->db->prepare($sql);

        if(!$result) die ("Not correct sql");
        else
        {
            $result->execute();
        }
    }






}
