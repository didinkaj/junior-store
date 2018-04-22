<?php 
session_start(); include "conn.php";
if (!$_SESSION['name']){
	header("location:../login.php");
}

	$del = $_GET['target'];
	$delQuery = "DELETE FROM users WHERE id='$del'";
	
if(mysql_query($delQuery)){
	
	echo "<script>window.location='../users.php'</script>";
}
?>
