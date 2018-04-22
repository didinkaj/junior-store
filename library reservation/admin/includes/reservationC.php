<div id="reservation">
<?php
if(isset($_POST['reserve'])){
	date_default_timezone_set('Asia/Manila');
	$event = $_POST['event'];
	$date = $_POST['date'];
	$time = $_POST['time'];	
	$address = ucwords(trim($_POST['address']));
	$name = ucwords(trim($_POST['reservedby']));
	$offer = ucwords(trim($_POST['name']));
	$mr = ucwords(trim($_POST['mr']));
	$mrs = ucwords(trim($_POST['mrs']));
	$dateAdded = date('M. d, Y');
	$datecompar = $date." ".$time;
	
	if(empty($offer)){
		echo "<script>Alert.render('Invalid Name')</script>";
	}else{
				
	$qInsert = mysql_query("INSERT INTO reserved (name,event,date,time,dateAdded,address,cname,mr,mrs,datecompar,status) 
	VALUES 
	('$name','$event','$date','$time','$dateAdded','$address','$offer','$mr','$mrs','$datecompar','approved')");
	
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
				function(){	window.location='index.php' },10000
			);
		</script>";	
		
	}
	}
}
?>
<?php
	$event = $_GET['event'];
	$date = $_GET['date'];
	$time = $_GET['time'];
	
	if($event != "Christening"){
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
	<center>Date of Reservation :<b> <?php echo date("F d, Y l", strtotime($date))." / ".$time; ?></b></center>
	
	<br /><br />
	<table border="0" width="550" align="center">
	
	<tr>
	<td width="150">Reserved By : </td>
	<td><input type="text" name="reservedby" class="txt"/></td>
	</tr>
	
	<tr>
	<td width="150">Address : </td>
	<td><input type="text" name="address" class="txt"/></td>
	</tr>
	
	<tr>
	<td width="200">Baptismal Name : </td>
	<td><input type="text" name="name" maxlength="55" class="txt"/></td>
	</tr>
	
	<tr>
	<td width="200">Father's Name : </td>
	<td><input type="text" name="mr" maxlength="55" class="txt"/></td>
	</tr>
	
	<tr>
	<td width="200">Mother's Name : </td>
	<td><input type="text" name="mrs" maxlength="55" class="txt"/></td>
	</tr>
	
	</table>
	<br />
	<center><input type="submit" name="reserve" class="submit" value=" Make Reservation For <?php echo $event ?> "/></center>
	</form>
	<br />	
<?php } ?>
</div>
