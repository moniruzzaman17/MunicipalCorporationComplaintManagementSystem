<?php include '../connection.php';?>
<?php
// Geting Variable form admin_profile.php page
	$mail	=	$_POST['user_mail'];

if (isset($_POST['active_btn'])) {
	mysqli_query($conn, "UPDATE user_info SET status='1' WHERE mail_address='$mail'");
		mysqli_close($conn);
		header("location: http://localhost/MCCMS/admin/manage_user.php");
}

else {
	mysqli_query($conn, "UPDATE user_info SET status='0' WHERE mail_address='$mail'");
		mysqli_close($conn);
		header("location: http://localhost/MCCMS/admin/manage_user.php");
}


?>