<?php include 'connection.php';?>

<?php
//GETTING Value
$user_id=$_POST['u_name'];
$post_id=$_POST['post_id'];
$post_type=$_POST['post_type'];
$com_text=$_POST['comment'];
date_default_timezone_set('Asia/Dhaka');
$date=date("d-m-Y");
$time=date("h:ia");
$page_location=$_POST['page_location'];

if (isset($_POST['p_c_btn'])) {
	//for insertion the user data into database
		$sql1= "INSERT INTO comment(user_id, post_id, post_type, com_text, com_date, com_time, current_timestemp) VALUES('$user_id', '$post_id','$post_type', '$com_text', '$date', '$time', CURRENT_TIMESTAMP)";
		if(mysqli_query($conn, $sql1)) 
			{ 
				header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
			}

			else {
				echo "<script>alert('Comment is not Successfully Submitted'); window.location='home.php'</script>";
			}

			mysqli_close($conn);
}
?>