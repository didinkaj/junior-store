<div id="budget">
<?php
if(isset($_GET['filter'])){
	$filter = $_GET['filter'];
	if($filter == "All"){
		$default = '<option value="" class="default">Select Month</option>';
		$query_budget = mysql_query("SELECT * FROM budget");
		$num_budget = mysql_num_rows($query_budget);
	}elseif($filter == ""){
		echo '<script>window.location="budget.php"</script>';
	}else{
		$default = '<option value="" class="default">'.$filter.'</option>';
		$query_budget = mysql_query("SELECT * FROM budget WHERE month='$filter'");
		$num_budget = mysql_num_rows($query_budget);
	}
}else{
	$default = '<option value="" class="default">Select Month</option>';
	$query_budget = mysql_query("SELECT * FROM budget");
	$num_budget = mysql_num_rows($query_budget);
}
?>
<div id="top">
	<form method="GET" action="">
		<label>Filter By: </label>
		<select name="filter" onchange="this.form.submit()">
			<?php echo $default ?>
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
			<option value="All">All List</option>
		</select>
	</form>
</div>
<br/>
<?php
if($num_budget <= 0){
	echo '<br/><br/><center><h3>Empty Records</h3></center>';
}
while($array_budget = mysql_fetch_array($query_budget)){
	echo '<center><a class="budget_view" href="budget_view.php?target='.$array_budget['id'].'" title="View '.$array_budget['month'].' '.$array_budget['year'].' Budget"><div class="budget_list">'.$array_budget['month'].' '.$array_budget['year'].' &nbsp; <small>Last Updated : '.$array_budget['dateAdded'].'</small></div></a></center>';
}
?>
</div>