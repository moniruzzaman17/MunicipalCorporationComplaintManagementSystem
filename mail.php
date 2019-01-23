<?php
include 'connection.php';
session_start();
// mail function
function send_email($email,$subject,$msg,$header)
{
	return mail($email,$subject,$msg,$header);
}


$email=$_POST['mail'];
$_SESSION['email']=$email;
$sql=mysqli_query($conn, "SELECT * FROM user_info, authority_info WHERE user_info.mail_address='$email' OR authority_info.au_email='$email'");
if (mysqli_fetch_array($sql)) {
	$v_code=$_POST['v_original_code'];
$_SESSION['or_code']=$v_code;

	$subject="Password Reset Verification Code from MCCMS";

	$message="Here is your password reset code {$v_code}";
	$headers="From: MCCMS.info";

	if (send_email($email,$subject,$message,$headers)) {
	echo "<script>alert('Check your mail for verification code'); window.location='forget_pass.php'</script>";
	$_SESSION['send']=true;
	 }
	 else
	 {
	 	echo "not";
	 }
}
else
{
	echo "<script>alert('Your Entered Email address is not valid'); window.location='forget_pass.php'</script>";
}


?> 