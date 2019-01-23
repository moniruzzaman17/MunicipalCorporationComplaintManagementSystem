<?php include 'connection.php';?>
<?php session_start() ?>

<?php
//GETTING Value
$post_text=$_POST['status'];
$post_title=$_POST['status_title'];
$name=$_SESSION['user_fullname'];

//CODE for getting User ID from database
$sql = mysqli_query($conn, "SELECT user_name FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($sql)) 
	       {
	       	$user_id= $row['user_name'];
	       }

//for getting upazila code from database
$get_upazila_code = mysqli_query($conn, "SELECT upazila_code FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($get_upazila_code)) 
	       {
	       	$upa_code= $row['upazila_code'];
	       }

//for getting District code from database
$get_district_code = mysqli_query($conn, "SELECT district_code FROM user_info WHERE full_name='$name'");
		while ($row = mysqli_fetch_array($get_district_code)) 
	       {
	       	$dist_code= $row['district_code'];
	       }


#$extension=".jpg";
#$newfilename= date('dmYHis').$extension;

date_default_timezone_set('Asia/Dhaka');
if (isset($_FILES["post_image"]["name"]) && !empty($_FILES["post_image"]["name"])) {
$post_image=$_FILES["post_image"]["name"];
$expbanner=explode('.',$post_image);
$bannerexptype=$expbanner[1];
 $date = date('m/d/Yh:i:sa', time());
 $rand=rand(10000,99999);
 $encname=$date.$rand;
 $bannername=md5($encname).'.'.$bannerexptype;
}
else
{
	$bannername="";
}

 $post_date=date("Y-m-d");

$logic=false;
$sql_check=mysqli_query($conn, "SELECT post_status FROM user_info WHERE full_name='$name'");

$row_status=mysqli_fetch_array($sql_check);
	if ($row_status['post_status']==1) {
	$logic=true;
	}
 
//Button Clicking EVENT

if (isset($_POST['submit_general'])) {
	$post_type_g="Generel";

	//for insertion the user data into database
		$sql1= "INSERT INTO complaint(user_id, user_fullname, post_title, post_text, attatchment, date_time, post_type, upazila_code, district_code, post_date) VALUES('$user_id', '$name','$post_title', '$post_text', '$bannername',CURRENT_TIMESTAMP, '$post_type_g', '$upa_code', '$dist_code', '$post_date')";

	if ($logic==true) {
		if(mysqli_query($conn, $sql1)) 
			{ 
				if (isset($_FILES["post_image"]["name"]) || !empty($_FILES["post_image"]["name"])) {
			move_uploaded_file($_FILES["post_image"]["tmp_name"],"post_image/" . $bannername);   //moved file into folder
				}

				echo "<script>window.location='home_general.php'</script>";
			}

			else {
				echo "<script>alert('Post is not Successfully Submitted'); window.location='home_general.php'</script>";
			}

			mysqli_close($conn);
		}
	else
		{
			echo "<script>alert('Sorry your posting ability is suspended by Authority, THANK YOU'); window.location='home_general.php'</script>";
	}
}


if (isset($_POST['submit_crime'])) {
	$post_type_c="Crime";
	//for insertion the user data into database
		$sql2= "INSERT INTO complaint(user_id, user_fullname, post_title, post_text, attatchment, date_time, post_type, upazila_code, district_code, post_date) VALUES('$user_id', '$name', '$post_title', '$post_text', '$bannername', CURRENT_TIMESTAMP, '$post_type_c', '$upa_code', '$dist_code', '$post_date')";

	if ($logic==true) {
			if(mysqli_query($conn, $sql2)) 
				{ 
					move_uploaded_file($_FILES["post_image"]["tmp_name"],"post_image/" . $bannername);   //moved file into folder
					echo "<script>window.location='home_crime.php'</script>";
					mysqli_close($conn);
				}

			else {
				echo "<script>alert('Post is not Successfully Submitted'); window.location='home_crime.php'</script>";
			}

	}
	else
		{
			echo "<script>alert('Sorry your posting ability is suspended by Authority, THANK YOU'); window.location='home_crime.php'</script>";
		}
}
?>