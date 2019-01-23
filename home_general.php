<?php
session_start();
	include 'main/functions.php';
	$get    = new Main;


	//* session for set access restriction whithout loged in
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MCCMS</title>
	<link rel="stylesheet" href="css/home.css">
	<script src="js/jquery.js"></script>
</head>
<body>
	<?php include 'header.php'; ?>
	<!--PHP CODE-->

<?php
#\*****************************************************************/	

//CODE for getting User ID from database
$sql1 = mysqli_query($conn, "SELECT * FROM user_info WHERE full_name='$name'");
		while ($row1 = mysqli_fetch_array($sql1)) 
	       {
	       	$user_id= $row1['user_name'];
	       	$upa_code= $row1['upazila_code'];
	       	$district_code= $row1['district_code'];
	       }	
	       
#\*****************************************************************/	
//for getting upazila Name from database
$get_upazila_code = mysqli_query($conn, "SELECT name FROM upazilas WHERE id='$upa_code'");
		while ($row = mysqli_fetch_array($get_upazila_code)) 
	       {
	       	$upazila_name= $row['name'];
	       }

?>
	<!--Container Div-->
	<div class="container">
		<div class="post_body">
			<div class="post_body_left">
				<div class="post_body_left_container">
					<h1 align="center">Search <br> General Comlaint</h1>
					<p style="text-align: center; font-size: 18px;">by</p>
						<a style="padding-left: 16%; padding-right: 16.8%;" href="home_for_district.php">Your District</a> <br><br>
						<a style="padding-left: 15.5%; padding-right: 16.9%;" href="home_for_upazila.php">Your Upazila</a> <br><br>
						<a style="background-color: #e44d3a; color: white; " href="home_general.php">View All General Complaint</a>
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
												<input type="file"  onchange="readURL(this);" style="display:none;" name="post_image" id="uploadFile" accept=".jpg,.jpeg,.png">
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

			<div class="post-show" id="<?php echo $row_post['post_id']; ?>">
				<div class="post-show-inner">
					<div class="post-header">
						<div class="post-left-box">
							<div class="id-img-box"><img src="uploads/<?php echo $post_user_image ?>"></img></div>
							<div class="id-name">
								<ul>
									<li><a href="#"><?php echo $post_user_name ?></a></li>
									<li><small style="color: #706E6E;"><?php echo $get->timeAgo($time_ago); ?></small></li>
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
								<?php
								if (isset($row_post['attatchment']) && !empty($row_post['attatchment'])) { ?>
							<img align="center" src="post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
								<?php
								}
								?>
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
								<form action="rating_sql.php" method="POST">
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
						<hr style="margin-top: 2%; margin-bottom: 3%; border:0.5px solid gray;">

							<div class="comment_div">
								<form action="comment_sql.php" method="POST">
                                    <input type="hidden" name="page_location" value="home_general">
									<input type="hidden" name="u_name" value="<?php echo $user_name; ?>">
									<input type="hidden" name="post_id" value="<?php echo $row_post['post_id']; ?>">
									<input type="hidden" name="post_type" value="Generel">
									<input type="text" class="comment_input_box" name="comment" placeholder="Share your Opinion here">
									<button class="post_comment_button" name="p_c_btn">Post</button>
								</form>
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
												<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="authority/uploads/<?php echo $row_rev['pro_image']; ?>" alt="Image">
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
									<div id="<?php echo $comment_id; ?>">
										<div class="user_image_comment">
											<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="uploads/<?php echo $com_user_image; ?>" alt="Image">
										</div>

										<form action="delete_comment_sql.php" method="post">
										<div class="comment_info">
											<p><b style="font-size: 15px; color: #0080FF;"><?php echo $com_user_name; ?></b> <?php echo $comment_text; ?>
												
												<br>
												<small style="color: gray;"><?php echo $date;?> &nbsp <?php echo $time;?> &nbsp; <?php echo $get->timeAgo($com_time_ago); ?></small> &nbsp;
												
												<!--reply clicking event-->
												<!--
												<small>
												<span class="reply" onclick="myFunction()">Reply</span>
												</small>
											-->
												<!--condition for Edit and delete for loged user-->
												<?php if ($row_comm['user_id']==$current_user_id) { ?>
												<small style="margin: 0% 2%;">
                                                    <input type="hidden" name="post_id" value="<?php echo $row_post['post_id']; ?>">
                                                    <input type="hidden" name="page_location" value="home_general">
													<input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
														<input class="comment_delete_btn" type="submit" name="submit" value="Delete">
														<?php } ?>
												</small>
											</p>
										</div>
										</form>
									</div> <br>


								<?php
							$sql_reply_view = mysqli_query($conn, "SELECT * FROM reply, user_info WHERE  reply.post_id='$post_id' AND reply.com_id='$comment_id' AND user_info.user_name=reply.user_id ORDER BY rep_id ASC");
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
											<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="uploads/<?php echo $rep_user_image; ?>" alt="Image">
										</div>

										<div class="comment_info"  id="<?php echo $row_comm['com_id']; ?>">
										<form action="delete_comment_sql.php" method="post">
											<p><b style="font-size: 15px; color: #0080FF;"><?php echo $rep_user_name; ?></b> 
												<?php echo $reply_text; ?>
												<br>
												<small style="color: gray;"><?php echo $r_date;?> &nbsp <?php echo $r_time;?> &nbsp <?php echo $get->timeAgo($rep_time_ago); ?></small> &nbsp;

												<!--condition for Edit and delete for loged user-->
												<?php if ($row_rep['user_id']==$current_user_id) { ?>
												<small style="margin: 0% 2%;">

												
                                                    <input type="hidden" name="rep_id" value="<?php echo $row_rep['rep_id']; ?>">
                                                    <input type="hidden" name="page_location" value="home_general">
													<input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
														<input class="comment_delete_btn" type="submit" name="rep_submit" value="Delete">
														<?php } ?>

												</small>
											</p>
										</form>
										</div>
									</div>
								<?php } ?>

										<div>
												<form action="reply_sql.php" method="POST" style="margin-left: 22%; margin-top: 5%;">
													<input type="hidden" name="page_location" value="home_general">
													<input type="hidden" name="comment_id" value="<?php echo $row_comm['com_id']; ?>">
													<input type="hidden" name="post_id" value="<?php echo $row_post['post_id']; ?>">
													<input type="hidden" name="user_name" value="<?php echo $user_id; ?>">
													<input type="text" class="comment_reply_box" name="reply_text" placeholder="Reply here">
													<button class="comment_reply_button" name="p_c_btn">Reply</button>
												</form>
										</div>


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
			<?php } ?>

				</div> <!--END of Post_body_middles-->

				<div class="post_body_right">
					<div class="post_body_right_container">
						<h1 align="center">Search <br> Crime Comlaint</h1>
						<p style="text-align: center; font-size: 18px;">by</p>
						<a style="padding-left: 16%; padding-right: 16.8%;" href="home_for_district_crime.php">Your District</a> <br><br>
						<a style="padding-left: 15.5%; padding-right: 16.9%;" href="home_for_upazila_crime.php">Your Upazila</a> <br><br>
						<a style="padding-left: 4%; padding-right: 3.1%;" href="home_crime.php">View All Crime Complaint</a>
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