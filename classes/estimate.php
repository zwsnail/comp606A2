<?php 

/*
    This is Estimate class which extends from the Database class.
    So that it can alway get connected with the database.

    There are some function in it:

    1.create_estimate()
    2.view_estimate()
    3.trademan_delete_job

*/

class Estimate extends Database
{

    public function create_estimate($job_id, $trademan_id, $material_cost, $labor_cost, $total_cost, $starting_date, $expiring_date) 
    {
  

        $sql = "INSERT INTO estimate VALUES ('0', '$job_id', '$trademan_id', '$material_cost', '$labor_cost', '$total_cost', '$starting_date', '$expiring_date')";
        $result = $this->db->prepare($sql);

        if(!$result) die ("Not correct sql");
        else
        {
            $result->execute();
        }
        return $result;
    }

    public function view_estimate($uid)
    {
        $uid = $_SESSION['uid'];
        $name = $_SESSION['name'];

        $sql = "SELECT * FROM estimate WHERE `trademan_id`= $uid";
        $result = $this->db->prepare($sql);
        $result->execute();
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
                <td><a href="include/estimate_delete.inc.php?id=<?php echo $res["id"];?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
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

    public function trademan_delete_job($estimate_id)
    {
        $sql = "DELETE FROM `estimate` WHERE `estimate`.`id` = $estimate_id";
        $result = $this->db->prepare($sql);
        $result->execute();
    }



}