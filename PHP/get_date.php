<style>
.selected_time{
	display:inline-block;
	vertical-align:top;
	padding:12px 16px;
	border: 1px solid #00a6e5;
	cursor:pointer;
	margin-right:20px;
}
.selected_time:hover{
	background:#00a6e5;
	color:#fff;
}
.selected{
	background:#00a6e5;
	color:#fff;
}
</style>
<?php
	require_once('connection.php');
	$Date = $_POST['Date'];
	$Doc_Name = $_POST['doc_name'];
	$Doc_Dept = $_POST['doc_dept'];
	$sql= "SELECT * FROM doc_timeslot WHERE doc_name = '$Doc_Name' AND department = '$Doc_Dept' AND Day = '$Date' ORDER BY doc_timeslot.time ASC";
	$results = mysqli_query($connection, $sql);
	$output='';
	if (mysqli_num_rows($results) > 0){
		while($row = mysqli_fetch_assoc($results)){
		$output = '<div id="selected_time" class="selected_time">'.$row["time"].'</div>';
		echo $output;
	}
	}else{
		$output =  "<span style='color:red;'>Sorry He is not available for this day, please try other days.</span>";
		echo $output;
	}
	
mysqli_close($connection);
	
?>
<input id="appt_time" type="hidden" name="selected_time" value="" />
<script>
$(".selected_time").click(function() {
	$(".selected_time").removeClass("selected");//for removing previous active button
    $(this).addClass('selected');
  var time = $(this).text();
  $('#appt_time').val(time);
  });
</script>