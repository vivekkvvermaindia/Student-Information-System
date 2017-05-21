<?php
session_start();
if(!$_SESSION['user']){

	header('location: admin_login.php');

}
?>
<html>

<head>
	<title>Admin Panel</title>
<link rel="stylesheet" href="site.css">
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<script src="jquery/external/jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<style>
*{
margin:0;
}
.nav{
background-color: cyan;
height: 40px;
width: 100%;
}
.nav ul{
margin: 0;
}
.nav ul li{
list-style: none;
}
.nav ul li a{
text-decoration: none;
float: left;
display: block;
padding: 10px 20px;
color: black;
}
.nav ul li a:hover{
color:white;
}
#c{text-align:center}
</style>
<p id="c">National Institute of Technology Durgapur</p>
</head>
<body>
<div>
	<nav >
			<ul >
    			<li><a href="mydetails_approve.php">New Requests</a></li>
    			<li><a href="mydetails_delete.php">Registered Students</a></li>
				<li style="float:right"><a href="logout1.php">Log out</a></li>
			</ul>
    </nav>
		
</div>
<div>
	<center><h1><font face="Calibri" color="White">REGISTERED STUDENTS</font></h1></center>

	<!--<center><font size='6' color='red'><?php //echo @$_GET['deleted']; ?></font></center>-->
	<table width="900" style="margin-left:200px" border="10">
		<tr bgcolor="yellow">
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Program</th>
			<th>Department</th>
			<th>Registration No</th>
			<th>Roll No</th>
			<th>Student Details</th>
			<th>Action</th>
		</tr>
		<?php
		$conn = mysqli_connect("localhost","root","","stud_db") or die();

		$query = "select * from student_data";

		$run = mysqli_query($conn,$query);

		while(($row=mysqli_fetch_assoc($run)))
		{
			//$user_id = $row['id'];
			$user_firstname = $row['firstname'];
			$user_lastname = $row['lastname'];
			$user_username = $row['username'];
			$user_program = $row['course'];
			$user_dept = $row['branch'];
			$user_reg_no = $row['reg_no'];
			$user_roll = $row['rollno'];
		    $user_valid= $row['valid'];
		?>

		<tr align='center'>
		<?php
			if($user_valid==1)
			{
			?>
		<td bgcolor="lightgreen"><?php echo $user_firstname; ?></td>
		<td bgcolor="lightgreen"><?php echo $user_lastname; ?></td>
		<td bgcolor="lightgreen"><?php echo $user_username ; ?></td>
		<td bgcolor="lightgreen"><?php echo $user_program; ?></td>
		<td bgcolor="lightgreen"><?php echo $user_dept; ?></td>
		<td bgcolor="lightgreen"><?php echo $user_reg_no; ?></td>
		<td bgcolor="lightgreen"><?php echo $user_roll; ?></td>
		<!--<td bgcolor="lightgray"><?php echo $user_sem; ?></td> -->
		<td bgcolor="lightgreen">
		<a href="fulldetail.php?user=<?php echo $user_username?>"><span style="color:blue">View Full Details</span></td>
		
		<td bgcolor="red">
		<a href='delete.php?del=<?php echo $user_username ?>'><span style="color:white">DELETE</span></a>
		</td>
		</tr>
		<?php
		}
	}
		?> 
	</table>
	
</div>	

</body>
</html>