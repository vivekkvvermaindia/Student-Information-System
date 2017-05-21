<!DOCTYPE html>
<html>
<head>
<title>
Student Registration
</title>
<link rel="stylesheet" href="site.css">
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<script src="jquery/external/jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>

<style>
*{
margin:0;
}
#pq{
  display: none;
}
 .button{text-align:center}

.submit,.reset{background-color:blue;
	color:white;
	padding:5px 8px;
	text-align:center;
	text-decoration:none;
	font-size:16px;
	cursor:pointer;
	border-radius: 4px;
	border:2px solid grey;
	transition-duration:0.4s}
.submit:hover,.reset:hover{background-color:white;
	     color:black}
       span{font-size:16px}
</style>
<?php
    $conn = mysqli_connect("localhost",'root','','stud_db') or die() ;
    if(isset($_POST['register']))
    {
    $username = $_POST['username'];
    $login = mysqli_query($conn,"Select * from student_data where username = '$username' ");
    if(mysqli_num_rows($login)>0)
    {
      echo "<script>alert('Username already exists')</script>";
    }
    $register = $_POST['registration_no'];
    $reg = mysqli_query($conn,"Select * from student_data where reg_no = '$register' ");
    if(mysqli_num_rows($reg)>0)
    {
      echo "<script>alert('Registration no. already exists')</script>";
    }
    $rollno = $_POST["rollno1"] ."/" .$_POST["rollno2"] ."/". $_POST["rollno3"];
    $roll = mysqli_query($conn,"Select * from student_data where rollno = '$rollno' ");
    if(mysqli_num_rows($roll)>0)
    {
      echo "<script>alert('Roll no. already exists')</script>";
    }
    else
    {
      include("1.php");
    }
    }
?>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    $('#blah').show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
function validateName(){
  var alphaExp=/^[a-zA-Z]+$/;
  var name=document.getElementById("firstname");
  if(!name.value.match(alphaExp)){
    name.style.background="#e35152";
    alert("Enter a valid First Name")
    return false;
  }
  else{
    name.style.background="#ccffcc";
    return true;
  }
}

function validateLastName(){
  var alphaExp=/^[a-zA-Z]+$/;
  var name=document.getElementById("lastname");
  if(!name.value.match(alphaExp)){
    name.style.background="#e35152";
    alert("Enter a valid Last Name")
    return false;
  }
  else{
    name.style.background="#ccffcc";
    return true;
  }
}

function validateDOB(){
  var dob= document.getElementById("dob");
  if(dob.value==null || dob.value.trim()==""){
    dob.style.background="#e35152";
    alert("Date Field cannot be empty")
    return false;
  }
  else{
    dob.style.background="#ccffcc";
    return true;
  }
}

function validateEmail(){
  var x = document.getElementById("email");
  var exp=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z])+\.)+([a-zA-Z]{2,4})+$/;
   if(!x.value.match(exp)){
       x.style.background="#e35152";
       alert("Not a valid e-mail address")
        return false;
    }
  else{
    x.style.background="#ccffcc";
    return true;
  }
}

function validateAddress(){
  var address= document.getElementById("street");
  if(address.value==null || address.value.trim()==""){
    address.style.background="#e35152";
    alert("Address Field cannot be empty")
    return false;
  }
  else{
    address.style.background="#ccffcc";
    return true;
  }
}

function validateCity(){
  var alphaExp=/^[a-z' 'A-Z]+$/;
  var city=document.getElementById("city");
  if(city.value.trim()==""){
    city.style.background="#e35152";
    alert("City Field cannot be empty")
    return false;
  }
  else if(!city.value.match(alphaExp)){
    city.style.background="#e35152";
    alert("Enter a valid City Name")
    return false;
  }
  else if(city.value.charAt(0)==' '){
    city.style.background="#e35152";
    alert("Enter a valid City Name")
    return false;
  }
  else{
    city.style.background="#ccffcc";
    return true;
  }
}

function validateCountry(){
  var alphaExp=/^[a-z' 'A-Z]+$/;
  var country= document.getElementById("country");
  if(country.value.trim()==""){
    country.style.background="#e35152";
    alert("Country Field cannot be empty")
    return false;
  }
  else if(!country.value.match(alphaExp)){
    country.style.background="#e35152";
    alert("Enter a valid country name")
    return false;
  }
  else if(country.value.charAt(0)==' '){
    country.style.background="#e35152";
    alert("Enter a valid Country Name")
    return false;
  }
  else{
    country.style.background="#ccffcc";
    return true;
  }
}

function validateState(){
  var alphaExp=/^[a-z' 'A-Z]+$/;
  var state= document.getElementById("state");
  if(state.value.trim()==""){
    state.style.background="#e35152";
    alert("State Field cannot be empty")
    return false;
  }
  else if(!state.value.match(alphaExp)){
    state.style.background="#e35152";
    alert("Enter a valid State name")
    return false;
  }
  else if(state.value.charAt(0)==' '){
    state.style.background="#e35152";
    alert("Enter a valid state Name")
    return false;
  }
  else{
    state.style.background="#ccffcc";
    return true;
  }
}

function validatePincode(){
  var pin=document.getElementById("pincode");
  if(isNaN(pin.value)){
    pin.style.background="#e35152";
    alert("Pin Code must be numeric.")
    return false;
  }
  if(pin.value.length!=6){
    pin.style.background="#e35152";
    alert("Pin Code must be six digit long.")
    return false;
  }
  else{
    pin.style.background="#ccffcc";
    return true;
  }
}

function validateMobile(){
  var mob=document.getElementById("contact");
  if(isNaN(mob.value)){
    mob.style.background="#e35152";
    alert("Mobile Number must be numeric.")
    return false;
  }
  if(mob.value.length!=10){
    mob.style.background="#e35152";
    alert("Mobile Number must be ten digit long.")
    return false;
  }
  else if(mob.value=="0000000000"){
    mob.style.background="#e35152";
    alert("Invalid mobile no.")
    return false;
  }
  else{
    mob.style.background="#ccffcc";
    return true;
  }
}

function validateRegistration(){
  var reg=document.getElementById("registration_no");
  if(isNaN(reg.value)){
    reg.style.background="#e35152";
    alert("Registration Number must be numeric.")
    return false;
  }
  if(reg.value.length!=8){
    reg.style.background="#e35152";
    alert("Registration Number must be eight digit long.")
    return false;
  }
  else{
    reg.style.background="#ccffcc";
    return true;
  }
}

function validateCourse(){
  var course= document.getElementById("degree");
  if(course.value=="none"){
    course.style.background="#e35152";
    alert("Course Field cannot be empty")
    return false;
  }
  else{
    course.style.background="#ccffcc";
    return true;
  }
}

function validateYear(){
  var year= document.getElementById("year");
  if(year.value=="none"){
    year.style.background="#e35152";
    alert("Year Field cannot be empty")
    return false;
  }
  else{
    year.style.background="#ccffcc";
    return true;
  }
}

function validateBranch(){
  var branch= document.getElementById("branch");
  if(branch.value=="none"){
    branch.style.background="#e35152";
    alert("Branch Field cannot be empty")
    return false;
  }
  else{
    branch.style.background="#ccffcc";
    return true;
  }
}

function validateRoll(){
  var roll=document.getElementById("rollno2");
  if(roll.value==null || roll.value.trim()==""){
    roll.style.background="#e35152";
    alert("Roll Number cannot be empty.")
    return false;
  }
  else if(isNaN(roll.value)){
    roll.style.background="#e35152";
    alert("Roll Number must be numeric.")
    return false;
  }
  else if(roll.value.length>3){
    roll.style.background="#e35152";
    alert("Roll Number must be upto three digit long.")
    return false;
  }
  else{
    roll.style.background="#ccffcc";
    return true;
  }
}

function validateCGPA(){
  var cgpa=document.getElementById("cgpa");
  if(cgpa.value==null || cgpa.value.trim()==""){
    cgpa.style.background="#e35152";
    alert("CGPA Field cannot be empty.")
    return false;
  }
  else if(isNaN(cgpa.value)){
    cgpa.style.background="#e35152";
    alert("CGPA must be numeric.")
    return false;
  }
  else if((cgpa.value>10 || cgpa.value<0)){
    cgpa.style.background="#e35152";
    alert("CGPA must be between 0 to 10")
    return false;
  }
  else{
    cgpa.style.background="#ccffcc";
    return true;
  }
}

function validateUser(){
  var user= document.getElementById("username");
  if(user.value==null || user.value.trim()==""){
    user.style.background="#e35152";
    alert("Username cannot be empty")
    return false;
  }
  else{
    user.style.background="#ccffcc";
    return true;
  }
}

function validatePassword(){
  var password= document.getElementById("password1");
   //var alphaExp=/^[a-z' 'A-Z0-9]+$/;
  if(password.value.length<8){
    password.style.background="#e35152";
    alert("Password must be atleast eight digit long.")
    return false;
  }
   else if(!password.value.match("[a-zA-Z]")){
      password.style.background="#e35152";
    alert("Password must contain alphabets")
    return false;
    }
   else if(!password.value.match("[0-9]")){
      password.style.background="#e35152";
    alert("Password must contain numbers")
    return false;
    }
    else if(!password.value.match("['@''#''%'' ''_']")){
      password.style.background="#e35152";
    alert("Password must contain special characters[@,#,_, ,%]")
    return false;
    }
    
  else{
    password.style.background="#ccffcc";
    return true;
  }
}

function checkpasswords(){
  var x = document.getElementById("password1");
  var y = document.getElementById("password2");
  if(x.value!=y.value){
    y.style.background="#e35152";
    alert("Passwords do not match");
    return false;
  }
  else{
    y.style.background="#ccffcc";
    return true;
  }
}
</script>
<script>

function validation(){
  var error=0;
  if(!(validateName())){
    error=1;
    return false;
  }
  else if(!(validateLastName())){
    error=1;
    return false;
  }
  else if(!(validateDOB())){
    error=1;
    return false;
  }
  else if(!(validateEmail())){
    error=1;
    return false;
  }
  else if(!(validateAddress())){
    error=1;
    return false;
  }
  else if(!(validateCity())){
    error=1;
    return false;
  }
  else if(!(validateCountry())){
    error=1;
    return false;
  }
  else if(!(validateState())){
    error=1;
    return false;
  }
  else if(!(validatePincode())){
    error=1;
    return false;
  }
  else if(!(validateMobile())){
    error=1;
    return false;
  }
  else if(!(validateRegistration())){
    error=1;
    return false;
  }
  else if(!(validateCourse())){
    error=1;
    return false;
  }
  else if(!(validateYear())){
    error=1;
    return false;
  }
  else if(!(validateBranch())){
    error=1;
    return false;
  }
  else if(!(validateRoll())){
    error=1;
    return false;
  }
  else if(!(validateCGPA())){
    error=1;
    return false;
  }
  else if(!(validateUser())){
    error=1;
    return false;
  }
  else if(!(validatePassword())){
    error=1;
    return false;
  }
  else if(!(checkpasswords())){
    error=1;
    return false;
  }
  else{
    return true;
  }
}
  </script>


<script>

  function branchcode1(){
  var x = document.getElementById("branch");
  var y = document.getElementById("branchcode");
  y.value=x.value;
  }
  
  function find_roll(){
  var x = document.getElementById("registration_no");
  var y = document.getElementById("rollno")
  y.value= x.value.substring(2,4);
  }


</script>
<script>
$(document).ready(function() {
    $("#others").click(function() {
        $("#pq").fadeToggle(500);
    });
});

 </script>
 <script>
 function cal_age(){
   var today=new Date();
   var y=today.getFullYear();
   var m=today.getMonth();
   var d=today.getDate();

   var birth=document.getElementById("dob").value;
   var birth_d=new Date(birth);
   var by=birth_d.getFullYear();
   var bm=birth_d.getMonth();
   var bd=birth_d.getDate();

   var age=y-by;
   var age_m=m-bm;
   var age_d=d-bd;
   if(age_m<0 || (age_m ==0 && age_d<0)){
     age=parseInt(age)-1;
     age_m=age_m+12;
   }
   if(age_d<0){
     age_m=parseInt(age_m)-1;
     age_d=parseInt(age_d)+30;
   }
   var a=document.getElementById("age");
   a.value=age;
   var b=document.getElementById("month");
   b.value=age_m;
   var c=document.getElementById("days");
   c.value=age_d;
 }
 </script>


</head>
<body>
<?php include("header.html");?>
<form name="a" method="POST" onsubmit="return validation()" enctype="multipart/form-data">
<div class="fo">
<fieldset>
  <legend>Personal Details</legend><font face="Calibri">
<table>
  <tr>
    <td>First Name:</td><span>
    <td><input class="rcorners1" type="text" name="firstname" id="firstname" placeholder="First Name" onblur="validateName()"></td>
      <td>Last Name:</td></span>
    <td><input class="rcorners1" type="text" name="lastname" id="lastname" placeholder="Last Name" onblur="validateLastName()"></td>
  </tr>
   <tr>
  <td>Gender:</td>
    <td><input type="radio" name="gender" value="Male" required>Male  <input type="radio" name="gender" value="Female"> Female</td>
  </tr>

<tr>
    <td>Date of Birth:</td><span><td><input class="rcorners1" id="dob" type="date" name="dateofbirth" onchange="cal_age()" onblur="validateDOB()"></td>

     <td>Age:</td></span><td><textarea class="rcorners1" rows="1" cols="4" id="age" name="age" readonly ></textarea><span>year</span><textarea class="rcorners1" rows="1" cols="4" id="month" name="month" readonly ></textarea><span>month</span><textarea class="rcorners1" rows="1" cols="4" id="days" name="days" readonly ></textarea><span>days</span></td>
 </tr>
  

  <tr>
    <td>Address:</td><span>
    <td><input type="text" class="rcorners1" name="street" id="street" onblur="validateAddress()"></td>
  
    <td>City:</td></span>
    <td><input type="text" class="rcorners1" name="city" id="city" onblur="validateCity()"></td>
  </tr>
  <tr>
    <td>State:</td><span>
    <td><input type="text" class="rcorners1" name="state" id="state" onblur="validateState()"></td>

    <td>Country:</td></span>
    <td><input type="text" class="rcorners1" name="country"  id="country" onblur="validateCountry()"></td>
  </tr>
  <tr>
    <td>Pincode:</td><span>
    <td><input type="number" class="rcorners1" name="pincode" id="pincode" onblur="validatePincode()"></td>
  
  <td>Mobile:</td></span>
  <td><input type="number" name="contact" class="rcorners1" id="contact" onblur="validateMobile()"></td>
   </tr>
   <tr>
  <td>Email:</td><td><input class="rcorners1" id="email" type="text" name="email" placeholder="Email_Id" onblur="validateEmail()"></td>
</tr>
   <tr>
   <td>Hobbies</td>
   <td><input type="checkbox" name="hobbies[]" value="Drawing">Playing
     <input type="checkbox" name="hobbies[]" value="Singing">Singing
     <input type="checkbox" name="hobbies[]" value="Dancing">Dancing
     <input type="checkbox"  id="others" value="1" >Others<br>
     <textarea class="rcorners1" id="pq" name = "hobbies[]" rows=3 cols=25></textarea></td>
     </tr>
   </table>
   <tr>
	<td>Upload Photo:</td>
	<td><input type="file" name="photo" id="files" onchange="readURL(this)" /></td>
   </tr>
   <img id="blah" src="#" width="150" height="150" style="display: none"/>
   </fieldset></font>
   <br>
   <fieldset>
   <legend>Academic Details</legend><font face="Calibri">
   <table>
   <tr>
    <td>Registration No.:</td><span>
   <td><input type="text" class="rcorners1" id = "registration_no" name="registration_no" onchange="find_roll()" onblur="validateRegistration()"></td>
    <td><pre>         Course:</pre></td></span>
  <td><select class="rcorners1" name="degree" id="degree" onblur="validateCourse()">
    <option value="none"></option>
    <option value="btech">B.Tech</option>
    <option value="mtech">M.Tech</option></select></td>
   
  
  </tr>
   <tr>
  <td>Year:</td><span>
  <td><select name="year" class="rcorners1" id="year" onblur="validateYear()">
    <option value="none"></option>
    <option value="First">First</option>
    <option value="Second">Second</option>
    <option value="Third">Third</option>
    <option value="Fourth">Fourth</option></select></td>
  
  <td><pre>         Branch:  </pre></td></span>
  <td><select name="branch" class="rcorners1" id="branch" style="width:170px;" onchange="branchcode1()" onblur="validateBranch()">
      <option value="none"></option>
      <option value="BT">Bio-Technology</option>
    <option value="CE">Civil Engineering</option>
    <option value="CSE">Computer Science & Engineering</option>
    <option value="CHE">Chemical Engineering</option>
    <option value="ECE">Electronics & Communication Engineering</option>
    <option value="EE">Electrical Engineering</option>
    <option value="IT">Information Technology</option>
    <option value="ME">Mechanical Engineering</option>
    <option value="MME">Metallurgy & Materials Engineering</option>
  </td>
   </tr>
  <tr>
    <td>Roll-No:</td><span>
    <td>
  <textarea style="margin-top:2px" rows=1 cols=2 class="rcorners1" id="rollno" name="rollno1" readonly></textarea> /
  <textarea style="margin-top:2px;font-weight:bold" class="rcorners1" id="branchcode" rows=1 cols=2 name="rollno2" readonly></textarea> /
  <textarea style="margin-top:2px" rows=1 cols=2 class="rcorners1" id="rollno2" name="rollno3" onblur="validateRoll()"></textarea>
  
  <td><pre>         CGPA:  </td></span>
  <td><input type="text" name="cgpa" class="rcorners1" id="cgpa" style="width:30px" onblur="validateCGPA()"></input>
   </table>
   </fieldset></font>
   <br>
   <fieldset>
   <legend>Login Details</legend><font face="Calibri">
   <table>
   <col-width:100px>
   <col-width:100px>
   <tr>
    <td>Username:</td>
    <td><input type="text" name="username" class="rcorners1" id="username" placeholder="Username" onblur="validateUser()"></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type="password" name="password1" class="rcorners1" id="password1" placeholder="Password" onblur="validatePassword()"></td>
  </tr>
  <tr>
    <td>Confirm Password:</td>
    <td><input type="password" name="password2" class="rcorners1" id="password2" onblur="checkpasswords()"></td>
  </tr></font>
   </table>
   </fieldset>
   </div>
   <br>
    <div class="button">
  <input type="Submit" class="submit" name="register" value="Register">
  <input type="Reset" class="reset"  name="reset" value="Reset">
   </div></form>
</body>
</html>
