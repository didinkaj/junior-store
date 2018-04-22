<?php
if($time == ""){
		echo "<script>Alert.render('Please Set Time of Reservation')</script>";
		$selected_event = '<option value="'.$event.'" class="not">'.$event.'</option>';
		date_default_timezone_set('Asia/Manila');
		$datevalue = date('Y-m-d',strtotime($date));
		$timevalue = '<option value="" class="not">Select Time</option>';
	}else{
	
	if($date <= $today){
		echo "<script>Alert.render('Invalid Date')</script>";
		$selected_event = '<option value="'.$event.'" class="not">'.$event.'</option>';
		date_default_timezone_set('Asia/Manila');
		$datevalue = "";
		$timevalue = '<option value="'.$time.'" class="not">'.$time.'</option>';
	}else{
		
	if($numDate >= 1){
		echo "<script>Alert.render('Sorry! The Date & Time of your reservation is not available.<br/>Please try another date or time.')</script>";
		echo "
		<script>
			setInterval(
				function(){	window.location='reservations.php' },6000
			);
		</script>";
	}else{
		echo "<script>window.location='reservationO.php?event=$event&date=$getdate&time=$time'</script>";
	}}}
?>