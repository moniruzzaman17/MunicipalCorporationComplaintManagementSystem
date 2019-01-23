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
.send_msg_div{
background-color: rgba(192,192,192,0.4);
overflow: hidden;
width: 18%;
height: 44px;
}
</style>
<body>
	<?php include 'au_header.php'; ?>
	<!--PHP CODE-->

?>
	<!--Container Div-->
	<div class="container">
		<div class="dashboard_body">
			<h1 align="center">Message</h1>
			<div style="width: 100%; padding: 5%;">
				<?php
				// echo $current_user_id;
				$sql=mysqli_query($conn, "SELECT DISTINCT(receiver_id) FROM message WHERE sender_id='$au_user_id' ORDER BY id DESC");
				while ($row=mysqli_fetch_array($sql)) {
					$sender_id=$row['receiver_id'];
					$sql1=mysqli_query($conn, "SELECT * FROM authority_info WHERE au_user_id='$sender_id'");
					$row1=mysqli_fetch_array($sql1);
					$sender_image=$row1['pro_image'];
					$sender_name=$row1['au_name'];

					// finding the post title

					$sql_f=mysqli_query($conn, "SELECT post_title FROM message WHERE sender_id='$au_user_id'");
					$row_f=mysqli_fetch_array($sql_f);
					$post_title=$row_f['post_title'];


				?>
				<h2><?php echo $post_title; ?></h2>
				<form action="remove_conversation_sql.php" method="post">
					<input type="hidden" name="sender_id" value="<?php echo $sender_id; ?>">
					<input type="hidden" name="receiver_id" value="<?php echo $au_user_id; ?>">
					<button>Finish the conversation</button>
				</form>
				<div style="width: 90%; height: 200px; background-color:  rgba(192,192,192,0.4); overflow: scroll;  box-shadow:  0 0 10px  rgba(0,0,0,0.7);">
					<?php

					$sql2=mysqli_query($conn, "SELECT * FROM message WHERE sender_id='$sender_id' AND receiver_id='$au_user_id' OR sender_id='$au_user_id' AND receiver_id='$sender_id'");
					while ($row2=mysqli_fetch_array($sql2)) {
						$tex=$row2['msg_text'];
						$time_ago=$row2['msg_date'];
						if ($row2['sender_id']==$au_user_id) {

					// geting current user information
					$sql3=mysqli_query($conn, "SELECT * FROM authority_info WHERE au_user_id='$au_user_id'");
					$row3=mysqli_fetch_array($sql3);
					$user_image=$row3['pro_image'];
					$full_name=$row3['au_name'];

						 ?>


							<!-- current user msg -->
							<div style="width: 100%; float: left; margin-top: 0%; margin-bottom: 4%;">
								<div style="width: 6%; float: right;">
									<img style="width: 60px; height: 60px; border-radius: 50%;" src="uploads/<?php echo $user_image; ?>" alt="">
								</div>
								<div style="width: 35%; float: right; margin-right: 1%;">
									<br>
									<p style="float: right; margin-top: 0%;"><?php echo $tex; ?><br><small style="color: gray; font-style: italic;"><?php echo $get->timeAgo($time_ago); ?></small></p>
								</div>
							</div> <br>
						<?php
						}
						else{ ?>
						<div style="width: 100%; float: left; margin-bottom: 3%;">
							<div style="width: 10%; float: left;">
								<img style="width: 60px; height: 60px; border-radius: 50%;" src="../img/default.png" alt="">
							</div>
							<div style="width: 45%; float: left; margin: -2% -4%;">
								<h5 style="font-size: 20px;">Anonymous</h5>
								<p><?php echo $tex; ?><br><small style="color: gray; font-style: italic;"><?php echo $get->timeAgo($time_ago); ?></small></p>
							</div>
						</div>
						<?php
						}
						
					?>
					<?php
					}
					?>
				</div>
					<div class="send_msg_div">
						<div style="padding: 5%">
							<form action="message_send_sql.php" method="post">
								<input type="text" name="msg_text">
								<input type="hidden" name="sender_id" value="<?php echo $au_user_id; ?>">
								<input type="hidden" name="receiver_id" value="<?php echo $sender_id; ?>">
								<button>Send</button>
							</form>
						</div>
					</div>
					<br>
					<br>
					<br>
				<hr style="width: 89.7%; margin-left: 0%;">
				<br>
				<br>
				<br>
				<?php
				}
				?>
			</div>
		</div> <!--END of Post BOdy-->

	</div>
</body>
</html>