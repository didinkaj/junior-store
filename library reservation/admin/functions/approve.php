<?php 
session_start(); include "conn.php";
if (!$_SESSION['name']){
	header("location:../login.php");
}

	$target = $_GET['target'];
	$query_res = mysql_query("SELECT * FROM reserved WHERE id='$target'");
	$get_email = mysql_fetch_array($query_res);
	$user_email = $get_email['email'];
		
	if($target == ""){
		echo "<script>window.location='../pending.php'</script>";
	}else{
		$query_target = mysql_query("UPDATE reserved SET status='Approved' WHERE id='$target'");
		if($query_target){
			$recipient = $user_email;
			$sender = "Administrator";
			$message = "Your Reservation Was Successfully Approved by Administrator!";
			$subject = "Message From : Administrator (Administrator)";
			$status = "Unread";
			date_default_timezone_set("Asia/Manila");
			$date = date("M. d, Y - h:i A");
			
			$from = mysql_query("INSERT INTO msg (recipient, sender, name, message, subject, status, date, define) 
			VALUES ('$recipient','$sender','$sender','$message','$subject','$status','$date','$sender')");
			
			$to = mysql_query("INSERT INTO msg (recipient, sender, name, message, subject, status, date, define) 
			VALUES ('$recipient','$sender','$sender','$message','$subject','$status','$date','$recipient')");
			
			if($from && $to){
				echo "<script>window.location='../pending.php'</script>";
			}else{
				echo "<script>alert('Error Occur! Please try again later!')</script>";
				echo "<br/><center>Error Message".mysql_error()."</center>";
			}
			
			
		}else{
			echo "<script>alert('Updating database failed.')</script>";
			echo "<script>window.location='../pending.php'</script>";
		}
	}
?>
