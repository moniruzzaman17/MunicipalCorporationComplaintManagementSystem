<!-- <?php
// session_start();
// 	if (isset($_SESSION["loged"])) {
// 		$is=true;
// 	}
// 	else
// 	{
// 		#echo "<script>alert('Without Login You cann't access any page); window.location='index.php'</script>";
// 		header("Location: http://localhost/MCCMS/index.php"); 
// 	}
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MCCMS</title>
	<link rel="stylesheet" href="../css/profile.css">
	<link rel="stylesheet" href="css/tab_content.css">
	<link rel="stylesheet" href="css/style.css">
<style>
	table{
		width: 100%!important; 
		table-layout: fixed!important; 
		margin-left: -3%!important; 
	}
	table thead th{
		width: 30%;
		text-decoration: underline;
	}

	table tbody td{
		width: auto!important; 
		text-align: center!important; 
		overflow: hidden!important; 
		/*text-overflow:ellipsis!important;*/
		font-size: 17px!important;
	}
</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<!--PHP CODE-->
<?php
#\*****************************************************************/	

//CODE for getting Date of Birth from database
$sql1 = mysqli_query($conn, "SELECT date_birth FROM user_info WHERE full_name='$name'");
		while ($row1 = mysqli_fetch_array($sql1)) 
	       {
	       	$d_birth= $row1['date_birth'];
	       }	

#\*****************************************************************/	

//CODE for getting District Name from database
$sql2 = mysqli_query($conn, "SELECT district_name FROM user_info WHERE full_name='$name'");
		while ($row2 = mysqli_fetch_array($sql2)) 
	       {
	       	$district_name= $row2['district_name'];
	       }

#\*****************************************************************/

//CODE for getting Upazila Name from database
$sql22 = mysqli_query($conn, "SELECT upazila_name FROM user_info WHERE full_name='$name'");
		while ($row22 = mysqli_fetch_array($sql22)) 
	       {
	       	$upazila_name= $row22['upazila_name'];
	       }

#\*****************************************************************/

//CODE for getting Upazila Name from database
$sql222 = mysqli_query($conn, "SELECT division_name FROM user_info WHERE full_name='$name'");
		while ($row222 = mysqli_fetch_array($sql222)) 
	       {
	       	$division_name= $row222['division_name'];
	       }

#\*****************************************************************/

//CODE for getting Email Address from database
$sql3 = mysqli_query($conn, "SELECT email FROM admin WHERE name='$name'");
		while ($row3 = mysqli_fetch_array($sql3)) 
	       {
	       	$mail= $row3['email'];
	       }	

#\*****************************************************************/	

//CODE for getting NID Number from database
$sql4 = mysqli_query($conn, "SELECT nid_no FROM user_info WHERE full_name='$name'");
		while ($row4 = mysqli_fetch_array($sql4)) 
	       {
	       	$nid= $row4['nid_no'];
	       }

#\*****************************************************************/	

//CODE for getting User Name from database
$sql5 = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$name'");
		while ($row5 = mysqli_fetch_array($sql5)) 
	       {
	       	$u_name= $row5['user_name'];
	       }

#\*****************************************************************/	

?>
<!--Container Div-->

	<div class="container">
		<div class="main_info" style="width: 98%;">
			<div id="about_me">
				<center>
				<h2>WELCOME to Admin Profile</h2>
				<p>You can add a new admin from here</p>
				</center>
				<main>
				  <input class="input" id="tab1" type="radio" name="tabs" checked>
				  <label class="tab_label" for="tab1">Update Profile</label>

				  <input class="input" id="tab2" type="radio" name="tabs">
				  <label class="tab_label" for="tab2">Profile Info</label>

				  <section id="content1">
				   <table class="admin_info_table">
				  	<thead>
				  		<tr>
					  		<th>
					  			SL
					  		</th>
					  		<th>
					  			Full Name
					  		</th>
					  		<th>
					  			User ID
					  		</th>
					  		<th style=" ">
					  			Email Address
					  		</th>
					  		<th>
					  			Contact No
					  		</th>
					  		<th>
					  			Address
					  		</th>
					  		<th>
					  			Joining Date
					  		</th>
					  		<th>
					  			Action
					  		</th>
				  		</tr>
				  	</thead>
				  	<tbody>
					<?php
					$sl=1;
						$sql_panel = mysqli_query($conn, "SELECT * FROM admin");
							while ($row_panel = mysqli_fetch_array($sql_panel)) 
		      				 { ?>
		      				 	<tr>
			       					<td>
			       						<?php echo $sl++; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['user_id']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['email']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['contact']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['address']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['joining_date']; ?>
			       					</td>
			       					<td>
			       						<a href="admin_profile.php?update=<?php echo $row_panel['email']; ?>">Edit</a>
			       						<!-- &nbsp; | &nbsp; <a href="delete_sql.php?email=<?php //echo $row_panel['email']; ?>" onClick="return confirm(\'Are you sure you want to delete '.esc_attr($this->event_name).'?\')">Delete</a> -->
			       					</td>
		       					</tr>
		       		<?php		 
		       			}

				if (isset($_GET['update'])) {
					$email=$_GET['update'];
					$sql_get = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
						$row_get = mysqli_fetch_array($sql_get);
				?>

		       					<tr style="background-color: red;">
		       					</tr>
							    <form action="update_sql.php" method="post" enctype="multipart/form-data">
		      				 	<tr>
		      				 		<td>
		      				 			
		      				 		</td>
			       					<td>
						    			<input type="text" value="<?php echo $row_get['name']; ?>" name="name" required>
			       					</td>
			       					<td>
							    		<input type="text" value="<?php echo $row_get['user_id']; ?>" name="u_id" required>
			       					</td>
			       					<td>
							    		<input style="cursor: no-drop;" type="text" name="mail" value="<?php echo $row_get['email']; ?>" name="mail" readonly>
			       					</td>
			       					<td>
							    		<input type="text" value="<?php echo $row_get['contact']; ?>" name="contact" required>
			       					</td>
			       					<td>
							    		<input type="text" value="<?php echo $row_get['address']; ?>" name="address" required>
			       					</td>
			       					<td>
							    		<input style="cursor: no-drop;" type="text" value="<?php echo $row_get['joining_date']; ?>" name="" readonly>
			       					</td>
		       					</tr>
		       					<tr>
		       						<td></td>
		       						<td></td>
		       						<td></td>
			       					<td>
			       						<input style="border: 1px solid gray;" type="file" name="image" required>
			       					</td>
			       					<td>
								    <button class="update_btn" type="submit" name="button1" class="registerbtn"><b>Update</b></button>
			       					</td>
		       					</tr>
								</form>  <!-- End of Form -->
						<?php }
						else
						{ ?>
		      				 	<tr>
			       					<td>
			       					</td>
			       					<td>
						    			<input type="text" name="name" required required>
			       					</td>
			       					<td>
							    		<input type="text" name="u_id" required>
			       					</td>
			       					<td>
							    		<input style="cursor: no-drop;" type="text" name="mail" readonly>
			       					</td>
			       					<td>
							    		<input type="text" name="contact" required>
			       					</td>
			       					<td>
							    		<input type="text" name="address" required>
			       					</td>
			       					<td>
							    		<input style="cursor: no-drop;" type="text" name="" readonly>
			       					</td>
		       					</tr>
		       					<tr>
		       						<td></td>
		       						<td></td>
		       						<td></td>
			       					<td>
			       						<input style="border: 1px solid gray;" type="file" name="image" readonly>
			       					</td>
			       					<td>
								    <button style="cursor: no-drop;" class="update_btn" type="submit" name="button1" class="registerbtn"><b>Update</b></button>
			       					</td>
		       					</tr>
						<?php
					}

						 ?>

				  	</tbody>
				  </table>
				</section>

								  <section id="content2">
								  <table class="admin_info_table">
								  	<thead>
								  		<tr>
									  		<th>
									  			SL
									  		</th>
									  		<th>
									  			Full Name
									  		</th>
									  		<th>
									  			User ID
									  		</th>
									  		<th style=" ">
									  			Email Address
									  		</th>
									  		<th>
									  			Contact No
									  		</th>
									  		<th>
									  			Address
									  		</th>
									  		<th>
									  			Joining Date
									  		</th>
									  		<th>
									  			Profile Image
									  		</th>
								  		</tr>
								  	</thead>
								  	<tbody>
									<?php
									$sl=1;
										$sql_panel = mysqli_query($conn, "SELECT * FROM admin");
											while ($row_panel = mysqli_fetch_array($sql_panel)) 
						      				 { 
						      				 	?>
						      				 	<tr>
							       					<td>
							       						<?php echo $sl++; ?>
							       					</td>
							       					<td>
							       						<?php echo $row_panel['name']; ?>
							       					</td>
							       					<td>
							       						<?php echo $row_panel['user_id']; ?>
							       					</td>
							       					<td>
							       						<?php echo $row_panel['email']; ?>
							       					</td>
							       					<td>
							       						<?php echo $row_panel['contact']; ?>
							       					</td>
							       					<td>
							       						<?php echo $row_panel['address']; ?>
							       					</td>
							       					<td>
							       						<?php echo $row_panel['joining_date']; ?>
							       					</td>
							       					<td>
							       						<div class="img_div_admin">
							       							<img class="admin_image" src="uploads/<?php echo $row_panel['image']; ?>" alt="">
							       						</div>
							       					</td>
						       					</tr>
						       		<?php		 
						       			}
					      			?>
								  	</tbody>
								  </table>
				  </section>
				</main>
			</div>
		</div>
	</div>
</body>
</html>