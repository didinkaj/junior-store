<?php session_start(); include "functions/conn.php";
if (!$_SESSION['email']){
	header("location:../");
}
?>

<?php include "functions/inboxNum.php"; ?>
<html>
<head>
	<title>Make Reservation | UOE Main Library, Main compus, eldoret</title>
	<meta name="keywords" content="reservation,UOE Main compus, eldoret">
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/layout.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/nav.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/reservation.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/alertbox.css"/>
<link  type="text/css" href="js/jquery/jquery-ui.css" rel="stylesheet" />
<link  type="text/css" href="js/jquery/jquery-ui.theme.css" rel="stylesheet" />
<script type="text/javascript" src="js/calendar_dt.js"></script>
<script src="js/alertbox.js"></script>
<script type="text/javascript" src="js/assets/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/assets/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/assets/moment.js"></script>
<script type="text/javascript" src="js/assets/moment_langs.js"></script>
<script type="text/javascript" src="js/modern/dialog.js"></script>
<script type="text/javascript" src="js/modern/dropdown.js"></script>
<script type="text/javascript" src="js/modern/accordion.js"></script>
<script type="text/javascript" src="js/modern/buttonset.js"></script>
<script type="text/javascript" src="js/modern/carousel.js"></script>
<script type="text/javascript" src="js/modern/input-control.js"></script>
<script type="text/javascript" src="js/modern/pagecontrol.js"></script>
<script type="text/javascript" src="js/modern/rating.js"></script>
<script type="text/javascript" src="js/modern/slider.js"></script>
<script type="text/javascript" src="js/modern/tile-slider.js"></script>
<script type="text/javascript" src="js/modern/tile-drag.js"></script>
<script type="text/javascript" src="js/jquery/jquery-ui.js"></script>
<script type="text/javascript">
		$(function() {
    		$( "#datepicker" ).datepicker({
    			maxDate:"6d",
    			minDate:"0y"
    		});
    		$( "#datepicker2" ).datepicker({
    			minDate: new Date()
    		});
  		});
	</script>
</head>
<body>
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
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>
	<div id="main-content">
	<br /><br />
	<center><h1 class="title">Make Reservation</h1></center>
	<br />
		<?php include "functions/checkAv.php" ?>
		<?php include "includes/reservation.php" ?>
	<br /></div>
</div><!--#contents-->
	<div id="footer">
		<?php include '../includes/footer.php'; ?>
	</div> <!--#footer-->
</body>
</html>