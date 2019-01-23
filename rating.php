<?php include 'connection.php';?>

<?php
//GETTING Value
$user_id=$_POST['user_id'];
$post_id=$_POST['post_id'];


if (isset($_POST['less_im_btn'])) 
	{
		echo "Welcome";
		$sql = mysqli_query($conn, "SELECT * FROM rating");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$l_i_c=$row['less_important_count'];
	       	$reply_id=$row['r_id'];
				if ($row['post_id']==$post_id && $row['user_id']==$user_id) {
					mysqli_query($conn, "UPDATE rating SET less_important_count=$l_i_c+'1' WHERE r_id=$reply_id");
				}
				else
					{
						mysqli_query($conn, "INSERT INTO rating(post_id, user_id, less_important_count, important_count, more_important_count) VALUES('$post_id', '$user_id', '1', '0', '0')");
					}
	       }
	}



if (isset($_POST['i_btn'])) 
	{

	}


	if (isset($_POST['m_i_btn'])) 
	{

	}
?>