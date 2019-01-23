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
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/profile.css">
	<script class="jsbin" src="js/jquery.js"></script>
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
	<?php include '../connection.php'; ?>
	<!--PHP CODE-->
<?php
#\*****************************************************************/	
$user_mail=$_GET['u_mail'];

//CODE for getting User information from database
$sql = mysqli_query($conn, "SELECT * FROM user_info WHERE mail_address='$user_mail'");
		$row = mysqli_fetch_array($sql);
	       	$name= $row['full_name'];
	       	$user_id= $row['user_name'];
	       	$post_user_image= $row['profile_image'];

#\*****************************************************************/	

?>
<!--Container Div-->

	<div class="container">
		<div class="main_info" style="width: 98%;">
			<div id="about_me">
				<center>
				<h2><?php echo $name; ?></h2>
				<p>Email Address: <?php echo $user_mail; ?></p>
				</center>
				<main>
				  <input class="input" id="tab1" type="radio" name="tabs" checked>
				  <label class="tab_label" for="tab1">Admin Pannel</label>

				  <input class="input" id="tab2" type="radio" name="tabs">
				  <label class="tab_label" for="tab2">Add Admin</label>

				<section id="content1">
					
				</section>

				<section id="content2">
				</section>
				</main>
			</div>
		</div>
	</div>
</body>
</html>