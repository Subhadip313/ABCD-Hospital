<select id="select_doc_header" name="Doctor">
<?php
	require_once('connection.php');
	$department = $_POST['department'];
	$sql= "SELECT DISTINCT doc_email, doc_id, doc_name FROM doctor_details WHERE department = '$department'";
	$results = mysqli_query($connection, $sql);
	$output='';
	
	while($row= mysqli_fetch_assoc($results)){
		
		$output = '<option value="'.$row["doc_name"].'">'.$row["doc_name"].'</option>';
		echo $output;
	}
	
?>
</select>