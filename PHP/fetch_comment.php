<style>
.submission_time, .reviewer_name {
	margin: 5px 0;
}
.submission_time{
	font-weight:400;
}
.reviewer_name {
font-family: Verdana, sans-serif;
}
.section_top{
	background-color:#00a6e5;
	color:#fff;
	padding:15px;
}
.message_comment{
	font-size:14px;
	padding:15px;
	border:2px solid #ccc;
	border-top:0;
	max-height: 200px;
  overflow: auto;
}
</style>
<?php
	require_once('connection.php');
	$sql= "SELECT * FROM feedback_db ORDER BY comment_id DESC";
	$results = mysqli_query($connection, $sql);
	$output='';
	
	while($row= mysqli_fetch_assoc($results)){
		$date = strtotime('+330 minutes',strtotime($row["time"]));
		$date_format = date("h:i a"." / "." d-M-Y ", $date);
		$output = '
		<div class="review">
		<div class="section_top">
		<h3 class="reviewer_name" style="">' . $row["full_name"].'</h3>
		<h6 class="submission_time" style="">'. $date_format.'</h6></div>
		<div class="message_comment">'.
		$row["comment"].
		'</div>
		</div>';
		echo $output;
	}
	
?>