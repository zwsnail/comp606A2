<?php 


class Job extends Database
{

    public function create_job($user_id,$location, $description, $price, $start, $expire) 
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

   
    public function view_job($user_id) 
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
                <td><?= $res['job_price']; ?> </td>
                <td><?= $res['job_start_date']; ?> </td>
                <td><?= $res['job_expire_date']; ?> </td> 
                <td><?= $res['job_status']; ?> </td>
                <td><?= $res['trademan_id']; ?> </td>
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
    }






}