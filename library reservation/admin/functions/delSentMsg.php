<?php 
session_start(); include "conn.php";
if (!$_SESSION['name']){
	header("location:../login.php");
}

	$del = $_GET['del'];
	$delQuery = "DELETE FROM msg WHERE id='$del'";
	
if(mysql_query($delQuery)){
	
	echo "<script>window.location='../sent.php'</script>";
}
?>
