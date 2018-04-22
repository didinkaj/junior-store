<?php
	$queryInbox = mysql_query("SELECT * FROM msg WHERE recipient = 'Administrator' AND define = 'Administrator' AND status='unread'");
	$numInbox = mysql_num_rows($queryInbox);
	$querySent = mysql_query("SELECT * FROM msg WHERE sender = 'Administrator' AND define = 'Administrator'");
	$numSent = mysql_num_rows($querySent);
?>	
		<div id="menu">
			<label class="menuLbl">Menu</label> &nbsp; >
			<a href="changePass.php" class="menuLink">Change Password</a> &nbsp; | &nbsp;
			<a href="changeEmail.php" class="menuLink">Change Email</a> &nbsp; | &nbsp;
			<a href="message.php" class="menuLink">Write Message</a> &nbsp; | &nbsp;
			<a href="inbox.php" class="menuLink">Inbox (<b><?php echo $numInbox ?></b>)</a> &nbsp; | &nbsp;
			<a href="sent.php" class="menuLink">Sent Message (<b><?php echo $numSent ?></b>)</a>
			
			<a href="functions/logout.php" class="logout" >&nbsp;Logout&nbsp;</a>
		</div>