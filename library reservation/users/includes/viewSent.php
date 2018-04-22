<div id="message">
<form method="POST" action="">
	<br /><br />
	<?php
	$sender = $_GET['read'];
	$id = $_GET['track'];
	
	mysql_query("UPDATE msg SET status = 'read' WHERE id = '$id'");
	
	$mysqlUnread = mysql_query("SELECT * FROM msg WHERE id = '$id' AND define='$recipient'");
	$unreadMsg = mysql_num_rows($mysqlUnread);
	while($select = mysql_fetch_array($mysqlUnread)){
		$id = $select[0];
		$rec = $select[1];
		$sender = $select[2];
		$message = $select[4];
		$date = $select[7];	
	}
	$mysqlSent = mysql_query("SELECT * FROM users WHERE email = '$rec'");
	while($select = mysql_fetch_array($mysqlSent)){
		$f = $select['fname'];
		$m = $select['mname'];
		$l = $select['lname'];
		$name = $f." ".$m." ".$l;
	}
	?>
	<p style="font-size: 6px;">&nbsp;</p>
		<center>	
		<textarea readonly name="messageTXT" maxlength="500" id="readMsg" placeholder="<?php echo $message; ?>"><?php echo $message; ?></textarea>
		</center>	
		<br />
		
	<table>
		<tr><td>
		Sent : <b><?php echo $date; ?></b><br>
		</td></tr>
		
		<tr><td>
		Recipient : <b><?php echo $name." (".$rec.")"; ?></b>
		<input type="hidden" name="emailSender" value="<?php echo $sender; ?>">
		<input type="hidden" name="senderName" value="<?php echo $senderName; ?>">
		</td></tr>
	</table>
	<br /><br />
<center>
<a href="functions/delMsg.php?del=<?php echo $id; ?>&email=<?php echo $sender; ?>" title="Delete this message from <?php echo $senderName; ?>" class="submit"> &nbsp;Delete </a>
&nbsp;
<a href="allsent.php" title="Go back to sent Message" class="submit"> &nbsp;Back&nbsp; </a>
</center>
</form>
</div>