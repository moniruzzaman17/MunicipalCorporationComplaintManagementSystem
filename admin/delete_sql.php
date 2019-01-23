<?php include '../connection.php';?>

<?php
//GETTING Value
$u_mail=$_GET['email'];

		$sql="DELETE FROM admin WHERE email='$u_mail'";

		mysqli_query($conn, $sql);
					header('Location: http://localhost/MCCMS/admin/admin_profile.php');
?>