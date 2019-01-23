<?php include 'connection.php';?>
<?php
// Geting Variable form admin_profile.php page
	$post_id		=	$_POST['post_id'];
	$post_title		=	$_POST['post_title'];
	$post_text	=	$_POST['post_text'];

// move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);	

	// Update Query
if (isset($_POST['udate_btn'])) {

	mysqli_query($conn, "UPDATE complaint SET post_title='$post_title', post_text='$post_text' WHERE post_id='$post_id'");

		mysqli_close($conn);
		echo "<script>alert('Your Post Updated Successfullly'); window.close();</script>";

}
else
{
	mysqli_query($conn, "DELETE FROM complaint WHERE post_id='$post_id'");
	mysqli_query($conn, "DELETE FROM comment WHERE post_id='$post_id'");
	mysqli_query($conn, "DELETE FROM reply WHERE post_id='$post_id'");
	mysqli_query($conn, "DELETE FROM rating WHERE post_id='$post_id'");
	mysqli_query($conn, "DELETE FROM rating_overview WHERE post_id='$post_id'");

		mysqli_close($conn);
		echo "<script>alert('Your Post has been deleted!'); window.close();</script>";
}

?>