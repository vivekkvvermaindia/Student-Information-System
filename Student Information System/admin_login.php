<?php
if(!isset($_SESSION['user']))
{
session_start();
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
<SCRIPT type="text/javascript">
   window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>
<style>
*{
margin:0;
}
.w{
text-align:center;
margin-top:15px;
font-style: italic;
color:pink;
}
</style>
<style>
#c{text-align:center}
</style>
<?php
{
	function logout()
	{
		session_destroy($_SESSION['username']);
		header('Location:administrator_login.php');
	}
}?>
</head>
<body onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="">
<p id="c">National Institute of Technology Durgapur</p>
<ul>
	<li><a href="mydetails_approve.php">Student's Details</a></li>
	<li style="float:right"><a href="logout1.php">Log out</a></li>
</ul>
<marquee behavior="alternate">
<h2 style="color:black"><font face="Cooper Black"> Welcome to National Institute of Technology Durgapur</font></h2>
</marquee>
<div class="w">
<?php
$z = "Welcome admin " . $_SESSION['user'] ;
echo "<h2> $z </h2>" ;
?>
</p>
 <img src="images/logo.png" style="width: 300px;">
</body>
</html>
