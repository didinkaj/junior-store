<?php
	$mysqlUnread = mysql_query("SELECT * FROM msg WHERE recipient = '$recipient' AND status ='unread'");
	$unreadMsg = mysql_num_rows($mysqlUnread);
?>
<a href="profile.php" class="userMenu">
<div class="userOption">
View Profile
</div>
</a>
<hr />

<a href="message.php" class="userMenu">
<div class="userOption">
Write Message
</div>
</a>
<hr />

<a href="inbox.php" class="userMenu">
<div class="userOption">
Inbox <?php echo $unreadMsg; ?>
</div>
</a>
<hr />

<br />
<a href="functions/logout.php" class="userMenu">
<div class="userOption">
Logout
</div>
</a>
<hr />
