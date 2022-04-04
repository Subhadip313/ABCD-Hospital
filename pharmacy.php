<!DOCTYPE html>
<html lang="en">
<head>
<title>A B C D Hospital | Pharmacy </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/style.css">
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
        <span class="h-name-h1"> <span style="color:#00a6e5;">|</span> Pharmacy</span>
        <a id="user_profile" class="home-header-button" onclick="document.getElementById('id04').style.display='block'"><i class="fa fa-user"></i> Profile</a>
				<a class="home-header-button" href="index.php" style="border-left:0;"><i class="fa fa-home"></i> Main Page</a>
			</p></div>
			</div>
	</section>
<!-- Main Content
   ================================================== -->
<section id="Main-content" style="">
<div class="clearfix">
<div class="hero-image2">
<div class="hero-content">
<h1  style="font-size:20px;">Requirement Details</h1>
<p style="font-size:15px;">Fill the form below and we will get back soon to you for more updates</p>
<hr>
<div class="pharma_order_data"></div>
<form id="myForm_medical" name="myForm_medical" class="" action="" method="post" onsubmit="" autocomplete="off" style="font-size:14px; margin-top:25px;">
  <label for="name"><b>Full-name</b></label>
   <input id="Fname" type="text" placeholder="Full Name" name="user_name" required>
      <label for="Ph-no"><b>Phone Number</b></label>
      <input id="Ph-no" type="number" placeholder="Enter Phone Number" name="Ph-no" required>
      <label for="address"><b>Address</b></label>
       <input id="address" type="text" placeholder="Full Address" name="address" required>
      <label for="email"><b>Email</b></label>
      <input id="email" type="text" placeholder="Enter Email" name="email" required>
      <label for="prescription"><b>Prescription</b></label>
      <input id="image_file" type="file" name="image_file" onchange="ValidateSize(this)" />
      <label for="description"><b>Description</b></label>
      <textarea id="Comment" name="Comment" rows="4" cols="50" wrap="hard" maxlength="" title=""></textarea>
  <input id="medical_req" class="container_button" style="background-color:#00a6e5; color:#fff; margin-left:25%;" type="submit" name="submit" value="submit">
  </form>
</div>
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
//validate the file size
function ValidateSize(file) {
  var formData = new FormData();
  var file = document.getElementById("image_file").files[0];

  formData.append("Filedata", file);
  var fileType = file.type.split('/').pop().toLowerCase();

  if (fileType != "jpeg" && fileType != "jpg" && fileType != "png" && fileType != "bmp" && fileType != "gif") {
        alert('Please select a valid image file. Only .jpeg/ .jpg/ .png/ .bmp/ .gif are allowed.');
        document.getElementById("image_file").value = '';
        return false;
        }

  
  if (file.size > 3500000) {
  alert('File size exceeds 3.5 MiB');
  $('#image_file').val("");
  return false;
}
  

    return true;
    }

</script>  
</body>
</html>