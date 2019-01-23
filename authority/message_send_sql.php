<?php include '../connection.php';?>

<?php
//GETTING Value
date_default_timezone_set('Asia/Dhaka');
$sender_id=$_POST['sender_id'];
$receiver_id=$_POST['receiver_id'];
$msg_text=$_POST['msg_text'];

if (isset($_POST['check'])) {
	$post_title=$_POST['post_title'];
	$sql="INSERT INTO message(sender_id, receiver_id, msg_text, msg_date, post_title) VALUES('$sender_id', '$receiver_id', '$msg_text', CURRENT_TIMESTAMP, '$post_title')";
	if (mysqli_query($conn, $sql)) {
		echo "<script>window.close();</script>";
		// echo "<script>window.location='message_page.php';</script>";
	}

}
else
{
	$sql="INSERT INTO message(sender_id, receiver_id, msg_text, msg_date) VALUES('$sender_id', '$receiver_id', '$msg_text', CURRENT_TIMESTAMP)";
	if (mysqli_query($conn, $sql)) {
		echo "<script>window.location='message_page.php';</script>";
	}
}

	
?>