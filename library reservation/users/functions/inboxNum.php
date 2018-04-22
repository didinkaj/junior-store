<?php
	$recipient = $_SESSION['email'];
	
	$mysql = mysql_query("SELECT * FROM msg WHERE recipient = '$recipient' AND status = 'unread' AND define='$recipient'");
	$unreadMsg = mysql_num_rows($mysql);
	while($select = mysql_fetch_array($mysql)){
		$recipient = $select[1];
		$sender = $select[2];
		$message = $select[3];
		$subject = $select[4];
		$msgStatus = $select[5];
	}
?>