<div id="inbox">
	<br />
	<table>
	<?php
	$recipient = $_SESSION['email'];
	
	$mysqlAllmsg = mysql_query("SELECT * FROM msg WHERE recipient = '$recipient' AND define='$recipient'");
	$allMsg = mysql_num_rows($mysqlAllmsg);
	
	$sentMmsg = mysql_query("SELECT * FROM msg WHERE sender = '$recipient' AND define='$recipient'");
	$allSent = mysql_num_rows($sentMmsg);
	
	echo '<center>
	<b><a href="allread.php" title="View All Messages" class="allInbox">All (<b>'.$allMsg.'</b>)</a></b> | 
	<a href="inbox.php" title="View All Unread Messages" class="allInbox">Unread (<b>'.$unreadMsg.'</b>)</a> | 
	<a href="allsent.php" title="View All Sent Messages" class="allInbox">Sent (<b>'.$allSent.'</b>)</a> 
	<p style="font-size:5px;">&nbsp;</p><hr color="#236ddc" /><br>
	</center>';
	
	if($allMsg == 0){
		echo "<center><h3>(empty)</h3></center>";
	}else{
	$mysqlUnread = mysql_query("SELECT * FROM msg WHERE recipient = '$recipient' AND status = 'unread' AND define='$recipient' ORDER BY id DESC");
	$unreadMsg = mysql_num_rows($mysqlUnread);
	while($select = mysql_fetch_array($mysqlUnread)){
		$id = $select[0];
		$recipient = $select['recipient'];
		$sender = $select['sender'];
		$name = $select['name'];
		$message = $select['message'];
		$subject = $select['subject'];
		$msgStatus = $select['status'];
		$date = $select['date'];
		
	echo '
		<tr class="hoverMsg"><td class="msgSender">
		<b><a href="viewMsg.php?read='.$sender.'&track='.$id.'" title="Read Message (Unread)" name="all" class="inbox">'.$name.' <br><small>Recieved : '.$date.'</small></a></b>
		<br><p style="font-size:5px;">&nbsp;</p><hr>
		</td>
		
		<td class="msgOpt"><br>
		<a href="quickReply.php?reply='.$id.'&email='.$sender.'" class="inbox" title="Reply Sender">Reply</a>&nbsp; | &nbsp;
		<a href="functions/delMsg.php?del='.$id.'&email='.$sender.'" class="inbox" title="Delete Message">Delete</a>
		<br><p style="font-size:5px;">&nbsp;</p><hr>
		</td>
		</tr>
		';
	}
	$mysqlRead = mysql_query("SELECT * FROM msg WHERE recipient = '$recipient' AND status = 'read' AND define = '$recipient' ORDER BY id DESC");
	while($select = mysql_fetch_array($mysqlRead)){
		$id = $select[0];
		$recipient = $select['recipient'];
		$sender = $select['sender'];
		$name = $select['name'];
		$message = $select['message'];
		$subject = $select['subject'];
		$msgStatus = $select['status'];
		$date = $select['date'];
			
	echo '<tr class="hoverMsg"><td class="msgSender">
		<a href="viewMsg.php?read='.$sender.'&track='.$id.'" title="Read Message" name="all" class="inbox">'.$name.' <br><small>Recieved : '.$date.'</small></a>
		<br><p style="font-size:5px;">&nbsp;</p><hr>
		</td>
		
		<td class="msgOpt"><br>
		<a href="quickReply.php?reply='.$id.'&email='.$sender.'" class="inbox" title="Reply Sender">Reply</a>&nbsp; | &nbsp;
		<a href="functions/delMsg.php?del='.$id.'&email='.$sender.'" class="inbox" title="Delete Message">Delete</a>
		<br><p style="font-size:5px;">&nbsp;</p><hr>
		</td>
		</tr>';
	}
}
?>
	</table>
</div>
<br/>
