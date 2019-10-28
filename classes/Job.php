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
    //Customer can post job 
    public function create_job($user_id, $location, $description, $price, $start, $expire) 
    {
      
        $user_id = $_SESSION['uid'];

        $sql = "INSERT INTO job VALUES ('0', $user_id, '$location', '$description', '$price', '$start', '$expire','No one bit yet','0')";
        $result = $this->db->prepare($sql);

        if(!$result) die ("Not correct sql");
        else
        {
            $result->execute();
        }
        return $result;
    }

   
    //This function is for everyone can view all the job on home page no need to login
    public function public_view_job() 
    {
        $sql = "SELECT * FROM job";
        $result = $this->db->prepare($sql);
        $result->execute();
        
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
     
        while($res = $result->fetch(PDO::FETCH_ASSOC))
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
       

                </tr>
            </div>

        <?php
        }?>
        </tbody>
        </table>
        <?php
    }

    //This function is for only login customer can view his/her own posted jobs
    public function customer_view_job($user_id) 
    {
        // $user_id = $_SESSION['uid'];

        $sql = "SELECT * FROM job WHERE (user_id = '$user_id')";
        $result = $this->db->prepare($sql);
        $result->execute();
        
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
    public function customer_edit_job($job_id, $job_location, $job_description, $job_price, $job_start_date, $job_expire_date) 
    {


        $sql = "UPDATE job SET job_location = '$job_location', job_description = '$job_description', job_price = '$job_price', job_start_date = '$job_start_date', job_expire_date = '$job_expire_date' WHERE (job.job_id = '$job_id')";
        $result = $this->db->prepare($sql);
        $result->execute();
        //need to pass something?


       
    }

    //This function is for login customer to delete his/her posted jobs
    public function customer_delete_job($job_id) 
    {
        // session_start();
  
        //AND `job`.`user_id` = $uid"
        $sql = "DELETE FROM `job` WHERE `job`.`job_id` = $job_id";
        $result = $this->db->prepare($sql);
        $result->execute();
        

    }

    //This function is for login trademan to view all posted jobs 
    //Plus he/she can bid the job!
    public function trademan_view_job($user_id) 
    {
       

        $sql = "SELECT * FROM job";
        $result = $this->db->prepare($sql);
        $result->execute();
        
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


                <!-- if trademan alreay bid the same job, the bit button will be disabled -->

            <?php
            //first check if the trademan bid or not
            $sql1 = "SELECT * FROM `estimate` WHERE `trademan_id`= $user_id";
            $result1 = $this->db->prepare($sql1);
            $result1->execute();
            $res1 = $result1->fetch(PDO::FETCH_ASSOC);
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
    public function admin_view_job() 
    {
        // session_start();

        $sql = "SELECT * FROM job";
        $result = $this->db->prepare($sql);
        $result->execute();

    
        ?>
        <table class = "table table-hover table-sm table-light table-striped">
        <thead table = "success">
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
    public function admin_delete_job($job_id) 
    {
        // session_start();

        $sql = "DELETE FROM `job` WHERE `job`.`job_id` = $job_id";
        $result = $this->db->prepare($sql);
        $result->execute();
        

    }











}
