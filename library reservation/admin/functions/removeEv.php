<?php 
session_start(); include "conn.php";
if (!$_SESSION['name']){
	header("location:../login.php");
}

	$del = $_GET['target'];
	$query_event = mysql_query("SELECT * FROM events WHERE id='$del'");
	$array = mysql_fetch_array($query_event);
	$event = $array[1];
	
	$delQuery = "DELETE FROM events WHERE id='$del'";
	
if(mysql_query($delQuery)){
	mysql_query("DELETE FROM requirements WHERE reqfor='$event'");
	echo "<script>window.location='../addEvent.php'</script>";
}
?>