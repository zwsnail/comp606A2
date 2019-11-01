<?php 


/*
    This is Job class which extends from the Database class.
    So that it can alway get connected with the database.

    There are some function in it:

    1.create_job()
    2.public_view_job()
    3.customer_view_job()
    4.customer_edit_job()
    5.customer_delete_job()
    6.trademan_view_job()
    7.admin_view_job()
    8.admin_delete_job()
*/


class Job extends Database
{

    private $user_id = null;
    private $location = "";
    private $description = "";
    private $price = "";
    private $start = "";
    private $expire = "";

    // constructor to create new student object
    public function __construct($user_id, $location, $description, $price, $start, $expire){
        $this->user_id = $user_id;
        $this->location = $location;
        $this->description = $description;
        $this->price = $price;
        $this->start = $start;
        $this->expire = $expire;
    }
    // setter methods
    public function setUser_id($user_id){
        $this->$id = $id;
      }
    public function setLocation($location){
    $this->$location = $location;
    }
    public function setDescription($description){
        $this->$description = $description;
    }
    public function setPrice($price){
    $this->$price = $price;
    }
    public function setStart($start){
        $this->$start = $start;
    }
    public function setExpire($expire){
    $this->$expire = $expire;
    }

    //getter methods

    public function getUser_id(){
        return $this->user_id;
    }
    public function getLocation(){
        return $this->location;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getStart(){
        return $this->start;
    }
    public function getExpire(){
        return $this->expire;
    }
    //Customer can post job 
    public static function create_job($mysqli, $user_id, $location, $description, $price, $start, $expire) 
    {
      
        $user_id = $_SESSION['uid'];
        $sql = "INSERT INTO job VALUES ('0', '$user_id', '$location', '$description', '$price', '$start', '$expire','No one bid yet','0')";
        $result = $mysqli->query($sql) or die($mysqli->error);

        if($result){
			$job_id = $mysqli->insert_id;
			$job = new Job($job_id,$username, $mobile, $email, $type, $password);
		    $result = $job;
		}
			return $result;
    }

   
    //This function is for everyone can view all the job on home page no need to login
    public static function public_view_job($mysqli) 
    {
        $sql = "SELECT * FROM job";
        $result = $mysqli->query($sql) or die($mysqli->error);
        $public_jobview = $result->fetch_array(MYSQLI_ASSOC);
        /*$result = $this->db->prepare($sql);
        $result->execute();*/
        
        ?>
        <div>
        <table class = "table table-hover table-sm table-light table-striped">
        <thead class="table-success">
        <tr>
        <th>Job ID</th>
        <th>Creater Customer ID</th>
        <th>Location</th>
        <th>Description</th>
        <th>Estimated Total Cost</th>
        <th>Job Start Date</th>
        <th>Job Expire Date</th>
        <th>Any Trademan Interested?</th>
      

        </tr>
        </thead>
        <tbody>
        <?php
     
     foreach ($result as $key => $res){
            
            ?>
            
            <div class="container-fluid">
                
                <tr>
                <td><?= $res['job_id']; ?> </td>
                <td><?= $res['user_id']; ?> </td>
                <td><?= $res['job_location']; ?> </td>
                <td><?= $res['job_description']; ?> </td>
                <td><?= $res['job_price']; ?> </td>
                <td><?= $res['job_start_date']; ?> </td>
                <td><?= $res['job_expire_date']; ?> </td> 
                <td><?= $res['job_status']; ?> </td>
       

                </tr>
            </div>

        <?php
        }?>
        </tbody>
        </table>
        <?php
    }

    //This function is for only login customer can view his/her own posted jobs
    public static function customer_view_job($mysqli, $user_id) 
    {
        // $user_id = $_SESSION['uid'];

        $sql = "SELECT * FROM job WHERE (user_id = '$user_id')";
        /*$result = $this->db->prepare($sql);
        $result->execute();*/
        $result = $mysqli->query($sql) or die($mysqli->error);
        $customer_jobresult = $result->fetch_array(MYSQLI_ASSOC);
        
        ?>
        
        <table class = "table table-hover table-sm table-light table-striped">
        <thead class = "table-success">
        <tr>
        <th>Job ID</th>

        <th>Location</th>
        <th>Description</th>
        <th>Estimated Total Cost</th>
        <th>Job Start Date</th>
        <th>Job Expire Date</th>
        <th>Any Trademan Interested?</th>
        <!-- <th>Trademan's ID(if someone bid)</th> -->
        <th></th>
        </tr>
        </thead>
        <tbody>
        <?php

       
        //print_r($customer_jobresult);
        //die("m here");
        foreach ($result as $key => $res) 
        {
            ?>
            <div class="container-fluid">
                
                <tr>
                <td><?= $res['job_id']; ?> </td>

                <td><?= $res['job_location']; ?> </td>
                <td><?= $res['job_description']; ?> </td>
                <td><?= $res['job_price']; ?> </td>
                <td><?= $res['job_start_date']; ?> </td>
                <td><?= $res['job_expire_date']; ?> </td> 
                <td><a href="view_bids_for_one_job.php?job_id=<?php echo $res['job_id']?>&job_description=<?php echo $res['job_description']?>&job_status=<?php echo $res['job_status']?>"><?= $res['job_status']; ?> </td>
                <td><a href="customer_edit_job.php?job_id=<?php echo $res['job_id']?>&user_id=<?php echo $res['user_id']?>&job_location=<?php echo $res['job_location']?>&job_description=<?php echo $res['job_description']?>&job_price=<?php echo $res['job_price']?>&job_start_date=<?php echo $res['job_start_date']?>&job_expire_date=<?php echo $res['job_expire_date']?>">Edit</a> 
                |<a href="include/customer_delete.inc.php?job_id=<?php echo $res['job_id']?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>	

                </tr>
            </div>

        <?php

                   
        }?>
        </tbody>
        </table>
        
        <?php
            if(isset($res))
            {
                // $_SESSION['job_id'] = $res['job_id'];
                $_SESSION['trademan_id'] = $res['trademan_id'];
            
            }
    }

    //This function is for login customer to edit his/her posted jobs
    public static function customer_edit_job($mysqli, $job_id, $job_location, $job_description, $job_price, $job_start_date, $job_expire_date) 
    {


        $sql = "UPDATE job SET job_location = '$job_location', job_description = '$job_description', job_price = '$job_price', job_start_date = '$job_start_date', job_expire_date = '$job_expire_date' WHERE (job.job_id = '$job_id')";
        $result = $mysqli->query($sql) or die($mysqli->error);
        //$edit_job = $result->fetch_array(MYSQLI_ASSOC);
        if($result){
            return $result;
        }
        //need to pass something?
    }

    //This function is for login customer to delete his/her posted jobs
    public static function customer_delete_job($mysqli, $job_id) 
    {
        // session_start();
  
        //AND `job`.`user_id` = $uid"
        $sql = "DELETE FROM `job` WHERE `job`.`job_id` = $job_id";
        $result = $mysqli->query($sql) or die($mysqli->error);
       
        

    }

    //This function is for login trademan to view all posted jobs 
    //Plus he/she can bid the job!
    public static function trademan_view_job($mysqli, $user_id) 
    {
       

        $sql = "SELECT * FROM job";
        $result = $mysqli->query($sql) or die($mysqli->error);
        $trademan_jobview = $result->fetch_array(MYSQLI_ASSOC);
        
        ?>
        <table class = "table table-hover table-sm table-light table-striped">
        <thead class = "table-success">
        <tr>
        <th>Job ID</th>
        <th>Creater Customer ID</th>
        <th>Location</th>
        <th>Description</th>
        <th>Estimated Total Cost</th>
        <th>Job Start Date</th>
        <th>Job Expire Date</th>
        <th>Any Trademan Interested?</th>
        <th>Give a Bid</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $key => $res) 
        {    
            ?> 
            <div class="container-fluid">
                <tr>
                <td><?= $res['job_id']; ?> </td>
                <td><?= $res['user_id']; ?> </td>
                <td><?= $res['job_location']; ?> </td>
                <td><?= $res['job_description']; ?> </td>
                <td><?= $res['job_price']; ?> </td>
                <td><?= $res['job_start_date']; ?> </td>
                <td><?= $res['job_expire_date']; ?> </td> 
                <td><?= $res['job_status']; ?> </td>


                <!-- if trademan alreay bid the same job, the bid button will be disabled -->

            <?php
            //first check if the trademan bid or not
            $sql1 = "SELECT * FROM `estimate` WHERE `trademan_id`= $user_id";
            $result1 = $mysqli->query($sql) or die($mysqli->error);
            $res1 = $result1->fetch_array(MYSQLI_ASSOC);
            
            // button disabled
            if($res1['trademan_id'] == $user_id && $res['job_status'] == 'Got bid' && $res1['job_id']== $res['job_id'] )
            {?>
                <td><a href="bid.php?job_id=<?php echo $res['job_id']?>&job_status=<?php echo $res['job_status']?>"><button disabled class="btn btn-outline-primary">Already Bid</button></td></a>
            <?php
            }else{ // button OK
            ?>
                <td><a href="bid.php?job_id=<?php echo $res['job_id']?>&job_status=<?php echo $res['job_status']?>"><button class="btn btn-outline-primary">Bid</button></td></a>
              
                </tr>
            </div>

            <?php
            }
        }?>
        </tbody>
        </table>
        <?php
                if(isset($res))
                {
                    // $_SESSION['job_id'] = $res['job_id'];
                    $_SESSION['user_id'] = $res['user_id'];
                
                }
 
    }


    //The admin also can view all jobs like other non-logged customer
    //But admin can delete any job if it contains some inappropriate content
    public static function admin_view_job() 
    {
        // session_start();

        $sql = "SELECT * FROM job";
        $result = $this->db->prepare($sql);
        $result->execute();

    
        ?>
        <table class = "table table-hover table-sm table-light table-striped">
        <thead class="table-success">
        <tr>
        <th>Job ID</th>
        <th>Creater Customer ID</th>
        <th>Location</th>
        <th>Description</th>
        <th>Estimated Total Cost</th>
        <th>Job Start Date</th>
        <th>Job Expire Date</th>
        <th>Any Trademan Interested?</th>
        <th>Trademan's ID(if someone bid)</th>
        <th></th>

        </tr>
        </thead>
        <tbody>

        <?php

        // while($res = $result->fetch(PDO::FETCH_ASSOC))
        foreach ($result as $key => $res) 
        {

            
            ?>
            
            <div class="container-fluid">
                
                <tr>
                <td><?= $res['job_id']; ?> </td>
                <td><?= $res['user_id']; ?> </td>
                <td><?= $res['job_location']; ?> </td>
                <td><?= $res['job_description']; ?> </td>
                <td><?= $res['job_price']; ?> </td>
                <td><?= $res['job_start_date']; ?> </td>
                <td><?= $res['job_expire_date']; ?> </td> 
                <td><?= $res['job_status']; ?> </td>
                <td><?= $res['trademan_id']; ?> </td>
                <td><a href="include/admin_delete.inc.php?job_id=<?php echo $res['job_id']?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>	

                </tr>
            </div>

        <?php
        }?>
        </tbody>
        </table>
        <?php
    }


    //This function is for Admin deletes any job if it contains some inappropriate content
    public static function admin_delete_job($job_id) 
    {
        // session_start();

        $sql = "DELETE FROM `job` WHERE `job`.`job_id` = $job_id";
        $result = $this->db->prepare($sql);
        $result->execute();
        

    }


}
