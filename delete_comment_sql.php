<?php include 'connection.php';?>

<?php

	if (isset($_POST['submit'])) 
	{
//GETTING Value
$com_id=$_POST['comment_id'];
$page_location=$_POST['page_location'];
$post_id=$_POST['post_id'];
		$sql="DELETE FROM comment WHERE com_id=$com_id";

		if(mysqli_query($conn, $sql)) 
			{ 
					header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$post_id);
			mysqli_close($conn);
			}
	}

	if (isset($_POST['rep_submit'])) 
	{
		//GETTING Value
		$com_id 		=	$_POST['comment_id'];
		$page_location	=	$_POST['page_location'];
		$rep_id 		=	$_POST['rep_id'];
		$sql="DELETE FROM reply WHERE rep_id=$rep_id";

		if(mysqli_query($conn, $sql)) 
			{ 
					header('Location: http://localhost/MCCMS/'.$page_location.'.php#'.$com_id);
			mysqli_close($conn);
			}
	}


?>