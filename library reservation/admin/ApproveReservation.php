<?php include "../functions/conn.php";
	$target = $_GET['target'];
	$email = $_GET['email'];
	$query = mysql_query("UPDATE reserved SET status = 'Approved' WHERE id = '$target'");
	$date = date("M. d, Y - h:i A");
	$to = $email;
	$subject = "Reservation Approval By Admin";
	$msg = "
	
	Email Sender: Administrator";
	
	if($query){
		$comment = "Your reservation has been approved by administrator. 
		For more details and clarification, please visit UOE Main Library, Main compus, eldoret (UOE Main Library, Main compus, eldoret)";
		
		mysql_query("INSERT INTO msg (recipient, sender, name, message, subject, status, date, define) 
		VALUES ('$email', 'Administrator', 'Administrator', '$comment', 'Reservation Approval By Admin', 'unread',
		'$date', 'Administrator')");
		
		mysql_query("INSERT INTO msg (recipient, sender, name, message, subject, status, date, define) 
		VALUES ('$email', 'Administrator', 'Administrator', '$comment', 'Reservation Approval By Admin', 'unread',
		'$date', '$email')");
		
		mail($to, $subject,  $comment, $msg);
		
		echo "<script>window.location='Success.php'</script>";
	}else{
		echo "<script>window.location='Failed.php'</script>";
	}
	echo "<script>window.location='index.php'</script>";
?>