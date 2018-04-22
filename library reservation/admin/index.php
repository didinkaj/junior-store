
<?php @session_start(); include "functions/conn.php";
if (!$_SESSION['name']){
	@header("location:login.php");
}
?>

<html>
<head>
	<title>UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="img/EP1.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/alertbox.css" media="all"/>
<script src="script/alertbox.js"></script>
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

<?php
	date_default_timezone_set("Africa/Nairobi");
	$today = date("Y-m-d");
	$query_pending = mysql_query("SELECT * FROM reserved WHERE status='pending' AND datelimit='$today'");
	$num_pending = mysql_num_rows($query_pending);
	
	$qDelete = mysql_query("DELETE FROM reserved WHERE datelimit='$today'");
	
	if($num_pending == 0){
		echo "";
	}else{
		if($qDelete){
			echo "<script>Alert.render('$num_pending pending events deleted due to not responded by admin in within 72 hours.')</script>";
		}else{
			echo "<script>Alert.render('Error Occur<br/>$num_pending pending events cannot delete.')</script>";
		}
	}
?>
	<div id="header">			
		
             
		
		<div id="banner">
			<?php include '../includes/banner.html'; ?>
		</div> <!--#banner-->
        
		
		<div id="navi">
			<?php include 'includes/navi.html'; ?>

		</div> <!--#navi-->		
		
	</div> <!--#header-->
	
<div id="contents">
	<div id="mainCont"></div> <!--#mainCont-->	
</div><!--#contents-->
	
	<div id="footer">
		<?php include '../includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>
