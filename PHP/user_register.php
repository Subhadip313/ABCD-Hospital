<?php 
 require_once('connection.php');
 // Start the session
	session_start();
  $User_Name=$User_Email=$User_Pass= "";
	
  if(isset($_POST['register'])){
    $User_Name=mysqli_real_escape_string($connection,$_POST['user_name']);
    $User_Email=mysqli_real_escape_string($connection,$_POST['email']);
    $User_Pass=mysqli_real_escape_string($connection,$_POST['psw']);
	$hashed_password = password_hash($User_Pass, PASSWORD_DEFAULT);
	// Set session variables and get the user info
	$_SESSION["User_Name"] = $User_Name;
	$_SESSION["User_Email"] = $User_Email;
	$Null_value = NULL;
	/* create a prepared statement */
	$sql=mysqli_prepare($connection,"
	INSERT INTO user_register (User_ID, User_Name, User_Email, User_Pass) VALUES (?,?,?,?)");
	/* bind parameters for markers */
		mysqli_stmt_bind_param($sql, "ssss",$Null_value,$User_Name,$User_Email,$hashed_password,);
		mysqli_stmt_execute($sql);
    //$result = mysqli_query($connection,$sql);
    if(mysqli_stmt_affected_rows($sql) == 1){
      
    header ('Location:../Welcome.php');
    exit;
        
        
    }else {
		//if the query failed to execute it will redirect to the following error page
		echo("Error description: " . mysqli_error($connection));
      header ('Location:error.php');
	  exit;
    }
	mysqli_stmt_close($sql);
	  }
  
	echo $_SESSION["User_Email"];
  mysqli_close($connection);
?>