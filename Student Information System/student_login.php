<?php
session_start();
?>
<?php
if(isset($_SESSION['username']))
{
header("Location:student_view.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Student Login
</title>
<link rel="stylesheet" href="site.css">
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<script src="jquery/external/jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<SCRIPT type="text/javascript">
   window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>
<style>
*{
margin:0;
}
 .button{text-align:center}

.login{background-color:blue;
	color:white;
	padding:5px 8px;
	text-align:center;
	text-decoration:none;
	font-size:16px;
	cursor:pointer;
	border-radius: 4px;
	border:2px solid grey;
	transition-duration:0.4s}
.login:hover{background-color:white;
	     color:black}
       span{font-size:16px}
</style>
</head>
<body onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="">
<?php 
$conn = mysqli_connect("localhost",'root','','stud_db') or die() ;
if ( isset($_POST['Login_student']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
        if($username && $password)
	{
		$login = mysqli_query($conn,"Select * from student_data where username = '$username' ");
		if(mysqli_num_rows($login)==0)
		{
			echo "<script>alert('username does not exists')</script>";
		}
		else
		{
		while(($row = mysqli_fetch_assoc($login)))
		{
			if($row['valid']==0)
			{
				echo "<script>alert('Your request is still Pending')</script>";
			}
			else
			{
			$db_password = $row['password'];
			if($db_password == $password)
				$loginok = TRUE;
			else
				$loginok = FALSE;
			if($loginok == TRUE)
			{
				$remember = $_POST['remember'];
				if($remember == "on")
				{
					setcookie("username",$username,time()+7200 );
				}
				else if($remember == '')
				{
					$_SESSION['username'] = $username;
				}
				header("Location:mystudentdetails.php");
			}
			else
			{
				echo "<script>alert('incorrect username/password')</script>";
			}
		}
	}
		}
	}
	else
	{
		die("Please enter correct username and password ");
	}
}
?>
<?php include("header.html");?>
<h3 style="text-align:center;margin-top:20px;font-size:30px"><font face="Calibri" color="white">Student Login</font></h3>
<div class="g">
<form action="student_login.php" method="POST">
<table>
  <col-width:100px>
  <col-width:100px>
  <tr>
    <td style="font-size:25px;font-weight:bold"><font face="AR CENA">Username</td>
    <td><input class="rcorners1" type="text" name="username" required></td>
  </tr>
 <tr>
    <td style="font-size:25px;font-weight:bold"><font face="AR CENA">Password</td>
    <td><input class="rcorners1" type="password" name="password" required>
  </tr>
  <tr>
	<td><input type="checkbox" name="remember">Remember me</td>
	<!--<td><a href="email.php">  Forgot password?</a></td>-->
  </tr>
  </table>
  <br>
  <div class="button">
  <input type="submit" class="login" name="Login_student" value="Login">
</div></form>
</div>
</body>
</html>
