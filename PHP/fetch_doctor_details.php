<style>
.view_his_data_row{
	padding:25px;
	margin-top:30px;
	height:auto;
	width:100%;
	border: 2px solid #ccc;
	/*display:inline-block;
	margin-left:30px;*/
}
.view_his_data_row details  > summary{
	font-family: "Times New Roman", Times, serif;
    font-size: 15px;
    margin-top: 20px;
    font-weight: 400;
    cursor: pointer;
    margin-bottom: 20px;
}
.patient_details{
	border-left: 8px solid #008000;
	font-family: Georgia, serif;
	padding-left:20px;
	margin-bottom:30px;
	margin-top:20px;
}
.patient_details h1{
	font-size: 20px;
	color: #008000;
	font-weight:400;
}
.patient_details h3, .doctor_details h3{
	font-size: 15px;
	margin-top:0;
	font-weight:400;
}
.doctor_details{
	border-left: 8px solid #3399ff;
	font-size: 15px;
	padding-left:20px;
}
.doctor_details h1{
	font-size: 20px;
	color: #3399ff;
	font-weight:400;
}

</style>
<?php
session_start();
	require_once('connection.php');
	$department = $_POST['department'];
	$sql= "SELECT * FROM doctor_details WHERE department = '$department'";
	$results = mysqli_query($connection, $sql);
	$output='';
	
	while($row= mysqli_fetch_assoc($results)){
		$output = '
		<div class="view_his_data_row">
		<details>
		<summary>
		<span style="color:#3399ff;">Dr. '. $row['doc_name'] .'</span><br><br>
		'. $department .' | '.$row['qualification'].'</summary><hr>
		
		<div class="doctor_details">
		<h1>Doctor Details</h1>
		<h3><b>Ph no:</b> ' .$row['doc_number']. '</h3>
		<h3><b>Alt no:</b> ' .$row['doc_alt_number']. '</h3>
		<h3><b>Email:</b> ' .$row['doc_email']. '</h3>
		<h3><b>Specialization:</b> ' .$row['specialization']. '</h3>
		</div>
		</details>
		</div>
		';
		echo $output;
	}
	mysqli_close($connection);	
?>