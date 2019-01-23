<?php
$db_name="mccms_db";
$host="localhost";
$username="root";
$password="";

$conn= mysqli_connect($host,$username,$password,$db_name);
mysqli_query($conn,'SET CHARACTER SET utf8'); 
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
/*
if($conn) {
	echo "Connection Successfully";
}
else {
	echo "Connection Failed!!";
}
?>
*/