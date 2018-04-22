<?php
	if(isset($_POST['sendUser'])){
		$fn = $fname;
		$mn = $mname;
		$ln = $lname;
		$to = $_POST['to'];
		$subject = "St. Julian Parish Church";
		$message = trim($_POST['messageTXT']);
		$email;
		$from = $email;
		$full = $fn." ".$mn." ".$ln;
		$header = "Message From : ".$fn." ".$mn." ".$ln." (".$email.")";
		
		if($to == NULL){
			echo "<script>alert('Please enter the recipient.')</script>";
		}
		if($message == NULL){
			echo "<script>alert('Please enter your message.')</script>";
		}else{
			
		$query = "INSERT INTO msg (recipient, sender, message, subject, status) VALUES ('$to', '$from', '$message', '$header', 'unread')";
		mysql_query($query);
		
		echo "<script>window.open('sent.php','_self')</script>";
		
		if(mail($to, $subject, $message, $header)){
			echo "";
		}else{
			echo "Sending mail failed. Internet Required.";	
		}
		}
		
		
	}
?>