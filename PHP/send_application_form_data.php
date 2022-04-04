<style>

</style>
<?php
require_once('connection.php');
date_default_timezone_set("Asia/Kolkata");
	// Start the session
	//session_start();
$error = '';
$client_full_name = $client_email = $client_gender = $client_DOB = $client_ph_no = $selected_department = $selected_doctor = $appt_date = $appt_time = "";
	$Null_value = NULL;
	$client_full_name = test_input($_POST['client_full_name']);
	$client_email = test_input($_POST['client_email']);
	$client_gender = test_input($_POST['client_gender']);
	$client_DOB = test_input($_POST['client_DOB']);
	$client_ph_no = test_input($_POST['client_ph_no']);
	$selected_department = test_input($_POST['selected_department']);
	$selected_doctor = test_input($_POST['selected_doctor']);
	$appt_date = test_input($_POST['appt_date']);
	$appt_time = test_input($_POST['appt_time']);
	if(!empty($_POST["selected_doctor"]) && !empty($_POST["selected_department"])){
	$sql = "SELECT DISTINCT doc_id FROM doctor_details WHERE doc_name = '$selected_doctor' AND department = '$selected_department'";
	$results = mysqli_query($connection, $sql);
	while($row= mysqli_fetch_assoc($results)){
			$doc_id = $row["doc_id"];
	}
	}else {
		$error = "<span style='color:red;'>There was an error, Plese contat the Admin !</span>";
		echo $error;
	}
	
	if($error == ''){
	$sql2 = mysqli_prepare($connection,"INSERT INTO appointment_data (appointment_id, patient_name, email, gender, d_o_b, phone_number, department, doc_selected, doc_id, appt_date, appt_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($sql2, "sssssssssss",$Null_value,$client_full_name,$client_email,$client_gender,$client_DOB,$client_ph_no,$selected_department,$selected_doctor,$doc_id ,$appt_date,$appt_time);
	mysqli_stmt_execute($sql2);
	if(mysqli_stmt_affected_rows($sql2) == 1){
		//query executed successfully
		$sql3 = "SELECT * FROM appointment_data WHERE patient_name = '$client_full_name' AND email = '$client_email' AND gender = '$client_gender' AND d_o_b = '$client_DOB' AND phone_number = '$client_ph_no' AND appt_date = '$appt_date' AND appt_time = '$appt_time'";
	$results2 = mysqli_query($connection, $sql3);
	while($row= mysqli_fetch_assoc($results2)){
			 $appt_id = $row["appointment_id"];
			 
	 echo  "<div class='confirmation' style='padding:15px; border:2px solid #888;'>
	 <h1 style='font-weight:400; font-size:25px;'>Appointment Id: <span style='color:#00a6e5'>".$appt_id." </span></h1><hr>
	 <h2 style='font-weight:400; font-size:14px;'><b>".$client_full_name. "</b>, your Appointment has been booked on <span style='color:green;'>".date_format(date_create($row["appt_date"]),"l jS F Y")."</span> at 
	 <span style='color:green;'>".date_format(date_create($row["appt_time"]),"g:ia") ."</span>.</h2>
	 <p style='font-size:14px;'><b>Doctor Detail:</b> Dr. ".$selected_doctor."(".$selected_department.").</p>
	 <p style='margin-top:60px;font-size:14px;'>Thank you for using our health care portal,<br>
	 \"Empowering People to Improve Their Lives\" <span style='color:#00a6e5; font-size:18px; '>
	 <br>ABCD</span> Hospital</p></div>";
	}
}else{
	//query failed to execute
	 echo "<span style='color:red; font-size: 16px;'>There was an error!</span>"."<br>";
	 //echo("Error description: " . mysqli_error($connection));
}
}
mysqli_stmt_close($sql2);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

mysqli_close($connection);
?>