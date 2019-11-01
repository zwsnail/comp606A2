
<!DOCTYPE html>
<html lang="en">
	<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wideth,initial-scale=1">
	<title>User Registration & Login System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonyous">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
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
}
?>
	<div class="container mt-4">

		<!-- login form -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
				<h2 class="text-center mt-2">Admin Login</h2>
				<form action="include/admin.inc.php" method="post" role="form" class="p-2" id="login-frm">
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
				

				</form>

			</div>
		</div>


			

			


				</form>

			</div>
		</div>



	</div>
	

</body>
</html>
