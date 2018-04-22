<?php session_start(); include "functions/conn.php";
if (!$_SESSION['name']){
	header("location:login.php");
}
?>

<html>
<head>
	<title>Change Password | UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/reservation.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/users.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/alertbox.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/forms.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/details-shim.css" media="all"/>
<script src="script/html5.js"></script>
<script src="script/details-shim.js"></script>
<script src="script/alertbox.js"></script>
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
		
		
		<div id="banner">
			<?php include '../includes/banner.html'; ?>
		</div> <!--#banner-->
		
		<div id="navi">
			<?php include 'includes/navi.html'; ?>
		</div> <!--#navi-->		
		
	</div> <!--#header-->
	
<div id="contents">
	<div id="main-content">
	<br /><br />
	<center><h1 class="title">Change Password</h1></center>
		<?php include "includes/changePass.php" ?>	
	</div>
</div><!--#contents-->
	<?php include 'includes/confirmReturn.html' ?>
	<div id="footer">
		<?php include '../includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>
