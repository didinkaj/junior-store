<?php session_start(); include "functions/conn.php";
if (!$_SESSION['name']){
	header("location:login.php");
}
?>
<html>
<head>
	<title>Manage Reservation | UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/announcement.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/forms.css" media="all"/>
</head>
<body>
	<div id="header">	
		<?php include "includes/menu.php"; ?>		
		<?php include "includes/navi.php"; ?>		
	</div> <!--#header-->
	
	
	<div id="contents">
		 <center><h1 class="title">Manage Reservation</h1></center>
		 <br />
		 <center><hr width="90%" /></center>
		 <br>
		 <center>
<?php
	$numReserved = mysql_num_rows(mysql_query("SELECT * FROM reserved WHERE status = 'Approved'"));	 
	$numPending = mysql_num_rows(mysql_query("SELECT * FROM reserved WHERE status = 'Pending'"));	 
?>
		 <b><a href="#" class="subLink">Make Reservation</a></b> | 
		 <a href="reserved.php" class="subLink">Reserved Events (<b><?php echo $numReserved ?></b>)</a> |
		  <a href="pending.php" class="subLink">Pending Events (<b><?php echo $numPending ?></b>)</a> |
		   <a href="addEvent.php" class="subLink">Add Event List</a>
		 </center>
		 <br>
		 <center><hr width="90%" /></center>
		 <br />
		
		<div  id='formCtrl'>
		<form method='POST' action=''>
		<br />
		
		
		<?php
if(isset($_POST['reserved'])){
		$dateRsrv = trim($_POST['date']);
		$name = trim($_POST['name']);
		$time = $_POST['frm_hrs']." ".$_POST['frm_mm']." - ".$_POST['to_hrs']." ".$_POST['to_mm'];
		$detail = trim($_POST['detail']);
		$event = trim($_POST['eventName']);
		$email = trim($_POST['email']);
		$profileP = $profile;
		date_default_timezone_set('Asia/Manila');
		$date = date("D M d Y  H:i:s");
		$dateCompare = date("Y-m-d");
		$status = "Approved";
		$profileP = "user.png";
		$address = trim($_POST['address']);
		$age = trim($_POST['age']);
		$contact = trim($_POST['contact']);
		$gender = $_POST['gender'];
	
	if(!is_numeric($age)){
		echo "<center><img src='img/wrong.png'> <label class='lblMsg'>Age must be numeric.</label></center>";
	}else{
	if(!is_numeric($contact)){
		echo "<center><img src='img/wrong.png'> <label class='lblMsg'>Contact number must be numeric.</label></center>";
	}else{
	if($dateRsrv == NULL){
		echo "<center><img src='img/wrong.png'> <label class='lblMsg'>Please select the date of reservation.</label></center>";
		}else{
	if($dateRsrv == $dateCompare){
		echo "<center><img src='img/wrong.png'> <label class='lblMsg'>Reservation date matched today&acute;s date.</label></center>";
	}
	elseif($dateRsrv <= $dateCompare){
		echo "<center><img src='img/wrong.png'> <label class='lblMsg'>Reservation date is already past.</label></center>";
	}
	else{
		$query = "INSERT INTO reserved (name, email, event, details, profile, date, time, dateAdded, status, address, age, contact, gender) VALUES ('$name','$email', '$event', '$detail','$profileP', '$dateRsrv', '$time', '$date', '$status', '$address', '$age', '$contact', '$gender')";
		
		if(mysql_query($query)){
		echo "<center><img src='img/right.png'> <label class='lblMsg2'>Reservation Added.</label></center>";
		echo "<script>alert('Reservation Added')</script>";
		echo "<script>window.open('reservations.php','_self')</script>";
		}else{
			echo "<script>alert('Reservation Error Found! Please try again later.')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}}}
}
}
?>
		
		
		<br />
		<center>		
	<?php include "includes/reservationForm.php"; ?>
		</form>
		</div>
		
		 <br />
	</div><!--#contents-->
		
	<div id="footer">
	<hr>
		<?php include "includes/footer.php"; ?>
	</div> <!--#footer-->
</body>
</html>