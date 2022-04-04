<!DOCTYPE html>
<html lang="en">
<head>
<title>A B C D Hospital | Book Appointment </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script src="JS/plugins.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="JS/javascript.js"></script>
<style>
.view_his_header{
  padding: 25px;
  margin-top:30px;
  font-size: 20px;
  height: 90px;
  font-family: "Times New Roman", Times, serif;
}
</style>
</head>
<body>
<!-- Top Navigation Menu
   ================================================== -->
	<section id="header" style="">
  <?php 
          session_start();
          if (isset($_SESSION["User_Name"])) {
            echo "<input id='session_activation' type='hidden' name='session_activation' value='active' />";
          }else{
            echo "<input id='session_activation' type='hidden' name='session_activation' value='inactive' />";
          }

        ?>  
			<div class="clearfix">
				<div class="h-name">
				<p><img src="Images/hospital_logo2.png">
				<span class="h-name-h3">ABCD</span>
				<span class="h-name-h1">Hospital</span>
        <span class="h-name-h1"> <span style="color:#00a6e5;">|</span> Appointment</span>
        <a id="user_profile" class="home-header-button" onclick="document.getElementById('id04').style.display='block'"><i class="fa fa-user"></i> Profile</a>
        <a class="home-header-button" href="#" onclick="homecall()"><i class="fa fa-list"></i> Home</a>
        <a class="home-header-button" href="index.php" style="border-left:0;"><i class="fa fa-home"></i> Main Page</a>
			<!--<a id="session_login" class="home-header-button" href="#" onclick="document.getElementById('id02').style.display='block'">Log In</a>-->
			</p></div>
			</div>
	</section>
 <!-- Main Content Content
   ================================================== --> 
 <div id="main_nav" class="clearfix" style="margin-top:80px;">
  <div class="col search" onclick="location.href = 'doctor_details.php';"> 
    <i class="fa fa-search" style="font-size:5em;color: #00a6e5;"></i>
    <h2 style="font-weight:400; font-size:1.5em; margin-top:0;">Search for a doctor</h2>
    <span class="search_border"></span>
  </div>
  <div class="col appt" onclick="bookappt()">
    <i class="fa fa-calendar" style="font-size:5em;color: #00a6e5;"></i>
    <h2 style="font-weight:400; font-size:1.5em; margin-top:0;">Book a Appointment</h2>
    <span class="search_border"></span>
  </div>
  <div class="col appt_hist" onclick="viewhistory()">
    <i class="fa fa-history" style="font-size:5em;color: #00a6e5;"></i>
    <h2 style="font-weight:400; font-size:1.5em; margin-top:0;">Check your previous appointments</h2>
  </div>
 </div>  
<!-- application form Content
   ================================================== -->
<section id="application_form" style="">
<div class="hero-image">
<div class="hero-content">
<h1  style="font-size:20px;">Patients Personal Details</h1>
<p style="font-size:15px;">Fill the form below and we will get back soon to you for more updates</p>
<p class="message"></p>
<hr>
<form id="myForm-appointment" name="myForm-appointment" method="post" autocomplete="off" style="font-size:14px; margin-top:25px;">
	<label for="name"><b>Full-name</b></label>
	 <input id="Fname" type="text" placeholder="Full Name" name="user_name" required>
<label for="email"><b>Email</b></label>
      <input id="email" type="text" placeholder="Enter Email" name="email" required>

<div style="margin:20px 0;">
   <div style="display:inline-block; width:32%;">
	  <label for="gender"><b>Gender</b></label><br>
      <select id="gender" name="gender">
        <option value="M">Male</option>
        <option value="F">Female</option>
        <option value="O">Others</option>
      </select>
    </div>
    <div style="display:inline-block; width:32%;">
      <label for="birthday"><b>Date of Birth</b></label><br>
  		<input type="date" id="birthday"  name="birthday" required>
    </div>
    <div style="display:inline-block; width:32%;">
      <label for="Ph-no"><b>Phone Number</b></label>
      <input id="Ph-no" type="number" placeholder="Enter Phone Number" name="Ph-no" required>
    </div>
   </div> 
<div style="height:100%; border:1px solid #888; padding:15px;">
  <div style="margin:15px 0;">
    <h3>Select a Department</h3>
    <span class="select_dept"></span>
 </div>
 <div id="select_doct_header" style="margin:15px 0;">
  <h3>Select a Doctor</h3>
  <span class="select_doct"></span>
 </div>
<div id="appt_date_header" style="margin:15px 0;">
  <h3><label for="appt_date">Select a Date</label></h3>
  <input type="date" id="appt_date" name="appt_date">
</div>
  <div class="avail_time_slot"></div>
  <!--<input id="appt_time" type="hidden" name="selected_time" value="" />-->
</div>
  <input id="appt_submit" class="container_button" style="background-color:#00a6e5; color:#fff; margin-left:25%; margin-top:30px;" type="submit" name="submit" value="submit">
  </form>
</div>
</div>
</section>
<!-- view history
   ================================================== -->
   <section id="view_history">
      <?php 
          if (isset($_SESSION["User_Name"]) && isset($_SESSION["User_Email"])) {
            echo "<div class='view_his_header'>Hello <span style='font-size:25px;color:#00a6e5;'>".$_SESSION['User_Name']."</span> welcome to ABCD Hospital, we are happy to serve you. here are your previous booking.<hr></div>";
          }

        ?>  
    <div class="view_his_date">
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
<!-- search area
   ================================================== -->
<section id="search_doc">
  <div style="height:500px; display:grid; place-items:center;">
     <form>
      <input type="text" placeholder="Enter search term" name="search">
      <button class="search-container-button" type="submit"><i class="fa fa-search"></i></button>
    </form>
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
//book appointment call
  function bookappt(){
  document.getElementById('main_nav').style.display='none';
  document.getElementById('application_form').style.display='block';
}
function homecall(){
 if ($("#application_form").css("display") == "block"){
   if (confirm("Data will be lost if you leave the page, are you sure?")) {
  document.getElementById('main_nav').style.display='block';
  document.getElementById('application_form').style.display='none';
  location.reload();
   }else{
    return;
   }
}
document.getElementById('view_history').style.display='none';
document.getElementById('main_nav').style.display='block';
}

//-----------to view appointment history---------------------

function viewhistory(){
  var session_status = $('#session_activation').val();
  if (session_status == 'inactive'){
    alert("You need to login to see your previous booking, go back to main page and login please.");
    return ;
  }else{
    document.getElementById('main_nav').style.display='none';
  document.getElementById('view_history').style.display='block';
  
  }
}

//prevent refresh while the form is on
$(document).ready(function(){  
  window.onbeforeunload = function() {
    if ($("#application_form").css("display") == "block"){
  return "Data will be lost if you leave the page, are you sure?";
}
}
//--------fire the appointment history on page load-------------
//refresh_appt_history();
appt_history();
//for firing the comments when the website laods
function appt_history(){
  $.ajax({
   url:"PHP/fetch_appointment_his.php",
   method:"POST",
   success:function(data)
   {
    $('.view_his_date').html(data);
   }
  });
  
 }
/*function refresh_appt_history(){
  setTimeout(function(){
    $(".view_his_date").load("PHP/fetch_appointment_his.php");
    refresh_appt_history();},2000);
}*/
});
</script>
</body>
</html>