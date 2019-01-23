<?php include '../connection.php';?>

<?php

date_default_timezone_set('Asia/Dhaka');
$user_id		=	$_POST['u_name'];
$post_id		=	$_POST['post_id'];
$review_text	=	$_POST['review_text'];
$date 			=	date("d-m-Y");
$page_location 	=	$_POST['page_location'];


if (isset($_POST['review_btn'])) {
	//for insertion the user data into database
		$sql1= "INSERT INTO authority_review(authority_user_id, post_id, review_text, review_timestamp, review_date) VALUES('$user_id', '$post_id','$review_text', CURRENT_TIMESTAMP, '$date')";
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