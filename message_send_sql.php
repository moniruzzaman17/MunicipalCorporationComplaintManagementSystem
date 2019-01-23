<?php include 'connection.php';?>

<?php
//GETTING Value
date_default_timezone_set('Asia/Dhaka');
$sender_id=$_POST['sender_id'];
$receiver_id=$_POST['receiver_id'];
$msg_text=$_POST['msg_text'];


	$sql="INSERT INTO message(sender_id, receiver_id, msg_text, msg_date) VALUES('$sender_id', '$receiver_id', '$msg_text', CURRENT_TIMESTAMP)";
	if (mysqli_query($conn, $sql)) {
		
		echo "<script>window.location='message_page.php'</script>";
	}

	
?>