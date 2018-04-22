<?php session_start();  include "functions/conn.php";
 if(isset($_SESSION['email'])){
	if ($_SESSION['email']){
		header("location:http:users/budget.php");
	}
}
?>
<html>
<head>
	<title>Budget | UOE Main Library, Main compus, eldoret</title>
	<meta name="keywords" content="reservation,UOE Main Library, Main compus, eldoret">
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/login.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/reservation.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/alertbox.css"/>
<link rel="stylesheet" type="text/css" href="css/budget.css"/>
<script src="js/alertbox.js"></script>
</head>
<body>
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>
	<div id="header">
	
		<div id="login">
		&nbsp;&nbsp;<p style="font-size: 4px;">&nbsp;</p>
		<div id="sublogin">
			<?php include 'includes/login.html'; ?>
			<?php include 'functions/login.php'; ?>
		</div> <!--#sublogin-->
		</div> <!--#login-->
	
		
		<div id="banner">
			<?php include 'includes/banner.html'; ?>
		</div> <!--#banner-->
		
		<div id="navi">
			<?php include 'includes/navi.html'; ?>
		</div> <!--#navi-->		
		
	</div> <!--#header-->
	
<div id="contents">
	<div id="main-content">
	<br /><br />
	<center><h1 class="title">Budget</h1></center>
		<?php include "includes/budget.php" ?>
	</div>
</div><!--#contents-->
	<div id="footer">
		<?php include 'includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>