<div id="inbox">
	<br />
	
	<table>
	<?php
	$recipient = $_SESSION['email'];
	
	$mysqlAllmsg = mysql_query("SELECT * FROM msg WHERE recipient = '$email' AND define='$email'");
	$allMsg = mysql_num_rows($mysqlAllmsg);
	
	$sentMmsg = mysql_query("SELECT * FROM msg WHERE sender = '$email' AND define='$email'");
	$allSent = mysql_num_rows($sentMmsg);
	
	echo '<center>
	<a href="allread.php" title="View All Messages" class="allInbox">All (<b>'.$allMsg.'</b>)</a> | 
	<a href="inbox.php" title="View All Unread Messages" class="allInbox">Unread (<b>'.$unreadMsg.'</b>)</a> | 
	<b><a href="allsent.php" title="View All Sent Messages" class="allInbox">Sent (<b>'.$allSent.'</b>)</a></b> 
	<p style="font-size:5px;">&nbsp;</p><hr color="#236ddc" /><br>
	</center>';
	
	if($allSent == 0){
		echo "<center><h3>(empty)</h3></center>";
	}else{
	$mysqlUnread = mysql_query("SELECT * FROM msg WHERE sender = '$email' AND define='$email'");
	$unreadMsg = mysql_num_rows($mysqlUnread);
	while($select = mysql_fetch_array($mysqlUnread)){
		$id = $select[0];
		$recipient = $select['recipient'];
		$name = $select['name'];
		$message = $select['message'];
		$subject = $select['subject'];
		$msgStatus = $select['status'];
		$date = $select['date'];
	$mysqlSent = mysql_query("SELECT * FROM users WHERE email = '$recipient'");
	while($select = mysql_fetch_array($mysqlSent)){
		$id = $select['status'];
		$profile = $select['profile'];
		$f = $select['fname'];
		$m = $select['mname'];
		$l = $select['lname'];
		$getname = $f." ".$m." ".$l;
	}
	
	echo '<tr class="hoverMsg"><td class="msgSender">
		<a href="viewSent.php?read='.$sender.'&track='.$id.'" title="Read Sent Message" name="all" class="inbox">'.$recipient.' 
		<br><small>Sent : '.$date.'</small></a>
		<br><p style="font-size:5px;">&nbsp;</p><hr>
		</td>
		
		<td class="msgOpt"><br>
		<a href="functions/delSentMsg.php?del='.$id.'&email='.$sender.'" class="inbox" title="Delete Message">Delete</a>
		<br><p style="font-size:5px;">&nbsp;</p><hr>
		</td>
		</tr>';
	}
}
	?>
	</table>
</div>
