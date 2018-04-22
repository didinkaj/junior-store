<?php
if($time == ""){
		echo "<script>Alert.render('Please Set Time of Reservation')</script>";
		$selected_event = '<option value="seat 1" class="not">saet 1</option>';
		date_default_timezone_set('Africa/Kenya');
		$datevalue = date('Y-m-d',strtotime($date));
		$timevalue = '<option value="" class="not">Select Time</option>';
	}else{
	
	if($date <= $today){
		echo "<script>Alert.render('Invalid Date')</script>";
		$selected_event = '<option value="saet 1" class="not">saet 1</option>';
		date_default_timezone_set('Africa/Kenya');
		$datevalue = "";
		$timevalue = '<option value="'.$time.'" class="not">'.$time.'</option>';
	}else{
		
	if($numDate > 0){
		echo "<script>Alert.render('Sorry! The Date & Time of your reservation is not available.<br/>Please try another date or time.')</script>";
		echo "
		<script>
			setInterval(
				function(){	window.location='reservations.php' },6000
			);
		</script>"; 
	}else{
		echo "<script>window.location='reservationB.php?event=$event&date=$getdate&time=$time'</script>";
	}}}
?>