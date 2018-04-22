<?php
$_SESSION['to'];

	$query = mysql_query("SELECT * FROM msg");
	while($getInfo = mysql_fetch_array($query)){
		$recipient = $getInfo['recipient'];
	}
?>
<center>
<div id="message">
<br /><br /><br /><br /><br />
	<h3>Message Sent to <b><?php echo $recipient; ?></b></h3>
	<br /><p style="font-size: 5px;">&nbsp;</p>
	<a href="message.php" class="new">Create New Message</a>
</div>
</center>
<script src="../js/emailVal.js"></script>
