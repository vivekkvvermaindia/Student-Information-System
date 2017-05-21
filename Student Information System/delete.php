<?php
$conn = mysqli_connect("localhost","root","","stud_db");
$delete_username = $_GET['del'];

$query = "delete from student_data where username='$delete_username'";

if(mysqli_query($conn,$query))
{
	echo "<script>window.open('mydetails_delete.php','_self')</script>";	
}

?>