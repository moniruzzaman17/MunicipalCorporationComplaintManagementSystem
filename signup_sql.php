<?php include 'connection.php';?>

<?php
 	//check unique user name   
	if(isset($_POST['usr_button']))
	{

		// Get value for user registration
		$name 				=	$_POST['full_nm'];
		$user 				=	$_POST['user_nm'];
		$pass 				=	$_POST['pass'];
		$mail 				=	$_POST['mail'];
		$division 			=	$_POST['division'];
		$district 			=	$_POST['district'];
		$upazila 			=	$_POST['upazila'];
		$nid 				=	$_POST['nid'];
		$birth_date 		=	$_POST['d_birth'];
		$location 			=	$_FILES["image"]["name"];
		// END



		//for getting upazila code from database
		$get_upazila_code = mysqli_query($conn, "SELECT id FROM upazilas WHERE name='$upazila'");
				while ($row = mysqli_fetch_array($get_upazila_code)) 
			       {
			       	$upa_code= $row['id'];
			       }

		//for getting District code from database
		$get_district_code = mysqli_query($conn, "SELECT id FROM districts WHERE name='$district'");
				while ($row = mysqli_fetch_array($get_district_code)) 
			       {
			       	$dis_code= $row['id'];
			       }


		//sql checking unique user id
		$sql = mysqli_query($conn, "SELECT user_name FROM user_info WHERE user_name= '$user'");

		$row = mysqli_fetch_array($sql);

			if($row["user_name"]==$user)
			{  ?>

				<script>
					alert('User name cannot be same Choose another one');
					window.location='signup.php';
				</script>

				<?php
			}
			else
			    {
				move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);	
					//for insertion the user data into database
					$sql1= "INSERT INTO user_info(user_name, full_name, password, mail_address, district_name, district_code, upazila_name, upazila_code, nid_no, date_birth, division_name, profile_image) VALUES('$user', '$name', '$pass', '$mail', '$district', '$dis_code', '$upazila', '$upa_code', '$nid', '$birth_date', '$division', '$location')";

							if(mysqli_query($conn, $sql1)) 
							{ 
								echo "<script>alert('You are Successfully Registered!!!'); window.location='index.php'</script>";
							}

							else {
								echo "<script>alert('You are Successfully Registered!!!'); window.location='signup.php'</script>";
							}

							mysqli_close($conn);

							//header("Location: http://localhost/MCCMS/signup.php"); 
			    }
	}
	// END of the User registration


	//Code for Authority person registration

	if(isset($_POST['au_button']))
	{

		// Getting value for Authority registration
		$au_name 			=	$_POST['au_name'];
		$au_id 				=	$_POST['au_id'];
		$au_pass 			=	$_POST['au_pass'];
		$au_email 			=	$_POST['au_mail'];
		$au_contact			=	$_POST['au_contact'];
		$au_hm_district 	=	$_POST['au_hm_district'];
		$au_designation		=	$_POST['au_designation'];
		$au_organization	=	$_POST['au_organization'];
		$au_wr_div 			=	$_POST['au_division'];
		$au_wr_dist			=	$_POST['au_district'];
		$au_wr_upa 			=	$_POST['au_upazila'];
		$au_nid 			=	$_POST['au_nid'];
		$au_birth_date 		=	$_POST['au_birth'];
		$reg_date 			=	date('Y-m-d');
		$au_pro_img 		=	$_FILES["au_image"]["name"];
		// END

		
 	//check unique user name  
		$sql = mysqli_query($conn, "SELECT au_user_id FROM authority_info WHERE au_user_id= '$au_id'");

		$row = mysqli_fetch_array($sql);

			if($row["au_user_id"]==$au_id)
			{  ?>

				<script>
					alert('User ID already exist Please Choose another one');
					window.location='signup.php';
				</script>

				<?php
			}
			else
			    {
				move_uploaded_file($_FILES["au_image"]["tmp_name"],"authority/uploads/" . $_FILES["au_image"]["name"]);	
					//for insertion the user data into database
					$sql1= "INSERT INTO authority_info(au_name, au_user_id, au_password, au_email, contact, au_home_district, designation, organization, working_division, working_district, working_upazila, au_nid, date_birth, reg_date, pro_image) VALUES('$au_name', '$au_id', '$au_pass', '$au_email', '$au_contact', '$au_hm_district', '$au_designation', '$au_organization', '$au_wr_div', '$au_wr_dist', '$au_wr_upa', '$au_nid', '$au_birth_date', '$reg_date', '$au_pro_img')";

							if(mysqli_query($conn, $sql1)) 
							{ 
								echo "<script>alert('Your Registration is Pending for Admin Review. We will Notify. THANK YOU'); window.location='index.php'</script>";
							}

							else {
								echo "<script>alert('Not Registered'); window.location='signup.php'</script>";
							}

							mysqli_close($conn);

							//header("Location: http://localhost/MCCMS/signup.php"); 
			    }
	}
?> 