<?php
$conn = mysqli_connect('localhost','root','',"stud_db");
$user_username = $_GET['user_username'];
$valid = $_GET['valid'];
$sql = "UPDATE student_data SET valid=1 WHERE username='$user_username'" ;
	if(mysqli_query($conn,$sql))
	header('location: mydetails_approve.php?valid=user');	

?>