<?php 



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
            return $result;
        }

    }

    public function login($username, $password) 
    {

        $sql = "SELECT * FROM user WHERE (name = '$username' AND password = '$password')";
        $result = $this->db->prepare($sql);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        if($res)
        {
            
            //If without '$res = $result->fetch(PDO::FETCH_ASSOC)' showing: 
            //Fatal error: Uncaught Error: Cannot use object of type PDOStatement as array 
            session_start();

            $_SESSION['uid'] = $res['uid'];
            $_SESSION['name'] = $res['name'];
            $_SESSION['type'] = $res['type'];
            $type = $_SESSION['type'];
            $uid = $_SESSION['uid'];
            $name = $_SESSION['name'];
                        
            return true;
        }else
        die ("Not correct sql");

    }




}
