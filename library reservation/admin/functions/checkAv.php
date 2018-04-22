<?php
if(isset($_POST['check'])){
	$getID = $_POST['getID'];
	$event = $_POST['event'];
	date_default_timezone_set('Asia/Manila');
	$date = $_POST['date'];
	$time = trim($_POST['time']);
	$today = date("Y-m-d");
	$getdate = date('M. d, Y',strtotime($date));
	$datecompar = $getdate." ".$time;
	
	$query_Date = mysql_query("SELECT * FROM reserved WHERE datecompar = '$datecompar'");
	$numDate = mysql_num_rows($query_Date);
	
	if($event == "none"){
		echo "<script>Alert.render('No Event Selected')</script>";
		$selected_event = '<option value="none" class="not">Select Event</option>';
		date_default_timezone_set('Asia/Manila');
		$datevalue = date('Y-m-d',strtotime($date));
		if($time == ""){
			$timevalue = '<option value="" class="not">Select Time</option>';
		}else{
			$timevalue = '<option value="'.$time.'" class="not">'.$time.'</option>';
		}
		
	
	}elseif($event == "personal study"){
		include "functions/christening.php";	
	
	}elseif($event == "Free WIFI/Internet"){
		include "functions/wedding.php";
			
	}elseif($event == "Discussion Room"){
		include "functions/burial.php";	
	}else{
		include "functions/other.php";
	}
	
	
}else{
	date_default_timezone_set('Asia/Manila');
	$datevalue = "";
	$selected_event = '<option value="none" class="not">Select Event</option>';
	$timevalue = '<option value="" class="not">Select Time</option>';
}
?>

