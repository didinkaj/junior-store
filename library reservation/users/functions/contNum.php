<?php
include 'functions/conn.php';

	$query = mysql_query("SELECT * FROM contactNum");
	while ($r = mysql_fetch_array($query)){
		$contNum = $r[1];
	}
?>
Contact Number: <br /><?php echo "<b>" .$contNum. "</b>" ;?>