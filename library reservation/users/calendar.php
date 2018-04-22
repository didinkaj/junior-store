<?php session_start(); include "functions/conn.php";
if (!$_SESSION['email']){
	header("location:../calendar.php");
}
?>
<?php include "functions/inboxNum.php"; ?>
<html>
<head>
	<title>Calendar Event | UOE Main Library, Main compus, eldoret</title>
	<meta name="keywords" content="reservation, UOE Main Campus, New library">
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/announcement.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/calendar.css" media="all"/>
</head>
<body>
	<!-- MySQL data for users -->
	<?php 
	$session = $_SESSION['email'];
	$queryUser = mysql_query("SELECT * FROM users WHERE email = '$session'");
	while($r = mysql_fetch_array($queryUser)){
		$id = $r[0];
		$profile = $r['profile'];
		$email = $r['email'];;
		$fname = $r['fname'];
		$mname = $r['mname'];
		$lname = $r['lname'];
		$address = $r['address'];
		$age = $r['age'];
		$contact = $r['contact'];
		$gender = $r['gender'];
		$status = $r['status'];
		$active = $r['active'];
	}
	?>
	<div id="header">
		<div id="account">
		<font id="user">
		<center>
		<?php echo $fname." ".$lname; ?>
		</center>
		</font>
		<p style="font-size: 4px;">&nbsp;</p>
		
		<div id="subaccount">
			 <?php include 'includes/account.html'; ?>
		</div> <!--#subaccount-->
		</div> <!--#account-->
	
		
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
		<?php include '../includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>