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
	$pharma_description = test_input($_POST['Comment']);
	$image_file = $_FILES['image_file']['name'];
	if($pharma_description == ""){$pharma_description = $Null_value;}
	
$target_dir = "../pescription/";
$target_file = $target_dir . basename($_FILES["image_file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));		

	
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image_file"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $error = "<span style='color:red;'>The uploaded file is not an image.</span>";
    $uploadOk = 0;
	echo $error;
  }
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $error = "<span style='color:red;'>Sorry, your file was not uploaded.</span>";
  echo $error;
// if everything is ok, try to upload file
}else {
  move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file);
	$sql2 = mysqli_prepare($connection,"INSERT INTO med_order (order_id, full_name, ph_no, address, email, img_loc, description) VALUES (?,?,?,?,?,?,?)");
	mysqli_stmt_bind_param($sql2, "sssssss",$Null_value,$pharma_full_name,$pharma_ph_no,$pharma_address,$pharma_email,$image_file,$pharma_description);
	mysqli_stmt_execute($sql2);
	if(mysqli_stmt_affected_rows($sql2) == 1){
		//query executed successfully
		echo "<span style='color:green;'>Your request has been submitted!</span>";
	}else{
	//query failed to execute
	 echo "<span style='color:red; font-size: 16px;'>There was an error!</span>";
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