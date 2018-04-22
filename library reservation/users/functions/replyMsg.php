<?php
	if(isset($_POST['replyBtn'])){
		$fn = $fname;
		$mn = $mname;
		$ln = $lname;
		$to = trim($_POST['emailRecipient']);
		$subject = "St. Julian Parish Church";
		$message = trim($_POST['messageTXT']);
		$email;
		$from = $email;
		$full = $fn." ".$mn." ".$ln;
		$header = "Message From : ".$fn." ".$mn." ".$ln." (".$email.")";
		$date = date("M. d, Y - h:i A");
		
		if($to == NULL){
			echo "<script>alert('Please enter the recipient.')</script>";
		}
		if($message == NULL){
			echo "<script>alert('Please enter your message.')</script>";
		}else{
			
		$query = "INSERT INTO msg (recipient, sender, name, message, subject, status, date, define) VALUES ('$to', '$from', '$full', '$message', '$header', 'unread', '$date', '$from')";
		mysql_query($query);
		
		$query2 = "INSERT INTO msg (recipient, sender, name, message, subject, status, date, define) VALUES ('$to', '$from', '$full', '$message', '$header', 'unread', '$date', '$to')";
		mysql_query($query2);
		
		echo "<script>window.open('sent.php','_self')</script>";
		
		if(mail($to, $subject, $message, $header)){
			echo "";
		}else{
			echo "Sending mail failed. Internet Required.";	
		}
		}
		
		
	}
?>