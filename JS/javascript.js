/*-----Global variable-------------*/
const re =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

/*----------------------------------------------------- */
  /* Stat Counter
    ------------------------------------------------------- */
$(document).ready(function(){  
   var statSection = $("#counter"),
       stats = $(".stat_value");

   statSection.waypoint({

    handler: function(direction) {

        if (direction === "down") {           

         stats.each(function () {
           var $this = $(this);

           $({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 4000,
            easing: 'swing',
            step: function (curValue) {
                $this.text(Math.ceil(curValue));
              }
            });
        });

        } 

// trigger once only
        this.destroy();       

    },
      
    offset: "90%"
  
  });
   //session activation feature......if session is active it will not show login button
   var session_status = $('#session_activation').val();
   if (session_status == 'active'){
      $("#session_login").css("display", "none");
      $("#user_profile").css("display", "block");
   }else{
    $("#user_profile").css("display", "none");
    $("#session_login").css("display", "block");
   }
//--------------for login form-------------------------------
   $('#login_myForm').on('submit', function(event){
    event.preventDefault();
   var form_data = $(this).serialize();
    $.ajax({
       url: 'PHP/login.php',
       method:"POST",
        data:form_data,
        success:function(data){
          if(data == 'true'){
        document.location.href = "index.php";
          }else{
      $('#login_myForm')[0].reset();
      $('#login_error').html(data);
    }
  }
});
});
  //search for a doctore call from  appointment form 
  select_dept_call();
 function select_dept_call() {
    $.ajax({
   url:"PHP/choose_dept.php",
   method:"POST",
   success:function(data)
   {
    $("#select_dept_header").css("display", "block");
    $('.select_dept').html(data);
   }
  });
  }
//get date call
$('#appt_date').on('change',function(){
  var date = new Date($('#appt_date').val());
  var weekdays_arr = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  var weekday = date.getDay();
  var confirmed_weekday = weekdays_arr[weekday];
  var doc_name = $('#select_doc_header').val();
  var doc_dept = $('#select_dept_header').val();
  $.ajax({
       url: 'PHP/get_date.php',
       method:"POST",
        data:{'Date':confirmed_weekday, 'doc_name':doc_name, 'doc_dept':doc_dept},
        success:function(data){  
      $('.avail_time_slot').html(data);
     }
    });
});
/*$(".selected_time").click(function() {  
  $('#appt_time').val() = $(this).val();
    
  });*/
});

// Get the modal *** Modal Container////////
/*var modal = document.getElementById('id01');
var modal = document.getElementById('id02');
var modal = document.getElementById('id03');
var modal = document.getElementById('id04');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/

//validating the form fields
function validateForm() {
 const re =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var full_name = document.forms["myForm"]["Fname"].value;
  var email = document.forms["myForm"]["email"].value;
  var pass = document.forms["myForm"]["psw"].value;
  var pass_rep = document.forms["myForm"]["psw-repeat"].value;

  var check= re.test(email);
  if (check == false){
  alert('The entered email is not in correct format');
    document.getElementById("email").focus();
    document.getElementById('email').value = '';
    return false;
  }
if(pass != pass_rep){
  alert('The Password did not matched, please type again carefully');
    document.getElementById("psw").focus();
    document.getElementById('psw').value = '';
    document.getElementById('psw-repeat').value = '';
    return false;
  }
}


/*$("#Fname").blur(function(){
  var User_name = $('#Fname').val();
  if(User_name == ""){return;}
  $.post('Username_check.php', {'User_name':User_name }, function(data){
      
      if(data=='The name already taken') {
      alert(data);
      document.getElementById("Fname").focus();
      document.getElementById('Fname').value = '';
      }
      });
});*/
$("#email").blur(function(){

  var emailval = $('#email').val();
  if(email == ""){return;}
  $.post('email_check.php', {'email': emailval}, function(data){
      
      if(data=='email already exist') {
      alert(data);
      document.getElementById("email").focus();
      document.getElementById('email').value = '';
      }
      });
});
/*---------------
Feedback form----------------*/
$(document).ready(function(){
refresh_comment();

$("#comment_name, #comment_email, #comment").click(function(){
$(".message").css("display", "none");
});

$('#Submit').on('click', send_data);
/*$("#sign_up").click(function(){
  event.preventDefault();
  var validation_result = validateForm();
  if ( validation_result == false ){
    alert("dont submit!");
    return false;
  }else{
    window.location("#header");
  }
});*/


function send_data(){
   event.preventDefault();
//Validating the Email format in feedback form
var comment_email = document.forms["myform_comment"]["comment_email"].value;
var check_comment = re.test(comment_email);
  //if (check_comment == false){
    //alert('The entered email is not in correct format');
    /*$(".message").css("display", "block");
    $('.message').html("<span style='color:red;'>The Email id is not in correct format !</span>");
    document.getElementById("comment_email").focus();
    document.getElementById('comment_email').value = '';*/
  //}else{
   var User_Name = $("#comment_name").val();
   var User_Email = $("#comment_email").val();
   var User_Comment = $("#comment").val();
   if(User_Email == "" || User_Comment == "" || User_Name == ""){
    $(".message").css("display", "block");
    $('.message').html("<span style='color:red;'>Please fill all the fields !</span>");
  }else if (check_comment == false){
    $(".message").css("display", "block");
    $('.message').html("<span style='color:red;'>The Email id is not in correct format !</span>");
    document.getElementById("comment_email").focus();
    document.getElementById('comment_email').value = '';
    }else{
    $.ajax({
       url: 'PHP/send_comment.php',
       method:"POST",
        data:{'comment_name':User_Name, 'user_email':User_Email,
        'Comment':User_Comment},
        success:function(data){
      $('#myform_comment')[0].reset();
      document.getElementById("comment_name").focus();
      $(".message").css("display", "block");
      $('.message').html(data);
      load_comment();
     }
    });
}
//}
}
load_comment();//for firing the comments when the website laods

function load_comment(){
  $.ajax({
   url:"PHP/fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('.review_list').html(data);
   }
  });
  
 }
 function refresh_comment(){
  setTimeout(function(){
    $(".review_list").load("PHP/fetch_comment.php");
    refresh_comment();},2000);
}

/*function register_data(){
  event.preventDefault();
  

}*/

});

//capture application_form data
$(document).ready(function(){  
  $("#appt_submit").click(function() {
    //$('#myForm-appointment').on('submit', function(event){
    var client_full_name = $('#Fname').val();
    var client_email = $('#email').val();
    var client_gender = $('#gender').val();
    var client_DOB = $('#birthday').val();
    var client_ph_no =  $('#Ph-no').val();
    var selected_department = $('#select_dept_header').val();
    var selected_doctor = $('#select_doc_header').val();
    var appt_date = $('#appt_date').val();
    var appt_time = $('#appt_time').val();
    var check_appt_email = re.test(client_email);
  if (selected_department == "NULL" || appt_time ==""){
    alert("Please fill up the form properly");
    return;
  }else if(check_appt_email == false){
    alert("The Email id is not in correct format !");
    document.getElementById("email").focus();
    document.getElementById('email').value = '';
  }else{
     event.preventDefault();
    $.ajax({
       url: 'PHP/send_application_form_data.php',
       method:"POST",
        data:{'client_full_name':client_full_name, 'client_email':client_email,'client_gender':client_gender, 'client_DOB':client_DOB, 'client_ph_no':client_ph_no, 'selected_department':selected_department, 'selected_doctor':selected_doctor, 'appt_time':appt_time,'appt_date':appt_date},
        success:function(data){
      $('#myForm-appointment')[0].reset();
      document.getElementById("Fname").focus();
       $(".hero-content").css("background", "rgb(255,255,255)");
      $('.hero-content').html(data);
     }
    });
  }
    
 });

//capture and send pharama orders details
$("#myForm_medical").submit(function(e) {
  var pharma_email = $('#email').val();
  var check_pharma_email = re.test(pharma_email);
  if(check_pharma_email == false){
    alert("The Email id is not in correct format !");
    document.getElementById("email").focus();
    document.getElementById('email').value = '';
  }else{
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: 'PHP/send_medicine_req.php',
        type: 'POST',
        data: formData,
        success: function (data) {
      $('#myForm_medical')[0].reset();
      document.getElementById("Fname").focus();
      $('.pharma_order_data').html(data);
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }
});

//=============pathalogy form list selection=============
$(".pathalogy_list_row").click(function() {
var test_type = $(this).val();
$("#test").val(test_type);
});

//send form data
$("#myForm_patha").submit(function(e) {
  if($("#test").val()==""){
  alert("choose a test type!");
  document.getElementById("email").focus();
  document.getElementById('email').value = '';
  return;
}
  var phatha_email = $('#email').val();
  var check_phatha_email = re.test(phatha_email);
  if(check_phatha_email == false){
    alert("The Email id is not in correct format !");
    document.getElementById("email").focus();
    document.getElementById('email').value = '';
  }else{
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: 'PHP/send_pathalogy_order.php',
        type: 'POST',
        data: formData,
        success: function (data) {
      $('#myForm_patha')[0].reset();
      document.getElementById("Fname").focus();
      $('.pathalogy_order').html(data);
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }
});

});