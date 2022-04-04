<style>

</style>
<?php
require_once('connection.php');
date_default_timezone_set("Asia/Kolkata");
	// Start the session
	//session_start();
$error = '';
$pharma_full_name = $pharma_ph_no = $pharma_address = $pharma_email = $image_file = $pharma_description = "";
	$Null_value = NULL;
	$pharma_full_name = test_input($_POST['user_name']);
	$pharma_ph_no = test_input($_POST['Ph-no']);
	$pharma_address = test_input($_POST['address']);
	$pharma_email = test_input($_POST['email']);
	$patha_testtype = $_POST['test'];
	$pharma_description = test_input($_POST['Comment']);
	$book_date = $_POST['patha_date'];
	if($pharma_description == ""){$pharma_description = $Null_value;}

	$sql2 = mysqli_prepare($connection,"INSERT INTO pathalogy_order (order_id, full_name, ph_no, address, email, test, date, description) VALUES (?,?,?,?,?,?,?,?)");
	mysqli_stmt_bind_param($sql2, "ssssssss",$Null_value,$pharma_full_name,$pharma_ph_no,$pharma_address,$pharma_email,$patha_testtype,$book_date,$pharma_description);
	mysqli_stmt_execute($sql2);
	if(mysqli_stmt_affected_rows($sql2) == 1){
		//query executed successfully
		echo "<span style='color:green;'>Your request has been submitted!</span>";
	}else{
	//query failed to execute
	 echo "<span style='color:red; font-size: 16px;'>There was an error!</span>";
	 //echo("Error description: " . mysqli_error($connection));
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