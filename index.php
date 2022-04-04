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
<!--<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script src="JS/plugins.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="JS/javascript.js"></script>
</head>
<body>
<!-- Top Navigation Menu
   ================================================== -->
	<section id="header">
		<div class="header_part">
      <div class="searchbar">
        <img class="logo" src="Images/logo.png">
        <!--<form action="index.html">
      <input type="text" placeholder="Enter search term" name="search">
      <button class="search-container-button" type="submit"><i class="fa fa-search"></i></button>
    </form>-->
      </div>
			<div class="topnavbar">
        <?php 
          session_start();
          if (isset($_SESSION["User_Name"])) {
            echo "<input id='session_activation' type='hidden' name='session_activation' value='active' />";
          }else{
            echo "<input id='session_activation' type='hidden' name='session_activation' value='inactive' />";
          }

        ?>
        <a id="user_profile" onclick="document.getElementById('id04').style.display='block'" style="cursor:pointer;"><i class="fa fa-user"></i> Profile</a>
        <a id="session_login" href="#" onclick="document.getElementById('id02').style.display='block'">Log-In</a>
				<a href="pharmacy.php" >Pharmacy</a>
				<a href="pathalogy.php" >Pathalogy</a>
				<a href="appointment.php">Appointment</a>
			</div>
		</div>
	</section>
<!-- Profile details
   ================================================== -->
<div id="id04" class="modal">
  <div class="modal-content" style="height:500px; padding:40px 50px 50px 80px; width:58%;">
    <h2 style="text-align:center; font-family: 'Times New Roman', Times, serif;"><i class="fa fa-user"></i> User Profile</h2>
    <div class="clearfix">
      <div class="profile_pic">
        <img src="Images/girlpic.png">
      </div>
      <div class="profile_data">
        <div style="border:1.5px solid #ccc;height:340px; padding:15px; position:relative;">
          <h3 style="font-size:22px;">Name: <span style="font-weight:400; color:#00a6e5;"><?php echo $_SESSION["User_Name"] ?></span></h3>
          <h3 style="font-size:18px;">Email: <span style="font-weight:400;"><?php echo $_SESSION["User_Email"] ?></span></h3>
          <div style="/*margin-top:180px;*/ position:absolute; bottom:15px; width:338.438px;">
          <button class="container_button" style="background-color:#000; color:#fff;" type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Go Back</button>
        <button class="container_button" style="background-color:red; color:#fff;" type="submit" id="sign_out" onclick="window.location='PHP/signout.php'">Sign Out</button>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>  
<!-- Intro Design
   ================================================== -->
 <section id="intro"> 
<section id="slide_show">
<div class="slideshow-container">
<div class="mySlides fade">
  <img src="Images/hospital1.png" style="width:100%">
</div>
<div class="mySlides fade">
  <img src="Images/hospital4.png" style="width:100%">
</div>
<div class="mySlides fade">
  <img src="Images/hospital5.png" style="width:100%">
</div>
<div class="mySlides fade">
  <img src="Images/hospital2.png" style="width:100%">
</div>
<div class="mySlides fade">
  <img src="Images/hospital3.png" style="width:100%">
</div>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
<section id="content">
<div class="content_wrapper">
  <h1>Welcome to the ABCD Hospital</h1>
  <div class="intro_para">The ABCD Hospital is open to everyone every day and provides primary health care and cutting-edge medicine in a central location in Kolkata. We use our superior academic knowledge to treat a wide range of health issues, taking a personal touch and utilizing highly specialized and up-to-date research.</div>
  <div class="intro_row">
    <div class="small_field">
      <img src="Images/staff.png">
      <div class="overlay">
    <div class="text" onclick="location.href = 'appointment.php';"><p>Book an Appointment</p>
      <p class="nav_arrow">&#8594;</p>
    </div>
  </div>
    </div>
    <div class="small_field">
      <img src="Images/pharma.png">
      <div class="overlay">
    <div class="text" onclick="location.href = 'pharmacy.php';"><p>Pharmacy Department</p>
    <p class="nav_arrow">&#8594;</p></div>
  </div>
    </div>
    <div class="mid_field">
      <img src="Images/department.png">
      <div class="overlay">
    <div class="text" onclick="location.href = 'pathalogy.php';"><p>Pathalogy Department</p>
    <p class="nav_arrow">&#8594;</p></div>
  </div>
    </div>
  </div>
</div>
</section>
</div>
</section>
</section>
<!-- Register Section
   ================================================== -->
<section id="user_register">
  <div class="clearfix">
    <div class="register_window">
      <h2>The unknown is just a question,
      <span>we find the answers.</span>
    </h2>
    <p>Getting an accurate diagnosis can be one of the most impactful experiences that you can have — especially if you've been in search of that answer for a while. We can help you get there.Join Us.</p>

    <a class="para_1_register_button" onclick="document.getElementById('id01').style.display='block'">Register now</a>
    </div>
    <div class="image_side">
      <img src="Images/wheretogo.png">
    </div>
  </div>
</section>

<!--Register form-->
<div id="id01" class="modal">
  <!--<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Form">&times;</span>-->
  <form id="myForm" name="myForm" class="modal-content" action="PHP/user_register.php" method="post" onsubmit="return validateForm()" autocomplete="off">
    <div class="" style="display:none;"></div>
    <div class="container">
      <h1>Register Now</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="name"><b>Full-name</b></label>
      <input id="Fname" type="text" placeholder="Full Name" name="user_name" required />
      <label for="email"><b>Email</b></label>
      <input id="email" type="text" placeholder="Enter Email" name="email" required />
    <label for="psw"><b>Password</b></label>
      <input id="psw" type="password" placeholder="Enter Password" name="psw" title="The password should be atleast of 8 characters" pattern=".{8,}" required />

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input id="psw-repeat" type="password" placeholder="Repeat Password" name="psw-repeat" title="Type the password again" pattern=".{8,}" required />

      <!--<label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>-->
      <div class="clearfix">
        <button class="container_button" style="background-color:#000; color:#fff;" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <input id="sign_up" class="container_button" style="background-color:#00a6e5; color:#fff;" type="submit" name="register" value="Sign Up">
        
      </div>
    </div>
    </form>
</div>
<!--Login form-->
<div id="id02" class="modal" style="padding-top:120px;">
  <form id="login_myForm" name="login_myForm" class="modal-content" action="" method="post" onsubmit="" autocomplete="off">
    <div class="container">
       <h1 style="text-align:center; color:#00a6e5;">Sign In Now</h1>
      <p style="text-align:center;">(Lets get started! We are here to help you 24*7 and 365 days)</p>
      <hr>
      <span id="login_error"></span>
      <label for="login_email"><b>User Email</b></label>
      <input id="login_email" type="text" placeholder="Enter Your Email address" name="login_email" required>
    <label for="login_psw"><b>Password</b></label>
      <input id="login_psw" type="password" placeholder="Enter Your Password" name="login_psw" required>
      <div class="clearfix">
        <button class="container_button" style="background-color:#000; color:#fff;" type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <input class="container_button" style="background-color:#00a6e5; color:#fff;" type="submit" name="login" value="Sign In">
        
      </div>
    </div>
    </form>
</div>
<!-- stats Section
   ================================================== -->
<section id="counter">
  <h2>Why choose ABCD Hospital?
    <span class="counter_intro_border"></span></h2>
<div class="row">
  <div class="field">
    <h3 class="stat_value">4000</h3>
    <h5 class="stat_title">Practicing Physicians</h5>
  </div>
  <div class="field">
    <h3 class="stat_value">12</h3>
    <h5 class="stat_title">available in 12 different locations</h5>
  </div>
  <div class="field">
    <h3 class="stat_value">1253</h3>
    <h5 class="stat_title">No. of Beds capacity</h5>
  </div>
  <div class="field">
    <h3 class="stat_value">30000</h3>
    <h5 class="stat_title">Employees</h5>
  </div>
</div>
</section>
<!-- Location images
   ================================================== -->
   <section id="location">
    <div class="location">
      <div class="location-text">
        <h2>Breakthrough care in hundreds of locations near you.</h2>
        <p>With the additions of KishHealth System and Marianjoy Rehabilitation Hospital, ABCD Hospital is closer than ever.</p>
      </div>
    </div>
   </section>
<!-- Review part
   ================================================== --> 
<section id="review">
 <div class="review_submit_div">
  <div class="clearfix">
  <div class="review_submit_div_img">
  <img src="Images/girlpic.png" style="height:400px; width:100%;"></div>
  <div class="review_submit_div_txt"><h1 style="text-align: left;
    font-weight: normal;
    font-size: 28px;
    line-height: 36px;
    margin-bottom: 24px !important;
    text-transform: none;">Help us to improve more by sharing your valuable feedback.</h1><br><br>
    <a href="#" class="review_submit_div_txt_link" onclick="document.getElementById('id03').style.display='block'">Feedback</a></div>
</div>
<!-- Feedback form
   ================================================== -->
   <div id="id03" class="modal" style="">
  <!--<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Form">&times;</span>-->
  <form id="myform_comment" name="myform_comment" class="modal-content" method="post" autocomplete="off" onsubmit="return validateEmail()">
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
    <div class="container">
       <h1 style="color:#00a6e5;">Feedback Form</h1>
      <p style="">Your Opinion matters to us.</p>
      <p class="message"></p>
      <hr>
      <label for="name"><b>Full-name</b></label>
      <input id="comment_name" type="text" placeholder="Full Name" name="user_name" required>
      <label for="email"><b>User Email</b></label>
      <input id="comment_email" type="text" placeholder="Enter Your Email address" name="email" required>
      <label for="Comment"><b>Feedback</b></label>
      <textarea id="comment" name="Comment" rows="4" cols="50" wrap="hard"></textarea>
      <div class="clearfix">
        <button class="container_button" style="background-color:#000; color:#fff;" type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
        <input id="Submit" class="container_button" style="background-color:#00a6e5; color:#fff;" type="submit" name="submit" value="Submit">
        
      </div>
    </div>
    </form>
</div>
 </div> 
<div class="review_container">
<h2 style="text-align: left;
    font-weight: normal;
    font-size: 22px;
    line-height: 26px;
    text-transform: none;">Review Board - Your Opinion matters to US</h2>
<hr> 
<div class="review_list"></div>
</div>
</section>
<!-- Footer part
   ================================================== -->
<section id="footer" style="background-color: #3f4246;">
  <div class="footer_row">
    <a href="#" class="fa fa-facebook" style="background:rgb(59, 89, 152);"></a>
    <a href="#" class="fa fa-twitter" style="background:rgb(85, 172, 238);"></a>
    <a href="#" class="fa fa-linkedin" style="background:rgb(0, 119, 181);"></a>
    <a href="#" class="fa fa-youtube" style="background:rgb(206, 19, 18);"></a>
    <a href="#" class="fa fa-instagram" style="background: #d6249f;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);"></a>
    <a href="#" class="fa fa-pinterest" style="background:#981e32;"></a>
  </div>
</section>
<script>
/*To make the slide show with next and prev features*/
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  //var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  /*for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }*/
  slides[slideIndex-1].style.display = "block";  
  //dots[slideIndex-1].className += " active";
}
$(document).ready(function(){  
  // Automatic Slideshow - change image every 7 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}
});
</script>
</body>
</html>