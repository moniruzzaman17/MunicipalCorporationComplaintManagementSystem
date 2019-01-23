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
	<link rel="stylesheet" href="css/header.css">
</head>
<body>

<!--PHP CODE-->
<?php
include '../connection.php';
date_default_timezone_set('Asia/Dhaka');
$name=$_SESSION['au_fullname'];
	//CODE for getting Profile Image location from database
$sql = mysqli_query($conn, "SELECT * FROM authority_info WHERE au_name='$name'");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$pro_image= $row['pro_image'];
	       	$au_user_id= $row['au_user_id'];
	       	$au_district= $row['working_district'];
	       	$au_upazila= $row['working_upazila'];
	       }

$sql2 = mysqli_query($conn, "SELECT * FROM upazilas WHERE name='$au_upazila'");
		while ($row2 = mysqli_fetch_array($sql2)) 
	       {
	       	$upa_code= $row2['id'];
	       }

$sql3 = mysqli_query($conn, "SELECT * FROM districts WHERE name='$au_district'");
		while ($row3 = mysqli_fetch_array($sql3)) 
	       {
	       	$dist_code= $row3['id'];
	       }


?>
	<!-- Fixed Header -->
	<header class="header">
		<div class="header_container">
			<div class="header_info_left">
				<div class="header_logo">
					<img style="width: 100%; height: 100%;" src="../img/logo.png" alt="Logo">
				</div>
			</div>
			<div class="header_info_right">
				<nav>
					<ul style="margin: -7px 0px;">
						<table style="width: 100%; table-layout: fixed;">
							<tr>
								<td>
									<li>
										<a class="home_li" href="au_dashboard.php"><img style="height: 2%; width: 19%; margin: -3% 0%;" src="../img/dashboard.png" alt="">Dash board</a>
									</li>
								</td>
								<td>
									<li>
										<a class="home_li" href="au_home_for_upazila.php"><img style="height: 2%; width: 19%; margin: -3% 0%;" src="../img/home.png" alt="">Home</a>
									</li>
								</td>
								<td>
									<li>
										<a href="au_about.php"><img style="height: 3%; width: 20%; margin: -11% 1%; border-radius: 50%; border: 1px solid #00CCCC;" src="uploads/<?php echo $pro_image ?>" alt=""><?php echo $_SESSION["au_fullname"]; ?></a>
									</li>
								</td>
								<td>
									<li>
										<a href="message_page.php"><img style="height: 2%; width: 19%; margin: -6% 0%;" src="../img/message.png" alt="">Message</a>
									</li>
								</td>
								<td>
									<li>
										<a href="top_complaint.php"><img style="height: 2%; width: 19%; margin: -5% 0%;" src="../img/top_complaint.png" alt="">Top Complaint</a>
									</li>
								</td>
								<td>
									<li>
										<a href="logout_sql.php"><img style="height: 2%; width: 19%; margin: -6% 3%;" src="../img/logout.png" alt="">Logout</a>
									</li>
								</td>
							</tr>
						</table>
					</ul>
				</nav>
			</div>
		</div>
	</header>  <!-- End of Header -->
</body>
</html>