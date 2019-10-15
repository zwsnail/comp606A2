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
            // $type = $_SESSION['type'];
            // $uid = $_SESSION['uid'];
            // $name = $_SESSION['name'];
                        
            return true;
        }else
        die ("Not correct sql");

    }

    public function view_trademan_contact($trademan_id) 
    {

        $sql = "SELECT * FROM user WHERE (uid = '$trademan_id')";
        $result = $this->db->prepare($sql);
        $result->execute();
        ?>
        <table class = "table table-hover">
        <thead>
        <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>

        </tr>
        </thead>
        <tbody>
        <?php
     
        foreach ($result as $key => $res)
        {
            
            ?>
            
            <div class="container-fluid">
                
                <tr>
                <td><?= $res['name']; ?> </td>
                <td><?= $res['mobile']; ?> </td>
                <td><?= $res['email']; ?> </td>
                
                </tr>
            </div>

        <?php
        }?>
        </tbody>
        </table>
        <?php
        return $result;

    }

    public function admin_login($username, $password) 
    {

        $sql = "SELECT * FROM admin WHERE (admin_name = '$username' AND admin_password = '$password')";
        $result = $this->db->prepare($sql);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);

    }



}
