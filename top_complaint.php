<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MCCMS</title>
	<!-- <link rel="stylesheet" href="../css/profile.css"> -->
	<link rel="stylesheet" href="css/tab_content.css">
	<!-- <link rel="stylesheet" href="css/style.css"> -->
<style>
	.table_content1{
		width: 100%!important; 
		table-layout: fixed!important;
	}
	.table_content1 thead th{
		font-size: 18px;
		width: 30%;
	}

	table tbody td{
		width: auto!important; 
		text-align: center!important; 
		overflow: hidden!important; 
		/*text-overflow:ellipsis!important;*/
		font-size: 17px!important;
	}


.top_complaint_section1_print_btn{
	float: right;
	border: 1px solid gray;
	background: #e44d3a;
	color: white;
	padding: 4px;
	margin-right: 2px;
}
</style>
</head>
<body>
	<?php include 'header.php'; ?>

<!--Container Div-->

<div class="container">
	<div class="main_info" style="width: 98%;">
		<div id="about_me">
			<main style="margin-top: 5%;">
			<h1 align="center">TOP COMPLAINT</h1>
			  <input class="input" id="tab1" type="radio" name="tabs" checked>
			  <label class="tab_label" for="tab1">Current Month</label>

			  <input class="input" id="tab2" type="radio" name="tabs">
			  <label class="tab_label" for="tab2">Privious Month</label>

			  <input class="input" id="tab3" type="radio" name="tabs">
			  <label class="tab_label" for="tab3">All Complaint</label>
			<!--parent tab content Section 1 -->
			<section id="content1" style="margin-right: 2%;">
				<?php echo date('F-Y'); ?> (<?php echo date('01-F'); ?> to <?php echo "today"; ?>)
				<button class="top_complaint_section1_print_btn" onclick="printDiv('section1')">Print this page</button>
				<div id="section1">
				<table class="table_content1">
					<thead>
						<tr align="center" style="background-color: rgba(255,99,71,0.4);">
							<th style="padding:2.5px; width: 3%; text-decoration: none;" rowspan="2">Serial</th>
							<th style="padding:2.5px; width: 50%; text-decoration: none;" rowspan="2">Complaint Title</th>
							<th style="padding:2.5px; width: 8%; text-decoration: none;" rowspan="2">Total Comment</th>
							<th style="padding:2.5px;" colspan="4">Rating</th>
						</tr>
						<tr align="center" style="background-color: rgba(255,99,71,0.4);">
							<td>important</td>
							<td>more important</td>
							<td>most important</td>
							<td>Total Rating</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						$current_start_date=date('Y-m-01');
						$current_end_date=date('Y-m-t');
						// $Privious_last_date=date('Y-m-t', strtotime("last month"));
							$sql=mysqli_query($conn, "SELECT * FROM complaint, rating_overview WHERE complaint.post_id=rating_overview.post_id AND complaint.post_date>='$current_start_date' AND complaint.post_date<='$current_end_date' ORDER BY rating_overview.total_rating DESC");
								$sl=1;
							while ($row=mysqli_fetch_array($sql)) {
							    $post_id= $row['post_id'];

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

					       $total_count=$less_count+$im_count+$most_count;

					       #COunt total comment
				       $sql_comment_count = mysqli_query($conn, "SELECT COUNT(com_text) FROM comment WHERE post_id=$post_id");
						while ($row_c_count = mysqli_fetch_array($sql_comment_count)) 
					       {
					       	$comment_count= $row_c_count['COUNT(com_text)'];
					       }


					       #COunt total Replay
				       $sql_reply_count = mysqli_query($conn, "SELECT COUNT(rep_text) FROM reply WHERE post_id=$post_id");
						while ($row_r_count = mysqli_fetch_array($sql_reply_count)) 
					       {
					       	$reply_count= $row_r_count['COUNT(rep_text)'];
					       }

					       $total_comment= $comment_count+$reply_count;
						?>
						<tr>
							<td><?php echo $sl; ?></td>
							<td><a href="#"  onclick="MyWindow=window.open('single_post_view.php?post_id=<?php echo $row['post_id']; ?>', 'MyWindow', 'width=1000', 'height=200'); return false;"><?php echo $row['post_title']; ?></a></td>
							<td><?php echo $total_comment; ?></td>
							<td><?php echo $less_count; ?></td>
							<td><?php echo $im_count; ?></td>
							<td><?php echo $most_count; ?></td>
							<td style="background-color: rgba(255,99,71,0.4);"><?php echo $total_count; ?></td>
						</tr>
						<?php
						$sl++;
							}
							?>
					</tbody>
				</table>
				</div>
			</section>
			<!--END of the parent tab content Section 1 -->

			<!--parent tab content Section 2 -->
			<section id="content2" style="margin-right: 2%;">
				<?php 
					$current_start_date=date('Y-m-01', strtotime("last month"));
					$current_end_date=date('Y-m-t', strtotime("last month"));
				?>
				<?php echo date('F-Y', strtotime("last month")); ?>
				<button class="top_complaint_section1_print_btn" onclick="printDiv('section1')">Print this page</button>
				<table class="table_content1">
					<thead>
						<tr align="center" style="background-color: rgba(255,99,71,0.4);">
							<th style="padding:2.5px; width: 3%; text-decoration: none;" rowspan="2">Serial</th>
							<th style="padding:2.5px; width: 50%; text-decoration: none;" rowspan="2">Complaint Title</th>
							<th style="padding:2.5px; width: 8%; text-decoration: none;" rowspan="2">Total Comment</th>
							<th style="padding:2.5px;" colspan="4">Rating</th>
						</tr>
						<tr align="center" style="background-color: rgba(255,99,71,0.4);">
							<td>important</td>
							<td>more important</td>
							<td>most important</td>
							<td>Total Rating</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						// $Privious_last_date=date('Y-m-t', strtotime("last month"));
							$sql=mysqli_query($conn, "SELECT * FROM complaint, rating_overview WHERE complaint.post_id=rating_overview.post_id AND complaint.post_date>='$current_start_date' AND complaint.post_date<='$current_end_date' ORDER BY rating_overview.total_rating DESC");
								$sl=1;
							while ($row=mysqli_fetch_array($sql)) {
							    $post_id= $row['post_id'];

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

					       $total_count=$less_count+$im_count+$most_count;

					       #COunt total comment
				       $sql_comment_count = mysqli_query($conn, "SELECT COUNT(com_text) FROM comment WHERE post_id=$post_id");
						while ($row_c_count = mysqli_fetch_array($sql_comment_count)) 
					       {
					       	$comment_count= $row_c_count['COUNT(com_text)'];
					       }


					       #COunt total Replay
				       $sql_reply_count = mysqli_query($conn, "SELECT COUNT(rep_text) FROM reply WHERE post_id=$post_id");
						while ($row_r_count = mysqli_fetch_array($sql_reply_count)) 
					       {
					       	$reply_count= $row_r_count['COUNT(rep_text)'];
					       }

					       $total_comment= $comment_count+$reply_count;
						?>
						<tr>
							<td><?php echo $sl; ?></td>
							<td><a href="#"  onclick="MyWindow=window.open('single_post_view.php?post_id=<?php echo $row['post_id']; ?>', 'MyWindow', 'width=1000', 'height=200'); return false;"><?php echo $row['post_title']; ?></a></td>
							<td><?php echo $total_comment; ?></td>
							<td><?php echo $less_count; ?></td>
							<td><?php echo $im_count; ?></td>
							<td><?php echo $most_count; ?></td>
							<td style="background-color: rgba(255,99,71,0.4);"><?php echo $total_count; ?></td>
						</tr>
						<?php
						$sl++;
							}
							?>
					</tbody>
				</table>
			</section>
			<!--END of the tab content Section 2 -->

			<!-- Tab content Section 3 -->
			<section id="content3" style="margin-right: 2%;">
				<button class="top_complaint_section1_print_btn" onclick="printDiv('section1')">Print this page</button>
				<div id="section1">
				<table class="table_content1">
					<thead>
						<tr align="center" style="background-color: rgba(255,99,71,0.4);">
							<th style="padding:2.5px; width: 3%; text-decoration: none;" rowspan="2">Serial</th>
							<th style="padding:2.5px; width: 50%; text-decoration: none;" rowspan="2">Complaint Title</th>
							<th style="padding:2.5px; width: 8%; text-decoration: none;" rowspan="2">Total Comment</th>
							<th style="padding:2.5px;" colspan="4">Rating</th>
						</tr>
						<tr align="center" style="background-color: rgba(255,99,71,0.4);">
							<td>important</td>
							<td>more important</td>
							<td>most important</td>
							<td>Total Rating</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						// $current_start_date=date('Y-m-01');
						// $current_end_date=date('Y-m-t');
						// $Privious_last_date=date('Y-m-t', strtotime("last month"));
							$sql=mysqli_query($conn, "SELECT * FROM complaint, rating_overview WHERE complaint.post_id=rating_overview.post_id ORDER BY rating_overview.total_rating DESC");
								$sl=1;
							while ($row=mysqli_fetch_array($sql)) {
							    $post_id= $row['post_id'];

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

					       $total_count=$less_count+$im_count+$most_count;

					       #COunt total comment
				       $sql_comment_count = mysqli_query($conn, "SELECT COUNT(com_text) FROM comment WHERE post_id=$post_id");
						while ($row_c_count = mysqli_fetch_array($sql_comment_count)) 
					       {
					       	$comment_count= $row_c_count['COUNT(com_text)'];
					       }


					       #COunt total Replay
				       $sql_reply_count = mysqli_query($conn, "SELECT COUNT(rep_text) FROM reply WHERE post_id=$post_id");
						while ($row_r_count = mysqli_fetch_array($sql_reply_count)) 
					       {
					       	$reply_count= $row_r_count['COUNT(rep_text)'];
					       }

					       $total_comment= $comment_count+$reply_count;
						?>
						<tr>
							<td><?php echo $sl; ?></td>
							<td><a href="#"  onclick="MyWindow=window.open('single_post_view.php?post_id=<?php echo $row['post_id']; ?>', 'MyWindow', 'width=1000', 'height=200'); return false;"><?php echo $row['post_title']; ?></a></td>
							<td><?php echo $total_comment; ?></td>
							<td><?php echo $less_count; ?></td>
							<td><?php echo $im_count; ?></td>
							<td><?php echo $most_count; ?></td>
							<td style="background-color: rgba(255,99,71,0.4);"><?php echo $total_count; ?></td>
						</tr>
						<?php
						$sl++;
							}
							?>
					</tbody>
				</table>
				</div>
			</section>
		</div>
	</div>
</div>

<script>
	function printDiv(div_name) {
     var printContents = document.getElementById(div_name).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>