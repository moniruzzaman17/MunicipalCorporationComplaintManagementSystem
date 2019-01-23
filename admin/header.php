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
$name=$_SESSION['user_fullname'];
	//CODE for getting Profile Image location from database
$sql = mysqli_query($conn, "SELECT image FROM admin WHERE name='$name'");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$pro_image= $row['image'];
	       }


?>
	<!-- Fixed Header -->
	<header class="header">
		<div class="header_container">
			<div class="header_info_left">
				<div class="header_logo">
					<img style="width: 100%; height: 100%;" src="../img/logo.png" alt="Logo">
				</div>

					<h2 style="margin: -17% 24%;">Admin Panel</h2>
			</div>
			<div class="header_info_right">
				<nav>
					<ul>
						<table style="width: 100%; table-layout: fixed;">
							<tr>
								<td>
									<li>
										<a class="home_li" href="home_general.php"><img style="height: 2%; width: 19%; margin: -3% 0%;" src="../img/home.png" alt="">Home</a>
									</li>
								</td>
								<td>
									<li>
										<a href="admin_profile.php"><img style="height: 3%; width: 22%; margin: -3% 0%; border-radius: 50%; border: 1px solid #00CCCC;" src="uploads/<?php echo $pro_image ?>" alt=""><?php echo $_SESSION["user_fullname"]; ?></a>
									</li>
								</td>
								<td>
									<li>
										<a href="manage_user.php"><img style="height: 2%; width: 19%; margin: -6% 0%;" src="../img/manage_user.png" alt="">Manage User</a>
									</li>
								</td>
								<td>
									<li>
										<a href="top_complaint.php"><img style="height: 2%; width: 19%; margin: -6% 0%;" src="../img/top_complaint.png" alt="">Top Complaint</a>
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