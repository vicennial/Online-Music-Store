<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='About us';
include 'config.php';
?>
<!DOCTYPE.php>
<html>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<!-- head -->
<?php include 'head.php'; ?>
<!-- //head -->	
<body>
<!-- header -->
<?php include 'header.php'; ?> 
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>About Us!</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
<!-- about -->
		<div class="privacy about">
			<h3>About Us</h3>
			<p class="animi">Digital Music Marketplace(DMM) is a project developed by Gvs Akhil and Amey Patel as part of their DMBS Course Assignment.</p>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<h2 style="text-align:center">Founders</h2>

<div class="card">
  <img src="images/akhil.jpg" alt="John" style="width:100%">
  <h1>Gvs Akhil</h1>
  <p class="title">Second Year Undergraduate</p>
  <p>IIT Indore</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.linkedin.com/in/gvs-akhil/"><i class="fa fa-linkedin"></i></a>  
    <a href="https://www.facebook.com/gvs.akhil"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>
<div class="card">
  <img src="images/amey.jpg" alt="John" style="width:100%">
  <h1>Amey Patel</h1>
  <p class="title">Second Year Undergraduate</p>
  <p>IIT Indore</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="https://www.facebook.com/ameypatel.98"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>
		</div>
<!-- //about -->
<!-- //content -->
<?php include 'bannerend.php'; ?>
<!-- //banner -->
<!-- footer -->
 <?php include 'footer.php'; ?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<?php include 'corejscript.php'; ?>
 <!-- //Bootstrap Core JavaScript -->
 <!-- Mini Cart -->
<?php include 'minicart.php'; ?>
 <!-- //Mini Cart -->

</body>
</html>