<?php session_start(); include "functions/conn.php";
if (!$_SESSION['name']){
	header("location:login.php");
}
?>
<html>
<head>
	<title>View Message | UOE Main Library, Main compus, eldoret</title>
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
	<center><h2 class="title">View Message</h2></center><br /><br />
		<br />
		<?php
			$idSrc = $_GET['target'];
			
			$queryMSG = mysql_query("SELECT * FROM msg WHERE id = '$idSrc'");
			while($getMsg = mysql_fetch_array($queryMSG)){
				$getMsg['recipient'];
				$getMsg['sender'];
				$getMsg['name'];
				$message = $getMsg['message'];	
			}
			
		?>
		<center><textarea readonly class="textarea2" placeholder="  Blank Message"><?php echo $message ?></textarea></center>
		<br />
		<center>Sent : </center>
		<p style="font-size: 6px;">&nbsp;</p>
		<center>Recipient : </center>
		<center><br /><hr width="70%" /><br /><p style="font-size: 6px;">&nbsp;</p>
			<form method="POST">
				<a href="delMsg" class="lnkBtn">Delete</a>
			</form>
		</center>
	</div> <!--#contents-->
	
	<div id="footer">
	<hr>
		<?php include "includes/footer.php"; ?>
	</div> <!--#footer-->
</body>
</html>