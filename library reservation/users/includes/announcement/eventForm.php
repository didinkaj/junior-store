<form name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&add=true">
	<table width='400px'>
		<tr>
			<td width='100px'>Title</td>
			<td width='300px'><input type='text' name='title'></td>
		</tr>
		
		<tr>
			<td width='100px'>Detail</td>
			<td width='300px'><textarea name='detail'></textarea></td>
		</tr>
		
		<tr>
			<td colspan='2' align='center'><input type='submit' name='btnAdd' value='Add Event'></td>
		</tr>
	</table>
</form> 