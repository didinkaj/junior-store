<?php
session_start(); include "conn.php";
if (!$_SESSION['name']){
	header("location:http://localhost/church");
}

	$idDel = $_GET['del'];
	$delComment = "DELETE FROM comments WHERE id='$idDel'";

if(mysql_query($delComment)){
	echo "<script>window.location='../announcement.php'</script>";
}
?>
