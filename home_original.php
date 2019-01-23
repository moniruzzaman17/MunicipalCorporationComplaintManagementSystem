<?php
session_start();
	include 'main/functions.php';
	$get    = new Main;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MCCMS</title>
	<link rel="stylesheet" href="css/home.css">
	<script class="jsbin" src="js/jquery.js"></script>
</head>
<body>
	<!--PHP CODE-->
<?php include 'connection.php';?>
<?php
$name=$_SESSION['user_fullname'];
	//CODE for getting Profile Image location from database
$sql = mysqli_query($conn, "SELECT profile_image FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$pro_image= $row['profile_image'];
	       }

#\*****************************************************************/	

//CODE for getting User ID from database
$sql1 = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$name'");
		while ($row1 = mysqli_fetch_array($sql1)) 
	       {
	       	$user_id= $row1['user_name'];
	       }	

#\*****************************************************************/	
//for getting upazila code from database
$get_upazila_code = mysqli_query($conn, "SELECT upazila_code FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($get_upazila_code)) 
	       {
	       	$upa_code= $row['upazila_code'];
	       }

#\*****************************************************************/	
//for getting upazila Name from database
$get_upazila_code = mysqli_query($conn, "SELECT name FROM upazilas WHERE id='$upa_code'");
		while ($row = mysqli_fetch_array($get_upazila_code)) 
	       {
	       	$upazila_name= $row['name'];
	       }

#\*****************************************************************/	
//for getting district Code from database
$get_district_code = mysqli_query($conn, "SELECT district_code FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($get_district_code)) 
	       {
	       	$district_code= $row['district_code'];
	       }

?>

	<!-- Fixed Header -->
	<header class="header">
		<div class="header_container">
			<div class="header_info_left">
				<div class="header_logo">
					<img style="width: 100%; height: 100%;" src="img/logo.png" alt="Logo">
				</div>
			</div>
			<div class="header_info_right">
				<nav>
					<ul>
						<table style="width: 100%; table-layout: fixed;">
							<tr>
								<td>
									<li>
										<a class="home_li" href="home.php"><img style="height: 2%; width: 19%; margin: -3% 0%;" src="img/home.png" alt="">Home</a>
									</li>
								</td>
								<td>
									<li>
										<a href="about_me.php"><img style="height: 3%; width: 22%; margin: -3% 0%; border-radius: 50%; border: 1px solid #00CCCC;" src="uploads/<?php echo $pro_image ?>" alt=""><?php echo $_SESSION["user_fullname"]; ?></a>
									</li>
								</td>
								<td>
									<li>
										<a href=""><img style="height: 2%; width: 19%; margin: -6% 0%;" src="img/message.png" alt="">Message</a>
									</li>
								</td>
								<td>
									<li>
										<a href=""><img style="height: 2%; width: 19%; margin: -5% 0%;" src="img/authority.png" alt="">Authorities</a>
									</li>
								</td>
								<td>
									<li>
										<a href=""><img style="height: 2%; width: 19%; margin: -6% 0%;" src="img/account.png" alt="">Account</a>
									</li>
								</td>
								<td>
									<li>
										<a href="index.php"><img style="height: 2%; width: 19%; margin: -6% 3%;" src="img/logout.png" alt="">Logout</a>
									</li>
								</td>
							</tr>
						</table>
					</ul>
				</nav>
			</div>
		</div>
	</header>  <!-- End of Header -->

	<!--Container Div-->
	<div class="container">
		<div class="post_body">
			<div class="post_body_left">
				<div class="post_body_left_container">
					<h1 align="center">Search <br> General Comlaint</h1>
					<p style="text-align: center; font-size: 18px;">by</p>
					<form action="#" method="POST">
							<button name="district_search_btn">Your District</button> <br>
							<button name="upazila_search_btn">Your Upazila</button>
							<button name="refresh">View All General Complaint</button>
					</form>
				</div>
			</div>
			<div class="post_body_middle">
				<form action="post_insert_sql.php" method="post" enctype="multipart/form-data">
					<div class="create_post">
						<div class="c-body">
							<div class="body-left">
								<div class="img-box">
									<img style="width: 100%; height: 100%;" src="uploads/<?php echo $pro_image ?>"></img>
								</div>
							</div>
							<div class="body-right">
								<br>
								<label style="margin-top: 10%; margin-left: 10%; font-size: 25px;"> Welcome to MCCMS</label>
								<br>
								<br>
								<br>
								<textarea style="resize: none;" class="text-type" name="status_title" placeholder="Write your Complaint Title" required></textarea>
								<textarea class="text-type" name="status" placeholder="Write your Complaint Description" required></textarea>
							</div>
						</div>
						<div class="c-middle">
								<div class="c-m-inner">
									<ul>
										<li>
											<label>Attatch your Evidence here</label>
											<li>
												<input type="file"  onchange="readURL(this);" style="display:none;" name="post_image" id="uploadFile">
											</li>
											<li>
												<img src="img/icon1.png"></img><a href="#" id="uploadTrigger" name="post_image">Add Photos/Video</a>
											</li>
										</li>
									</ul>
								</div>
								
							<div id="body-bottom">
								<img src="#"  id="preview"/>
							</div>
						</div>


						<div class="c-footer">
							<div class="right-box">
								<ul>
									<li><input type="submit" name="submit_general" value="Post Generel Complaint" class="btn1"/></li>
									<li><input type="submit" name="submit_crime" value="Post Crime Complaint" class="btn2"/></li>
								</ul>
							</div>		
						</div>
						</div>
				</form>




<!--Refresh Button Clicking Event.. for which all post will be shown-->
				<?php
				if (isset($_POST['refresh'])) {
					
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Generel";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_id, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="uploads/<?php echo $post_user_image ?>"></img></div>
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
											<img align="center" src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div> <!--End of post-img-->


										<!--PHP CODE-->
										<?php
										$u_name=$_SESSION['user_fullname'];
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
													<input type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
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
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="uploads/<?php echo $com_user_image; ?>" alt="Image">
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
				       	}


#<!--*******************************************************************************-->

#<!--Clicking Event for Search By Upazila-->
				else if (isset($_POST['upazila_search_btn'])) {
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Generel";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND complaint.upazila_code='$upa_code' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="uploads/<?php echo $post_user_image ?>"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#"><?php echo $post_user_name ?></a></li>
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $row_post['district_name']; ?> | <?php echo $row_post['upazila_name']; ?></small></li>
												</ul>
											</div>
										</div>
										<div class="post-right-box"></div>
									</div>
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<h2 align="center"><?php echo $row_post['post_title']; ?></h2>
											<p><?php echo $row_post['post_text']; ?></p>
										</div>
										<div class="post-img">
											<center>
											<img src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div>
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
												<form action="" method="POST">
													<input type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
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
													<!--Comment Loop-->
													<div>
														<div class="user_image_comment">
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="img/me.jpg" alt="Image">
														</div>

														<div class="comment_info">
															<p><b style="font-size: 15px; color: #0080FF;">Md. Moniruzzaman</b>
																sktj dfkasht sakdfjlsk fsasdfaslkdjf lsakdfjaslkdfjlksdjf lskadjflskd jflksdjf lsdkjfklkek fjdfkj atrsdof jksd
															</p>
														</div>
													</div> <br>
											</div> <!--End of Comment div-->
										<br>
										<br>
									</div> <!--End of post-body-->
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->

							<?php
				       		}
				       	}
#<!--*******************************************************************************-->

#<!--Clicking Event for Search By District-->
				else if (isset($_POST['district_search_btn'])) {
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Generel";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND complaint.district_code='$district_code' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="uploads/<?php echo $post_user_image ?>"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#"><?php echo $post_user_name ?></a></li>
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $row_post['district_name']; ?> | <?php echo $row_post['upazila_name']; ?></small></li>
												</ul>
											</div>
										</div>
										<div class="post-right-box"></div>
									</div>
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<h2 align="center"><?php echo $row_post['post_title']; ?></h2>
											<p><?php echo $row_post['post_text']; ?></p>
										</div>
										<div class="post-img">
											<center>
											<img src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div>
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
												<form action="#" method="POST">
													<input type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
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
													<!--Comment Loop-->
													<div>
														<div class="user_image_comment">
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="img/me.jpg" alt="Image">
														</div>

														<div class="comment_info">
															<p><b style="font-size: 15px; color: #0080FF;">Md. Moniruzzaman</b>
																sktj dfkasht sakdfjlsk fsasdfaslkdjf lsakdfjaslkdfjlksdjf lskadjflskd jflksdjf lsdkjfklkek fjdfkj atrsdof jksd
															</p>
														</div>
													</div> <br>
											</div> <!--End of Comment div-->
										<br>
										<br>
									</div> <!--End of post-body-->
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->

							<?php
				       		}
				       	}
				#<!--Refresh Button Clicking Event.. for this all crime related post will be shown-->
				else if (isset($_POST['refresh_crime'])) {
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type_c="Crime";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name FROM complaint, user_info WHERE  complaint.post_type='$post_type_c' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="img/default.png"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#">Anonymous</a></li>
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $row_post['district_name']; ?> | <?php echo $row_post['upazila_name']; ?></small></li>
												</ul>
											</div>
										</div>
										<div class="post-right-box"></div>
									</div>
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<h2 align="center"><?php echo $row_post['post_title']; ?></h2>
											<p><?php echo $row_post['post_text']; ?></p>
										</div>
										<div class="post-img">
											<center>
											<img align="center" src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div>
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
												<form action="#" method="POST">
													<input type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
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
													<!--Comment Loop-->
													<div>
														<div class="user_image_comment">
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="img/me.jpg" alt="Image">
														</div>

														<div class="comment_info">
															<p><b style="font-size: 15px; color: #0080FF;">Md. Moniruzzaman</b>
																sktj dfkasht sakdfjlsk fsasdfaslkdjf lsakdfjaslkdfjlksdjf lskadjflskd jflksdjf lsdkjfklkek fjdfkj atrsdof jksd
															</p>
														</div>
													</div> <br>
											</div> <!--End of Comment div-->
										<br>
										<br>
									</div> <!--End of post-body-->
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->

							<?php
				       		}
				       	}


				 #<!--*******************************************************************************-->

#<!--Clicking Event for Search By Upazila-->
				else if (isset($_POST['upazila_crime_search_btn'])) {
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Crime";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND complaint.upazila_code='$upa_code' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="img/default.png"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#">Anonymous</a></li>
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $row_post['district_name']; ?> | <?php echo $row_post['upazila_name']; ?></small></li>
												</ul>
											</div>
										</div>
										<div class="post-right-box"></div>
									</div>
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<h2 align="center"><?php echo $row_post['post_title']; ?></h2>
											<p><?php echo $row_post['post_text']; ?></p>
										</div>
										<div class="post-img">
											<center>
											<img src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div>
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
												<form action="#" method="POST">
													<input type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
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
													<!--Comment Loop-->
													<div>
														<div class="user_image_comment">
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="img/me.jpg" alt="Image">
														</div>

														<div class="comment_info">
															<p><b style="font-size: 15px; color: #0080FF;">Md. Moniruzzaman</b>
																sktj dfkasht sakdfjlsk fsasdfaslkdjf lsakdfjaslkdfjlksdjf lskadjflskd jflksdjf lsdkjfklkek fjdfkj atrsdof jksd
															</p>
														</div>
													</div> <br>
											</div> <!--End of Comment div-->
										<br>
										<br>
									</div> <!--End of post-body-->
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->

							<?php
				       		}
				       	}
#<!--*******************************************************************************-->

#<!--Clicking Event for Search By District-->
				else if (isset($_POST['district_crime_search_btn'])) {
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Crime";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND complaint.district_code='$district_code' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="img/default.png"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#">Anonymous</a></li>
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $row_post['district_name']; ?> | <?php echo $row_post['upazila_name']; ?></small></li>
												</ul>
											</div>
										</div>
										<div class="post-right-box"></div>
									</div>
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<h2 align="center"><?php echo $row_post['post_title']; ?></h2>
											<p><?php echo $row_post['post_text']; ?></p>
										</div>
										<div class="post-img">
											<center>
											<img src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div>
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
												<form action="#" method="POST">
													<input type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
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
													<!--Comment Loop-->
													<div>
														<div class="user_image_comment">
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="img/me.jpg" alt="Image">
														</div>

														<div class="comment_info">
															<p><b style="font-size: 15px; color: #0080FF;">Md. Moniruzzaman</b>
																sktj dfkasht sakdfjlsk fsasdfaslkdjf lsakdfjaslkdfjlksdjf lskadjflskd jflksdjf lsdkjfklkek fjdfkj atrsdof jksd
															</p>
														</div>
													</div> <br>
											</div> <!--End of Comment div-->
										<br>
										<br>
									</div> <!--End of post-body-->
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->

							<?php
				       		}
				       	}

				else{
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Generel";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND user_info.full_name=complaint.user_fullname ORDER BY post_id DESC");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

							<div class="post-show">
								<div class="post-show-inner">
									<div class="post-header">
										<div class="post-left-box">
											<div class="id-img-box"><img src="uploads/<?php echo $post_user_image ?>"></img></div>
											<div class="id-name">
												<ul>
													<li><a href="#"><?php echo $post_user_name ?></a></li>
													<li><small style="color: #706E6E"><?php echo $get->timeAgo($time_ago); ?></small></li>
													<li><small style="color: #706E6E;">District: <?php echo $row_post['district_name']; ?> | <?php echo $row_post['upazila_name']; ?></small></li>
												</ul>
											</div>
										</div>
										<div class="post-right-box"></div>
									</div>
									<br>
								
									<div class="post-body">
										<div class="post-header-text">
											<h2 align="center"><?php echo $row_post['post_title']; ?></h2>
											<p><?php echo $row_post['post_text']; ?></p>
										</div>
										<div class="post-img">
											<center>
											<img src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
											</center>
										</div>
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
												<form action="#" method="POST">
													<input type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
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
													<!--Comment Loop-->
													<div>
														<div class="user_image_comment">
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="img/me.jpg" alt="Image">
														</div>

														<div class="comment_info">
															<p><b style="font-size: 15px; color: #0080FF;">Md. Moniruzzaman</b>
																sktj dfkasht sakdfjlsk fsasdfaslkdjf lsakdfjaslkdfjlksdjf lskadjflskd jflksdjf lsdkjfklkek fjdfkj atrsdof jksd
															</p>
														</div>
													</div> <br>
											</div> <!--End of Comment div-->
										<br>
										<br>
									</div> <!--End of post-body-->
								</div> <!--End of post-show-inner-->
							</div> <!--END of Post-show-->

							<?php
				       		}
				       	}
							?>


				</div> <!--END of Post_body_middles-->

				<div class="post_body_right">
					<div class="post_body_right_container">
						<h1 align="center">Search <br> Crime Comlaint</h1>
						<p style="text-align: center; font-size: 18px;">by</p>
						<form action="#" method="POST">
								<button name="district_crime_search_btn">Your District</button> <br>
								<button name="upazila_crime_search_btn">Your Upazila</button>
								<button name="refresh_crime">View All Crime Complaint</button>
						</form>
					</div>
				</div>
		</div> <!--END of Post BOdy-->

	</div>

     
<!-- Java Script Code for upload a image-->
<script type="text/javascript">
//Image Preview Function
	$("#uploadTrigger").click(function(){
	   $("#uploadFile").click();
	});
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            	$('#body-bottom').show();
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
</body>
</html>