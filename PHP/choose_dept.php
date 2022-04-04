<select id="select_dept_header" name="Department">
<option value="NULL">Select a Departmet</option>
<?php
	require_once('connection.php');
	$sql= "SELECT DISTINCT department FROM doctor_details";
	$results = mysqli_query($connection, $sql);
	$output='';
	
	while($row= mysqli_fetch_assoc($results)){
		
		$output = '<option value="'.$row["department"].'">'.$row["department"].'</option>';
		echo $output;
	}
	
?>
 </select>
 <script>
 $(document).ready(function(){  
 $('#select_dept_header').on('change',function(){
    var department = $(this).val();
	$.ajax({
       url: 'PHP/choose_doc.php',
       method:"POST",
        data:{'department':department},
        success:function(data){
      $('.select_doct').html(data);
	  if($('#select_dept_header').val() != 'NULL'){
		$("#select_doct_header").css("display", "block");		
	  $("#appt_date").css("display", "block");
	  $("#appt_date_header").css("display", "block"); 
	  }else{
		  $("#appt_date").css("display", "none");
		  $("#select_doct_header").css("display", "none");
		  $("#appt_date_header").css("display", "none"); 
		  return;
	  }
     }
    });
});
});
 </script>
