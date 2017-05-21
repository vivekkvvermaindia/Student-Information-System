<?php
$mysql_host ='localhost';
$mysql_user = 'root';
$mysql_pass= '';
$mysql_db='stud_db';

     $conn=mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
if(isset($_POST['register']))
{
$target_dir = "C:/xampp/htdocs/group19/photo/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
//echo $target_file ;
$z = $_FILES["photo"]["name"];
//echo $z;
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];
$gender = $_POST['gender'];
$dateofbirth = $_POST['dateofbirth'];
$contact = $_POST['contact'];
$fields = "";
$hobbies = $_POST['hobbies'];
foreach ($hobbies as $h) {
	$fields.= $h.",";
}
$register = $_POST['registration_no'];
$degree = $_POST['degree'];
$year = $_POST['year'];
$branch = $_POST['branch'];
$rollno = $_POST["rollno1"] ."/" .$_POST["rollno2"] ."/". $_POST["rollno3"];
$cgpa = $_POST['cgpa'];
$username = $_POST['username'];
$password = $_POST['password1'];
$sql = "insert into student_data values('$firstname','$lastname','$email','$street','$city','$state','$country','$pincode','$gender','$dateofbirth','$contact','$fields','$z','$register','$degree','$year','$branch','$rollno','$cgpa','$username','$password',0)";
if(mysqli_query($conn,$sql))
{
echo "<script>alert('Successfully Registered')</script> " ;
//header("refresh:5;url=student_login.php");
}
else
{
mysqli_error($conn);
//header("Location:student_register.php");
}
}
?>
