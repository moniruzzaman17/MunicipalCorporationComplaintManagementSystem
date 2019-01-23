<?php
session_start();
	include '../main/functions.php';
	$get    = new Main;

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
	<link rel="stylesheet" href="../css/home.css">
	<script class="jsbin" src="../js/jquery.js"></script>
</head>
<style>
	.dashboard_body{
    margin: 3% 0%;
    width: 100%;
    border-top: 5px solid #e44d3a;
    background-color: white;
    box-shadow:  0 0 10px  rgba(0,0,0,0.5);
    border-radius: 2px;
    top: 7.8vw;
    overflow: hidden;
}

.title{
	border-bottom: 1px solid #e44d3a;
	width: 100%;
	height: 100px;
	color: black;
}

.square{
	width: 30%; 
	float: left; 
	overflow: hidden; 
	border: 1px solid #e44d3a;
	margin-left: 1%;
    box-shadow:  0 0 10px  rgba(0,0,0,0.5);
    margin-bottom: 8%;
    border-top: 5px solid #e44d3a;
}
</style>
<body>
	<?php include 'au_header.php'; ?>
	<!--PHP CODE-->

?>
	<!--Container Div-->
	<div class="container">
		<div class="dashboard_body">
			<h1 align="center">Complaint Overview According to your working district and Upazila</h1>
			<div style="width: 100%; padding: 5%;">
				<div class="square">
					<div class="title">
						<h2 align="center">Today's <br> Total Complaint</h2>
					</div>
					<!-- code for counting current day complaint -->
					<?php
					$today_date=date('Y-m-d');
					$sql1=mysqli_query($conn, "SELECT COUNT(post_id) FROM complaint WHERE post_date='$today_date'");
					$row1=mysqli_fetch_array($sql1);
					$today_total=$row1['COUNT(post_id)'];
					?>
					<h1 align="center"><?php echo $today_total; ?></h1>
				</div>
				<div class="square">
					<div class="title">
						<h2 align="center">Total Complaint(Current Month) <br> in your working Upaila</h2>
					</div>
					<?php

						$current_start_date=date('Y-m-01');
						$current_end_date=date('Y-m-t');
					// code for counting upazila complaint
					$sql2=mysqli_query($conn, "SELECT COUNT(post_id) FROM complaint WHERE post_date>='$current_start_date' AND post_date<='$current_end_date'"); // upa_code getting from the au_header
					$row2=mysqli_fetch_array($sql2);
					$upazila_total=$row2['COUNT(post_id)'];
					?>
					<h1 align="center"><?php echo $upazila_total; ?></h1>
				</div>
				<div class="square">
					<div class="title">
						<h2 align="center">Total Complaint <br> in your working District</h2>
					</div>
					<?php

					// code for counting upazila complaint
					$sql3=mysqli_query($conn, "SELECT COUNT(post_id) FROM complaint WHERE district_code='$dist_code'"); // upa_code getting from the au_header
					$row3=mysqli_fetch_array($sql3);
					$dist_total=$row3['COUNT(post_id)'];
					?>
					<h1 align="center"><?php echo $dist_total; ?></h1>
				</div>
			</div>
		</div> <!--END of Post BOdy-->

	</div>
</body>
</html>