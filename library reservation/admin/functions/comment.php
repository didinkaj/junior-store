<?php include "conn.php";
	if(isset($_POST['submit'])){
		$comment = trim($_POST['comment']);
		$user = "Administrator";
		$profileThumb = "logo.png";
		date_default_timezone_set("Asia/Manila");
		$dateComm = date("M. d, Y - h:i A");
		
		$query = "INSERT INTO comments (user, comment, profile, date) VALUES ('$user','$comment', '$profileThumb','$dateComm')";
		if(mysql_query($query)){
			echo "<script>window.location='../announcement.php'</script>";	
		}else{
			echo "<script>alert('Error found for posting comment. Please try again later.')</script>";		
			echo "<script>window.location='../announcement.php'</script>";		
		}	
	}
?>