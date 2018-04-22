<div id="budget">
<?php
if(isset($_POST['del_budget'])){
	$target = $_POST['id'];
	echo '<script>location.href="functions/del_budget.php?target='.$target.'"</script>';
}
if(isset($_POST['update_budget'])){
	$target = $_POST['id'];
	$get_month = $_POST['month'];
	$get_year = $_POST['year'];
	$get_content = $_POST['content'];
	date_default_timezone_set("Manila/Asia");
	$dateAdded = date("M d, Y - h:i A");
	
	$filter_update = mysql_query("SELECT * FROM budget WHERE month='$get_month' AND year='$get_year' AND content='$get_content'");
	$num_filter = mysql_num_rows($filter_update);
	if($num_filter >= 1){
			echo '<div id="success_msg"><center><h3><label>No Changes Have Been Made</label></h3></center></div>';
	}else{
			$query_update = mysql_query("UPDATE budget SET month='$get_month', year='$get_year', content='$get_content', dateAdded='$dateAdded' WHERE id='$target'");
			if($query_update){
				echo '<div id="success_msg"><center><h3><label>Changes Saved</label></h3></center></div>';
			}else{
				echo '<div id="error_msg"><center><h3><label>Error Occur: <b>'.mysql_error().'</b></label></h3></center></div>';
			}
	}
}
if(isset($_POST['back'])){
	echo '<script>location.href="budget.php"</script>';
}
?>
<div id="top">
	<form method="POST" action="">
		<input type="text" name="month" list="month" placeholder="Month" value="<?php echo $get_month ?>" class="txtbox"/>
		<datalist id="month">
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
		</datalist>
		 - 
		<input type="hidden" name="id" value="<?php echo $target ?>"/>
		<input type="text" name="year" placeholder="Year" value="<?php echo $get_year ?>" class="txtbox2"/> &nbsp;
			<button class="btn_del" name="del_budget" onclick="location.href=''">DELETE</button>&nbsp;
			<button class="btn_update" name="update_budget">SAVE</button>&nbsp;
			<button class="btn_back" name="back">BACK</button>&nbsp;&nbsp;
</div> <!--#top-->
<div id="budget_content">
<sub>Date Updated : <?php echo $get_dateAdded; ?></sub>
<br/>
<textarea class="txtarea_readonly" name="content"><?php echo $get_content ?></textarea>
	</form>
</div> <!--#budget_content-->
</div> <!--#budget-->
<br/>