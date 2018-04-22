<?php session_start(); include "functions/conn.php";
if (!$_SESSION['email']){
	header("location:../");
}
?>
<html>
<head>
	<title>Email Verification | UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="../img/logo.png" type="../image/x-png" /> 
<link rel="stylesheet" type="text/css" href="../css/layout.css" media="all"/>
<style>
	#verWrap{
		cursor:default;
		background:url('../img/transparentBlue.png');
		border:solid 1px #0185FF;
		box-shadow: 0px 5px 5px 1px #0385FF;
		width:500px;
		height:250px;
		margin-top:130px;
		padding:12px;
		border-radius:10px;
		
	}
	#verPost{
		
	}
	.verP{
		color:#498FFF;
	}
	.code{
		width:245px;
		padding:5px;
		border-radius:3px;
		font-size:16px;
	}
</style>
</head>
<body>
<center>
	<div id="verWrap">
		<div id="verPost">
		<center>
			<p class="verP">
			Your verification code sent to your given email address.<br />
			Please paste the Verification Code below.
			</p>
		<br /><hr width="70%" />
		</center>
		<p style="color:red; margin-top: 5px;"><?php include '../functions/verify.php' ?></p>
		<br /><br />
		<form method="POST" action="">
		<input  type="text" name="code" autocomplete="off" required="required" placeholder="Paste your verfication code here." class="code" />
		<br /><br />
		<input  type="submit" name="activate" value="Submit" class="submit" />
		</form>
		</div> <!--#verPost-->
	</div> <!--#verWrap-->
</center>
</body>
</html>