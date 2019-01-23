<?php include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>

	<!-- CSS Link only for keep the same style as login -->
	<link rel="stylesheet" href="css/login.css">

	<!--Internal CSS for forget pass main-->
	<style>
		
	</style>
</head>
<body>
	<!-- Fixed Header -->
	<header class="header">
		<div class="header_container">
			<div class="header_info">
				<div class="header_logo">
					<img style="width: 100%; height: 100%;" src="img/logo.png" alt="Logo">
				</div>
			</div>
			<div class="header_info">
					<h2 align="center">Municipal Corporation Complaint Mangement System</h2>
			</div>
			
		</div>
	</header>  <!-- End of Header -->
<br>

<!-- Main Container -->
	<div class="container">
		<div class="info_div">
			<h2 align="center">To Reset your Password Please varify your Email</h2> <!-- Form Header -->


<?php
if (!isset($_SESSION['send'])) { ?>

			<form action="mail.php" method="POST">
				<label style="font-size:20px;"><b>Email</b></label>
	    		<input type="text" placeholder="Enter Email" name="mail" required>

				<!--PHP Code for random number generator-->
				<?php 
					$code= mt_rand();
				?>
				<input type="hidden" name="v_original_code" value="<?php echo mt_rand(); ?>" />
				<button type="submit" name="button1" class="registerbtn"><b>Get Varification Code</b></button>
			</form>
<?php
}
else
{
	echo '<p style="font-style: italic; color: red;">check you mail to get verification code</p>';
}
if (!isset($_SESSION['get'])) { ?>
			<form action="" method="post">
				<input type="hidden" name="original_code" value="<?php echo mt_rand(); ?>" />
	    		<label style="font-size:20px;"><b>Verification Code</b></label>
	    		<input type="text" placeholder="Enter Verification Code" name="v_code"  required>
				<button type="submit" name="button2" class="registerbtn"><b>Get Varification Code</b></button>
			</form>
			<br>
			<br>
			<br>

<?php
}

if (isset($_POST['button2'])) {
$or_code=$_SESSION['or_code'];
	$_SESSION['send']=true;
	$_SESSION['get']=true;
	$new_code=$_POST['v_code'];
	if ($or_code==$new_code) { ?>
			<form action="" method="post">
				<input type="hidden" name="original_code" value="<?php echo mt_rand(); ?>" />
	    		<label style="font-size:20px;"><b>Enter new password</b></label>
	    		<input type="text" placeholder="Enter Verification Code" name="new_pass"  required>
				<button type="submit" name="update" class="registerbtn"><b>Update</b></button>
			</form>

	<?php
	}
	else
	{
		echo '<h5>Sorry Verification code does not match</h5>';
	}
}

if (isset($_POST['update'])) {
	$new_pass=$_POST['new_pass'];
	$email=$_SESSION['email'];
$sql=mysqli_query($conn, "SELECT * FROM user_info, authority_info WHERE user_info.mail_address='$email' OR authority_info.au_email='$email'");
	$row=mysqli_fetch_array($sql);

	if ($row['mail_address']==$email) {
		$update_user="UPDATE user_info SET password='$new_pass' WHERE mail_address='$email'";
		if (mysqli_query($conn, $update_user)) {
			session_destroy();
			echo "<script>alert('Your password has been Updated'); window.location='index.php'</script>";
		}
	}
	else
	{
		$update_user="UPDATE authority_info SET au_password='$n_id' WHERE au_email='$email'";
		if (mysqli_query($conn, $update_user)) {
			session_destroy();
			echo "<script>alert('Your password has been Updated'); window.location='index.php'</script>";
		}
	}

}
?>
			
		</div>
		<a href="back.php">BACK</a>
	</div>  <!-- End of the Container -->
	<footer style="text-align: center;">
			<p>&copy; Copyright- All right reserved <a href="" class="">Md.Moniruzzaman</a> Bangladesh</p>
	</footer>
</body>
</html>