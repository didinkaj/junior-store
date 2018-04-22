<div id="reservation">
<?php
if(isset($_POST['reserve'])){
	date_default_timezone_set('Asia/Manila');
	$event = $_POST['event'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$name = ucwords(trim($_POST['reservedby']));
	$address = ucwords(trim($_POST['address']));
	$dateAdded = date('M. d, Y');
	$datecompar = $date." ".$time;
		
	if(empty($name)){
		echo "<script>Alert.render('Invalid Name')</script>";
	}else{
	if(is_numeric($name)){
		echo "<script>Alert.render('Invalid Name')</script>";
	}else{
				
	$qInsert = mysql_query("INSERT INTO reserved (name,event,date,time,dateAdded,address,datecompar,status) 
	VALUES 
	('$name','$event','$date','$time','$dateAdded','$address','$datecompar','approved')");
	
	if($qInsert){
		echo "<script>Alert.render('Reservation Saved')</script>";
		echo "
		<script>
			setInterval(
				function(){	window.location='reservations.php' },3000
			);
		</script>";	
	}else{
		$error = mysql_error();
		echo "<script>Alert.render('Reservation Failed!<br/>Please Try Again Later<br/>')</script>";
		echo $error;
		
		echo "
		<script>
			setInterval(
				function(){	window.location='index.php' },5000
			);
		</script>";	
		
	}
	}}
}
?>
<?php
	$event = $_GET['event'];
	$date = $_GET['date'];
	$time = $_GET['time'];
	
	if($event != $event){
		echo "<script>window.location='reservations.php'</script>";
	}elseif(empty($date)){
		echo "<script>window.location='reservations.php'</script>";
	}elseif(empty($time)){
		echo "<script>window.location='reservations.php'</script>";
	}else{
?>
	<form method="POST" action="">
	<input type="hidden" name="event" value="<?php echo $event ?>"/>
	<input type="hidden" name="date" value="<?php echo $date ?>"/>
	<input type="hidden" name="time" value="<?php echo $time ?>"/>
	<br/>
	<center>Date of Reservation 
	
	<br /><br />
	<table border="0" width="550" align="center">
	<tr>
	<td width="150">Address : </td>
	<td><input type="text" class="txt" name="address"/></td>
	</tr>	
	
	<tr>
	<td width="150">Reserved By : </td>
	<td><input type="text" class="txt" name="reservedby"/></td>
	</tr>	
	</table>
	<br />
	<center><input type="submit" name="reserve" class="submit" value=" Make Reservation For <?php echo $event ?> "/></center>
	</form>
	<br />	
<?php } ?>
</div>
