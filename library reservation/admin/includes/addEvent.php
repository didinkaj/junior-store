<?php
	$numReserved = mysql_num_rows(mysql_query("SELECT * FROM reserved WHERE status = 'Approved'"));	 
	$numPending = mysql_num_rows(mysql_query("SELECT * FROM reserved WHERE status = 'Pending'"));	 
?>
<div id="sublink">
	<a href="reservations.php" class="subLink">Make Reservation</a> | 
	<a href="reserved.php" class="subLink">Reserved Events (<b><?php echo $numReserved ?></b>)</a> |
	<a href="pending.php" class="subLink">Pending Events (<b><?php echo $numPending ?></b>)</a> |
   	<b><a href="#" class="subLink">Add Seat </a></b>
</div>
<br />
<div id="reservation_form">
	<div style="margin-left: 70px; border: 1px solid; float: left; width: 370px; height: 340px;">
		<form method="POST" action="">
			<center><br /><br />
			<label>Input Event Below :</label><br /><br />
			<input autocomplete="off" type="text" required autofocus name="eventTxt" placeholder=" Add Event Here.." class="txt" />
			</center>
			<center><br /><hr width="70%"><br /></center>
			<center><input type="submit" name="submit" value=" Add Event " class="submit" /></center>
			<center><br /><br /><hr width="70%"><br /></center>
		</form>
		<?php
			if(isset($_POST['submit'])){
				$event = ucwords(trim($_POST['eventTxt']));
				
				$q = mysql_query("SELECT * FROM events WHERE eventList = '$event'");
				if($event == NULL){
					echo "<center><img src='img/wrong.png'> &nbsp;Please enter event.</center>";
				}else{
				if(mysql_num_rows($q) == 0){
				$query = mysql_query("INSERT INTO events (eventList) VALUES ('$event')");
				if($query){
					mysql_query("INSERT INTO requirements (reqfor, required) VALUES ('$event', 'Empty')");
					echo "<center><img src='img/right.png'> &nbsp;<b>".$event."</b> added to the Event List</center>";
				}else{
					echo "<center><img src='img/wrong.png'> &nbsp;<b>Error inserting event<br />Please contact the programmer.</center>";
				}
				
				}else{
					echo "<center><img src='img/wrong.png'> &nbsp;<b>".$event."</b> already added into Event List</center>";
				}
				}
			}
		?>
	</div>
	<div style="margin-left: 460px; border: 1px solid; width: 370px; height: 340px; overflow: auto;">
	<br /><center>
	<?php
	$queryEventList = mysql_query("SELECT * FROM events ORDER BY id DESC");
	$numEv = mysql_num_rows($queryEventList);
	?>
	<h4>List of Added Events (<b><?php echo $numEv ?></b>)</h4></center><br />
		<div style="margin-left: 50px;">
		<?php
			$queryEventList = mysql_query("SELECT * FROM events ORDER BY id DESC");
			while($getList = mysql_fetch_array($queryEventList)){
				$getList[1];
				$id = $getList[0];
		?>
			
		<p style="font-size: 6px;">&nbsp;</p>		
		<div title="Remove this <?php echo $getList[1] ?> on the list?" class="confirmdel2" onclick="Confirm.render('Remove this <?php echo $getList[1] ?> on the list?','delete_field','<?php echo $id ?>')"></div>	
		<label><?php echo $getList[1] ?></label>
		<hr width="83%">
		<?php }	?>
		</div>
	</div>
</div>
<script>
function deletePost(id){
	document.location.href="functions/removeEv.php?target=" + id;
}
</script>
<?php 
echo "<script>";
include 'script/confirm.js';
echo "</script>";
?>