<?php include '../connection.php';?>
<?php
// Geting Variable form admin_profile.php page
	$name		=	$_POST['name'];
	$user_id	=	$_POST['u_id'];
	$contact	=	$_POST['contact'];
	$address	=	$_POST['address'];
	$u_mail		=	$_POST['mail'];
	$image		=	$_FILES["image"]["name"];	

move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);	

	// Update Query

	mysqli_query($conn, "UPDATE admin SET name='$name', user_id='$user_id', contact='$contact', address='$address', image='$image' WHERE email='$u_mail'");
		mysqli_close($conn);
		header("location: http://localhost/MCCMS/admin/admin_profile.php");


?>