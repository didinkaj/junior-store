<?php session_start(); include "functions/conn.php";
if (!$_SESSION['name']){
	header("location:login.php");
}
?>


<html>
<head>
	<title>Manage Announcement Page | UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/announcement.css" media="all"/>
</head>
<body>
	<div id="header">	
		<?php include "includes/menu.php"; ?>		
		<?php include "includes/navi.php"; ?>		
	</div> <!--#header-->
	
	
	<div id="contents">
		 <center><h1 class="title">Manage Announcement Page</h1></center>
		 <br />
		 <center><hr width="90%" /></center>
		 <br>
		 <center>
		 <b><a href="#" class="subLink">Announcement (<b><?php include 'functions/numComments.php'; ?></b>)</a></b> | 
		 <a href="calendar.php" class="subLink">Calendar Event</a>
		 </center>
		 <br>
		 <center><hr width="90%" /></center>
		 <br />
			<?php include "includes/announcement.php" ?>
		 <br />
	</div><!--#contents-->
	
	<div id="footer">
	<hr>
		<?php include "includes/footer.php"; ?>
	</div> <!--#footer-->
</body>
</html>