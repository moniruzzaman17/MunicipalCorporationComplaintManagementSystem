<?php include 'connection.php';?>
<?php
session_start();

	//variables to hold our submitted data with post
	$user_id_or_mail_add = $_POST['mail'];
	//Encrypting our login password
	$pass = $_POST['password'];
	$type = $_POST['type'];
	$user="user";
	$authority="authority";

	 //loging condition      
	if(isset($_POST['button1']))
	{
		if($type==$user)
		{
			//our sql statement that we will execute
			$sql = mysqli_query($conn, "SELECT user_name, mail_address, password, status FROM user_info WHERE mail_address = '$user_id_or_mail_add' OR user_name = '$user_id_or_mail_add'");

			$row = mysqli_fetch_array($sql);

			if($row["password"]==$pass && $row["mail_address"]==$user_id_or_mail_add || $row["user_name"]==$user_id_or_mail_add)
			{
				if ($row["status"]==1) {

				#************************************************#
						//query for get the loged user full name
						$sql = mysqli_query($conn, "SELECT * FROM user_info WHERE mail_address = '$user_id_or_mail_add' OR user_name = '$user_id_or_mail_add'");
							while ($row = mysqli_fetch_array($sql)) 
						       {
						       	$_SESSION["user_fullname"]= $row['full_name'];  //hold the user full name into Global variable
						       	$_SESSION["user_id"]= $row['user_name'];  //hold the user id into Global variable
						       }
				#*************************************************#
				$_SESSION["loged"] = true;
			    header("Location: http://localhost/MCCMS/home_general.php"); 
			mysqli_close($conn); //close the connection
				}
				else{
				echo "<script>alert('You are Suspended by Authority, THANK YOU'); window.location='index.php'</script>";
				}
			}
			else
			{
				echo "<script>alert('Invalid Input!'); window.location='index.php'</script>";
			mysqli_close($conn); //close the connection
			}
		}
		else if($type==$authority)
		{
			//our sql statement that we will execute
			$sql = mysqli_query($conn, "SELECT au_user_id, au_email, au_password, status FROM authority_info WHERE au_email = '$user_id_or_mail_add' OR au_user_id = '$user_id_or_mail_add'");

			$row = mysqli_fetch_array($sql);

			if($row["au_password"]==$pass && $row["au_email"]==$user_id_or_mail_add || $row["au_user_id"]==$user_id_or_mail_add)
			{
				if ($row["status"]==1) {
					
				#************************************************#
						//query for get the loged user full name
						$sql = mysqli_query($conn, "SELECT * FROM authority_info WHERE au_email = '$user_id_or_mail_add' OR au_user_id = '$user_id_or_mail_add'");
							while ($row = mysqli_fetch_array($sql)) 
						       {
						       	$_SESSION["au_fullname"]= $row['au_name'];  //hold the user full name into Global variable
						       }
				#*************************************************#
				$_SESSION["loged"] = true;
			echo "<script>window.location='authority/au_dashboard.php'</script>";
					mysqli_close($conn); //close the connection
				}
				else{
				echo "<script>alert('Sorry! Your Account is pending for Admin Review. THANK YOU'); window.location='index.php'</script>";
				}
			}
			else
			{
				echo "<script>alert('Invalid Input!'); window.location='index.php'</script>";
			mysqli_close($conn); //close the connection
			}
		}
		else
		{
			echo "<script>alert('Invalid Input!'); window.location='index.php'</script>";
		}
	}
				?>