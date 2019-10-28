<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wideth,initial-scale=1">
	<title>User Registration & Login System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonyous">
	<style type="text/css">
		#alert, #register-box, #forgot-box{
			display: none;
		}
	</style>
</head>

<body>  
	<?php 
	if(isset($_GET['error']))
	{
		echo '<p id="error" class="bg-danger text-white text-center"> Wrong Password or Username. Please try again :)<p>';
	}; 
	?>


	<div class="container mt-4">

		<!-- login form -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
				<h2 class="text-center mt-2">Customer/Trademan Login</h2>
				<form action="include/login.inc.php" method="post" role="form" class="p-2" id="login-frm">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Username" required minlength="3">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required minlength="6">
					</div>
					<div class="form-group">
					<div class="form-group">
						<input type="submit" id="login" value="Login" class="btn btn-primary btn-block">
					</div>
					<div class="form-group">
						<p class="text-center">New user? <a href="#" id="register-btn">Register Here</a></p>
					</div>
					<div class="form-group">
						<a href="home.php" class="btn btn-block" style="text-decoration: underline">Home Page</a>
					</div>

				</form>

			</div>
		</div>


			<!-- registration form -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
				<h2 class="text-center mt-2">Register</h2>
				<form action="include/register.inc.php" method="post" role="form" class="p-2" id="register-frm">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Fullname" required minlength="3">
					</div>
                    <div class="form-group">
						<input type="text" name="mob_number" class="form-control" placeholder="Mobile number">
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
					</div>


					<div class="form-group">
						<p>Register as</p>
					<div class="form-group">
					<label><input type="radio" name="type" class=".radio-inline" value="customer" required> Customer</label>
					<label><input type="radio" name="type" class=".radio-inline" value="trademan" required> Trademan</label>

					</div>
					<div class="form-group">
						<input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required minlength="6">
					</div>
					<div class="form-group">
						<input type="password" name="cpass" id="cpass" class="form-control" placeholder="Comfirm Password" required minlength="6">
					</div>

					<div class="form-group">
						<input type="submit" name="register" id="register" value="Register" class="btn btn-primary btn-block">
					</div>
					<div class="form-group"> 
						<p class="text-center">Already Registered?<a href="#" id="login-btn"> Login Here</a></p>
						
					</div>


				</form>

			</div>
		</div>


			<!-- forgot password -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
				<h2 class="text-center mt-2">Reset Password</h2>
				<form action="resetpassword.inc.php" method="post" role="form" class="p-2" id="forgot-frm">
					<div class="form-group">
						<small class="text-muted">
							To reset your password, 
							enter the email address, 
							new password.
						</small>

					</div>
					<div class="form-group">
						<input type="email" name="femail" class="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" name="newpassword" class="form-control" placeholder="New Password" required>
					</div>
					<div class="form-group">
						<input type="submit" name="forgot" id="forgot" value="Reset" class="btn btn-primary btn-block">
					</div>
					<div class="form-group text-center">
						<a href="#" id="back-btn">Back</a>
						
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
		// hide different form by usage
		$(document).ready(function(){
		  $("#forgot-btn").click(function(){
		  	$("#login-box").hide();
		  	$("#forgot-box").show();
		  });
		   $("#register-btn").click(function(){
		  	$("#login-box").hide();
		  	$("#register-box").show();
			$("#error").hide();
		  });
		   	$("#login-btn").click(function(){
		  	$("#login-box").show();
		  	$("#register-box").hide();
		  });
		   	$("#back-btn").click(function(){
		  	$("#login-box").show();
		  	$("#forgot-box").hide();
		  });

		  // validate the form
		   	$("#login-frm").validate();
		   	$("#register-frm").validate({
		   		rules:{
					email: {
            					required: true,
            					email: true,
                			remote: {
                   	 	url: "include/check_register_email.php",
                    		type: "post"
                 		}
        			},
		   			cpass:{
		   				equalTo:"#pass",
		   			}
		   		},
				messages: {
       				email: {
            			required: "Please enter your email address.",
            			email: "Please enter a valid email address.",
            			remote: "Email already in use!"
        			}
    			}
		   	});
		   	$("#forgot-frm").validate();
		});

	</script>



</body>
</html>
