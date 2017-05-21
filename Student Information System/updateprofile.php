<?php
session_start();
$username = $_SESSION['username'];
?>
<html>
<!DOCTYPE html>
<html>
<head>
<style>
*{
margin:0;
}
.ph{margin-left: 200px}
.button{text-align:center}

.submit{background-color:blue;
  color:white;
  padding:5px 8px;
  text-align:center;
  text-decoration:none;
  font-size:16px;
  cursor:pointer;
  border-radius: 4px;
  border:2px solid grey;
  transition-duration:0.4s}
.submit:hover{background-color:white;
       color:black}
       span{font-size:16px}

#c{text-align:center}
</style>
    <title>Update Details</title>
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="jquery/jquery-ui.min.css">
    <script src="jquery/external/jquery/jquery.js"></script>
    <script src="jquery/jquery-ui.min.js"></script>
    <p id="c">National Institute of Technology Durgapur</p>
    <SCRIPT type="text/javascript">
   window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>

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

function validateMobile(){
  var mob=document.getElementById("contact");
  if(isNaN(mob.value)){
    mob.style.background="#e35152";
    alert("Mobile Number must be numeric.")
    return false;
  }
  if(mob.value.length!=10){
    if(mob.value.length==0){
      return true;
    }
    else
    {mob.style.background="#e35152";
        alert("Mobile Number must be ten digit long.")
        return false;}
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

function validateEmail(){
  var x = document.getElementById("email");
  var exp=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(!x.value.match(exp)){
    if(x.value.length==0){
      return true;
    }
    else
       {x.style.background="#e35152";
              alert("Not a valid e-mail address")
               return false;}
    }
  else{
    x.style.background="#ccffcc";
    return true;
  }
}

function validateCGPA(){
  var cgpa=document.getElementById("cgpa");
  if(cgpa.value==null || cgpa.value.trim()==""){
    return true;
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

</script>

<script>
function validation(){
  if(!(validateMobile())){
      return false;
  }
  else if(!(validateEmail())){
      return false;
  }
   else if(!(validateCGPA())){
    return false;
  }
else
  {
    return true;
  }
}
</script>


</head>
<body onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="">
<div>
  <nav >
      <ul >
          <!--<li><a href="updateprofile.php">Update</a></li>-->
          <li><a href="mystudentdetails.php">Back</a></li>
        <li style="float:right"><a href="logout2.php">Log out</a></li>
      </ul>
    </nav>
<?php
$conn = mysqli_connect("localhost","root","","stud_db");
$sql = "select * from student_data where username = '$username'" ;
$fetch = mysqli_query($conn,$sql);
while(($row = mysqli_fetch_assoc($fetch)))
{
  //$_username = $row['username'];
  //$_firstname = $row['firstname'];
  /*$_lastname = $row['lastname'];
  */$_email = $row['email'];/*
  $_street = $row['street'];
  $_city = $row['city'];
  $_state = $row['state'];
  $_country = $row['country'];
  $_gender = $row['gender'];
  $_dateofbirth = $row['dateofbirth'];*/
  $_contact = $row['contact'];
  /*$_hobbies = $row['hobbies'];
  $_photo = $row['upload'];
  $v='photo/'.$_photo;
  $_registration = $row['reg_no'];
  $_branch  = $row['branch'];*/
  $_cgpa = $row['cgpa'];
  $_year = $row['year'];/*
  $_rollno = $row['rollno'];
  $_degree = $row['degree'];*/
} 
?>   
</div>
<center><label><h2><font face="Calibri" color="White" size='6'>STUDENT DETAILS</font></h2></label></center>
  <h3><b style="color:Pink"><center><i>You can edit only these fields</i></center></b></h3><br>
      <form name="register" action="update.php" method="post" onsubmit="return validation()" enctype="multipart/form-data" >
        <div class="g">
          <table>
            <tr>
                <label>
                    <td><b>Upload Photo:</b></td>
                      <td><input type="file" name="photo" id="files" onchange="readURL(this)" /></td>

                 </label>   
                 <img id="blah" src="#" class="ph" width="150" height="150" style="display: none" />  
            </tr>
              <tr>
                <label><br>
                  <td><b>Email:</b></td>
                    <td><input type="text" name="email" class="rcorners1" id="email" placeholder="<?php echo $_email;?>" onblur="validateEmail()"/></td>
                </label>
              </tr>
            <tr>
              <label>
                <td><b>Mobile No.:</b></td>
                  <td><input type="text" name="contact" class="rcorners1" id="contact"  placeholder="<?php echo $_contact;?>" onblur="validateMobile()"/></td>
              </label>
            </tr>
            <tr>
                <label>
                  <td><b>CGPA:</b></td>
                    <td><input type="text" name="cgpa" class="rcorners1" id="cgpa" placeholder="<?php echo $_cgpa;?>" onblur="validateCGPA()"/></td>
                </label>
            </tr>
            <tr>
              <label>
                    <td><b>Year:</b></td>
                        <td><select name="year" class="rcorners1" id="year" placeholder="<?php echo $_year;?>" >
                            <option value="none"></option>
                            <option value="First">First</option>
                            <option value="Second">Second</option>
                            <option value="Third">Third</option>
                            <option value="Fourth">Fourth</option></select>
                        </td>
              </label>
            </tr>
          </table>
              
          <br>
          <div class="button">
            <input type="submit" class="submit" name="update" value="update" >
          </div>
        </div>
      </form>
</body>
</html>