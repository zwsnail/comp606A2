<?php 

/*
    This is Estimate class which extends from the Database class.
    So that it can alway get connected with the database.

    There are some function in it:

    1.create_estimate()
    2.trademan_view_estimate()
    3.trademan_delete_job
    4.customer_view_estimate
    5.customer_confrim()

*/

class Estimate
{
    private $id = null;
    private $job_id = "";
    private $material_cost = "";
    private $labor_cost = "";
    private $total_cost = "";
    private $starting_date = "";
    private $expiring_date = "";

    // constructor to create new student object
    public function __construct($id, $job_id, $material_cost, $labor_cost, $total_cost, $starting_date, $expiring_date){
        $this->id = $id;
        $this->job_id = $job_id;
        $this->material_cost = $material_cost;
        $this->labor_cost = $labor_cost;
        $this->total_cost = $total_cost;
        $this->starting_date = $starting_date;
        $this->expiring_date = $expiring_date;
    }
    // setter methods
    public function setId($id){
        $this->$id = $id;
      }
    public function setJob_id($job_id){
        $this->$job_id = $job_id;
      }
    public function setMaterial_cost($material_cost){
    $this->$material_cost = $material_cost;
    }
    public function setLabor_cost($labor_cost){
        $this->$labor_cost = $labor_cost;
    }
    public function setTotal_cost($total_cost){
    $this->$total_cost = $total_cost;
    }
    public function setStarting_date($starting_date){
        $this->$starting_date = $starting_date;
    }
    public function setExpiring_date($expiring_date){
    $this->$expiring_date = $expiring_date;
    }

    //getter methods
    public function getId(){
        return $this->id;
    }
    public function getJob_id(){
        return $this->job_id;
    }
    public function getMaterial_cost(){
        return $this->material_cost;
    }
    public function getLabor_cost(){
        return $this->labor_cost;
    }
    public function getTotal_cost(){
        return $this->total_cost;
    }
    public function getStarting_date(){
        return $this->starting_date;
    }
    public function getExpiring_date(){
        return $this->expiring_date;
    }

    public static function create_estimate($mysqli, $job_id, $trademan_id, $material_cost, $labor_cost, $total_cost, $starting_date, $expiring_date) 
    {
  
        //first count how many bid for a job
        $sql2 = "SELECT count(*) FROM `estimate` WHERE `job_id` =$job_id";
        $result2 = $mysqli->query($sql2) or die($mysqli->error);
        $estimate_count = $result2->fetch_array(MYSQLI_ASSOC);
        //$job_estimate = $result2->fetch_array(MYSQLI_ASSOC);
		//$count_row = $result2->num_rows;
        
        //$row = $job_estimate[0];

        // if there is no bid for one job,  
        //job_status will change from "No bid yet" into "Got bid" and add the job id
        
        if($result2)
        {
            $sql1 = "UPDATE job SET `job_status`= 'Got bid', `trademan_id`= $trademan_id WHERE `job_id`= $job_id";
            $result1 = $mysqli->query($sql1) or die($mysqli->error);
           
        }

        //if there is alreay bid, then no need to change the job status, just add a bid
        $sql = "INSERT INTO estimate VALUES ('0', '$job_id', '$trademan_id', '$material_cost', '$labor_cost', '$total_cost', '$starting_date', '$expiring_date', 'Pending')";
        $result1 = $mysqli->query($sql) or die($mysqli->error);
        
    }

    public static function trademan_view_estimate($mysqli, $uid)
    {
        $uid = $_SESSION['uid'];
        $name = $_SESSION['name'];

        $sql = "SELECT * FROM estimate WHERE `trademan_id`= $uid";
        $result =  $mysqli->query($sql) or die($mysqli->error);
      
        ?>
        <table class = "table table-hover table-sm table-light table-striped">
        <thead class="table-success">
        <tr>
        <th>Job ID</th>
        <th>trademan ID(Your ID)</th>
        <th>Material Cost</th>
        <th>Labor Cost</th>
        <th>Total Cost</th>
        <th>Job Start Date</th>
        <th>Job Expire Date</th>
        <th>Confirmation</th>
        <th></th>

        <!-- <th>Contact</th> -->

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
                <td><?= $res['trademan_id']; ?> </td>
                <td><?= $res['material_cost']; ?> </td>
                <td><?= $res['labor_cost']; ?> </td>
                <td><?= $res['total_cost']; ?> </td>
                <td><?= $res['starting_date']; ?> </td>
                <td><?= $res['expiring_date']; ?> </td> 
                <td><?= $res['confirm'];?> </td>
                <td><a href="include/estimate_delete.inc.php?id=<?php echo $res["id"];?>&job_id=<?php echo $res["job_id"];?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                </tr>
            </div>

        <?php
        // $_SESSION['uid'] = $res['uid'];
        // $_SESSION['name'] = $res['name'];
        // $_SESSION['type'] = $res['type'];
        }?>
        </tbody>
        </table>
        <?php
        return $result;
    }

    public static function trademan_delete_bid($mysqli, $estimate_id, $job_id)
    {
        //delete the bid 
        $sql = "DELETE FROM `estimate` WHERE `estimate`.`id` = $estimate_id";
        $result = $mysqli->query($sql) or die($mysqli->error);


        // but need to check job status
        //if there is no more bid for one job, after delete the bid, 
        //job_status will change back to "no one bid yet"
        $sql2 = "SELECT count(*) FROM `estimate` WHERE `job_id` =$job_id";
        $result2 = $mysqli->query($sql2) or die($mysqli->error);
        
        $rows = $result2->fetch_array(MYSQLI_ASSOC);
        //print_r($rows);
        $row = $rows[0];

        if($row == 0)
        {
            $sql1 = "UPDATE job SET `job_status`= 'No one bid yet', `trademan_id`= 0 WHERE `job_id`= $job_id";
            $result1 = $mysqli->query($sql1) or die($mysqli->error);
           
        
        }

 

    }

    public static function customer_view_estimate($mysqli, $job_id)
    {
        $uid = $_SESSION['uid'];
        $name = $_SESSION['name'];
    
        $sql = "SELECT * FROM estimate WHERE `job_id`= $job_id";
        $result = $mysqli->query($sql) or die($mysqli->error);
        
        ?>
        <table class = "table table-hover table-sm table-light table-striped">
        <thead class="table-success">
        <tr>
        <th>Job ID</th>
        <th>trademan ID</th>
        <th>Material Cost</th>
        <th>Labor Cost</th>
        <th>Total Cost</th>
        <th>Job Start Date</th>
        <th>Job Expire Date</th>
        <th>Confirmation</th>

        </tr>
        </thead>
        <tbody>
        <?php

        $sql2 = "SELECT count(*) FROM `estimate` WHERE `job_id` =$job_id";
        $result2 = $mysqli->query($sql2) or die($mysqli->error);
        $rows = $result2->fetch_array(MYSQLI_ASSOC);
        //$row = $rows[0];
        
       
        $class = '';
        foreach ($result as $key => $res) 
        {       
            
            if($res['confirm'] == "Confirmed!!!")
            {
                $class = "confirm";
                ?>
                <style>.confirm { background-color: gold;}</style>
                <?php
            }
            if($res['confirm'] == "Refused...")
            {
                $class = "refuse";
                ?>
                <style>.refuse { background-color: grey;}</style>
                <?php
            }
            
            ?>
            
            <div class="container-fluid">     
                <tr>
                <td class=<?php echo $class?>><?= $res['job_id']; ?> </td>
                <td class=<?php echo $class?>><a href="trademan_contact.php?trademan_id=<?php echo $res['trademan_id']?>"><?= $res['trademan_id']; ?></a></td>
                <td class=<?php echo $class?>><?= $res['material_cost']; ?> </td>
                <td class=<?php echo $class?>><?= $res['labor_cost']; ?> </td>
                <td class=<?php echo $class?>><?= $res['total_cost']; ?> </td>
                <td class=<?php echo $class?>><?= $res['starting_date']; ?> </td>
                <td class=<?php echo $class?>><?= $res['expiring_date']; ?> </td> 
                <td class=<?php echo $class?>><?= $res['confirm'];?></td>
                </tr>
            </div>
                

            <?php
            $class = '';

        }

        ?>
        </tbody>
        </table>
        <?php

            

    }





    public static function customer_confrim($mysqli, $job_id, $trademan_id)
    {
        $sql = "UPDATE estimate SET `confirm`= 'Confirmed!!!' WHERE `job_id`= $job_id AND `trademan_id` = $trademan_id";
        $result = $mysqli->query($sql) or die($mysqli->error);
 

        $sql1 = "UPDATE estimate SET `confirm`= 'Refused...' WHERE `confirm`= 'Pending'";
        $result1 = $mysqli->query($sql1) or die($mysqli->error);
       
    }

}
