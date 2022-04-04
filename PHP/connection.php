<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='';
$dbname="abcd_hospital";

@$connection= mysqli_connect($mysql_host,$mysql_user,$mysql_password,$dbname);
if(!@$connection)
{
	echo "Failed to connect with the database, please contact the admin "."<br><br>";
	/*echo "<font color='red'>Error: </font>". mysqli_connect_error($connection)."<br><br>";
			echo "Go back to the main page:<a href='index.html' style='font-size:20px;'>AudioPhobic</a>"."<br>";
			echo "<center><img src='webiste_images\sorry.png' style=' margin: 5% auto 15% auto;'>";*/
	exit;
}
?>