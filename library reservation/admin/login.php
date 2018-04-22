<?php session_start(); include "functions/conn.php";
if(isset($_SESSION['name'])){
	if($_SESSION['name']){
		header("location:index.php");
                  
	}
}
?>
<html>
<head>
<title>Admin Login | UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/login.css" media="all"/>
</head>
<body>
	<br><br><br><br>
	<br><br>
	<div id="login"><br/><br/>
	<center><h2 class="title">Admin Login Page</h2></center>
		<form method="POST" action="" autocomplete="off">
			<table>
			<center><font style="color:#620000;"><?php include "functions/login.php"; ?></font><br><br></center>
			<tr><th>
			<input type="text" class="textboxlogin" autofocus required name="name" placeholder=" Admin Name">
			</th></tr>
			
			<tr><th>
			<input type="password" class="textboxlogin" name="pass" required placeholder=" Password">
			</th></tr>
			
			<tr><th><br>
			<center><input type="submit" class="submitlogin" name="loginBtn" value=" Login "></center>
			</th></tr>
			
			<tr><th><br>
			<center><a href="../recovery.php" class="link">Forgot Password?</a></center>
			<p style="font-size: 8px;">&nbsp;</p><hr>
			</th></tr>
			
			<tr><th><p style="font-size: 10px;">&nbsp;</p>
			<center><a href="../../library reservation" class="link">View Homepage</a></center>
			</th></tr>
			</table>
		</form>
	</div><!--#login-->
	<br><br><br>
	<div id="footer">
		<?php include "../includes/footer.php"; ?>
	</div>
</body>
</html>