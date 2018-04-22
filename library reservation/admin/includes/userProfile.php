<div id="requirements"><br />
<?php
	$target = $_GET['target'];
	
	$q = mysql_query("SELECT * FROM users WHERE id = '$target'");
	
	while($row = mysql_fetch_array($q)){
		$id = $row[0];
		$profile = $row['profile'];
		$email = $row['email'];;
		$fname = $row['fname'];
		$mname = $row['mname'];
		$lname = $row['lname'];
		$name = $fname." ".$mname." ".$lname;
		$address = $row['address'];
		$age = $row['age'];
		$contact = $row['contact'];
		$gender = $row['gender'];
		$status = $row['status'];
		$active = $row['active'];
?>
<table style="color: #000;" width="650">
	<tr>
		<td colspan="2">
			<center><h1 class="title"><?php echo $fname." ".$mname." ".$lname ?></h1></center>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<center><hr></center>
		</td>
	</tr>
	<tr>
		<td>
			<center><img src="../users/profile/<?php echo $profile ?>" width="200" height="200" class="hoverPro"></center>
		</td>
		<td>
			<div id="line1">
				<label class="lbl1">First Name : <b><?php echo $fname ?></b></label><br />
				<p style="font-size: 8px;">&nbsp;</p><hr />
				<p style="font-size: 8px;">&nbsp;</p>
				
				<label class="lbl1">Middle Name : <b><?php echo $mname ?></b></label><br />
				<p style="font-size: 8px;">&nbsp;</p><hr />
				<p style="font-size: 8px;">&nbsp;</p>
				
				<label class="lbl1">Last Name : <b><?php echo $lname ?></b></label><br />
				<p style="font-size: 8px;">&nbsp;</p><hr />
				<p style="font-size: 8px;">&nbsp;</p>
				
				<label class="lbl1">Email Address : <b><?php echo $email ?></b></label><br />
				<p style="font-size: 8px;">&nbsp;</p><hr />
				<p style="font-size: 8px;">&nbsp;</p>
				
				<label class="lbl1">Contact Number : <b><?php echo $contact ?></b></label><br />
			</div>
		</td>
	</tr>
</table>

<table style="color: #000;" width="650">
	<tr>
		<td><hr><hr>
		<p style="font-size: 8px;">&nbsp;</p>
			<label class="lbl1">&nbsp;&nbsp;Age : <b><?php echo $age ?></b></label><br />
				<p style="font-size: 8px;">&nbsp;</p><hr />
				<p style="font-size: 8px;">&nbsp;</p>
				
			<label class="lbl1">&nbsp;&nbsp;Address : <b><?php echo $address ?></b></label><br />
				<p style="font-size: 8px;">&nbsp;</p><hr />
				<p style="font-size: 8px;">&nbsp;</p>
				
			<label class="lbl1">&nbsp;&nbsp;Gender : <b><?php echo $gender ?></b></label><br />
				<p style="font-size: 8px;">&nbsp;</p><hr />
				<p style="font-size: 8px;">&nbsp;</p>
				
		</td>
	</tr>
</table>
<?php } ?><br />
<div style="width: 348px; margin-left: auto; margin-right: auto;">
<center>
<div class="linkBtn">
<a href="functions/userDel.php?target=<?php echo $id ?>" title="Delete User <?php echo $fname." ".$mname." ".$lname ?>?" class="lnkBtn">Delete</a>
</div>

<div class="linkBtn">
<a href="users.php" class="lnkBtn">&nbsp;Back &nbsp;</a>
</div>
</center>
</div>
</div>
