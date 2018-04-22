<div id="reservation">
<?php
if(isset($_POST['reserve'])){
	$id = $_POST['id'];
	$event = $_POST['event'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$offer = ucwords(trim($_POST['offer']));
	date_default_timezone_set('Africa/Kenya');
	$dateAdded = date('M. d, Y');
	$datecompar = $date." ".$time;
	$hourlimit = 72;
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
	
	if(empty($offer)){
		echo "<script>Alert.render('Please Select Service Offer')</script>";
	}else{
				
	$qInsert = mysql_query("INSERT INTO reserved (name,email,event,date,time,dateAdded,address,age,contact,offer,user_id,datecompar,datelimit,status) 
	VALUES 
	('$name','$email','$event','$date','$time','$dateAdded','$address','$age','$contact','$offer','$id','$datecompar','$datelimit','pending')");
	
	if($qInsert){
		echo "<script>Alert.render('Your reservation sent to the administrator.<br/>Your reservation status is pending until the administrator confirmed your request approval')</script>";
		echo "
		<script>
			setInterval(
				function(){	window.location='index.php' },6000
			);
		</script>";	
	}else{
		$error = mysql_error();
		echo "<script>Alert.render('Reservation Failed!<br/>Please Try Again Later<br/>$error')</script>";
		echo $error;
		echo "
		<script>
			setInterval(
				function(){	window.location='index.php' },5000
			);
		</script>";	
		
	}
	}
}
?>
<div id="req">
<p style="font-size: 5px;">&nbsp;</p>
	<center><h3>Requirements</h3></center>
<?php
$qReq = mysql_query("SELECT * FROM requirements WHERE reqfor='Wedding'");
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
	}elseif($event != "Wedding"){
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
	
		<table border="0" class="wedding-table">
	<tr>
		<td><label for="offer">Number of seats present  :</label></td>
		<td><select id="offer" name="offer" class="select" style="width: 200px;" onchange="selectOffer()">
				<option value="" class="not">Select Service</option>
				<option value="a">Seat 1</option>
				<option value="b">seat 2</option>
				<option value="c">Seat 3</option
				<option value="a">Seat 4</option>
				<option value="b">seat 5</option>
				<option value="c">Seat 6</option>
                                <option value="a">Seat 7</option>
				<option value="b">seat 8</option>
				<option value="c">Seat 9</option
				<option value="a">Seat 10</option>
				<option value="b">seat 11</option>
				<option value="c">Seat 12</option>
			</select><br/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="borderLbl"><label id="offerLabel"></label></div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<br />
			<center>
				<input type="submit" class="resBtn" name="reserve" value="Make Reservation For personal study" />
			</center>
		</td>
	</tr>
</table>
	</form>
	<script>
		function selectOffer(){
			borderLbl = document.getElementById('borderLbl');
			offerLabel = document.getElementById('offerLabel');
			offer = document.getElementById('offer');
			if(offer.value == "a"){
				borderLbl.style.visibility = "visible";
				borderLbl.style.opacity = 1;
				borderLbl.style.color = "#1d3763";
				offerLabel.style.color = "#1d3763";
				offerLabel.innerHTML = "&#8369; 8,000.00 - FLOWER, CARPET & ARCH";
			}else if(offer.value == "b"){
				borderLbl.style.visibility = "visible";
				borderLbl.style.opacity = 1;
				borderLbl.style.color = "#1d3763";
				offerLabel.style.color = "#1d3763";
				offerLabel.innerHTML = "&#8369; 7,000.00 - FLOWER";
			}else if(offer.value == "c"){
				borderLbl.style.visibility = "visible";
				borderLbl.style.opacity = 1;
				borderLbl.style.color = "#1d3763";
				offerLabel.style.color = "#1d3763";
				offerLabel.innerHTML = "&#8369; 1,500.00 - NO DECORATION";
			}else{
				borderLbl.style.visibility = "visible";
				borderLbl.style.opacity = 1;
				borderLbl.style.color = "red";
				offerLabel.style.color = "red";
				offerLabel.innerHTML = "Please Select Service Offer";
			}
		}
	</script>
	<br />	
<?php } ?>
</div>
