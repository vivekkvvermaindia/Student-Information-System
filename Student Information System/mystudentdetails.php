<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<?php include("student_view.php");?>
<html>
<head>
	<link rel="stylesheet" href="site.css">
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<script src="jquery/external/jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
	<SCRIPT type="text/javascript">
   window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>
<style>
legend{
color:white;
text-align: center;
}
</style>
</head>
<?php
$conn = mysqli_connect("localhost","root","","stud_db") or die();
$z = $_SESSION['username'];
$sql = "select * from student_data where username = '$z' ";
$fetch = mysqli_query($conn,$sql);
while(($row = mysqli_fetch_assoc($fetch)))
{
	//$_username = $row['username'];
	$_firstname = $row['firstname'];
	$_lastname = $row['lastname'];
	$_email = $row['email'];
	$_street = $row['address'];
	$_city = $row['city'];
	$_state = $row['state'];
	$_country = $row['country'];
	$_gender = $row['gender'];
	$_dateofbirth = $row['dateofbirth'];
	$_contact = $row['contact'];
	//$_hobbies = $row['hobbies'];
	$_photo = $row['photo'];
	$v='photo/'.$_photo;
	$_registration = $row['reg_no'];
	$_branch  = $row['branch'];
	$_cgpa = $row['cgpa'];
	$_year = $row['year'];
	$_rollno = $row['rollno'];
	$_degree = $row['course'];
}
?>
<div class = "fo">
<fieldset>
	<legend>Personal Details</legend>
	<table class="tr1" width="800px">
		<tr>
		<td class="td1" ><b>Profile Photo</b></td>
		<td class="td2"><?php echo "<img src='".$v."' width='150' height='150' style='margin-left:20px' />";?></td>
	</tr>
	<tr>
		<td class="td1" ><b>First Name</b></td>
		<td class="td2"><?php echo $_firstname ?></td>
	</tr>
    <tr>
		<td class="td1" ><b>Last Name</b></td>
		<td class="td2"><?php echo $_lastname ?></td>
	</tr>
	<tr>
		<td class="td1" ><b>Email</b></td>
		<td class="td2"><?php echo $_email ?></td>
	</tr>
	<tr>
		<td class="td1" ><b>Street</b></td>
		<td class="td2"><?php echo $_street ?></td>
	</tr>
	<tr>
		<td class="td1" ><b>City</b></td>
		<td class="td2"><?php echo $_city ?></td>
	</tr>
	<tr>
		<td class="td1" ><b>State</b></td>
		<td class="td2"><?php echo $_state ?></td>
	</tr>
	<tr>
		<td class="td1" ><b>Country</b></td>
		<td class="td2"><?php echo $_country ?></td>
	</tr>
	<tr>
		<td class="td1" ><b>Gender</b></td>
		<td class="td2"><?php echo $_gender ?></td>
	</tr>
	<tr>
		<td class="td1" ><b>Date of birth</b></td>
		<td class="td2"><?php echo $_dateofbirth ?></td>
	</tr>
	<tr>
		<td class="td1" ><b>Mobile No.</b></td>
		<td class="td2"><?php echo $_contact ?></td>
	</tr>
	<!--<tr>
		<td class="td1" ><b>Hobbies</b></td>
		<td class="td2"><?php echo $_hobbies ?></td>
	</tr>-->
	
</table>
</fieldset><br>
<fieldset>
	<legend>Academic Details</legend>
	<table class="tr1" width="800px">
	<tr>
		<td class="td1"><b>Registration No. </b></td>
		<td class="td2"><?php echo $_registration ?></td>
	</tr>
	<tr>
		<td class="td1"><b>Course</b></td>
		<td class="td2"><?php echo $_degree ?></td>
	</tr>
	<tr>
		<td class="td1"><b>Year</b></td>
		<td class="td2"><?php echo $_year ?></td>
	</tr>
	<tr>
		<td class="td1"><b>Branch</b></td>
		<td class="td2"><?php echo $_branch ?></td>
	</tr>
	<tr>
		<td class="td1"><b>Roll No. </b></td>
		<td class="td2"><?php echo $_rollno ?></td>
	</tr>
	<tr>
		<td class="td1"><b>CGPA </b></td>
		<td class="td2"><?php echo $_cgpa ?></td>
	</tr>
	</table>
</fieldset>
</div>
</html>