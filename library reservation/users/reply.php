<?php session_start(); include "functions/conn.php";
if (!$_SESSION['email']){
	header("location:../");

<html>
<head>
	<title>Write Message | UOE Main Library, Main compus, eldoret</title>
	<meta name="keywords" content="reservation, UOE Main Campus, New library">

<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/message.css" media="all"/>
</head>
<body>
<?php 
	$session = $_SESSION['email'];
	$queryUser = mysql_query("SELECT * FROM users WHERE email = '$session'");
	while($r = mysql_fetch_array($queryUser)){
		$id = $r[0];
		$profile = $r[1];
		$email = $r[2];
		$pass = $r[3];
		$fname = $r[4];
		$mname = $r[5];
		$lname = $r[6];
		$address = $r[7];
		$age = $r[8];
		$contact = $r[9];
		$phone = $r[10];
		$gender = $r[11];
		$status = $r[12];
		$active = $r[13];
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
	
		<div id="logo">
			<img src="img/logo.png" />
		</div> <!--#logo-->
		
		<div id="banner">
			<?php include 'includes/banner.html'; ?>
		</div> <!--#banner-->
		
		<div id="contNum">
			<?php include 'functions/contNum.php'; ?>
		</div>
		
		<div id="navi">
			<?php include 'includes/navi.html'; ?>
		</div> <!--#navi-->		
		
	</div> <!--#header-->
	
<center><hr width="80%" /></center>
	
<div id="contents">
	<center>
		<?php include "includes/message.php"; ?>
		<?php include "functions/message.php"; ?>
	</center>
</div><!--#contents-->
	<br />
	
	<div id="footer">
		<?php include 'includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>
