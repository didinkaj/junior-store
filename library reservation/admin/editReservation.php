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
			$contact = $getReserved['contact']; 
			$age = $getReserved['age']; 
			$gender = $getReserved['gender']; 
		}
	?>
	
	<?php
		if(isset($_POST['submit'])){
			$target = $_POST['target'];
			$event = trim($_POST['event']);
			$name = trim($_POST['name']);
			$age = trim($_POST['age']);
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$date = trim($_POST['date']);
			$fromHrs = trim($_POST['frm_hrs']);
			$fromMM = trim($_POST['frm_mm']);
			$toHrs = trim($_POST['to_hrs']);
			$toMM = trim($_POST['to_mm']);
			$time = trim($_POST['time']);
			$address = trim($_POST['address']);
			$contact = trim($_POST['contact']);
			$details = trim($_POST['details']);
			date_default_timezone_set("Asia/Manila");
			$dateAdded = date("D M d Y  H:i:s");
			$profileP = "user.png";
			$status = "Approved";
			
		$run = mysql_query("SELECT * FROM reserved WHERE 
		name = '$name' 
		AND email = '$email' 
		AND event = '$event' 
		AND details = '$details'
		AND date = '$date' 
		AND time = '$time' 
		AND age = '$age'
		AND address = '$address'
		AND contact = '$contact' 
		AND gender = '$gender' 
		");
	if(mysql_num_rows($run) == 0){
		mysql_query("UPDATE reserved SET name = '$name' WHERE id = '$target' ");
		mysql_query("UPDATE reserved SET email = '$email' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET event = '$event' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET details = '$details' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET contact = '$contact' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET age = '$age' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET address = '$address' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET date = '$date' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET dateAdded = '$dateAdded' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET gender = '$gender' WHERE id = '$target'");
		mysql_query("UPDATE reserved SET time = '$time' WHERE id = '$target'");

			echo "<center><img src='img/right.png'><label class='lblMsg2'>Changes Saved.</label></center>";
	}else{
			echo "<center><label class='lblMsg2'>No Changes Saved.</label></center>";
	}
			
		
		}
	?>
	<table style="width: 450px; color: #3278cd;">
	<form method="POST" action="editReservation.php">
		<tr>
			<td><input type="hidden" name="target" value="<?php echo $target ?>">
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
				<input type="text" value="<?php echo $contact; ?>" name="contact" placeholder="Input Contact Number" required class="textbox" />
			</td>
		</tr>
		<tr>
			<td>
				Date : 
			</td>
			<td>
				<input type="date" value="<?php echo $date; ?>" name="date" placeholder=" yyyy / mm / dd " required class="textbox" />
			</td>
		</tr>
		<tr>
			<td>
				Time : 
			</td>
			<td>
				 <input type="text" value="<?php echo $time; ?>" name="time" placeholder=" 00:00 AM - 00:00 PM " required class="textbox" />
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
					<textarea name="details" class="textarea3"><?php echo $details ; ?></textarea>
				</center>
			</td>
		</tr>	
		<tr>
			<td colspan="2">
				<center>
					<br /><hr width="70%"><br />
					<input type="submit" name="submit" class="submit" value=" Save Changes " onclick="return confirm('Are your sure you want to save changes?')";/>
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