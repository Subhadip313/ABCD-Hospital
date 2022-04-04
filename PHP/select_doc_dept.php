<style>
#select_dept_header{
	padding:8px 16px;
	width:30%;
}
</style>
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
       url: 'PHP/fetch_doctor_details.php',
       method:"POST",
        data:{'department':department},
        success:function(data){
      $('.doctor_details_list').html(data);
     }
    });
});
});
 </script>
