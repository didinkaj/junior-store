<?php 
session_start(); include "conn.php";
if (!$_SESSION['email']){
	header("location:http://localhost/church");
}

	$del = $_GET['del'];
	$delQuery = "DELETE FROM msg WHERE id='$del'";
	
if(mysql_query($delQuery)){
	echo "<script>window.location='../allsent.php'</script>";
}
?>