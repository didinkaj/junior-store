<?php
session_start(); include "conn.php";
if (!$_SESSION['name']){
	header("location:http://localhost/church");
}

	$target = $_GET['target'];
	$del_budget = "DELETE FROM budget WHERE id='$target'";

if(mysql_query($del_budget)){
	echo "<script>window.location='../budget.php'</script>";
}
?>
