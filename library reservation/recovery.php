<?php session_start(); include "functions/conn.php";
if(isset($_SESSION['email'])){
	if ($_SESSION['email']){
		header("location:http:users/");
	}
}
?>

<html>
<head>
	<title>Password Reset | St. Julian Parish Church</title>
	<meta name="keywords" content="reservation, janiuay, church, julian, system, thesis, cuenca, iloilo, wvsu, sict">
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
			<?php include 'includes/recovery.php'; ?>
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
		$email = $_POST['email'];

		$queryUser = mysql_query("SELECT * FROM users WHERE email = '$email'");
		if(mysql_num_rows($queryUser) == 0){
			echo "<script>Alert.render('The given email address is not yet registered.<br/>Please register to access user`s page.')</script>";
			echo "
			<script>
				setInterval(
					function(){	window.location='registration.php' },5500
				);
			</script>";
		}else{
			while ($getPassword = mysql_fetch_array($queryUser)){
				$id = $getPassword[0];
				$pass = $getPassword['pass'];
				$fname = $getPassword['fname'];
				$lname = $getPassword['lname'];
			}
			$to = $email;
			$subject = 'Password Recovery | St. Julian Parish Church';
			$message = 'Hi '.$fname.' '.$lname.'
			Here`s your password reset code : '
			.$pass;
			$headers = 'From: St. Julian Parish Church' . "\r\n" .
    		'Reply-To: janmaripanol91@gmail.com' . "\r\n" .
    		'X-Mailer: PHP/' . phpversion();
			
			$_SESSION['IDcode'] = $id;
			echo "<script>window.location='recovery2.php'</script>";
			/*PHP.INI Error
			if(mail($to, $subject, $message, $headers)){
				echo "<script>Alert.render('Password Reset Code sent to your email.')</script>";
				$_SESSION['IDcode'] = $id;
				echo "
				<script>
					setInterval(
						function(){	window.location='recovery2.php' },3000
					);
				</script>";
			}else{
				$error = mysql_error();
				echo "<script>Alert.render('Error Occur. Please try again later.')</script>";
				echo $error;
				 echo "
				<script>
					setInterval(
						function(){	window.location='index.php' },3000
					);
				</script>"; 
			 }
			*/
		}
	}
?>