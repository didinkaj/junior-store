<?php session_start(); include "functions/conn.php";
if (!$_SESSION['email']){
	header("location:../");
}
?>
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title><?php echo $fname." ".$mname." ".$lname; ?> |  UOE Main Library, Main compus, eldoret</title>
	<meta name="keywords" content="reservation, UOE Main Campus, New library">

<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/profile.css" media="all"/>
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
		<div id="account">
		<font id="user">
		<center>
		<?php echo $fname." ".$lname; ?>
		</center>
		</font>
		<p style="font-size: 4px;">&nbsp;</p>
<?php include 'functions/inboxNum.php'; ?>
		<div id="subaccount">
			 <?php include 'includes/account.html'; ?>
		</div> <!--#subaccount-->
		</div> <!--#account-->
	
		<div id="logo">
			<img src="img/logo.png" />
		</div> <!--#logo-->
		
		<div id="banner">
			<?php include 'includes/banner.html'; ?>
		</div> <!--#banner-->
		
		<div id="navi">
			<?php include 'includes/navi.html'; ?>
		</div> <!--#navi-->		
		
	</div> <!--#header-->
	
<div id="contents">
<div id="main-content">
	<?php include 'includes/changePic.php'; ?>
</div>
</div><!--#contents-->
	<br />
	
	<div id="footer">
		<?php include '../includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>
