<?php
session_start();
include_once "autoload.php";
include('header.php');

$type = $_SESSION['type'];
$user_id = $_SESSION['uid'];
$name = $_SESSION['name'];
$job_id = $_SESSION['job_id'];


$job_location = $_GET['job_location'];
$job_description = $_GET['job_description'];
$job_price = $_GET['job_price'];
$job_start_date = $_GET['job_start_date'];
$job_expire_date = $_GET['job_expire_date'];




?>
<!DOCTYPE html>
<html lang="en">

<body>  
	<div class="container mt-4">
			<!-- registration form -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
				<h2 class="text-center mt-2">Change This Job</h2>
				<form action="include/customer_edit_job.inc.php?" method="post" role="form" class="p-2" id="register-frm">
					<div class="form-group">
						<input type="text" name="location" class="form-control" value=<?php echo $job_location;?> required>
					</div>

				
						<p>How much it would cost?</p>

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input name="price" type="text" class="form-control" value = <?php echo $job_price;?> aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                    </div>

					<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Details about the job</span>
					</div>
					<textarea name="description" class="form-control" value = <?php echo $job_description;?> aria-label="With textarea"></textarea>
					</div>

					<div class="form-group">
                    <p>What is the date when job will be active?</p>
						<input type="date" name="start" class="form-control" value = <?php echo $Job_Start_Time;?> required>
					</div>
					<div class="form-group">
                    <p>What is the date when request for estimates finishes?</p>
						<input type="date" name="expire" class="form-control" value = <?php echo $Job_Expire_Time;?> required>
					</div>
					<div class="form-group">
						<input type="submit" name="change_job" class="btn btn-primary btn-block">
					</div>
					<div class="form-group"> 
						<p class="text-center">Not sure yet?<a href="home.php" id="login-btn"> Logout</a></p>
						
					</div>


				</form>

			</div>
		</div>


			


	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonyous"></script>
	<script src="http://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>

  	<!-- form validation by using jQuery -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script>

		  // validate the form
		   	$("#register-frm").validate();


	</script>



</body>
</html>