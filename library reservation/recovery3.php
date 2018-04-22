<?php session_start(); include "functions/conn.php";
if(isset($_SESSION['email'])){
	if ($_SESSION['email']){
		header("location:http:users/");
	}
}
if($_SESSION['IDcode2'] == ""){
	echo "<script>window.location='index.php'</script>";
}else{
	echo "";
}
?>
<html>
<head>
	<title>Password Reset | UOE Main Library, Main compus, eldoret</title>
	<meta name="keywords" content="reservation,UOE Main Library, Main compus, eldoret">
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/recovery.css" media="all"/>
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
		<div id="main-content"><br/>
		<center><h2 class="title">Password Reset</h2></center> <br><br>
		<center>	
		<div id="recovery">
			<?php include 'includes/recovery3.php'; ?>
		</div>
		<script src="js/recovery.js"></script>
		<script src="js/jquery-1.8.2.min.js"></script>
		</center>
		</div>
	</div><!--#contents-->
	<br />
	
	<div id="footer">
		<?php include 'includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		$pass = $_POST['pass'];
		$pass_enc = md5($_POST['pass']);
		$repeat = $_POST['repeat'];
		$id = $_POST['id'];

		if($pass != $repeat){
			echo "<script>Alert.render('Password does not matched.')</script>";
		}else{
			$queryUser = mysql_query("SELECT * FROM users WHERE id = '$id' AND pass = '$pass_enc'");
			if(mysql_num_rows($queryUser) == 1){
				echo "<script>Alert.render('Your new password cannot be matched to your recent password.')</script>";
			}else{
				mysql_query("UPDATE users SET pass = '$pass_enc' WHERE id = '$id'");
				echo "<script>Alert.render('Password Saved. You can sign-in now with your new password.')</script>";
				echo "
				<script>
					setInterval(
						function(){	window.location='login.php' },2500
					);
				</script>";
		}
		}
	}
?>