<?php include '../connection.php';?>

<?php
$sender_id=$_GET['sender_id'];
$receiver_id=$_GET['user_id'];
$post_id=$_GET['post_id'];

$sql=mysqli_query($conn, "SELECT * FROM complaint WHERE post_id='$post_id'");
$row=mysqli_fetch_array($sql);
$post_title=$row['post_title'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div>
		<form action="message_send_sql.php" method="post">
			<label for="">Type your Message</label>
			<input type="hidden" name="sender_id" value="<?php echo $sender_id; ?>">
			<input type="hidden" name="receiver_id" value="<?php echo $receiver_id; ?>">
			<input type="hidden" name="post_title" value="<?php echo $post_title; ?>">
			<input type="hidden" name="check" value="1">
			<input type="text" name="msg_text">
			<button>Send</button>
		</form>
	</div>
</body>
</html>