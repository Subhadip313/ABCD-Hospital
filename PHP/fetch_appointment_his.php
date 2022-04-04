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
	$user_email = $_SESSION["User_Email"];
	$sql= "SELECT * FROM appointment_data WHERE email = '$user_email' ORDER BY appointment_data.timestamp DESC";
	$results = mysqli_query($connection, $sql);
	$output='';
	
	while($row= mysqli_fetch_assoc($results)){
		$date = strtotime('+330 minutes',strtotime($row["timestamp"]));
		$date_format = date("d-M-Y", $date);
		$booking_date = date("d-M-Y",strtotime($row['appt_date']) );
		$booking_time = date ("h:i a",strtotime($row['appt_time']));
		$patient_dob = date("d-M-Y",strtotime($row['d_o_b']) );
		
		$output = '
		<div class="view_his_data_row">
		<details>
		<summary>
		Appointment Id: <b>'. $row['appointment_id'] .'</b>
		<span style="float:right;">'. $date_format .'</span> </summary><hr>
		
		<div class="patient_details">
		<h1>Patient Details</h1>
		
		<h3> Patient Name: '. $row['patient_name'] .'</h3>
		<h3>Booking Date: '. $booking_date.'</h3>
		<h3>Booking Time: '. $booking_time.'</h3>
		<h3>Patient DOB: '. $patient_dob.'</h3>
		<h3>Patient Phone No: '. $row['phone_number'].'</h3>
		</div>
		
		<div class="doctor_details">
		<h1>Doctor Details</h1>
		
		<h3>Doctor Name: Dr. ' .$row['doc_selected']. '</h3>
		<h3>Doctor Department: ' .$row['department']. '</h3>
		</div>
		</details>
		</div>
		';
		echo $output;
	}
	mysqli_close($connection);	
?>