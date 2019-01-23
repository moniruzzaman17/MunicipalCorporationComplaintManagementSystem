<?php include 'connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>

	<!-- CSS Link -->
	<link type="text/css" rel="stylesheet" href="css/signup.css">
	<link type="text/css" rel="stylesheet" href="css/tab_content.css">
</head>
<body>
	<?php include 'header_index.php'; ?>

	<!-- Main Container -->
	<div class="container" style="margin-left: 0; margin-right: 0;">
					<h1 align="center">A platform to highlight your problem and make your city be developed</h1>
			<div class="info_div">
				<div class="reg_info">
					<div class="img_div" style="margin-top: 172px; width: 84%;">
						<img class="signup_image" src="img/signup_features.png" alt="Image">
					</div>
				</div>
				<div class="reg_info">
				
				<center>
				<!-- <h2>WELCOME to User Managing Module</h2> -->
				<p align="center">Make sure your given information is correct</p>
				</center>
				<main style="width: 110%;">
				  <input class="input" id="tab1" type="radio" name="tabs" checked>
				  <label class="tab_label" for="tab1">User Registration</label>

				  <input class="input" id="tab2" type="radio" name="tabs">
				  <label class="tab_label" for="tab2">Authority Registration</label>

				  <section id="content1">
					<!-- Code for Form -->
					<form action="signup_sql.php" method="POST" enctype="multipart/form-data">
						<label><b>Name *</b></label>
			    		<input type="text" placeholder="Enter your name" name="full_nm" pattern="^[A-Z][ a-zA-Z]+$" title="First Letter must be upper case and only space and characters are allowed" required> <br>

			    		<label><b>User Name *</b></label>
			    		<input type="text" placeholder="User Name" name="user_nm" pattern="^[a-z][a-z_]{1,20}[0-9]{1,15}$" title="start with at least 2 lower case and end with number, allowed only a-z,_,0-9" required>

			    		<label><b>Password *</b></label>
			    		<input type="Password" placeholder="Create a new password" name="pass" pattern="^[a-zA-Z0-9 .@#$%&*]{6,30}$" title="allowed a-z,A-Z,0-9.@ # $ % & * min 6 max 30" required>

			    		<label><b>Email *</b></label>
			    		<input type="text" placeholder="example@mail.com" name="mail" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Make sure a valid mail address" required>
						
						<!--Dropdown for Divissions-->
						<input type="dropdown" name="division" list="divisions" class="dropdown" placeholder="<-- Divisions -->" />
						<datalist id="divisions">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM divisions");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	$div= $row['name'];
								       	?>
		
								         <option value="<?Php echo $div ?>"></option>

								         <?php 
								       }
							?>
						</datalist>


						<!--Dropdown for District-->
						<input type="dropdown" name="district" list="districts" class="dropdown" placeholder="<-- Districts -->"  />
						<datalist id="districts">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM districts");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	$dis= $row['name'];
								       	?>
		
								         <option value="<?Php echo $dis ?>"></option>

								         <?php 
								       }
							?>
						</datalist>


						<!--Dropdown for Divissions-->
						<input type="dropdown" name="upazila" list="upazilas" class="dropdown" placeholder="<-- Upazila -->"  />
						<datalist id="upazilas">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM upazilas");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	$upa= $row['name'];
								       	?>
		
								         <option value="<?Php echo $upa ?>"></option>

								         <?php 
								       }
							?>
						</datalist>

						 <br>

			    		<label><b>Valid NID no *</b></label>
			    		<input type="text" placeholder="BirthYearXXXXXXXXXXXX" name="nid" required>

			    		<label><b>Date of Birth *</b></label>
			    		<input type="Date" placeholder="dd-mm-yyyy" name="d_birth" required> <br>
			    		<label><b>Upload your Photo *</b></label>
						<input type="file" name="image"> <br>
					<!--	<script>$('.dropzone').html5imageupload();</script>  -->

						<button class="button" name="usr_button"><b>Sign Up</b></button>
					</form> <!-- End of the Form -->
				  </section>
				  <!-- END of the Section 1 -->

				  <section id="content2">
					<!-- Code for Form -->
					<form action="signup_sql.php" method="POST" enctype="multipart/form-data">
						<label><b>Name of Municipal Authority *</b></label>
			    		<input type="text" placeholder="Enter your name" name="au_name" pattern="^[A-Z][ a-zA-Z]+$" title="First Letter must be upper case and only space and characters are allowed" required> <br>

			    		<label><b>Create a User ID *</b></label>
			    		<input type="text" placeholder="User ID" name="au_id" pattern="^[a-z][a-z_]{1,20}[0-9]{1,15}$" title="start with at least 2 lower case and end with number, allowed only a-z,_,0-9" required>

			    		<label><b>Password *</b></label>
			    		<input type="Password" placeholder="Create a new password" name="au_pass" pattern="^[a-zA-Z0-9 .@#$%&*]{6,30}$" title="allowed a-z,A-Z,0-9.@ # $ % & * min 6 max 30" required>

			    		<label><b>Email *</b></label>
			    		<input type="text" placeholder="example@mail.com" name="au_mail" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Make sure a valid mail address" required>

			    		<label><b>Contact No *</b></label>
			    		<input type="text" placeholder="EX:01XXXXXXXXX " name="au_contact" required>

			    		<label><b>Home District *</b></label>
						<!--Dropdown for home District-->
						<input type="dropdown" name="au_hm_district" list="districts" class="home_dis_dropdown" placeholder="Start Typing Your District Name"  required/>
						<datalist id="districts">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM districts");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	$dis= $row['name'];
								       	?>
		
								         <option value="<?Php echo $dis ?>"></option>

								         <?php 
								       }
							?>
						</datalist>

			    		<label><b>Designation *</b></label>
			    		<input type="text" placeholder="EX: Chairman " name="au_designation" required>

			    		<label><b>Organization *</b></label>
			    		<input type="text" placeholder="EX: D.C. Office " name="au_organization" required>
						

			    		<label><b>Working Location *</b></label><br>
						<!--Dropdown for Divissions-->
						<input type="dropdown" name="au_division" list="divisions" class="dropdown" placeholder="<-- Divisions -->" required/>
						<datalist id="divisions">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM divisions");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	$div= $row['name'];
								       	?>
		
								         <option value="<?Php echo $div ?>"></option>

								         <?php 
								       }
							?>
						</datalist>


						<!--Dropdown for District-->
						<input type="dropdown" name="au_district" list="districts" class="dropdown" placeholder="<-- Districts -->"  required/>
						<datalist id="districts">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM districts");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	$dis= $row['name'];
								       	?>
		
								         <option value="<?Php echo $dis ?>"></option>

								         <?php 
								       }
							?>
						</datalist>


						<!--Dropdown for Divissions-->
						<input type="dropdown" name="au_upazila" list="upazilas" class="dropdown" placeholder="<-- Upazila -->"  required/>
						<datalist id="upazilas">
							<?php 
								$sql = mysqli_query($conn, "SELECT * FROM upazilas");
									while ($row = mysqli_fetch_array($sql)) 
								       {
								       	$upa= $row['name'];
								       	?>
		
								         <option value="<?Php echo $upa ?>"></option>

								         <?php 
								       }
							?>
						</datalist>

						 <br>

			    		<label><b>Valid NID no *</b></label>
			    		<input type="text" placeholder="BirthYearXXXXXXXXXXXX" name="au_nid" required>

			    		<label><b>Date of Birth *</b></label>
			    		<input type="Date" placeholder="dd-mm-yyyy" name="au_birth" required> <br>
			    		<label><b>Upload your Photo *</b></label>
						<input type="file" name="au_image" required> <br>
					<!--	<script>$('.dropzone').html5imageupload();</script>  -->

						<button class="button" name="au_button"><b>Sign Up</b></button>
					</form> <!-- End of the Form -->
				  </section>

				</main>

						<!-- Already Have an Account => One row with two column -->
					<div class="row_div">
						<div class="col_div">
							<p>Already Have an Account</p>
						</div>
						<div class="col_div" align="center">
							<p><a href="index.php">Sign In</a>.</p>
						</div>
					</div>
					<!-- End of Allready have an account => One row with two column -->
				</div>
			</div>
	</div>  <!-- End of the Container -->
	<footer>
		<!-- Google Language translation=> One row with two column -->	
				<div class="">
					<div class="" align="center">
						<p><div id="google_translate_element"></div></p>
					</div>
					<div class="" align="center">
						<p>&copy; Copyright- All right reserved <a href="" class="">Md.Moniruzzaman</a> Bangladesh</p>
					</div>
				</div>

				<!-- JavaScript Code for translate the page with help of Google -->
				<script type="text/javascript">
					function googleTranslateElementInit()
						{
				  			new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
						}
				</script>

				<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
				<!-- End of the Script -->
	</footer>
</body>
</html>