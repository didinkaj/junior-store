<?php include "conn.php";
	if(isset($_POST['submit'])){
		$title = trim($_POST['title']);
		$details = trim($_POST['details']);
		date_default_timezone_set("Asia/Manila");
		$date = date("M. d, Y - h:i A");

		$check_Announcement = mysql_query("SELECT * FROM announcement WHERE title = '$title' AND detail = '$details'");
		if(mysql_num_rows($check_Announcement) == 0){
			mysql_query("UPDATE announcement SET title = '$title'");
			mysql_query("UPDATE announcement SET detail = '$details'");
			mysql_query("UPDATE announcement SET date = '$date'");
			
			mysql_query("DELETE FROM comments");
			echo "<center>Updating Announcement...</center>";	
			echo "<center>Deleting Comments...</center>";	
			echo "<script>window.location='../announcement.php'</script>";	
		}else{
			echo "<script>window.location='../announcement.php'</script>";	
		}
	}
?>
