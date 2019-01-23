<?php include '../connection.php';?>

<?php
//GETTING Value
date_default_timezone_set('Asia/Dhaka');
$sender_id=$_POST['sender_id'];
$receiver_id=$_POST['receiver_id'];


	$sql=mysqli_query($conn, "DELETE FROM message WHERE sender_id='$sender_id' AND receiver_id='$receiver_id'");
	$sql1=mysqli_query($conn, "DELETE FROM message WHERE sender_id='$receiver_id' AND receiver_id='$sender_id'");

		echo "<script>window.location='message_page.php'</script>";

	
?>