<?php include '../connection.php';?>
<?php
// Geting Variable form admin_profile.php page
	$au_mail	=	$_POST['au_mail'];

if (isset($_POST['approve_btn'])) {
	mysqli_query($conn, "UPDATE authority_info SET status='1' WHERE au_email='$au_mail'");
		mysqli_close($conn);
		header("location: http://localhost/MCCMS/admin/manage_user.php");
}

else if (isset($_POST['reject_btn'])) {
	# code...
} {
	mysqli_query($conn, "UPDATE authority_info SET status='0' WHERE au_email='$au_mail'");
		mysqli_close($conn);
		header("location: http://localhost/MCCMS/admin/manage_user.php");
}


?>