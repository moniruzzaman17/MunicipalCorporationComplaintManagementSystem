<?php include 'connection.php';?>

<?php
//GETTING Value
$user_id=$_POST['user_name'];
$post_id=$_POST['post_id'];
$com_id=$_POST['comment_id'];
$page_location=$_POST['page_location'];
$reply_text=$_POST['reply_text'];
date_default_timezone_set('Asia/Dhaka');
$date=date("d-m-Y");
$time=date("h:ia");
?>
<script>
	var p_location=<?php echo $page_location; ?>;
	var c_id=<?php echo $com_id; ?>;
</script>
<?php
if (isset($_POST['p_c_btn'])) {
	//for insertion the user data into database
		$sql= "INSERT INTO reply(com_id, post_id, user_id, rep_text, rep_date, rep_time, current_time_stamp) VALUES('$com_id', '$post_id', '$user_id', '$reply_text', '$date', '$time', CURRENT_TIMESTAMP)";
		if(mysqli_query($conn, $sql)) 
			{ 
				header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$com_id);
			}

			else {
				echo "<script>alert('Comment is not Successfully Submitted'); window.location='p_location.php'</script>";
			}

			mysqli_close($conn);
}
?>