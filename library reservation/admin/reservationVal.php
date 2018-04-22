<?php
if(isset($_POST['reserved'])){
		$dateRsrv = $_POST['date'];
		$name = $_POST['name'];
		$time = $_POST['frm_hrs']." ".$_POST['frm_mm']." - ".$_POST['to_hrs']." ".$_POST['to_mm'];
		$detail = $_POST['detail'];
		$event = $_POST['eventName'];
		$email = $_SESSION['email'];
		$profileP = $profile;
		date_default_timezone_set('Asia/Manila');
		$date = date("D M d Y  H:i:s");
		$dateCompare = date("Y-m-d");
		$status = "Approved";
		
	if($dateRsrv == NULL){
	
		}
	if($dateRsrv == $dateCompare){
		echo "<script>alert('')</script>";
	}
	elseif($dateRsrv <= $dateCompare){
		echo "<br> The date you select is alread past";
	}
	else{
		echo "<br> OK";
	}
		$query = "INSERT INTO reserved (name, email, event, details, profile, date, time, dateAdded, status) VALUES ('$name','$email', '$event', '$detail','$profileP', '$dateRsrv', '$time', '$date', '$status')";
		
		//if(mysql_query($query)){
	//		echo "<script>alert('Reservation Complete.')</script>";
	//		$_SESSION['getID'] = $date;
	//		echo "<script>window.open('reservationSuccess.php','_self')</script>";
	//	}else{
	//		echo "<script>alert('Reservation Error Found! Please try again later.')</script>";
	//		echo "<script>window.open('index.php','_self')</script>";
	//	}
	}
?>