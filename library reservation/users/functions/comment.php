<?php
	if(isset($_POST['commentBtn'])){
		$comment = trim($_POST['comment']);
		$user = $fname." ".$lname;
		$profileThumb = $profile;
		date_default_timezone_set("Asia/Manila");
		$dateComm =  date("M. d, Y - h:i A");

		$query = "INSERT INTO comments (user, comment, profile, date) VALUES ('$user','$comment', '$profileThumb','$dateComm')";
		mysql_query($query);

		echo "<script>window.location='announcement.php'</script>";
	}
?>