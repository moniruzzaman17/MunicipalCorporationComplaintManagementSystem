<?php include 'connection.php';?>

<?php
session_start();
//GETTING Value
$user_id=$_POST['user_id'];
$post_id=$_POST['post_id'];
$page_location=$_POST['page_location'];
$logic=false;
$check=false;
$post_exitst=false;

if (isset($_POST['less_im_btn'])) 
	{
		$sql = mysqli_query($conn, "SELECT * FROM rating WHERE user_id='$user_id'");
			while ($row = mysqli_fetch_array($sql)) 
		       {
					if ($row['post_id']==$post_id && $row['user_id']==$user_id) 
					{
		       			$logic=true;
					}
		       }
		       if($logic==false)
		       {
					mysqli_query($conn, "INSERT INTO rating(post_id, user_id, less_important_count, important_count, most_important_count) VALUES('$post_id', '$user_id', '1', '0', '0')");

					

		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview
					mysqli_close($conn);
					header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
		       }
		       else
		       {		
		       		$sql = mysqli_query($conn, "SELECT less_important_count FROM rating WHERE user_id='$user_id' AND post_id='$post_id'");
					while ($row = mysqli_fetch_array($sql)) 
		       			{
							if ($row['less_important_count']==1) 
							{
				       			$check=true;
							}
		       			}

			       	if($check==true)
			       	{
				       	$l_i_c=$row['less_important_count'];
				       	$rating_id=$row['r_id'];
							mysqli_query($conn, "UPDATE rating SET less_important_count='0', important_count='0', most_important_count='0' WHERE user_id='$user_id' AND post_id='$post_id'");

		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview
							mysqli_close($conn);
							header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
			       }
			       else
			       {
				       	$l_i_c=$row['less_important_count'];
				       	$rating_id=$row['r_id'];
							mysqli_query($conn, "UPDATE rating SET less_important_count='1', important_count='0', most_important_count='0' WHERE user_id='$user_id' AND post_id='$post_id'");



		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview


							mysqli_close($conn);
							header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
			       }
		   		}

	}
	// END of the less_im_btn



if (isset($_POST['im_btn'])) 
	{
		$sql = mysqli_query($conn, "SELECT * FROM rating WHERE user_id='$user_id'");
			while ($row = mysqli_fetch_array($sql)) 
		       {
					if ($row['post_id']==$post_id && $row['user_id']==$user_id) 
					{
		       			$logic=true;
					}
		       }
		       if($logic==false)
		       {
					mysqli_query($conn, "INSERT INTO rating(post_id, user_id, less_important_count, important_count, most_important_count) VALUES('$post_id', '$user_id', '0', '1', '0')");

		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview
					mysqli_close($conn);
					header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
		       }
		       else
		       {		
		       		$sql = mysqli_query($conn, "SELECT important_count FROM rating WHERE user_id='$user_id' AND post_id='$post_id'");
					while ($row = mysqli_fetch_array($sql)) 
		       			{
							if ($row['important_count']==1) 
							{
				       			$check=true;
							}
		       			}

			       	if($check==true)
			       	{
				       	$l_i_c=$row['important_count'];
				       	$rating_id=$row['r_id'];
							mysqli_query($conn, "UPDATE rating SET important_count='0', less_important_count='0', most_important_count='0' WHERE user_id='$user_id' AND post_id='$post_id'");

		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview
							mysqli_close($conn);
							header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
			       }
			       else
			       {
				       	$l_i_c=$row['important_count'];
				       	$rating_id=$row['r_id'];
							mysqli_query($conn, "UPDATE rating SET important_count='1', less_important_count='0', most_important_count='0' WHERE user_id='$user_id' AND post_id='$post_id'");

		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview
							mysqli_close($conn);
							header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
			       }
		   		}
	}


	if (isset($_POST['more_i_btn'])) 
	{
		$sql = mysqli_query($conn, "SELECT * FROM rating WHERE user_id='$user_id'");
			while ($row = mysqli_fetch_array($sql)) 
		       {
					if ($row['post_id']==$post_id && $row['user_id']==$user_id) 
					{
		       			$logic=true;
					}
		       }
		       if($logic==false)
		       {
					mysqli_query($conn, "INSERT INTO rating(post_id, user_id, less_important_count, important_count, most_important_count) VALUES('$post_id', '$user_id', '0', '0', '1')");

		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview
					mysqli_close($conn);
					header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
		       }
		       else
		       {		
		       		$sql = mysqli_query($conn, "SELECT most_important_count FROM rating WHERE user_id='$user_id' AND post_id='$post_id'");
					while ($row = mysqli_fetch_array($sql)) 
		       			{
							if ($row['most_important_count']==1) 
							{
				       			$check=true;
							}
		       			}

			       	if($check==true)
			       	{
				       	$l_i_c=$row['most_important_count'];
				       	$rating_id=$row['r_id'];
							mysqli_query($conn, "UPDATE rating SET most_important_count='0', less_important_count='0', important_count='0' WHERE user_id='$user_id' AND post_id='$post_id'");

		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview
							mysqli_close($conn);
							header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
			       }
			       else
			       {
				       	$l_i_c=$row['most_important_count'];
				       	$rating_id=$row['r_id'];
							mysqli_query($conn, "UPDATE rating SET most_important_count='1', less_important_count='0', important_count='0' WHERE user_id='$user_id' AND post_id='$post_id'");

		   		// sql for counting the rating from rating table 

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_less = mysqli_fetch_array($sql_less_important_count)) 
					       {
					       	$less_count= $row_less['SUM(less_important_count)'];
					       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
						while ($row_im = mysqli_fetch_array($sql_important_count)) 
					       {
					       	$im_count= $row_im['SUM(important_count)'];
					       }


				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
						while ($row_mst = mysqli_fetch_array($sql_most_important_count)) 
					       {
					       	$most_count= $row_mst['SUM(most_important_count)'];
					       }

					       $total_count=$less_count+$im_count+$most_count;

		   		// END of the counting

		   		// sql for rating_overview
		$sql_ov = mysqli_query($conn, "SELECT * FROM rating_overview WHERE post_id='$post_id'");
			while ($row_ov = mysqli_fetch_array($sql_ov)) 
		       {
					if ($row_ov['post_id']==$post_id) 
					{
						$post_exitst=true;
					}
		       }
		       if ($post_exitst==false) {
					mysqli_query($conn, "INSERT INTO rating_overview(post_id, total_rating) VALUES('$post_id', '1')");
		       }
		       else
		       {

					mysqli_query($conn, "UPDATE rating_overview SET total_rating='$total_count' WHERE post_id='$post_id'");
		       }
		       // END of the sql for rating_overview
							mysqli_close($conn);
							header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
			       }
		   		}
	}
?>