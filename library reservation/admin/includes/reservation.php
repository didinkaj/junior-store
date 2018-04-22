<?php
	
$id=
$numReserved = mysql_num_rows(mysql_query("SELECT * FROM reserved WHERE status = 'Approved'"));	 
	$numPending = mysql_num_rows(mysql_query("SELECT * FROM reserved WHERE status = 'Pending'"));	 
?>
<div id="sublink">
	<b><a href="#" class="subLink">Make Reservation</a></b> | 
	<a href="reserved.php" class="subLink">Reserved Events (<b><?php echo $numReserved ?></b>)</a> |
	<a href="pending.php" class="subLink">Pending Events (<b><?php echo $numPending ?></b>)</a> |
    <a href="addEvent.php" class="subLink">Add Event List</a>
</div>

<div id="reservation_form">
<center>
<form method="POST" action="">
	 <br /><br />
<input type="hidden" name="getID" value="<?php echo $id ?>"/>
	<table border="0">
	<tr><td colspan="2"><center>
	
	<select name="event" class="sel_Events"">
	<?php echo $selected_event ?>
	<option value="Christening">Revision Questions</option>
	<option value="Wedding">Personal study room</option>
	<option value="Burial">Free WIFI and Internet services s</option>
	<?php 
	$eventList = mysql_query("SELECT * FROM events");
	while ($eventArray = mysql_fetch_array($eventList)){
	?>			
		<option value="<?php echo $eventArray['eventList'] ?>"><?php echo $eventArray['eventList'] ?></option>
	<?php } ?>
	</select>
	
	</center><br /></td></tr>
		<tr>
		<td>
			<label>Date :</label>
		</td>
		<td>
		<input type="date" placeholder="yyyy-mm-dd" autofocus value="<?php echo $datevalue ?>" required name="date" class="date" />
		</td>	
		</tr>
		
		<tr>
		<td>
	Time :
		</td>
		<td>
		<select name="time" class="date">
			<?php echo $timevalue ?>
			<option value="7:30 AM - 8:30 AM">7:30 AM - 8:30 AM</option>
			<option value="8:30 AM - 9:30 AM">8:30 AM - 9:30 AM</option>
			<option value="9:30 AM - 10:30 AM">9:30 AM - 10:30 AM</option>
			<option value="11:30 AM - 12:30 AM">10:30 AM - 11:30 AM</option>
			<option value="11:30 AM - 12:30 AM">11:30 AM - 12:30 AM</option>
			<option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
			<option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
			<option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
			<option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
		</select>
		</td>	
		</tr>
		<tr>
			<td colspan="2">
				<br /><hr /><p style="font-size: 8px;">&nbsp;</p>
				<center><input type="submit" value=" Check Availability " name="check" class="check"/></center>
			</td>
		</tr>
	</table>
</form>	

</center>
</div>