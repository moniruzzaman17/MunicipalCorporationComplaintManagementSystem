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
$post_id=$_GET['post_id'];
$sql0 = mysqli_query($conn, "SELECT * FROM complaint WHERE post_id='$post_id'");
		while ($row0 = mysqli_fetch_array($sql0)) {
		$user_id=$row0['user_id'];
		$type=$row0['post_type'];

		}

//CODE for getting User information from database
$sql = mysqli_query($conn, "SELECT * FROM user_info WHERE user_name='$user_id'");
		$row = mysqli_fetch_array($sql);
	       	$u_name= $row['full_name'];
	       	$user_id= $row['user_name'];
	       	$post_user_image= $row['profile_image'];
	       	$upa_code= $row['upazila_code'];
	       	$upazila_name= $row['upazila_name'];
	       	$district_code= $row['district_code'];
	       	$pro_image= $row['profile_image'];
	  ?>

		<!--Container Div-->

	<div class="container">
		<div class="main_info" style="width: 98%; border: none; box-shadow: none;">
			<div id="about_me">
<?php
if ($type=="Generel") {
?>
<div class="row_personal_post">

	<!--Container Div-->
		<div class="post_body" style="margin-top: -4%; width: 100%; margin-left: -4%;">
			<div class="post_body_middle" style="width: 95%;">
<!--Refresh Button Clicking Event.. for which all post will be shown-->
				<?php
					# code...
					//for getting upazila code from database
				/*  SELECT * FROM complaint WHERE upazila_code='$upa_code' ORDER BY post_id DESC */
					$post_type="Generel";
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_id, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name, user_info.user_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND complaint.post_id='$post_id' AND user_info.full_name=complaint.user_fullname");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

			<div style="width: 100%; margin-left: 4%; border-top: 5px solid #e44d3a;" class="post-show" id="<?php echo $row_post['post_id']; ?>">
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
				
					<div style="" class="post-body">
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
						$u_name=$_SESSION['user_fullname'];
							//CODE for getting Profile Image location from database
						$sql = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$u_name'");
								while ($row = mysqli_fetch_array($sql)) 
							       {
							       	$user_name= $row['user_name'];
							       }	

							       $post_id= $row_post['post_id'];

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
					while ($row1 = mysqli_fetch_array($sql_less_important_count)) 
				       {
				       	$less_count= $row1['SUM(less_important_count)'];
				       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
					while ($row2 = mysqli_fetch_array($sql_important_count)) 
				       {
				       	$im_count= $row2['SUM(important_count)'];
				       }




				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
					while ($row3 = mysqli_fetch_array($sql_most_important_count)) 
				       {
				       	$most_count= $row3['SUM(most_important_count)'];
				       }



						?>
						<div class="post-footer">
							<div class="post_footer_inner">
								<form>
									<input type="hidden" name="page_location" value="home_general">
									<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
									<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

									<?php 
									/*$sql_select = mysqli_query($conn, "SELECT * FROM rating WHERE post_id='$post_id'");
									if (mysqli_fetch_array($sql_select)) {*/
									#sql for mores important Count
								       $sql_available_count = mysqli_query($conn, "SELECT * FROM rating WHERE post_id='$post_id' AND user_id='$user_id'");
								       $fetch=false;
									while ($row4 = mysqli_fetch_array($sql_available_count)) 
								       {
								       	$available_less_count= $row4['less_important_count'];
								       	$available_imp_count= $row4['important_count'];
								       	$available_most_count= $row4['most_important_count'];
								       	$fetch=true;
									}
									if($fetch==false)
									{ ?>
									    <button class="review_btn" name="less_im_btn">Less Important</button><?php echo $less_count; ?>
										<button class="review_btn" name="im_btn">Important</button><?php echo $im_count; ?>
										<button class="review_btn" name="more_i_btn">Most Important</button><?php echo $most_count; ?>
									<?php }

									else
									{
								       //Condition for color effect of less important button
								       if ($available_less_count==1) 
								       {
								       	?>
										<button style="background-color: #e44d3a;" class="review_btn" name="less_im_btn">Less Important</button><?php echo $less_count; ?>
									<?php
								       }
								       else
									       {?>
									       		<button class="review_btn" name="less_im_btn">Less Important</button><?php echo $less_count; ?>
									      <?php }

									      //Condition for color effect of important button
								       if ($available_imp_count==1) 
								       {
								       	?>
											<button style="background-color: #e44d3a;" class="review_btn" name="im_btn">Important</button><?php echo $im_count; ?>
									<?php
								       }
								       else
									       {?>
												<button class="review_btn" name="im_btn">Important</button><?php echo $im_count; ?>
									      <?php }

									      //Condition for color effect of more important button
								       if ($available_most_count==1) 
								       {
								       	?>
											<button style="background-color: #e44d3a;" class="review_btn" name="more_i_btn">Most Important</button><?php echo $most_count; ?>
									<?php
								       }
								       else
								       { ?>
											<button class="review_btn" name="more_i_btn">Most Important</button><?php echo $most_count; ?>
								     <?php  }
								   }
									?>
								</form>
							</div> <!--End of post_footer_inner-->
						</div> <!--End of post-footer-->
						<br>

							<div class="comment_div">
													<hr style="margin-top: 2%; margin-bottom: 3%; border:0.5px solid gray;">

								<div class="authority_review" >
									<h3 style="background-color: white; text-decoration: underline;" align="center">Authority Review</h3>
									<div class="authority_review_container">
										<div class="review_content" >
										<?php 
											$sql_review=mysqli_query($conn, "SELECT * FROM authority_review, authority_info WHERE authority_info.au_user_id=authority_review.authority_user_id AND authority_review.post_id=$post_id ORDER BY review_id DESC");
											while ($row_rev=mysqli_fetch_array($sql_review)) {
													$time_ago=$row_rev['review_timestamp'];
												?>

										<div id="" class="review_show_body" style="margin: -3% 2%;">
											<div class="user_image_comment">
												<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="../authority/uploads/<?php echo $row_rev['pro_image']; ?>" alt="Image">
											</div>
											<div class="authority_review_info" style="background: transparent;">
													<p><b style="font-size: 15px; color: darkred;"><?php echo $row_rev['au_name']; ?><br><b style="font-style: italic; color: steelblue;"><?php echo $row_rev['designation']; ?><br><?php echo $row_rev['organization']; ?></b><br><small style="color: #706E6E; text-decoration: underline;"><?php echo $get->timeAgo($time_ago); ?> (<?php echo $row_rev['review_date']; ?>)</small></b> <br>
														<?php echo $row_rev['review_text']; ?>
													</p>
											</div>
											</div>
											<?php
											}
											?>
										</div> <!-- END of Authority Review Content -->
									</div>
								</div> <!-- END of Authority Review -->

													<hr style="margin-top: 2%; margin-bottom: 2%; border:0.5px solid gray;">
													<!--Comment Loop-->
												<h3 style="text-decoration: underline;" align="center">User Openion</h3>


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

										<form>
										<div class="comment_info">
											<p><b style="font-size: 15px; color: #0080FF;"><?php echo $com_user_name; ?></b>
												<?php echo $comment_text; ?>
												<br>
												<small style="color: gray;"><?php echo $date;?> &nbsp <?php echo $time;?> &nbsp <?php echo $get->timeAgo($com_time_ago); ?></small> &nbsp;
												
												<!--reply clicking event-->
												<!--
												<small>
												<span class="reply" onclick="myFunction()">Reply</span>
												</small>
											-->
												<!--condition for Edit and delete for loged user-->
												<?php if ($row_comm['user_id']==$user_id) { ?>
												<small style="margin: 0% 2%;">
                                                    <input type="hidden" name="post_id" value="<?php echo $row_post['post_id']; ?>">
                                                    <input type="hidden" name="page_location" value="home_general">
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
							$sql_reply_view = mysqli_query($conn, "SELECT reply.post_id, reply.com_id, reply.user_id, reply.rep_text, reply.rep_date, reply.rep_time, reply.current_time_stamp, user_info.full_name, user_info.profile_image FROM reply, user_info WHERE  reply.post_id='$post_id' AND reply.com_id='$comment_id' AND user_info.user_name=reply.user_id ORDER BY rep_id ASC");
									while ($row_rep = mysqli_fetch_array($sql_reply_view)) 
							       		{
							       			$rep_user_name=$row_rep['full_name'];
							       			$rep_user_image=$row_rep['profile_image'];
							       			$reply_text=$row_rep['rep_text'];
							       			$r_date=$row_rep['rep_date'];
							       			$r_time=$row_rep['rep_time'];
							       			$rep_time_ago=$row_rep['current_time_stamp'];
						?>
									<!--Reply Loop-->
									<div style="margin: -3% 11%; border-left: 1px solid gainsboro; width: 86%;">
										<div class="user_image_comment">
											<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="../uploads/<?php echo $rep_user_image; ?>" alt="Image">
										</div>

										<div class="comment_info"  id="<?php echo $row_comm['com_id']; ?>">
										<form>
											<p><b style="font-size: 15px; color: #0080FF;"><?php echo $rep_user_name; ?></b>
												<?php echo $reply_text; ?>
												<br>
												<small style="color: gray;"><?php echo $r_date;?> &nbsp <?php echo $r_time;?> &nbsp <?php echo $get->timeAgo($rep_time_ago); ?></small> &nbsp;
												
												<!--reply clicking event-->
												<!--
												<small>
												<span class="reply" onclick="myFunction()">Reply</span>
												</small>
											-->
												<!--condition for Edit and delete for loged user-->
												<?php if ($row_comm['user_id']==$user_id) { ?>
												<small style="margin: 0% 2%;">

													<input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
														<input class="comment_edit_btn" type="submit" name="submit1" value="Edit">
														<input class="comment_delete_btn" type="submit" name="submit" value="Delete">
														<?php } ?>

												</small>
											</p>
										</form>
										</div>
									</div>
								<?php } ?>


									 <br>

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

<?php
if ($type=="Crime") {
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
					$sql_post_view = mysqli_query($conn, "SELECT complaint.user_fullname, complaint.post_id, complaint.post_title, complaint.post_text, complaint.attatchment, complaint.date_time, complaint.upazila_code, user_info.profile_image, user_info.upazila_name, user_info.district_name, user_info.user_name FROM complaint, user_info WHERE  complaint.post_type='$post_type' AND complaint.post_id='$post_id' AND user_info.full_name=complaint.user_fullname");
						while ($row_post = mysqli_fetch_array($sql_post_view)) 
				       		{
				       			$post_user_name=$row_post['user_fullname'];
				       			$time_ago=$row_post['date_time'];
				       			$post_user_image=$row_post['profile_image'];
				       	?>

			<div style="width: 100%; margin-left: 4%; border-top: 5px solid #e44d3a;" class="post-show" id="<?php echo $row_post['post_id']; ?>">
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
				
					<div style="" class="post-body">
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
						$u_name=$_SESSION['user_fullname'];
							//CODE for getting Profile Image location from database
						$sql = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$u_name'");
								while ($row = mysqli_fetch_array($sql)) 
							       {
							       	$user_name= $row['user_name'];
							       }	

							       $post_id= $row_post['post_id'];

						#sql for less important Count
				       $sql_less_important_count = mysqli_query($conn, "SELECT SUM(less_important_count) FROM rating WHERE post_id=$post_id");
					while ($row1 = mysqli_fetch_array($sql_less_important_count)) 
				       {
				       	$less_count= $row1['SUM(less_important_count)'];
				       }



				       #sql for important Count
				       $sql_important_count = mysqli_query($conn, "SELECT SUM(important_count) FROM rating WHERE post_id=$post_id");
					while ($row2 = mysqli_fetch_array($sql_important_count)) 
				       {
				       	$im_count= $row2['SUM(important_count)'];
				       }




				       #sql for mores important Count
				       $sql_most_important_count = mysqli_query($conn, "SELECT SUM(most_important_count) FROM rating WHERE post_id=$post_id");
					while ($row3 = mysqli_fetch_array($sql_most_important_count)) 
				       {
				       	$most_count= $row3['SUM(most_important_count)'];
				       }



						?>
						<div class="post-footer">
							<div class="post_footer_inner">
								<form>
									<input type="hidden" name="page_location" value="home_general">
									<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
									<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

									<?php 
									/*$sql_select = mysqli_query($conn, "SELECT * FROM rating WHERE post_id='$post_id'");
									if (mysqli_fetch_array($sql_select)) {*/
									#sql for mores important Count
								       $sql_available_count = mysqli_query($conn, "SELECT * FROM rating WHERE post_id='$post_id' AND user_id='$user_id'");
								       $fetch=false;
									while ($row4 = mysqli_fetch_array($sql_available_count)) 
								       {
								       	$available_less_count= $row4['less_important_count'];
								       	$available_imp_count= $row4['important_count'];
								       	$available_most_count= $row4['most_important_count'];
								       	$fetch=true;
									}
									if($fetch==false)
									{ ?>
									    <button class="review_btn" name="less_im_btn">Less Important</button><?php echo $less_count; ?>
										<button class="review_btn" name="im_btn">Important</button><?php echo $im_count; ?>
										<button class="review_btn" name="more_i_btn">Most Important</button><?php echo $most_count; ?>
									<?php }

									else
									{
								       //Condition for color effect of less important button
								       if ($available_less_count==1) 
								       {
								       	?>
										<button style="background-color: #e44d3a;" class="review_btn" name="less_im_btn">Less Important</button><?php echo $less_count; ?>
									<?php
								       }
								       else
									       {?>
									       		<button class="review_btn" name="less_im_btn">Less Important</button><?php echo $less_count; ?>
									      <?php }

									      //Condition for color effect of important button
								       if ($available_imp_count==1) 
								       {
								       	?>
											<button style="background-color: #e44d3a;" class="review_btn" name="im_btn">Important</button><?php echo $im_count; ?>
									<?php
								       }
								       else
									       {?>
												<button class="review_btn" name="im_btn">Important</button><?php echo $im_count; ?>
									      <?php }

									      //Condition for color effect of more important button
								       if ($available_most_count==1) 
								       {
								       	?>
											<button style="background-color: #e44d3a;" class="review_btn" name="more_i_btn">Most Important</button><?php echo $most_count; ?>
									<?php
								       }
								       else
								       { ?>
											<button class="review_btn" name="more_i_btn">Most Important</button><?php echo $most_count; ?>
								     <?php  }
								   }
									?>
								</form>
							</div> <!--End of post_footer_inner-->
						</div> <!--End of post-footer-->
						<br>

							<div class="comment_div">
													<hr style="margin-top: 2%; margin-bottom: 3%; border:0.5px solid gray;">

								<div class="authority_review" >
									<h3 style="background-color: white; text-decoration: underline;" align="center">Authority Review</h3>
									<div class="authority_review_container">
										<div class="review_content" >
										<?php 
											$sql_review=mysqli_query($conn, "SELECT * FROM authority_review, authority_info WHERE authority_info.au_user_id=authority_review.authority_user_id AND authority_review.post_id=$post_id ORDER BY review_id DESC");
											while ($row_rev=mysqli_fetch_array($sql_review)) {
													$time_ago=$row_rev['review_timestamp'];
												?>

										<div id="" class="review_show_body" style="margin: -3% 2%;">
											<div class="user_image_comment">
												<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="../authority/uploads/<?php echo $row_rev['pro_image']; ?>" alt="Image">
											</div>
											<div class="authority_review_info" style="background: transparent;">
													<p><b style="font-size: 15px; color: darkred;"><?php echo $row_rev['au_name']; ?><br><b style="font-style: italic; color: steelblue;"><?php echo $row_rev['designation']; ?><br><?php echo $row_rev['organization']; ?></b><br><small style="color: #706E6E; text-decoration: underline;"><?php echo $get->timeAgo($time_ago); ?> (<?php echo $row_rev['review_date']; ?>)</small></b> <br>
														<?php echo $row_rev['review_text']; ?>
													</p>
											</div>
											</div>
											<?php
											}
											?>
										</div> <!-- END of Authority Review Content -->
									</div>
								</div> <!-- END of Authority Review -->

													<hr style="margin-top: 2%; margin-bottom: 2%; border:0.5px solid gray;">
													<!--Comment Loop-->
												<h3 style="text-decoration: underline;" align="center">User Openion</h3>


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

										<form>
										<div class="comment_info">
											<p><b style="font-size: 15px; color: #0080FF;"><?php echo $com_user_name; ?></b>
												<?php echo $comment_text; ?>
												<br>
												<small style="color: gray;"><?php echo $date;?> &nbsp <?php echo $time;?> &nbsp <?php echo $get->timeAgo($com_time_ago); ?></small> &nbsp;
												
												<!--reply clicking event-->
												<!--
												<small>
												<span class="reply" onclick="myFunction()">Reply</span>
												</small>
											-->
												<!--condition for Edit and delete for loged user-->
												<?php if ($row_comm['user_id']==$user_id) { ?>
												<small style="margin: 0% 2%;">
                                                    <input type="hidden" name="post_id" value="<?php echo $row_post['post_id']; ?>">
                                                    <input type="hidden" name="page_location" value="home_general">
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
							$sql_reply_view = mysqli_query($conn, "SELECT reply.post_id, reply.com_id, reply.user_id, reply.rep_text, reply.rep_date, reply.rep_time, reply.current_time_stamp, user_info.full_name, user_info.profile_image FROM reply, user_info WHERE  reply.post_id='$post_id' AND reply.com_id='$comment_id' AND user_info.user_name=reply.user_id ORDER BY rep_id ASC");
									while ($row_rep = mysqli_fetch_array($sql_reply_view)) 
							       		{
							       			$rep_user_name=$row_rep['full_name'];
							       			$rep_user_image=$row_rep['profile_image'];
							       			$reply_text=$row_rep['rep_text'];
							       			$r_date=$row_rep['rep_date'];
							       			$r_time=$row_rep['rep_time'];
							       			$rep_time_ago=$row_rep['current_time_stamp'];
						?>
									<!--Reply Loop-->
									<div style="margin: -3% 11%; border-left: 1px solid gainsboro; width: 86%;">
										<div class="user_image_comment">
											<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="../uploads/<?php echo $rep_user_image; ?>" alt="Image">
										</div>

										<div class="comment_info"  id="<?php echo $row_comm['com_id']; ?>">
										<form>
											<p><b style="font-size: 15px; color: #0080FF;"><?php echo $rep_user_name; ?></b>
												<?php echo $reply_text; ?>
												<br>
												<small style="color: gray;"><?php echo $r_date;?> &nbsp <?php echo $r_time;?> &nbsp <?php echo $get->timeAgo($rep_time_ago); ?></small> &nbsp;
												
												<!--reply clicking event-->
												<!--
												<small>
												<span class="reply" onclick="myFunction()">Reply</span>
												</small>
											-->
												<!--condition for Edit and delete for loged user-->
												<?php if ($row_comm['user_id']==$user_id) { ?>
												<small style="margin: 0% 2%;">

													<input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
														<input class="comment_edit_btn" type="submit" name="submit1" value="Edit">
														<input class="comment_delete_btn" type="submit" name="submit" value="Delete">
														<?php } ?>

												</small>
											</p>
										</form>
										</div>
									</div>
								<?php } ?>


									 <br>

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
		</div>
	</div>
</div> 
</body>
</html>