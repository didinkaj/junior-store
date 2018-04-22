<?php 
include "functions/conn.php";
$getdate = $_GET['date'];
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $getdate." Reserved Event/s" ?> | UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/print.css" media="all" />
</head>
<body>
<div id="paper">
<div id="header">
<label class="title">UOE Main Library, Main compus, eldoret</label><br />
<label class="address">UOE Main Library, Main compus, eldoret</label><br />
<label class="address"><?php echo $getdate; ?> | Scheduled Reserved Time</label>
<br /><hr />
</div>
<?php 
if($getdate == ""){
	echo "<script>window.location='calendar.php'</script>";
}else{
	date_default_timezone_set("Asia/Manila");
	$date_conv = date("M. d, Y", strtotime($getdate));
	
	$query_event = mysql_query("SELECT * FROM reserved WHERE date='$date_conv' AND status='Approved'");
	$num_events = mysql_num_rows($query_event);
	
	while($array_events = mysql_fetch_array($query_event)){
		$reservedBy = $array_events['name'];
		$email = $array_events['email'];
		$eventDB = $array_events['event'];
		$date = $array_events['date'];
		$time = $array_events['time'];
		$dateAdded = $array_events['dateAdded'];
		$address = $array_events['address'];
		$age = $array_events['age'];
		$contact = $array_events['contact'];
		$cname = $array_events['cname'];
		$mr = $array_events['mr'];
		$mrs = $array_events['mrs'];
		$offer = $array_events['offer'];
		
	if($eventDB == "Christening"){
?>	
	<div id="sched">
		<div class="line">
			<div class="left"><label>Event : </label></div>
			<div class="right"><label><b><?php echo $eventDB ?></b></label></div>
			
			<div class="left"><label>Time : </label></div>
			<div class="right"><label><b><?php echo $time ?></b></label></div>
			
			<div class="left"><label>Name : </label></div>
			<div class="right"><label><b><?php echo $cname ?></b></label></div>
			
			<div class="left"><label>Father's Name : </label></div>
			<div class="right"><label><b><?php echo $mr ?></b></label></div>
			
			<div class="left"><label>Mother's Name : </label></div>
			<div class="right"><label><b><?php echo $mrs ?></b></label></div>
		</div>
	</div>
<?php
 	}elseif($eventDB == "Wedding"){
 ?>
 	<div id="sched">
		<div class="line">
			<div class="left"><label>Event : </label></div>
			<div class="right"><label><b><?php echo $eventDB ?></b></label></div>
			
			<div class="left"><label>Time : </label></div>
			<div class="right"><label><b><?php echo $time ?></b></label></div>
		</div>
	</div>
<?php
 	}elseif($eventDB == "Burial"){
 ?>
  	<div id="sched">
		<div class="line">
			<div class="left"><label>Event : </label></div>
			<div class="right"><label><b><?php echo $eventDB ?></b></label></div> 
			
			<div class="left"><label>Time : </label></div>
			<div class="right"><label><b><?php echo $time ?></b></label></div> 
			
			<div class="left"><label>Deceased : </label></div>
			<div class="right"><label><b><?php echo $offer ?></b></label></div> 
		</div>
	</div>
<?php
 	}else{
 ?>
 	<div id="sched">
		<div class="line">
			<div class="left"><label>Event : </label></div>
			<div class="right"><label><b><?php echo $eventDB ?></b></label></div> 
						
			<div class="left"><label>Reserved By : </label></div>
			<div class="right"><label><b><?php echo $name ?></b></label></div> 
			
			<div class="left"><label>Time : </label></div>
			<div class="right"><label><b><?php echo $time ?></b></label></div> 
		</div>
	</div>
<?php  }}} ?>
</div>

<script>
	window.print();
	window.location = 'calendar.php';
</script>

</body>
</html>