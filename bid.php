<?php
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<body>  
	<div class="container mt-4">
			<!-- registration form -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
				<h2 class="text-center mt-2">Create a bid for the job!</h2>
				<form action="include/bid.inc.php?<?php echo '$user_id'?>" method="post" role="form" class="p-2" id="register-frm">
			
						<p>How much estimating cost for the material?</p>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input name="material_price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>

                    <p>How much estimating cost for the labor?</p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input name="labor_price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                    <p>Totally estimating cost :</p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input name="toal_price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

					<div class="form-group">
                    <p>What is the starting date you can do the job?</p>
						<input type="date" name="start_time" class="form-control" placeholder="Job Start Date" required>
					</div>
					<div class="form-group">
                    <p>What is the date when your estimate will have expired and no longer be valid?</p>
						<input type="date" name="expire_time" class="form-control" placeholder="Estimate Expire Date" required>
					</div>
					<div class="form-group">
						<input type="submit" name="create_bid" class="btn btn-primary btn-block">
					</div>
					<div class="form-group"> 
						<p class="text-center">Not sure yet?<a href="home.php" id="login-btn"> Homepage</a></p>
						
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