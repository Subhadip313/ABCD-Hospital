<?php
	require_once('connection.php');
	// Start the session
	session_start();
	$error_login = '';
	if(empty($_POST["login_email"])){
		$error_login = "<span style='color:red'>The email address is required</span><hr>";
		echo $error_login;
		exit;
	}else{
		$User_Email = mysqli_real_escape_string($connection,$_POST['login_email']);
	}
	if(empty($_POST["login_psw"])){
		$error_login = "<span style='color:red'>The password is required</span><hr>";
		echo $error_login;
		exit;
	}else{
		$User_Pass = mysqli_real_escape_string($connection,$_POST['login_psw']);
		
	}
	if($error_login == ''){
		/* create a prepared statement */
		$sql = mysqli_prepare($connection,"SELECT * FROM user_register WHERE User_Email=?");
		/* bind parameters for markers */
		mysqli_stmt_bind_param($sql, "s", $User_Email);
		/* execute query */
		mysqli_stmt_execute($sql);
		/* bind result variables */
		mysqli_stmt_bind_result($sql, $User_ID,$User_Name,$User_Email,$User_Password, $User_TOJ);
		/*Store the result*/
		 mysqli_stmt_store_result($sql);
		/* fetch values */
		if (mysqli_stmt_affected_rows($sql) == 1) {
			mysqli_stmt_fetch($sql);
			if(password_verify($User_Pass,$User_Password)){
			$error_login = "true";
			echo $error_login;	
			$_SESSION["User_Name"] = $User_Name;
			$_SESSION["User_Email"] = $User_Email;
			}else{
				$error_login =  "<span style='color:red;'>The Email or Password that you have entered is incorrect</span><hr>";
				echo $error_login;
				exit;
			}
			
		}else{
			$error_login =  "<span style='color:red;'>The Email or Password that you have entered is incorrect</span><hr>";
			echo $error_login;
			exit;
		}
		mysqli_stmt_close($sql);
	}
mysqli_close($connection);	
?>
