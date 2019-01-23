<?php
session_start();
	include 'main/functions.php';
	$get    = new Main;
	$post_id=$_GET['post_id'];

include 'connection.php';
	
	// //* session for set access restriction whithout loged in
	// 	if (isset($_SESSION["loged"])) {
	// 	$is=true;
	// }
	// else
	// {
	// 	#echo "<script>alert('Without Login You cann't access any page); window.location='index.php'</script>";
	// 	header("Location: http://localhost/MCCMS/index.php"); 
	// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MCCMS</title>
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/profile.css">
	<script class="jsbin" src="js/jquery.js"></script>
</head>
<body>	
	<!--PHP CODE-->

<?php
#\*****************************************************************/
$name=$_SESSION['user_fullname'];	

	//CODE for getting Profile Image location from database
$sql = mysqli_query($conn, "SELECT profile_image FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$pro_image= $row['profile_image'];
	       }

//CODE for getting User ID from database
$sql1 = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$name'");
		while ($row1 = mysqli_fetch_array($sql1)) 
	       {
	       	$user_id= $row1['user_name'];
	       }	


//CODE for getting User ID from database
$sql_user = mysqli_query($conn, "SELECT * FROM user_info WHERE full_name='$name'");
		$row1 = mysqli_fetch_array($sql1);



#\*****************************************************************/	
//for getting upazila code from database
$get_upazila_code = mysqli_query($conn, "SELECT upazila_code FROM complaint WHERE post_id='$post_id'");
		while ($row = mysqli_fetch_array($get_upazila_code)) 
	       {
	       	$upa_code= $row['upazila_code'];
	       }
#\*****************************************************************/	
//for getting upazila Name from database
$get_upazila_name = mysqli_query($conn, "SELECT name FROM upazilas WHERE id='$upa_code'");
		while ($row = mysqli_fetch_array($get_upazila_name)) 
	       {
	       	$upazila_name= $row['name'];
	       }

#\*****************************************************************/	
//for getting district Code from database
$get_district_code = mysqli_query($conn, "SELECT district_code FROM complaint WHERE post_id='$post_id'");
		while ($row = mysqli_fetch_array($get_district_code)) 
	       {
	       	$district_code= $row['district_code'];
	       }

#\*****************************************************************/	
//for getting upazila Name from database
$get_district_name = mysqli_query($conn, "SELECT name FROM upazilas WHERE id='$district_code'");
		while ($row = mysqli_fetch_array($get_district_name)) 
	       {
	       	$district_name= $row['name'];
	       }



#\*****************************************************************/	
//for getting district Code from database
$sql = mysqli_query($conn, "SELECT * FROM complaint WHERE post_id='$post_id'");
		$row_post = mysqli_fetch_array($sql);

		$time_ago=$row_post['date_time'];



?>
							<div class="post-show" style="width: 100%; margin-left: 1%;">
								<div class="post-show-inner">
									<form action="post_update_sql.php" method="post">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="uploads/<?php echo $pro_image; ?>"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#"><?php echo $name; ?></a></li>
													<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $district_name; ?> | <?php echo $upazila_name; ?></small></li>
												</ul>
											</div> <!--End of id-name-->
										</div> <!--End of post-left box-->
										<div class="post-right-box"></div>
									</div> <!--End of post header-->
										<div style="margin: 3% 10%;">
											<button style="background-color: transparent;" name="udate_btn">Update</button>
											<button style="background-color: transparent;" name="delete_btn">Delete</button>
										</div>
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<input style="width: 100%; text-align: center;" type="text" name="post_title" value="<?php echo $row_post['post_title']; ?>" required>
											<p><textarea style="width: 100%; max-width: 100%; min-width: 100%; height: 44px;" name="post_text" id="" cols="30" rows="10" required><?php echo $row_post['post_text']; ?></textarea></p>
										</div> <!--End of post-header-text-->
										<div class="post-img">
											<center>
											<img align="center" src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div> <!--End of post-img-->
									</div> <!--End of post-body-->
								</form>
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->
</body>
</html>