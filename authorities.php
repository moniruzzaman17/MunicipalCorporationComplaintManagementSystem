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
<style>
.user_table{
		width: 100%!important; 
		table-layout: fixed!important; 
		margin-left: -3%!important;
}

.user_table thead tr{
	font-size: 20px;
}

.user_table td, .user_table th{
    border: 1px solid #ddd;
    padding: 8px;
}

.user_table tbody tr td{
	text-align: center;
	font-size: 17px;
}
}
.user_table tr:nth-child(even){background-color: #f2f2f2;}

.user_table tr:hover {background-color: #ddd;}

.user_table th{
    padding-top: 8px;
    padding-bottom: 8px;
    text-align: left;
    background-color: rgba(255,99,71,0.4);
    color: black;
    text-align: center;
    border:1px solid black;
}

.au_image{
	width: 130px;
	height: 130px;
}
</style>
</head>
<body>
	<?php include 'header.php'; ?>
<!--Container Div-->
<?php
//for getting district Code from database
$get_district_code = mysqli_query($conn, "SELECT upazila_name FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($get_district_code)) 
	       {
	       	$working_upazila= $row['upazila_name'];
	       }
echo $working_upazila;
?>

	<div class="container">
		<div class="main_info" style="width: 98%;">
			<div id="about_me" style="margin-top: 6%;">
				<center>
				<h2>MUNICIPAL Authorities</h2>
				</center>
				<main>
				  <input class="input" id="tab1" type="radio" name="tabs" checked>
				  <label class="tab_label" for="tab1">Regional Authorities</label>

				  <input class="input" id="tab2" type="radio" name="tabs">
				  <label class="tab_label" for="tab2">All Municipal Authorites</label>

				  <section id="content1">
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
					  			Working District
					  		</th>
					  		<th>
					  			Working Upazila
					  		</th>
					  		<th>
					  			Profile Image
					  		</th>
				  		</tr>
				  	</thead>
				  	<tbody>
					<?php
					$sl=1;
						$sql_panel = mysqli_query($conn, "SELECT * FROM authority_info WHERE working_upazila='$working_upazila' AND status=1");
							while ($row_panel = mysqli_fetch_array($sql_panel)) 
		      				 { 
		      				 	?>
		      				 	<tr>
			       					<td>
			       						<?php echo $sl++; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['au_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['au_user_id']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['designation']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['organization']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['working_district']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['working_upazila']; ?>
			       					</td>
			       					<td>
			       						<div class="img_div_admin">
			       							<img class="au_image" src="authority/uploads/<?php echo $row_panel['pro_image']; ?>" alt="">
			       						</div>
			       					</td>
		       					</tr>
		       		<?php		 
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
					  			Working District
					  		</th>
					  		<th>
					  			Working Upazila
					  		</th>
					  		<th>
					  			Profile Image
					  		</th>
				  		</tr>
				  	</thead>
				  	<tbody>
					<?php
					$sl=1;
						$sql_panel = mysqli_query($conn, "SELECT * FROM authority_info WHERE status=1");
							while ($row_panel = mysqli_fetch_array($sql_panel)) 
		      				 { 
		      				 	?>
		      				 	<tr>
			       					<td>
			       						<?php echo $sl++; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['au_name']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['au_user_id']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['designation']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['organization']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['working_district']; ?>
			       					</td>
			       					<td>
			       						<?php echo $row_panel['working_upazila']; ?>
			       					</td>
			       					<td>
			       						<div class="img_div_admin">
			       							<img class="au_image" src="authority/uploads/<?php echo $row_panel['pro_image']; ?>" alt="">
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