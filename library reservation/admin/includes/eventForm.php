<center>
<form name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&add=true">
	<table class='eventTable'>
		<tr>
			<td><label>Event : </label><input class='textbox' required placeholder=' Add Event Here...' type='text' name='title'></td>
		</tr>
		
		<tr>
			<td><label>Detail : </label><br><textarea required placeholder=' Input details and time of reservation...' class='textarea' name='detail'></textarea></td>
		</tr>
		
		<tr>
			<td colspan='2' align='center'><input class='eventBtn' type='submit' name='btnAdd' value='Add Event'></td>
		</tr>
	</table>
</form> 
</center>