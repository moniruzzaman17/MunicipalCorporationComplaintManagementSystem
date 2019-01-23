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
<body>
	<?php include 'au_header.php'; ?>
	<!--PHP CODE-->

<?php

#\*****************************************************************/	

//CODE for getting User ID from database
$sql1 = mysqli_query($conn, "SELECT * FROM authority_info WHERE au_name='$name'");
		while ($row1 = mysqli_fetch_array($sql1)) 
	       {
	       	$user_id 	=	$row1['au_user_id'];
	       	$upazila_name 	=	$row1['working_upazila'];
	       	$district_name 	=	$row1['working_district'];
	       }	

#\*****************************************************************/	
//for getting upazila code from database
$get_upazila_code = mysqli_query($conn, "SELECT id FROM upazilas WHERE name='$upazila_name'");
		while ($row2 = mysqli_fetch_array($get_upazila_code)) 
	       {
	       	$upa_code= $row2['id'];
	       }

#\*****************************************************************/	
//for getting district Code from database
$get_district_code = mysqli_query($conn, "SELECT id FROM districts WHERE name='$district_name'");
		while ($row3 = mysqli_fetch_array($get_district_code)) 
	       {
	       	$district_code= $row3['id'];
	       }

?>
	<!--Container Div-->
	<div class="container">
		<div class="post_body">
			<div class="post_body_left">
				<div class="post_body_left_container">
					<h1 align="center">Search <br> General Comlaint</h1>
					<p style="text-align: center; font-size: 18px;">by</p>
						<a style="padding-left: 16%; padding-right: 17%; margin-left: 13%;" href="au_home_for_upazila.php">Your Working Upazila</a> <br><br>
						<a style="padding-left: 16%; padding-right: 17.5%; margin-left: 13%;"  href="au_home_for_district.php">Your Working District</a> <br><br>
						<a style="padding-left: 11%; padding-right: 10.5%; margin-left: 13%;" href="au_home_general.php">View All General Complaint</a>
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
												<img src="../img/icon1.png"></img><a href="#" id="uploadTrigger" name="post_image">Add Photos/Video</a>
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
											<div class="id-img-box"><img src="../img/default.png"></img></div>
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
											<img src="../post_image/<?php echo $row_post['attatchment']; ?>" style="color: gray;" alt="No Image Available"></img>
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
															<img style="width: 100%; height: 100%; margin: 25px -2px; border-radius: 50%;" src="../img/me.jpg" alt="Image">
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
							?>


				</div> <!--END of Post_body_middles-->

				<div class="post_body_right">
					<div class="post_body_right_container">
						<h1 align="center">Search <br> Crime Comlaint</h1>
						<p style="text-align: center; font-size: 18px;">by</p>
						<a style="padding-left: 16%; padding-right: 17%; margin-left: 13%;" href="home_for_upazila_crime_au.php">Your Working Upazila</a> <br><br>
						<a style="background-color: #e44d3a; color: white; padding-left: 16%; padding-right: 17.5%; margin-left: 13%;"  href="home_for_district_crime_au.php">Your Working District</a> <br><br>
						<a style="padding-left: 11%; padding-right: 10.5%; margin-left: 13%;" href="home_crime_au.php">View All General Complaint</a>
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