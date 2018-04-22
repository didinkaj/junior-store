<div id="reservation">
<?php
if(isset($_POST['reserve'])){
	$id = $_POST['id'];
	$event = $_POST['event'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$cname = ucwords(trim($_POST['cname']));
	$mr = ucwords(trim($_POST['mr']));
	$mrs = ucwords(trim($_POST['mrs']));
	date_default_timezone_set('Africa/Kenya');
	$dateAdded = date('M. d, Y');
	$datecompar = $date." ".$time;
	$hourlimit = 48;
	$datelimit =  date('Y-m-d', strtotime('+' . $hourlimit . ' hours'));
	
	$queryUserRes = mysql_query("SELECT * FROM users WHERE id='$id'");
	$arr = mysql_fetch_array($queryUserRes);
	
	$fname = $arr['fname'];
	$mname = $arr['mname'];
	$lname = $arr['lname'];
	$name = $fname." ".$mname." ".$lname;
	$email = $arr['email'];
	$address = $arr['address'];
	$age = $arr['age'];
	$contact = $arr['contact'];
	
	if(empty($mr)){
		$mr = "None";
		
	}
	if(empty($mrs)){
		$mrs = "None";
	}
	if(is_numeric($mr)){
		echo "<script>Alert.render('Invalid Name.')</script>";
	}
	if(is_numeric($mrs)){
		echo "<script>Alert.render('Invalid Name.')</script>";
	}
	
	if(empty($cname)){
		echo "<script>Alert.render('You must input the christening name.')</script>";
	}else{
		
	if(is_numeric($cname)){
		echo "<script>Alert.render('Invalid Name!')</script>";		
	}else{
		
	/* Variable Testing
		echo "Cname : ".$cname."<br/>";
		echo "Fname : ".$mr."<br/>";
		echo "Mname : ".$mrs."<br/>";
	*/
	$qInsert = mysql_query("INSERT INTO reserved (name,email,event,date,time,dateAdded,address,age,contact,cname,mr,mrs,user_id,datecompar,datelimit,status) 
	VALUES 
	('$name','$email','$event','$date','$time','$dateAdded','$address','$age','$contact','$cname','$mr','$mrs','$id','$datecompar','$datelimit','pending')");
	
	if($qInsert){
		echo "<script>Alert.render('Your reservation sent to the administrator.<br/>Your reservation status is pending until the administrator confirmed your request approval')</script>";
		echo "
		<script>
			setInterval(
				function(){	window.location='index.php' },5000
			);
		</script>";	
	}else{
		echo "<script>Alert.render('Reservation Failed!<br/>Please Try Again Later')</script>";
	}
	}}
	
}
?>
<div id="req">
<p style="font-size: 5px;">&nbsp;</p>
	<center><h3>Requirements</h3></center>
<?php
$qReq = mysql_query("SELECT * FROM requirements WHERE reqfor='Christening'");
	$array = mysql_fetch_array($qReq);
	$required = $array['required'];
	
?>
	<center>
	<textarea readonly class="txtReq"><?php echo $required; ?></textarea>
	</center>
</div>	

<?php
	$id = $_GET['target'];
	$event = $_GET['event'];
	$date = $_GET['date'];
	$time = $_GET['time'];
	
	if(empty($id)){
		echo "<script>window.location='reservation.php'</script>";
	}elseif($event != "Christening"){
		echo "<script>window.location='reservation.php'</script>";
	}elseif(empty($date)){
		echo "<script>window.location='reservation.php'</script>";
	}elseif(empty($time)){
		echo "<script>window.location='reservation.php'</script>";
	}else{
?>
	<form method="POST" action="">

	<input type="hidden" name="id" value="<?php echo $id ?>"/>
	<input type="hidden" name="event" value="<?php echo $event ?>"/>
	<input type="hidden" name="date" value="<?php echo $date ?>"/>
	<input type="hidden" name="time" value="<?php echo $time ?>"/>
	
		<table border="0">
	<tr>
		<td><label for="cname">Seat Name :</label></td>
		<td><input type="text" autofocus required id="cname" value="<?php echo $cname ?>" name="cname" class="txt" /></td>
	</tr>
	<tr>
		<td><label for="mr">Room Name :</label></td>
		<td><input type="text" id="mr" name="mr" class="txt" value="<?php echo $mr ?>" /></td>
	</tr>
	<tr>
		<td><label for="mrs">Room Nature :</label></td>
		<td><input type="text" id="mrs" name="mrs" value="<?php echo $mrs ?>" class="txt" /></td>
	</tr>
	<tr>
		<td colspan="2">
		<br />
			<center>
				<input type="submit" class="resBtn" name="reserve" value="Make Reservation For seat 1" />
			</center>
		</td>
	</tr> 
</table>
	</form>
	<br />	
<?php } ?>
</div>
