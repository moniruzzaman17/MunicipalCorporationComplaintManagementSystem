<?php include '../connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>

	<!-- CSS Link -->
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<?php include 'header_index.php';?>
<br>

<!-- Main Container -->
	<div class="container">
		<div class="info_div">
			<h1 align="center">Admin Login</h1> <!-- Form Header -->
		    	<p align="center"></p>
			    <hr>
<!-- Code for Form -->
			    <form action="login_sql.php" method="POST">
				    <label><b>Email</b></label>
		    		<input type="text" placeholder="Enter Email" name="mail" required>

		    		<label><b>Password</b></label>
		    		<input type="password" placeholder="Enter Password" name="password" required>

				    <button type="submit" name="button1" class="registerbtn"><b>LOG IN</b></button>
				</form>  <!-- End of Form -->



				<hr>

				<!-- Forget password => One row with two column -->
				<div class="row_div">
					<div class="col_div">
						<p><a href="forget_pass.php">Forget Password</a></p>
					</div>
					<div class="col_div" align="right">
						<p>You don't have an account? <a href="signup.php">Sign Up</a>.</p>
					</div>
				</div>
				<!-- End of Forget password => One row with two column -->
					<hr>
		</div>
	</div>  <!-- End of the Container -->
	<footer style="text-align: center;">
			<p>&copy; Copyright- All right reserved <a href="" class="">Md.Moniruzzaman</a> Bangladesh</p>
	</footer>
</body>
</html>