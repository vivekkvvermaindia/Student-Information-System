<?php
session_start();
$username = $_SESSION['username'];
?>
<?php
		$conn = mysqli_connect('localhost','root','','stud_db');
		if(isset($_POST['update']))
		{
			$target_dir = "C:/xampp/htdocs/group19/photo/";
			$target_file = $target_dir . basename($_FILES["photo"]["name"]);
			$z = $_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
	        $contact = $_POST['contact'];
	        $email = $_POST['email'];
	        $cgpa = $_POST['cgpa'];
	        $year = $_POST['year'];
			if($contact==''&& $email=='' && $cgpa=='' && ($year=='' || $year=='none') && $z=='') 
			{
				echo "<script>alert('You have not updated anything!!!')</script>"; ?>
				
					<?php header("refresh:0;url='updateprofile.php'"); 
			}
			else
			{
				if($contact!=''){
					mysqli_query($conn,"UPDATE student_data SET contact='$contact' WHERE username='$username'");
				}
				if($email!=''){
					mysqli_query($conn,"UPDATE student_data SET email='$email' WHERE username='$username'");
				}
				if($cgpa!=''){
					mysqli_query($conn,"UPDATE student_data SET cgpa='$cgpa' WHERE username='$username'");
				}
				if($z!=''){
					mysqli_query($conn,"UPDATE student_data SET photo='$z' WHERE username='$username'");
				}
				if($year!='' && $year!='none'){
					mysqli_query($conn,"UPDATE student_data SET year='$year' WHERE username='$username'");
				}
					?><script>alert('Successfully updated!')</script><?php
					header("refresh:0;url='mystudentdetails.php'");
			}

		}
			?>