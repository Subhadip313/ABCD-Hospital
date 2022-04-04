<?php
require_once('connection.php');
date_default_timezone_set("Asia/Kolkata");
	// Start the session
	//session_start();
$error = '';
$comment_name = '';
$Comment_email = '';
$comment_content = '';

if(!empty($_POST["user_email"])){
	//$comment_name = mysqli_real_escape_string($connection,$_POST['comment_name']);
	$Comment_email = mysqli_real_escape_string($connection,$_POST['user_email']);
	$sql = "SELECT * FROM feedback_db WHERE user_email = '$Comment_email'";
	$results = mysqli_query($connection, $sql);
	while($row= mysqli_fetch_assoc($results)){
			$error = "<span style='color:red;'>Sorry! You have already submitted one Feedback with this Email Id. If it is not done by you please contact the Admin. </span>";
	}
}else{
	$error ="<span style='color:red;'>There was an error, Plese contat the Admin !</span>";
}
if($error == ''){
	$Null_value = NULL;
	$comment_name = test_input($_POST['comment_name']);
	$Comment_email = test_input($_POST['user_email']);
	$comment_content = test_input($_POST['Comment']);
	$sql2 = mysqli_prepare($connection,"INSERT INTO feedback_db (comment_id, full_name, user_email, comment) VALUES (?,?,?,?)");
	mysqli_stmt_bind_param($sql2, "ssss",$Null_value,$comment_name,$Comment_email,$comment_content);
	mysqli_stmt_execute($sql2);
	if(mysqli_stmt_affected_rows($sql2) == 1){
		//query executed successfully
	 echo  "<span style='color:green; font-size:16px;'>".$comment_name. ", your comment has been added.</span>";
}else{
	//query failed to execute
	 echo "<span style='color:red; font-size: 16px;'>There was an error!</span>"."<br>";
	 //echo("Error description: " . mysqli_error($connection));
}
mysqli_stmt_close($sql2);
}else{
	echo $error;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

mysqli_close($connection);
?>