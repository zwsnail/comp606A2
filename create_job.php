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
				<h2 class="text-center mt-2">Create my job for a trademan</h2>
				<form action="include/register.inc.php" method="post" role="form" class="p-2" id="register-frm">
					<div class="form-group">
						<input type="text" name="location" class="form-control" placeholder="Job Location" required>
					</div>
                    <div class="form-group">
						<input type="text" name="description" class="form-control" placeholder="Job Description">
					</div>
					<div class="form-group">
						<input type="email" name="price" class="form-control" placeholder="How much it would cost?" required>
					</div>
					<div class="form-group">
						<input type="password" name="start" class="form-control" placeholder="Job Start Time" required>
					</div>
					<div class="form-group">
						<input type="password" name="expire" class="form-control" placeholder="Job Expire Time" required>
					</div>
					<div class="form-group">
						<input type="submit" name="create_job" class="btn btn-primary btn-block">
					</div>
					<div class="form-group"> 
						<p class="text-center">Not sure yet?<a href="#" id="login-btn"> Logout</a></p>
						
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
		   	$("#register-frm").validate({
		   		rules:{
		   			cpass:{
		   				equalTo:"#pass",
		   			}
		   		}
		   	});
		   	$("#forgot-frm").validate();
		});


	</script>



</body>
</html>