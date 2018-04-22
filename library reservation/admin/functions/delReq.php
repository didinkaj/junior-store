<?php 
session_start(); include "conn.php";
if (!$_SESSION['name']){
	header("location:../login.php");
}

	$del = $_GET['target'];
	$delQuery = "DELETE FROM requirements WHERE id='$del'";
	
if(mysql_query($delQuery)){
	
	echo "<script>window.location='../requirements.php'</script>";
}
?>
