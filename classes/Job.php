<?php 



class Job extends Database
{

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

   

    public function public_view_job() 
    {
        $sql = "SELECT * FROM job";
        $result = $this->db->prepare($sql);
        $result->execute();
        
        ?>
        <table class = "table table-hover">
        <thead>
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
                <td><?= $res['trademan_id']; ?> </td>

                </tr>
            </div>

        <?php
        }?>
        </tbody>
        </table>
        <?php
    }


    public function customer_view_job($user_id) 
    {
        // $user_id = $_SESSION['uid'];

        $sql = "SELECT * FROM job WHERE (user_id = '$user_id')";
        $result = $this->db->prepare($sql);
        $result->execute();
        
        ?>
        <table class = "table table-hover">
        <thead>
        <tr>
        <th>Job ID</th>

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
        // {
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
                <td><?= $res['job_status']; ?> </td>
                <td><a href="trademan_contact.php"><?= $res['trademan_id']; ?></a></td>
                <td><a href="customer_edit_job.php?job_id=<?php echo $res['job_id']?>&user_id=<?php echo $res['user_id']?>&job_location=<?php echo $res['job_location']?>&job_description=<?php echo $res['job_description']?>&job_price=<?php echo $res['job_price']?>&job_start_date=<?php echo $res['job_start_date']?>&job_expire_date=<?php echo $res['job_expire_date']?>">Edit</a> 
                |<a href="include/customer_delete.inc.php?job_id=<?php echo $res['job_id']?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>	

                </tr>
            </div>

        <?php

                   
        }?>
        </tbody>
        </table>
        <?php
                $_SESSION['job_id'] = $res['job_id'];
                $_SESSION['trademan_id'] = $res['trademan_id'];
    }


    public function customer_edit_job($job_id, $job_location, $job_description, $job_price, $job_start_date, $job_expire_date) 
    {


        $sql = "UPDATE job SET job_location = '$job_location', job_description = '$job_description', job_price = '$job_price', job_start_date = '$job_start_date', job_expire_date = '$job_expire_date' WHERE (job.job_id = '$job_id')";
        $result = $this->db->prepare($sql);
        $result->execute();
        //need to pass something?


       
    }


    public function customer_delete_job($job_id) 
    {
        // session_start();
  
        //AND `job`.`user_id` = $uid"
        $sql = "DELETE FROM `job` WHERE `job`.`job_id` = $job_id";
        $result = $this->db->prepare($sql);
        $result->execute();
        

    }


    public function trademan_view_job($user_id) 
    {
       

        $sql = "SELECT * FROM job";
        $result = $this->db->prepare($sql);
        $result->execute();
        
        ?>
        <table class = "table table-hover">
        <thead>
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
              
                <td><a href="bid.php"><button>Bid</button></td></a>
            <?php
            ?> 

                </tr>
            </div>

        <?php

        }?>
        </tbody>
        </table>
        <?php
                    $_SESSION['job_id'] = $res['job_id'];
                    $_SESSION['user_id'] = $res['user_id'];
    }

    public function trademan_bid($trademan_id, $user_id)
    {
        
        $sql = "UPDATE job SET `job_status`= 'Got bid', `trademan_id`= $trademan_id WHERE `user_id`= $user_id";
        $result = $this->db->prepare($sql);

        if(!$result) die ("Not correct sql");
        else
        {
            $result->execute();
        }
        return $result;
    }


    public function admin_view_job() 
    {
        // session_start();

        $sql = "SELECT * FROM job";
        $result = $this->db->prepare($sql);
        $result->execute();

    
        ?>
        <table class = "table table-hover">
        <thead>
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


    public function admin_delete_job($job_id) 
    {
        // session_start();

        $sql = "DELETE FROM `job` WHERE `job`.`job_id` = $job_id";
        $result = $this->db->prepare($sql);
        $result->execute();
        

    }











}