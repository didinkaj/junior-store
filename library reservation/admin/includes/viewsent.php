<br/>
<?php
	$idSrc = $_GET['target'];
	
	$queryMSG = mysql_query("SELECT * FROM msg WHERE id = '$idSrc'");
	while($getMsg = mysql_fetch_array($queryMSG)){
		$recipient = $getMsg['recipient'];
		$date = $getMsg['date'];
		$message = $getMsg['message'];	
	}
		
	$queryUser = mysql_query("SELECT * FROM users WHERE email = '$recipient'");
	while($getUser = mysql_fetch_array($queryUser)){
		$f = $getUser['fname'];
		$m = $getUser['mname'];
		$l = $getUser['lname'];
		$nameSent = $f." ".$m." ".$l;
	}
	
?>
<center><textarea readonly class="textarea2" placeholder="  Blank Message"><?php echo $message ?></textarea></center>
<br />
<center>Sent : <?php echo $date ?></center>
<p style="font-size: 6px;">&nbsp;</p>
<center>Recipient : <?php echo $nameSent ?></center>
<p style="font-size: 6px;">&nbsp;</p>
<center>Email Address : <label class="lbl1"><?php echo $recipient ?></label></center>

<center><br /><hr width="70%" /><br /><p style="font-size: 6px;">&nbsp;</p></center>

<div style="width: 348px; margin-left: auto; margin-right: auto;">
<center>
	<div class="linkBtn">
	<a href="functions/delSentMsg.php?del=<?php echo $idSrc ?>">Delete</a>
	</div> 
	
	<div class="linkBtn">
	<a href="sent.php">Back</a>
	</div> 
</center>
</div>