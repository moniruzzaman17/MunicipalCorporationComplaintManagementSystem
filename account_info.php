<?php
session_start();
	if (isset($_SESSION["loged"])) {
		$is=true;
	}
	else
	{
		#echo "<script>alert('Without Login You cann't access any page); window.location='index.php'</script>";
		header("Location: http://localhost/MCCMS/index.php"); 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MCCMS</title>
	<link rel="stylesheet" href="css/profile.css">
	<style>
		.statistic_div{
			border: solid 1px #555555;
			background-color: rgba(0,0,0,0.05);
			box-shadow:  0 0 10px  rgba(0,0,0,0.8);
			width: 100%; 
			padding: 1%; 
			border: 1px solid #e44d3a;
			margin: 5%;
			width: 30%;
			height: 168px;
			float: left;
		}
	</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<!--PHP CODE-->
	<?php
	// CODE for getting Profile Image location
	$sql = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$user_id= $row['user_name'];
	       }

	?>
<!--Container Div-->

	<div class="container">
		<div class="left_side_bar">
			<div class="side_bar_header">
				<br>
				<br>
				<div class="image_holder">
					<?php if($pro_image != ""): ?>
									<img src="uploads/<?php echo $pro_image ?>" style="width: 100%; height: 100%; border-radius: 50%;">
									<?php else: ?>
									<img src="img/default.png"  style="width: 100%; height: 100%; border-radius: 50%;">
					<?php endif; ?>
				</div>
			</div>
			<div class="nav_div">
				<nav>
					<ul>
						<li><a href="about_me.php">About Me</a></li>
						<li><a style="background-color: rgba(224,224,224); color: #e44d3a;" href="account_info.php">Account Info</a></li>
						<li><a href="personal_post.php">All Post</a></li>
						<li><a href="home_general.php">News Feed</a></li>
						<br>
						<br>
						<br>
						<br>
						<center><p><b style="font-size: 20px;">WELCOME</b><br> <b style="color: #e44d3a;"><?php echo $_SESSION["user_fullname"]; ?></b> <br> to <br> MCCMS</p></center>
					</ul>
				</nav>
			</div>
		</div>
		<div class="main_info">
			<div class="row1" style="width: 100%; float: left; margin-left: 7%;">
				<?php
				#COunt total general post
				$gtype="Generel";
				       $sql_gpost_count = mysqli_query($conn, "SELECT COUNT(post_title) FROM complaint WHERE post_type='$gtype' AND user_id='$user_id'");
						while ($row_gpost_count = mysqli_fetch_array($sql_gpost_count)) 
					       {
					       	$gpost_count= $row_gpost_count['COUNT(post_title)'];
					       }

				#COunt total Crime post
				$gtype="Crime";
				       $sql_gpost_count = mysqli_query($conn, "SELECT COUNT(post_title) FROM complaint WHERE post_type='$gtype' AND user_id='$user_id'");
						while ($row_gpost_count = mysqli_fetch_array($sql_gpost_count)) 
					       {
					       	$cpost_count= $row_gpost_count['COUNT(post_title)'];
					       }

				#COunt total Rating
				$gtype="Crime";
				       $sql_r_count = mysqli_query($conn, "SELECT COUNT(r_id) FROM rating WHERE user_id='$user_id'");
						while ($row_r_count = mysqli_fetch_array($sql_r_count)) 
					       {
					       	$r_count= $row_r_count['COUNT(r_id)'];
					       }


				#COunt total comment
				       $sql_comment_count = mysqli_query($conn, "SELECT COUNT(com_text) FROM comment WHERE user_id='$user_id'");
						while ($row_c_count = mysqli_fetch_array($sql_comment_count)) 
					       {
					       	$comment_count= $row_c_count['COUNT(com_text)'];
					       }


					       #COunt total Replay
				       $sql_reply_count = mysqli_query($conn, "SELECT COUNT(rep_text) FROM reply WHERE user_id='$user_id'");
						while ($row_r_count = mysqli_fetch_array($sql_reply_count)) 
					       {
					       	$reply_count= $row_r_count['COUNT(rep_text)'];
					       }

					       $total_comment= $comment_count+$reply_count;

				?>
				<div class="statistic_div">
					<h2 align="center">Your Total General Post</h2>
					<h1 align="center"><?php echo $gpost_count; ?></h1>
				</div>
				<div class="statistic_div">
					<h2 align="center">Your Total Crime Post</h2>
					<h1 align="center"><?php echo $cpost_count; ?></h1>
				</div>
			</div>

			<div class="row2" style="width: 100%; float: left; margin-left: 7%;">
				<div class="statistic_div">
					<h2 align="center">Your Total Comment</h2>
					<h1 align="center"><?php echo $total_comment; ?></h1>
				</div>
				<div class="statistic_div">
					<h2 align="center">Your Total Rating</h2>
					<h1 align="center"><?php echo $r_count; ?></h1>
				</div>
			</div>
		</div>
	</div>
</body>
</html>