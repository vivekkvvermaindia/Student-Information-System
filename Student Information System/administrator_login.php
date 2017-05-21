<?php
session_start();
if(isset($_SESSION['user']))
{
	header('Location:admin_login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Administrator Login
</title>
<link rel="stylesheet" href="site.css">
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<script src="jquery/external/jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
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
<body>
<?php 
$conn = mysqli_connect("localhost",'root','','stud_db') or die() ;
if ( isset($_POST['Login']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
        if($username && $password)
	{
		$login = mysqli_query($conn,"Select * from admin where username = '$username' ");
		while(($row = mysqli_fetch_assoc($login)))
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
					setcookie("user",$username,time()+7200 );
				}
				else if($remember == '')
				{
					$_SESSION['user'] = $username;
				}
				header("Location:admin_login.php");
			}
			else
			{
				die("Incorrect username/password combination");
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
<h3 style="text-align:center;margin-top:20px;font-size:30px"><font face="Calibri" color="White">Administrator Login</font></h3>
<div class="g">
<form action="administrator_login.php" method="POST">
<table>
  <col-width:100px>
  <col-width:100px>
  <tr>
    <td style="font-size:25px;font-weight:bold"><font face="AR CENA">Username</td>
    <td><input type="text" class="rcorners1" name="username" required></td>
  </tr>
 <tr>
    <td style="font-size:25px;font-weight:bold"><font face="AR CENA">Password</td>
    <td><input type="password" class="rcorners1" name="password"required></td> 
  </tr>
  <tr>
	<td><input type="checkbox" name="remember">Remember me</td>
	<!--<td><a href="email.php">  Forgot password?</a></td>-->
  </tr>
  </table>
  <br>
  <div class="button">
  <input type="submit" class="login" name="Login" value="Login">
</div></form>
</div>
</body>
</html>
