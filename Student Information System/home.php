<!DOCTYPE html>
<html>
<head>
<title>
Homepage
</title>
<link rel="stylesheet" href="site.css">
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<script src="jquery/external/jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style>
*{
margin:0;
}
.carousel-indicators
{
	align:bottom;
}
</style>
</head>
<body>
<?php include("header.html");?>
<marquee behavior="alternate">
<h2 style="color:black"><font face="Cooper Black"> Welcome to National Institute of Technology Durgapur</font></h2>
</marquee>
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/nit1.jpg" alt="Chania" width="600" height="300" style="margin-left: 300px">
      </div>

      <div class="item">
        <img src="images/nit2.jpg" alt="Chania" width="600" height="300" style="margin-left: 300px">
      </div>
    
      <div class="item">
        <img src="images/nit3.jpg" alt="Flower" width="600" height="300" style="margin-left: 300px">
      </div>

      <div class="item">
        <img src="images/nit4.jpg" alt="Flower" width="600" height="300" style="margin-left: 300px">
      </div>

    </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="margin-top: 60px"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="margin-top: 60px"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

</body>
</html>