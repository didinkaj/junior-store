<?php session_start(); include "functions/conn.php";
if (!$_SESSION['name']){
	header("location:login.php");
}
?>

<html>
<head>
	<title>Reservation Approval Sent | UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/forms.css" media="all"/>
</head>
<body>
	<div id="header">	
		<?php include "includes/menu.php"; ?>		
		<?php include "includes/navi.php"; ?>		
	</div> <!--#header-->
	
	
	<div id="contents">
	<center><h1 class="title">Reservation Approval Sent</h1></center><br /><br />
		<div id="cpass">
			<center><img src="../img/email.gif"></center>
		</div>
	</div><!--#contents-->
	
	<div id="footer">
	<hr>
		<?php include "includes/footer.php"; ?>
	</div> <!--#footer-->
</body>
</html>