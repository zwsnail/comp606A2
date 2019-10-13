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
        $user_id = $_SESSION['uid'];

        $sql = "SELECT * FROM job WHERE (user_id = '$user_id')";
        $result = $this->db->prepare($sql);
        $result->execute();
        
        ?>
        <table class = "table table-hover">
        <thead>
        <tr>
        <th>Job ID</th>
        <th>Creater Customer ID(Your ID)</th>
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

        $_SESSION['job_id'] = array();
        
        // while($res = $result->fetch(PDO::FETCH_ASSOC))
        // {
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
                <td><a href="edit.php?job_id=<?php echo $res['job_id']?>">Edit</a> 
                | <a href="include/customer_delete.inc.php?job_id=<?php echo $res['job_id']?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>	

                </tr>
            </div>

        <?php
        }?>
        </tbody>
        </table>
        <?php

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
        $user_id = $_SESSION['uid'];

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
        <th>Give a Bid</th>

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
                
                <td><a href="bid.php"><button>Bid</button></td></a>
            <?php
            //if(!$res['job_status'] == 'Got bid')
            //{
                //echo '<td><a href="../bid.php"><button>Bid</button></td></a>';
            //}else{
                //echo 'You have bid this job';
            //}

        
            
            ?> 
            



                </tr>
            </div>

        <?php
        }?>
        </tbody>
        </table>
        <?php
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
                
                <td><a href="include/admin_delete.inc.php?$job_id=<?php echo $res['job_id'];?>"><button>Delete</button></td></a>
            <?php
            //if(!$res['job_status'] == 'Got bid')
            //{
                //echo '<td><a href="../bid.php"><button>Bid</button></td></a>';
            //}else{
                //echo 'You have bid this job';
            //}

            $_SESSION['job_id'] = $res['job_id'];
            $job_id = $_SESSION['job_id'];
        
            
            ?> 
            



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







    public function someone_bid($user_id)
    {
        $user_id = $_SESSION['uid'];
        $sql = "UPDATE job SET `job_status`= 'Got bid', `trademan_id`= $user_id WHERE `user_id`= $user_id";
        $result = $this->db->prepare($sql);

        if(!$result) die ("Not correct sql");
        else
        {
            $result->execute();
        }
        return $result;
    }



}