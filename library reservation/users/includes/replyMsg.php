<div id="message">
	<br /><br />
<form method="POST" action="">
	<?php
	$id = $_GET['reply'];
	
	$queryReply = mysql_query("SELECT * FROM msg WHERE id='$id'");
	while($r = mysql_fetch_array($queryReply)){
		$senderName = $r[3];
		$sender = $r[2];
	}
	?>
	<br /><p style="font-size: 6px;">&nbsp;</p>
	<table>
		<tr><td>
		Reply to : <b><?php echo $senderName. " (".$sender.")"; ?></b><br>
		<input type="hidden" name="emailRecipient" value="<?php echo $sender; ?>"
		</td></tr>
		
	</table>
		<br /><br />
		
		<center><label for="messageTXT">Message : </label></center><br />
		<center>
		<textarea name="messageTXT" maxlength="500" id="messageTXT" required="required" placeholder=" Type your message here..."></textarea>
		</center>
		<br /><br />
		<center>
		<input type="submit" title="Send your reply message to <?php echo $senderName; ?>" name="replyBtn" value=" Send to <?php echo $senderName; ?> " class="submitBtn">
		<br><p style="font-size: 8px;">&nbsp;</p>
		<a href="viewMsg.php?read=<?php echo $sender; ?>&track=<?php echo $id; ?>" class="submit">Cancel</a>
		</center>
		<br /><p style="font-size: 6px;">&nbsp;</p>
</form>
</div>
<br />