<?php session_start(); include "functions/conn.php";
if(isset($_SESSION['email'])){
	if ($_SESSION['email']){
		header("location:http:users/");
	}
}
?>

<html>
<head>
	<title>Calendar Event | UOE Main Library, Main compus, eldoret</title>
	<meta name="keywords" content="reservation, UOE Main Campus">
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/announcement.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/calendar.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/alertbox.css"/>
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
	<center><h1 class="title">Calendar Event</h1></center>
			<?php include "includes/announcement/calendar.php" ?>	
				
			<script src="js/calendar.js"></script>	
		</div>
		
<script src="js/jquery-1.8.2.min.js"></script>
		
	</div><!--#contents-->
	<br />
	
	<div id="footer">
		<?php include 'includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>