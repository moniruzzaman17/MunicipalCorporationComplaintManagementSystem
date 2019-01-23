<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MCCMS</title>
	<link rel="stylesheet" href="css/profile.css">
</head>
<body>
	<?php include 'header.php'; ?>
	<!--PHP CODE-->


<!--PHP CODE-->
<?php include 'connection.php';?>
	<?php
	$name=$_SESSION['user_fullname'];
//CODE for getting Profile Image location
$sql = mysqli_query($conn, "SELECT profile_image FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$pro_image= $row['profile_image'];
	       }

	?>
<!--Container Div-->


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
						<li><a style="background-color: rgba(224,224,224); color: #e44d3a;" href="update_info.php">Update Info</a></li>
						<li><a href="account_info.php">Account Info</a></li>
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
			<div id="about_me">
					This is The UPDATE INFORMATION PAGE
			</div>
			<div id="update_info">
			</div>
		</div>
	</div>
</body>
</html>