<?php include "conn.php";
	$numComments = mysql_query("SELECT * FROM comments");
	echo mysql_num_rows($numComments);	
?>