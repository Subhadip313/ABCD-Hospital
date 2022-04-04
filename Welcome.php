<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>A B C D Hospital</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script src="JS/plugins.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="JS/javascript.js"></script>
</head>
<body>
<!-- Top Navigation Menu
   ================================================== -->
	<section id="header" style="">
			<div class="clearfix">
				<div class="h-name">
				<p><img src="Images/logo.png">
				<span class="h-name-h3">ABCD</span>
				<span class="h-name-h1">Hospital</span>
        <span class="h-name-h1"> <span style="color:#00a6e5;">|</span> Appointment</span>
				<a class="welcome-home-header-button" href="index.php" style=""><i class="fa fa-home"></i> Home</a>
			</p></div>
			</div>
	</section>
<!-- Welcoming new user
   ================================================== -->	
<section id="Welcome_letter">
	<div class="Welcome_part">
		<img src="Images/Welcome.png">
		<div class="Welcome_text">
			<h2>Hello! <span style="color:green;">
			<?php 
				session_start();
				echo $_SESSION["User_Name"]; 
			 ?></span>, Please check out the below video to know more about us or go to the Home page by clicking the Home button on the to right corner of the page.</h2>
		</div>
		<div class="Welcome_video">
			<video src="video/Hospital welcome video.mp4" controls>
			  Your browser does not support the video tag.
			</video>
		</div>
	</div>
</section>	
</body>
</html>	