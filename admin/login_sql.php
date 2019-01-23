<?php include '../connection.php';?>
<?php
session_start();

	//variables to hold our submitted data with post
	$mail_or_username = $_POST['mail'];
	//Encrypting our login password
	$pass = $_POST['password'];

#************************************************#
		//query for get the loged user full name
		$sql = mysqli_query($conn, "SELECT name FROM admin WHERE email = '$mail_or_username' OR user_id='$mail_or_username'");
			while ($row = mysqli_fetch_array($sql)) 
		       {
		       	$_SESSION["user_fullname"]= $row['name'];  //hold the user full name into global variable
		       }

				
		
#*************************************************#
					 //loging condition      
					if(isset($_POST['button1']))
					{
						//our sql statement that we will execute
						$sql = mysqli_query($conn, "SELECT email, user_id, password FROM admin WHERE email = '$mail_or_username' OR user_id='$mail_or_username'");

						$row = mysqli_fetch_array($sql);

						if($row["email"]==$mail_or_username || $row["user_id"]==$mail_or_username && $row["password"]==$pass)
						{
							$_SESSION["loged"] = true;
						    header("Location: http://localhost/MCCMS/admin/home_general.php"); 
						mysqli_close($conn); //close the connection
						}
						else
						{
							echo "<script>alert('Incorrect User Name or Password!'); window.location='index.php'</script>";
						mysqli_close($conn); //close the connection
						}
					}
				?>