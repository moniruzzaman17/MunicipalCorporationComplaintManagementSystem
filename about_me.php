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
</head>
<body>
	<?php include 'header.php'; ?>
	<!--PHP CODE-->
<?php
#\*****************************************************************/	

//CODE for getting Date of Birth from database
$sql = mysqli_query($conn, "SELECT * FROM user_info WHERE user_name='$current_user_id'");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$f_name= $row['full_name'];
	       	$d_birth= $row['date_birth'];
	       	$district_name= $row['district_name'];
	       	$upazila_name= $row['upazila_name'];
	       	$division_name= $row['division_name'];
	       	$mail= $row['mail_address'];
	       	$nid= $row['nid_no'];
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
						<li><a style="background-color: rgba(224,224,224); color: #e44d3a;" href="about_me.php">About Me</a></li>
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
				<h3>Basic Information</h3>
				<hr style="border:0.5px solid gray;">
				<form action="" method="post">
				<table>
					<tr>
						<th>Full Name</th>
						<?php 
						if (isset($_POST['edit_nm'])) { ?>
							<td><input type="text" name="full_name" value="<?php echo $f_name; ?>"></td>
						<td style="padding-left: 84%;">
							<button name="update_nm" style="background-color: transparent; border: none; text-decoration: underline;">Update</button>
						</td>
						<?php }
						else
						{ ?>
						<td>: <?php echo $f_name; ?></td>
						<td style="padding-left: 84%;">
							<button name="edit_nm" style="background-color: transparent; border: none; text-decoration: underline;">Edit</button>
						</td>
						<?php }
						?>

					</tr>
					<tr>
						<th>User Name</th>
						<td>: <?php echo $current_user_id; ?></td>
					</tr>
					<tr>
						<th>Date of Birth</th>
						<?php 
						if (isset($_POST['edit_bd'])) { ?>
							<td>
								<input type="text" name="bd" value="<?php echo $d_birth; ?>">
							</td>
						<td style="padding-left: 84%;">
							<button name="update_bd" style="background-color: transparent; border: none; text-decoration: underline;">Update</button>
						</td>
						<?php }
						else
						{ ?>
						<td>: <?php echo $d_birth; ?></td>
						<td style="padding-left: 84%;">
							<button name="edit_bd" style="background-color: transparent; border: none; text-decoration: underline;">Edit</button>
						</td>
						<?php }
						?>
					</tr>

				</table>

				<hr style="border:0.5px solid gray;">
				<h3>Address</h3>
				<hr style="border:0.5px solid gray;">
				<table>
					<tr>
						<th>Division</th>
						<?php 
						if (isset($_POST['edit_div'])) { ?>
							<td><!--Dropdown for Divissions-->
						<input type="dropdown" name="div" list="divisions" class="dropdown" placeholder="start typing your division" />
						<datalist id="divisions">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM divisions");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	?>
		
								         <option value="<?php echo $row['name']; ?>"></option>

								         <?php 
								       }
							?>
						</datalist>
							</td>
						<td style="padding-left: 84%;">
							<button name="update_div" style="background-color: transparent; border: none; text-decoration: underline;">Update</button>
						</td>
						<?php }
						else
						{ ?>
						<td>: <?php echo $division_name; ?></td>
						<td style="padding-left: 84%;">
							<button name="edit_div" style="background-color: transparent; border: none; text-decoration: underline;">Edit</button>
						</td>
						<?php }
						?>

					</tr>
					<tr>
						<th>District</th>
						<?php 
						if (isset($_POST['edit_dis'])) { ?>
							<td>
						<input type="dropdown" name="dis" list="districts" class="dropdown" placeholder="start typing your district name"  />
						<datalist id="districts">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM districts");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	?>
		
								         <option value="<?Php echo $row['name']; ?>"></option>

								         <?php 
								       }
							?>
						</datalist>
							</td>
						<td style="padding-left: 84%;">
							<button name="update_dis" style="background-color: transparent; border: none; text-decoration: underline;">Update</button>
						</td>
						<?php }
						else
						{ ?>
						<td>: <?php echo $district_name; ?></td>
						<td style="padding-left: 84%;">
							<button name="edit_dis" style="background-color: transparent; border: none; text-decoration: underline;">Edit</button>
						</td>
						<?php }
						?>
					</tr>
					<tr>
						<th>Upazila</th>
						<?php 
						if (isset($_POST['edit_upa'])) { ?>
							<td>
						<input type="dropdown" name="upa" list="upazilas" class="dropdown" placeholder="start typing your upazila name"  />
						<datalist id="upazilas">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM upazilas");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	?>
		
								         <option value="<?Php echo $row['name']; ?>"></option>

								         <?php 
								       }
							?>
						</datalist>
							</td>
						<td style="padding-left: 84%;">
							<button name="update_upa" style="background-color: transparent; border: none; text-decoration: underline;">Update</button>
						</td>
						<?php }
						else
						{ ?>
						<td>: <?php echo $upazila_name; ?></td>
						<td style="padding-left: 84%;">
							<button name="edit_upa" style="background-color: transparent; border: none; text-decoration: underline;">Edit</button>
						</td>
						<?php }
						?>
					</tr>
				</table>
				<hr style="border:0.5px solid gray;">

				<h3>Contacts</h3>
				<hr style="border:0.5px solid gray;">
				<table>
					<tr>
						<th>Email Address</th>
						<td>:<?php echo $mail; ?></td>

					</tr>
					<tr>
						<th>National ID No</th>
						<?php 
						if (isset($_POST['edit_nid'])) { ?>
							<td><input type="text" name="nationl_id" value="<?php echo $nid; ?>"></td>
						<td style="padding-left: 84%;">
							<button name="update_nid" style="background-color: transparent; border: none; text-decoration: underline;">Update</button>
						</td>
						<?php }
						else
						{ ?>
						<td>: <?php echo $nid; ?></td>
						<td style="padding-left: 84%;">
							<button name="edit_nid" style="background-color: transparent; border: none; text-decoration: underline;">Edit</button>
						</td>
						<?php }
						?>
					</tr>
				</table>
				</form>
					<?php 
						if (isset($_POST['update_nm'])) {
							$full_name=$_POST['full_name'];
							mysqli_query($conn, "UPDATE user_info SET full_name='$full_name' WHERE user_name='$current_user_id'");
						} 
						if (isset($_POST['update_bd'])) {
							$birth_d=$_POST['bd'];
							mysqli_query($conn, "UPDATE user_info SET date_birth='$birth_d' WHERE user_name='$current_user_id'");
						} 
						if (isset($_POST['update_div'])) {
							$div=$_POST['div'];
							mysqli_query($conn, "UPDATE user_info SET division_name='$div' WHERE user_name='$current_user_id'");
						} 
						if (isset($_POST['update_dis'])) {
							$dis=$_POST['dis'];
							mysqli_query($conn, "UPDATE user_info SET district_name='$dis' WHERE user_name='$current_user_id'");
						} 
						if (isset($_POST['update_upa'])) {
							$upa=$_POST['upa'];
							mysqli_query($conn, "UPDATE user_info SET upazila_name='$upa' WHERE user_name='$current_user_id'");
						} 
						if (isset($_POST['update_nid'])) {
							$n_id=$_POST['nationl_id'];
							mysqli_query($conn, "UPDATE user_info SET nid_no='$n_id' WHERE user_name='$current_user_id'");
						}
					?>
			</div>
		</div>
	</div>
</body>
</html>