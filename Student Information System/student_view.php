<?php
if(!isset($_SESSION))
session_start();
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
</head>
<body>
<p id="c">National Institute of Technology Durgapur</p>
<ul>
	<li style="float:right"><a href="logout2.php">Log out</a></li>
	<li><a href="updateprofile.php">Update</a></li>
</ul>
<marquee behavior="alternate">
<h2 style="color:black"><font face="Cooper Black"> Welcome to National Institute of Technology Durgapur</font></h2>
</marquee>
<div class="w">
<?php
$z = "Username: " . $_SESSION['username'] ;
echo "<h2> $z </h2>" ;
?>
</p>
</div>
</body>
</html>
