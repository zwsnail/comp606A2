<?php 

/*
    This is User class which extends from the Database class.
    So that it can alway get connected with the database.

    There are some function in it:

    1.register()
    2.login()
    3.view_trademan_contact()
    4.admin_login()

*/


class User 
{
    private $id = null;
    private $username = "";
    private $mobile = "";
    private $email = "";
    private $type = "";
    private $password = "";

    // constructor to create new student object
    public function __construct($id, $username, $mobile, $email, $type, $password){
        $this->id = $id;
        $this->username = $username;
        $this->mobile = $mobile;
        $this->email = $email;
        $this->type = $type;
        $this->password = $password;
    }
    // setter methods
    public function setId($id){
        $this->$id = $id;
      }
    public function setUsername($username){
    $this->$username = $username;
    }
    public function setMobile($mobile){
        $this->$mobile = $mobile;
    }
    public function setEmail($email){
        // string, email format
        $result = true;
        if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
          $result = false;
        }else {
          $this->email = $email;
        }
        return $result;
      }  
    public function setType($type){
        $this->$type = $type;
    }
    public function setPassword($password){
        $this->$password = $password;
    }

    //getter methods

    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getMobile(){
        return $this->mobile;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getType(){
        return $this->type;
    }
    public function getPassword(){
        return $this->password;
    }
    //This function is for register
    public static function register($mysqli, $username, $mobile, $email, $type, $password) 
    {

    //checking if the email is available in database
			$query = "SELECT * FROM user WHERE email='$email'";

			$result = $mysqli->query($query) or die($mysqli->error);

			$count_row = $result->num_rows;

			//if the username is not in db then insert to the table

			if($count_row == 0){
                $query = "INSERT INTO user SET name='$username', mobile='$mobile', email='$email', type='$type', password='$password'";

				$result = $mysqli->query($query) or die($mysqli->error);
				if($result)
				{
					$id = $mysqli->insert_id;
					$user = new User($id,$username, $mobile, $email, $type, $password);
		      $result = $user;
				}
				 return $result;


			}
			else{
				$noresult='0';
            return $noresult;
        }
}
  //This function is for login
    //Customer and Trademan are in same 'user' table, but one column named 'type' is different
    public static function login($mysqli, $username, $password) 
    {
        
        //  $password = md5($password);

		$query = "SELECT * from user WHERE name='$username' and password='$password'";

		$result = $mysqli->query($query) or die($mysqli->error);
        $user_result = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
			$user = new user($user_result['uid'],$user_result['name'],$user_result['mobile'],$user_result['email'],$user_result['type'],$user_result['password']);
			$result = $user;
            session_start();
            $_SESSION['uid'] = $user_result['uid'];
            $_SESSION['name'] = $user_result['name'];
            $_SESSION['type'] = $user_result['type'];
	            return $result;
	        }
    }

    //This function is for a customer to contact with a trademan who bid he/her posted job
    public static function view_trademan_contact($mysqli,$trademan_id) 
    {

        $sql = "SELECT * FROM user WHERE (uid = '$trademan_id')";
        $result = $mysqli->query($sql) or die($mysqli->error);
        $trademan_result = $result->fetch_array(MYSQLI_ASSOC);
        $count_row = $result->num_rows;
        
        ?>
        <table class = "table table-hover table-sm table-light table-striped">
        <thead class = "table-success">
        <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>

        </tr>
        </thead>
        <tbody>
        <?php
     if ($count_row > 0) {
        
    ?>
            
            <div class="container-fluid">
                <tr>
                <td><?= $trademan_result['name']; ?> </td>
                <td><?= $trademan_result['mobile']; ?> </td>
                <td><?= $trademan_result['email']; ?> </td>
                
                </tr>
            </div>

        <?php } ?>
        </tbody>
        </table>
        <?php
        return $trademan_result;

    }
    
    //This function is for an admin to login so that he/she could delete some inappropriate posted job
    public static function admin_login($mysqli, $username, $password) 
    {

        $query = "SELECT * from admin WHERE admin_name = '$username' AND admin_password = '$password'";

		$result = $mysqli->query($query) or die($mysqli->error);
        $admin_result = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
            session_start();
            $_SESSION['usertype'] = "admin";
	            return $admin_result;
	        }

    }



}
