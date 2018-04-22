<div id="message">
<form method="POST" action="">
	<br /><br />
	<?php
	$sender = $_GET['read'];
	$id = $_GET['track'];
	
	mysql_query("UPDATE msg SET status = 'read' WHERE id = '$id'");
	
	$queryReply = mysql_query("SELECT * FROM msg WHERE sender='$sender' AND id = '$id'");
	while($r = mysql_fetch_array($queryReply)){
		$recipient = $r['recipient'];
		$senderName = $r['name'];
		$message = $r['message'];
		$date = $r['date'];
	}
	?>
	<p style="font-size: 6px;">&nbsp;</p>
	<center>
		<textarea readonly name="messageTXT" maxlength="500" id="readMsg" placeholder="<?php echo $message; ?>"><?php echo $message; ?></textarea>
	</center>	
		<br /><br />
		
	<table>
		<tr><td>
		Recieved : <b><?php echo $date; ?></b><br>
		</td></tr>
		
		<tr><td>
		Sender : <b><?php echo $senderName." (".$sender.")"; ?></b>
		<input type="hidden" name="emailSender" value="<?php echo $sender; ?>">
		<input type="hidden" name="senderName" value="<?php echo $senderName; ?>">
		</td></tr>
	</table>
	<br /><br />
<center>
<a href="replyMsg.php?reply=<?php echo $id; ?>&email=<?php echo $sender; ?>" title="Send your reply message to <?php echo $senderName; ?>" class="submit"> &nbsp;Reply </a>
&nbsp;
<a href="functions/delMsg.php?del=<?php echo $id; ?>&email=<?php echo $sender; ?>" title="Delete this message from <?php echo $senderName; ?>" class="submit"> &nbsp;Delete </a>
&nbsp;
<a href="inbox.php" title="Go back to inbox" class="submit"> &nbsp;Back&nbsp; </a>
</center>
</form>
</div>