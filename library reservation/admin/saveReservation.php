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
	$target = $_GET['target'];
	$queryReservedNum = mysql_query("SELECT * FROM reserved WHERE status = 'Approved'");
	$queryReserved = mysql_query("SELECT * FROM reserved WHERE status = 'Approved' AND id='$target'");
	$numReserved = mysql_num_rows($queryReservedNum);
	
	$queryPending = mysql_query("SELECT * FROM reserved WHERE status = 'Pending'");	 
	$numPending = mysql_num_rows($queryPending);	 
?>
		 <a href="reservations.php" class="subLink">Make Reservation</a> | 
		 <b><a href="reserved.php" class="subLink">Reserved Events (<b><?php echo $numReserved ?></b>)</a></b> |
		  <a href="pending.php" class="subLink">Pending Events (<b><?php echo $numPending ?></b>)</a> |
		   <a href="pending.php" class="subLink">Add Event List</a>
		 </center>
		 <br>
		 <center><hr width="90%" /></center>
		 <br />
	<?php
		while($getReserved = mysql_fetch_array($queryReserved)){
			$id = $getReserved['id']; 
			$name = $getReserved['name']; 
			$email = $getReserved['email']; 
			$event = $getReserved['event']; 
			$details = $getReserved['details']; 
			$date = $getReserved['date']; 
			$time = $getReserved['time']; 
			$dateAdded = $getReserved['dateAdded']; 
			$address = $getReserved['address']; 
			$age = $getReserved['age']; 
			$gender = $getReserved['gender']; 
			$contact = $getReserved['contact']; 
		}
	?>
	<table style="width: 400px; color: #3278cd;">
	<form method="POST" action="saveReservation.php">
		<tr>
			<td>
				Event : 
			</td>
			<td>
				<input type="text" value="<?php echo $event; ?>" name="event" placeholder="Input Event" required class="textbox" />
			</td>
		</tr>
		<tr>
			<td>
				Name : 
			</td>
			<td>
				<input type="text" value="<?php echo $name; ?>" name="name" placeholder="Input Name" required class="textbox" />
			</td>
		</tr>
		<tr>
			<td>
				Age : 
			</td>
			<td>
				<input type="text" value="<?php echo $age; ?>" name="age" placeholder="Input Age" required class="textbox" />
			</td>
			</td>
		</tr>
		<tr>
			<td>
				Gender : 
			</td>
			<td>
				<select name="gender" class="select">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Email : 
			</td>
			<td>
				<input type="email" value="<?php echo $email; ?>" name="email" placeholder="Input Email Address" required class="textbox" />
			</td>
		</tr>
		<tr>
			<td>
				Contact Number : 
			</td>
			<td>
				<input type="email" value="<?php echo $contact; ?>" name="email" placeholder="Input Email Address" required class="textbox" />
			</td>
		</tr>
		<tr>
			<td>
				Date : 
			</td>
			<td>
				<input type="date" value="<?php echo $date; ?>" name="date" placeholder=" year / mm / dd " required class="textbox" />
			</td>
		</tr>
		<tr>
			<td>
				Time : 
			</td>
			<td>
				<select name='frm_hrs' class='sel_time'>
				<option value='01:00'>01:00</option>
				<option value='01:30'>01:30</option>
				<option value='02:00'>02:00</option>
				<option value='02:30'>02:30</option>
				<option value='03:00'>03:00</option>
				<option value='03:30'>03:30</option>
				<option value='04:00'>04:00</option>
				<option value='04:30'>04:30</option>
				<option value='05:00'>05:00</option>
				<option value='05:30'>05:30</option>
				<option value='06:00'>06:00</option>
				<option value='06:30'>06:30</option>
				<option value='07:00'>07:00</option>
				<option value='07:30'>07:30</option>
				<option value='08:00'>08:00</option>
				<option value='08:30'>08:30</option>
				<option value='09:00'>09:00</option>
				<option value='09:30'>09:30</option>
				<option value='10:00'>10:00</option>
				<option value='10:30'>10:30</option>
				<option value='11:00'>11:00</option>
				<option value='11:30'>11:30</option>
				<option value='12:00'>12:00</option>
				<option value='12:30'>12:30</option>
			   </select>
			   <select name='frm_mm' class='mm'>
				<option value='AM'>AM</option>
				<option value='PM'>PM</option>
			   </select> 
			   -   
			   <select name='to_hrs' class='sel_time'>
				<option value='01:00'>01:00</option>
				<option value='01:30'>01:30</option>
				<option value='02:00'>02:00</option>
				<option value='02:30'>02:30</option>
				<option value='03:00'>03:00</option>
				<option value='03:30'>03:30</option>
				<option value='04:00'>04:00</option>
				<option value='04:30'>04:30</option>
				<option value='05:00'>05:00</option>
				<option value='05:30'>05:30</option>
				<option value='06:00'>06:00</option>
				<option value='06:30'>06:30</option>
				<option value='07:00'>07:00</option>
				<option value='07:30'>07:30</option>
				<option value='08:00'>08:00</option>
				<option value='08:30'>08:30</option>
				<option value='09:00'>09:00</option>
				<option value='09:30'>09:30</option>
				<option value='10:00'>10:00</option>
				<option value='10:30'>10:30</option>
				<option value='11:00'>11:00</option>
				<option value='11:30'>11:30</option>
				<option value='12:00'>12:00</option>
				<option value='12:30'>12:30</option>
			   </select>
			   <select name='to_mm' class='mm'>
				<option value='PM'>PM</option>
				<option value='AM'>AM</option>
			   </select>
			</td>
		</tr>	
		<tr>
			<td>
				Address : 
			</td>
			<td>
				<input type="text" value="<?php echo $address; ?>" name="address" placeholder=" year / mm / dd " required class="textbox" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center>Details : </center>
			</td>
		</tr>	
		<tr>
			<td colspan="2">
				<center>
					<textarea class="textarea3"><?php echo $details ; ?></textarea>
				</center>
			</td>
		</tr>	
		<tr>
			<td colspan="2">
				<center>
					<br /><hr width="70%"><br />
					<input type="submit" name="submit" class="submit" value=" Save Changes " />
				</center>
			</td>
		</tr>
	</form>
	</table>
	<br /><br />
	</div><!--#contents-->
		
	<div id="footer">
	<hr>
		<?php include "includes/footer.php"; ?>
	</div> <!--#footer-->
</body>
</html>