

<div id="reservation">
<center>
<form method="POST" action="">
	 <br /><br />
<input type="hidden" name="getID" value="<?php echo $id ?>"/>
	<table border="0">
	<tr><td colspan="2"><center>
	
	<select name="event" class="sel_Events"">
	<?php echo $selected_event ?>
	<option value="Personal Study">Personal Study</option>
	<option value="Research Room">Research Room</option>
	<option value="WIFI and Free Internat Services">WIFI and Free Internat Services</option>
	<?php 
	$eventList = mysql_query("SELECT * FROM events");
	while ($eventArray = mysql_fetch_array($eventList)){
	?>			
		<option value="<?php echo $eventArray['eventList'] ?>"><?php echo $eventArray['eventList'] ?></option>
	<?php } ?>
	</select>
	
	</center><br /></td></tr>
		<tr>
		<input type="hidden" name="getID" value="<?php echo $id ?>"/>
		<td>

			<label>Date :</label>
		</td>
		<td>
		<input type="date"   placeholder='Select DOB' autofocus value="<?php echo $datevalue ?>"   id='datepicker' required name="date" class="date" />
		</td>	
		</tr>
		
		<tr>
		<td>
			<label>Time :</label>
		</td>
		<td>
		<select name="time" class="sel_time">
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
