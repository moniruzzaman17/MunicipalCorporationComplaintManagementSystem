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
$sql3 = mysqli_query($conn, "SELECT mail_address FROM user_info WHERE full_name='$name'");
		while ($row3 = mysqli_fetch_array($sql3)) 
	       {
	       	$mail= $row3['mail_address'];
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
				<h2>WELCOME to User Managing Module</h2>
				<p>You can make user active or deactive from here</p>
				</center>
				<main>
				  <input class="input" id="tab1" type="radio" name="tabs" checked>
				  <label class="tab_label" for="tab1">User Info</label>

				  <input class="input" id="tab2" type="radio" name="tabs">
				  <label class="tab_label" for="tab2">Authority Info</label>

				  <section id="content1">
				   <table class="user_table">
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
					  			Division
					  		</th>
					  		<th>
					  			District
					  		</th>
					  		<th>
					  			Upazila
					  		</th>
					  		<th>
					  			User Action
					  		</th>
					  		<th>
					  			Post Action
					  		</th>
				  		</tr>
				  	</thead>
				  	<tbody>
					<?php
					$sl=1;
						$sql_panel = mysqli_query($conn, "SELECT * FROM user_info");
							while ($row_panel = mysqli_fetch_array($sql_panel)) 
		      				 {
		      				 	$user_mail=$row_panel['mail_address'];
		      				 	$sql_check=mysqli_query($conn, "SELECT status FROM user_info WHERE mail_address='$user_mail'");
			       						$row_status=mysqli_fetch_array($sql_check);
		      				 	if ($row_status['status']==0) { ?>
		      				 	<tr style="background-color: rgba(255,0,0,0.3); color: blue;">
			       					<td>
			       						<?php echo $sl++; ?>
			       					</td>
			       					<td>
			       						<a style="" href="#" onclick="MyWindow=window.open('individual_user_info.php?u_mail=<?php echo $row_panel['mail_address']; ?>', 'MyWindow', 'width=1000', 'height=200'); return false;"><?php echo $row_panel['full_name']; ?></a>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['user_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['mail_address']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['division_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['district_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['upazila_name']; ?>
			       					</td>
			       					<td>
			       						<form action="user_de_active_sql.php" method="post">
			       						<?php
			       						$sql_check=mysqli_query($conn, "SELECT status FROM user_info WHERE mail_address='$user_mail'");
			       						$row_status=mysqli_fetch_array($sql_check);
			       						if($row_status['status']==0)
			       						{ ?>
			       							<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>">
			       							<button class="user_active_btn" name="active_btn" onClick="confirm('Are You want to Active this person?');">Active</button>
			       						<?php }
			       						else{ ?>
			       							<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>">
			       							<button class="user_deactive_btn" name="deactive_btn" onClick="confirm('Sure? Want to de-active this person?');">De-Active</button>
			       						<?php }
			       						?>
			       						</form> 
			       					</td>

			       					<!-- td for post action -->
			       					<td>
			       						<form action="user_post_de_active_sql.php" method="post">
			       						<?php
			       						$sql_check=mysqli_query($conn, "SELECT post_status FROM user_info WHERE mail_address='$user_mail'");
			       						$row_status=mysqli_fetch_array($sql_check);
			       						if($row_status['post_status']==0)
			       						{ ?>
			       							<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>">
			       							<button style="color: red; font-size: 15px;" class="user_active_btn de_post" name="active_btn" onClick="confirm('Are You want to Active this person?');">Active for Posting</button>
			       						<?php }
			       						else{ ?>
			       							<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>">
			       							<button style="font-size: 15px;" class="user_deactive_btn de_post" name="deactive_btn" onClick="confirm('Sure? Want to de-active this person?');">De-Active for posting</button>
			       						<?php }
			       						?>
			       						</form> 
			       					</td>
		       					</tr>

		      				 	<?php } else { ?>
		      				 	<tr>
			       					<td>
			       						<?php echo $sl++; ?>
			       					</td>
			       					<td>
			       						<a style="" href="#" onclick="MyWindow=window.open('individual_user_info.php?u_mail=<?php echo $row_panel['mail_address']; ?>', 'MyWindow', 'width=1000', 'height=200'); return false;"><?php echo $row_panel['full_name']; ?></a>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['user_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['mail_address']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['division_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['district_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['upazila_name']; ?>
			       					</td>
			       					<td>
			       						<form action="user_de_active_sql.php" method="post">
			       						<?php
			       						$sql_check=mysqli_query($conn, "SELECT status FROM user_info WHERE mail_address='$user_mail'");
			       						$row_status=mysqli_fetch_array($sql_check);
			       						if($row_status['status']==0)
			       						{ ?>
			       							<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>">
			       							<button class="user_active_btn" name="active_btn" onClick="confirm('Activated');">Active</button>
			       						<?php }
			       						else{ ?>
			       							<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>">
			       							<button class="user_deactive_btn" style="color: black;" name="deactive_btn" onClick="confirm('De-Activated');">De-Active</button>
			       						<?php }
			       						?>
			       						</form> 
			       					</td>

			       					<!-- td for post action -->
			       					<td>
			       						<form action="user_post_de_active_sql.php" method="post">
			       						<?php
			       						$sql_check=mysqli_query($conn, "SELECT post_status FROM user_info WHERE mail_address='$user_mail'");
			       						$row_status=mysqli_fetch_array($sql_check);
			       						if($row_status['post_status']==0)
			       						{ ?>
			       							<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>">
			       							<button style="color: red;" class="user_active_btn de_post" name="active_btn" onClick="confirm('Activated');">Active for Posting</button>
			       						<?php }
			       						else{ ?>
			       							<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>">
			       							<button style="font-size: 15px;" class="user_deactive_btn de_post" name="deactive_btn" onClick="confirm('De-activated');">De-Active for posting</button>
			       						<?php }
			       						?>
			       						</form> 
			       					</td>
		       					</tr>

		       		<?php
		       		}		 
		       			}
		       			?>
				  	</tbody>
				  </table>
				</section>

				  <section id="content2">
				  <table class="user_table">
				  	<thead>
				  		<tr>
					  		<th>
					  			SL
					  		</th>
					  		<th>
					  			Authority Name
					  		</th>
					  		<th>
					  			User ID
					  		</th>
					  		<th style=" ">
					  			Designation
					  		</th>
					  		<th>
					  			Organization
					  		</th>
					  		<th>
					  			Reg-Date
					  		</th>
					  		<th>
					  			Profile Image
					  		</th>
					  		<th>
					  			Action
					  		</th>
				  		</tr>
				  	</thead>
				  	<tbody>
					<?php
					$sl=1;
						$sql_panel = mysqli_query($conn, "SELECT * FROM authority_info ORDER BY status ASC");
							while ($row_panel2 = mysqli_fetch_array($sql_panel)) 
		      				 { 
		      				 	$au_email=$row_panel2['au_email'];
		      				 	if ($row_panel2['status']==0) {
		      				 	?>
		      				 	<tr style="background-color: rgba(255,0,0,0.3); color: blue;">
			       					<td>
			       						<?php echo $sl++; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['au_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['au_user_id']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['designation']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['organization']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['reg_date']; ?>
			       					</td>
			       					<td>
			       						<div class="img_div_admin">
			       							<img class="admin_image" src="../authority/uploads/<?php echo $row_panel2['pro_image']; ?>" alt="">
			       						</div>
			       					</td>
			       					<td>
			       						<form action="authority_approve_sql.php" method="post">
			       						<?php
			       						$au_user_id=$row_panel2['au_user_id'];
			       						$sql_check_au=mysqli_query($conn, "SELECT status FROM authority_info WHERE au_user_id='$au_user_id'");
			       						$row_status_au=mysqli_fetch_array($sql_check_au);
			       						if($row_status_au['status']==0)
			       						{ ?>
			       							<input type="hidden" name="au_mail" value="<?php echo $au_email; ?>">
			       							<button class="user_active_btn" name="approve_btn" onClick="confirm('Approved');">Approve</button>
			       						<?php }
			       						else{ ?>
			       							<input type="hidden" name="au_mail" value="<?php echo $au_email; ?>">
			       							<button class="user_deactive_btn" style="color: black;" name="reject_btn" onClick="confirm('Rejected');">Reject</button>
			       						<?php }
			       						?>
			       						</form> 
			       					</td>
		       					</tr>
		       					<?php
		      				 	}
		      				 	else
		      				 	{ ?>
		      				 	<tr>
			       					<td>
			       						<?php echo $sl++; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['au_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['au_user_id']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['designation']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['organization']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel2['reg_date']; ?>
			       					</td>
			       					<td>
			       						<div class="img_div_admin">
			       							<img class="admin_image" src="../authority/uploads/<?php echo $row_panel2['pro_image']; ?>" alt="">
			       						</div>
			       					</td>
			       					<td>
			       						<form action="authority_approve_sql.php" method="post">
			       						<?php
			       						$au_user_id=$row_panel2['au_user_id'];
			       						$sql_check_au=mysqli_query($conn, "SELECT status FROM authority_info WHERE au_user_id='$au_user_id'");
			       						$row_status_au=mysqli_fetch_array($sql_check_au);
			       						if($row_status_au['status']==0)
			       						{ ?>
			       							<input type="hidden" name="au_mail" value="<?php echo $au_email; ?>">
			       							<button class="user_active_btn" name="approve_btn" onClick="confirm('Approved');">Approve</button>
			       						<?php }
			       						else{ ?>
			       							<input type="hidden" name="au_mail" value="<?php echo $au_email; ?>">
			       							<button class="user_deactive_btn" style="color: black;" name="reject_btn" onClick="confirm('Rejected');">Reject</button>
			       						<?php }
			       						?>
			       						</form> 
			       					</td>
		       					</tr>

		      				 	<?php
		      				 	}
		      				 	?>
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