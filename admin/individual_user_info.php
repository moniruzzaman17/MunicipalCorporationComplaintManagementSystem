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
	<link rel="stylesheet" href="../css/profile.css">
	<script class="jsbin" src="../js/jquery.js"></script>


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
	<?php include '../connection.php'; ?>
	<!--PHP CODE-->

<?php
#\*****************************************************************/	
#\*****************************************************************/	
$user_mail=$_GET['u_mail'];

//CODE for getting User information from database
$sql = mysqli_query($conn, "SELECT * FROM user_info WHERE mail_address='$user_mail'");
		$row = mysqli_fetch_array($sql);
	       	$u_name= $row['full_name'];
	       	$user_id= $row['user_name'];
	       	$post_user_image= $row['profile_image'];
	       	$upa_code= $row['upazila_code'];
	       	$upazila_name= $row['upazila_name'];
	       	$district_code= $row['district_code'];
	       	$pro_image= $row['profile_image'];
$post_exist=false;
$sql1 = mysqli_query($conn, "SELECT user_id FROM complaint WHERE user_id='$user_id'");
		while ($row1 = mysqli_fetch_array($sql1)) {
			if(isset($row1['user_id'])){
				$post_exist=true;
			}
		}?>

		<!--Container Div-->

	<div class="container">
		<div class="main_info" style="width: 98%;">
			<div id="about_me">
				<center>
				<h2><?php echo $u_name; ?></h2>
				<p>Email Address: <?php echo $user_mail; ?></p>
				</center>
				<main>
				  <input class="input" id="tab1" type="radio" name="tabs" checked>
				  <label class="tab_label" for="tab1">General Post</label>

				  <input class="input" id="tab2" type="radio" name="tabs">
				  <label class="tab_label" for="tab2">Crime Post</label>

				<section id="content1">
<?php
if ($post_exist==false) { ?>
	<h1>Sorry <?php echo $u_name; ?> don't have any post </h1>

<?php
}
else{
?>

<div class="row_personal_post">

	<!--Container Div-->
		<div class="post_body" style="margin-top: 0.3%; width: 100%; margin-left: 13%;">
			<div class="post_body_middle" style="width: 73%;">
<!--Refresh Button Clicking Event.. for which all post will be shown-->
				<?php
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Generel";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_id, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name, user_info.user_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND complaint.user_id='$user_id' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show" style="width: 100%; margin-left: 1%;">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="../uploads/<?php echo $post_user_image ?>"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#"><?php echo $post_user_name ?></a></li>
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $row_post['district_name']; ?> | <?php echo $row_post['upazila_name']; ?></small></li>
												</ul>
											</div> <!--End of id-name-->
										</div> <!--End of post-left box-->
										<div class="post-right-box"></div>
									</div> <!--End of post header-->
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<h2 align="center"><?php echo $row_post['post_title']; ?></h2>
											<p><?php echo $row_post['post_text']; ?></p>
										</div> <!--End of post-header-text-->
										<div class="post-img">
											<center>
											<img align="center" src="../post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div> <!--End of post-img-->


										<!--PHP CODE-->
										<?php
											//CODE for getting Profile Image location from database
										$sql = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$u_name'");
												while ($row = mysqli_fetch_array($sql)) 
											       {
											       	$user_name= $row['user_name'];
											       }	

											       $post_id= $row_post['post_id'];
										?>
										<div class="post-footer">
											<div class="post_footer_inner">
											<form action="#">
													<button class="review_btn" name="l_i_btn">Less Important</button>
													<button class="review_btn" name="i_btn">Important</button>
													<button class="review_btn" name="m_i_btn">Most Important</button>
												</form>
											</div> <!--End of post_footer_inner-->
										</div> <!--End of post-footer-->
										<br>
										<hr style="margin-top: 2%; margin-bottom: 3%; border:0.5px solid gray;">

											<div class="comment_div">
												<form action="comment_sql.php" method="POST">
													<input type="hidden" name="u_name" value="<?php echo $user_name; ?>">
													<input type="hidden" name="post_id" value="<?php echo $row_post['post_id']; ?>">
													<input type="hidden" name="post_type" value="Generel">
													<input style="width: 30%;" type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
													<button class="post_comment_button" name="p_c_btn">Post</button>
												</form>
													<div class="authority_popup">
														<!-- Trigger/Open The Modal -->
														<button class="authority_popup_btn" id="myBtn">Authority Review</button>
														<!-- The Modal -->
														<div id="myModal" class="modal">
														  <!-- Modal content -->
														  <div class="modal-content">
														    <span class="close">&times;</span>
														    <p>Some text in the Modal..</p>
														  </div>

														</div>

														<script>
															// Get the modal
															var modal = document.getElementById('myModal');
															// Get the button that opens the modal
															var btn = document.getElementById("myBtn");
															// Get the <span> element that closes the modal
															var span = document.getElementsByClassName("close")[0];
															// When the user clicks the button, open the modal 
															btn.onclick = function() {
															    modal.style.display = "block";
															}
															// When the user clicks on <span> (x), close the modal
															span.onclick = function() {
															    modal.style.display = "none";
															}
															// When the user clicks anywhere outside of the modal, close it
															window.onclick = function(event) {
															    if (event.target == modal) {
															        modal.style.display = "none";
															    }
															}
														</script>
													</div>
													<hr style="margin-top: 2%; margin-bottom: 3%; border:0.5px solid gray;">


										<?php
											$sql_comment_view = mysqli_query($conn, "SELECT comment.com_id, comment.user_id, comment.post_id, comment.post_type, comment.com_text, comment.com_date, comment.com_time, comment.current_timestemp, user_info.full_name, user_info.profile_image FROM comment, user_info WHERE  comment.post_id='$post_id' AND comment.post_type='$post_type' AND user_info.user_name=comment.user_id ORDER BY com_id ASC");
													while ($row_comm = mysqli_fetch_array($sql_comment_view)) 
											       		{
											       			$com_user_name=$row_comm['full_name'];
											       			$com_user_image=$row_comm['profile_image'];
											       			$comment_text=$row_comm['com_text'];
											       			$date=$row_comm['com_date'];
											       			$time=$row_comm['com_time'];
											       			$com_time_ago=$row_comm['current_timestemp'];
											       			$comment_id=$row_comm['com_id'];
										?>
													<!--Comment Loop-->
													<div>
														<div class="user_image_comment">
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="../uploads/<?php echo $com_user_image; ?>" alt="Image">
														</div>

														<form action="delete_comment_sql.php" method="post">
														<div class="comment_info">
															<p><b style="font-size: 15px; color: #0080FF;"><?php echo $com_user_name; ?></b>
																<?php echo $comment_text; ?>
																<br>
																<small style="color: gray;"><?php echo $date;?> &nbsp <?php echo $time;?> &nbsp <?php echo $get->timeAgo($com_time_ago); ?></small>
																
																<?php if ($row_comm['user_id']==$user_id) { ?>
																<small style="margin: 0% 2%;">
																	<input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
																		<input class="comment_edit_btn" type="submit" name="submit1" value="Edit">
																		<input class="comment_delete_btn" type="submit" name="submit" value="Delete">
																		<?php } ?>

																</small>
															</p>
														</div>
														</form>
													</div> <br>

											<?php
										}
										?>
											</div> <!--End of Comment div-->
										<br>
										<br>
									</div> <!--End of post-body-->
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->
							<?php
				       	}
							?>


				</div> <!--END of Post_body_middles-->
		</div> <!--END of Post BOdy-->
	</div><!--END of row_personal_post-->
<?php } ?>

</section>

				<section id="content2">
<?php
if ($post_exist==false) { ?>
	<h1><?php echo $u_name; ?> don't have any Crime post </h1>

<?php
}
else{
?>

<div class="row_personal_post">

	<!--Container Div-->
		<div class="post_body" style="margin-top: 0.3%; width: 100%; margin-left: 13%;">
			<div class="post_body_middle" style="width: 73%;">
<!--Refresh Button Clicking Event.. for which all post will be shown-->
				<?php
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Crime";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_id, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name, user_info.user_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND complaint.user_id='$user_id' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show" style="width: 100%; margin-left: 1%;">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="../img/default.png"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#">Anonymous</a></li>
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $row_post['district_name']; ?> | <?php echo $row_post['upazila_name']; ?></small></li>
												</ul>
											</div> <!--End of id-name-->
										</div> <!--End of post-left box-->
										<div class="post-right-box"></div>
									</div> <!--End of post header-->
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<h2 align="center"><?php echo $row_post['post_title']; ?></h2>
											<p><?php echo $row_post['post_text']; ?></p>
										</div> <!--End of post-header-text-->
										<div class="post-img">
											<center>
											<img align="center" src="../post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div> <!--End of post-img-->


										<!--PHP CODE-->
										<?php
											//CODE for getting Profile Image location from database
										$sql = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$u_name'");
												while ($row = mysqli_fetch_array($sql)) 
											       {
											       	$user_name= $row['user_name'];
											       }	

											       $post_id= $row_post['post_id'];
										?>
										<div class="post-footer">
											<div class="post_footer_inner">
											<form action="#">
													<button class="review_btn" name="l_i_btn">Less Important</button>
													<button class="review_btn" name="i_btn">Important</button>
													<button class="review_btn" name="m_i_btn">Most Important</button>
												</form>
											</div> <!--End of post_footer_inner-->
										</div> <!--End of post-footer-->
										<br>
										<hr style="margin-top: 2%; margin-bottom: 3%; border:0.5px solid gray;">

											<div class="comment_div">
												<form action="comment_sql.php" method="POST">
													<input type="hidden" name="u_name" value="<?php echo $user_name; ?>">
													<input type="hidden" name="post_id" value="<?php echo $row_post['post_id']; ?>">
													<input type="hidden" name="post_type" value="Generel">
													<input style="width: 30%;" type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
													<button class="post_comment_button" name="p_c_btn">Post</button>
												</form>
													<div class="authority_popup">
														<!-- Trigger/Open The Modal -->
														<button class="authority_popup_btn" id="myBtn">Authority Review</button>
														<!-- The Modal -->
														<div id="myModal" class="modal">
														  <!-- Modal content -->
														  <div class="modal-content">
														    <span class="close">&times;</span>
														    <p>Some text in the Modal..</p>
														  </div>

														</div>

														<script>
															// Get the modal
															var modal = document.getElementById('myModal');
															// Get the button that opens the modal
															var btn = document.getElementById("myBtn");
															// Get the <span> element that closes the modal
															var span = document.getElementsByClassName("close")[0];
															// When the user clicks the button, open the modal 
															btn.onclick = function() {
															    modal.style.display = "block";
															}
															// When the user clicks on <span> (x), close the modal
															span.onclick = function() {
															    modal.style.display = "none";
															}
															// When the user clicks anywhere outside of the modal, close it
															window.onclick = function(event) {
															    if (event.target == modal) {
															        modal.style.display = "none";
															    }
															}
														</script>
													</div>
													<hr style="margin-top: 2%; margin-bottom: 3%; border:0.5px solid gray;">


										<?php
											$sql_comment_view = mysqli_query($conn, "SELECT comment.com_id, comment.user_id, comment.post_id, comment.post_type, comment.com_text, comment.com_date, comment.com_time, comment.current_timestemp, user_info.full_name, user_info.profile_image FROM comment, user_info WHERE  comment.post_id='$post_id' AND comment.post_type='$post_type' AND user_info.user_name=comment.user_id ORDER BY com_id ASC");
													while ($row_comm = mysqli_fetch_array($sql_comment_view)) 
											       		{
											       			$com_user_name=$row_comm['full_name'];
											       			$com_user_image=$row_comm['profile_image'];
											       			$comment_text=$row_comm['com_text'];
											       			$date=$row_comm['com_date'];
											       			$time=$row_comm['com_time'];
											       			$com_time_ago=$row_comm['current_timestemp'];
											       			$comment_id=$row_comm['com_id'];
										?>
													<!--Comment Loop-->
													<div>
														<div class="user_image_comment">
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="../uploads/<?php echo $com_user_image; ?>" alt="Image">
														</div>

														<form action="delete_comment_sql.php" method="post">
														<div class="comment_info">
															<p><b style="font-size: 15px; color: #0080FF;"><?php echo $com_user_name; ?></b>
																<?php echo $comment_text; ?>
																<br>
																<small style="color: gray;"><?php echo $date;?> &nbsp <?php echo $time;?> &nbsp <?php echo $get->timeAgo($com_time_ago); ?></small>
																
																<?php if ($row_comm['user_id']==$user_id) { ?>
																<small style="margin: 0% 2%;">
																	<input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
																		<input class="comment_edit_btn" type="submit" name="submit1" value="Edit">
																		<input class="comment_delete_btn" type="submit" name="submit" value="Delete">
																		<?php } ?>

																</small>
															</p>
														</div>
														</form>
													</div> <br>

											<?php
										}
										?>
											</div> <!--End of Comment div-->
										<br>
										<br>
									</div> <!--End of post-body-->
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->
							<?php
				       	}
							?>


				</div> <!--END of Post_body_middles-->
		</div> <!--END of Post BOdy-->
	</div><!--END of row_personal_post-->
<?php } ?>

				</section>
				</main>
			</div>
		</div>
	</div>
</div> 
</body>
</html>