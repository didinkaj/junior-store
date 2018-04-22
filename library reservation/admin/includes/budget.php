<div id="budget">
<div id="top">
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
	<form method="GET" action="" style="margin-left: 62%;">
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
</div> <!--#top-->
<div id="insert">
	<center><h3>Insert New Monthly Budget Here</h3></center><br/>
	<?php
		date_default_timezone_set("Asia/Manila");	
		if(isset($_POST['submit'])){
			$month = $_POST['month'];
			$year = $_POST['year'];
			$content = $_POST['content'];
			$dateAdded = date("M d, Y - h:i A");
			
			$query_filter_budget = mysql_query("SELECT * FROM budget WHERE month='$month' AND year='$year' AND content='$content'");
			$num_budget = mysql_num_rows($query_filter_budget);
						
			if($num_budget >= 1){
				echo '<script>setInterval( function(){ window.location="budget.php" }, 2000)</script>';
			}else{
				$query_insert = mysql_query("INSERT INTO budget (month, year, content, dateAdded) 
				VALUES ('$month','$year','$content', '$dateAdded')");
				if($query_insert){
					echo '<div id="success_msg"><center><label>'.$month.' '.$year.' Budget Saved </label></center></div>';
					echo '<script>setInterval( function(){ window.location="budget.php" }, 2000)</script>';
				}else{
					echo '<div id="error_msg"><center><label>'.mysql_error().' Budget Saved </label></center></div>';
				}
			}
		}else{
			$month = date("F");
			$year = date("Y");
		}
	?>
	<form method="POST" action="">
		<center>
			<label>Date : </label>
			<input type="text" list="month" required placeholder="Month" value="<?php echo $month ?>" name="month" class="txtbox"/> - 
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
			<input type="text" required name="year" placeholder="Year" value="<?php echo $year ?>" class="txtbox2"/>
			<br/><br/>
			<label>Input monthly budget here : </label>
			<textarea name="content" class="txtarea" required><?php echo $content ?></textarea>
			<input type="submit" value="Save Budget" name="submit" class="btn"/>
		</center>
	</form>
</div> <!--#insert-->

<div id="content">
<center><h3>Budget List</h3></center><br/>
	<?php
		if($num_budget <= 0){
			echo "<br/><br/><center><b><h3>Empty records</h3></b></center>";
		}else{
			while($array = mysql_fetch_array($query_budget)){
				$db_id = $array['id'];
				$db_month = $array['month'];
				$db_year = $array['year'];
				$db_dateAdded = $array['year'];
				$db_content = $array['year'];
				
				echo '<div class="budgetList"><center><a href="budget-view.php?target='.$db_id.'" class="listLink"><b>'.$db_month.'&nbsp;&nbsp;'.$db_year.'</b></a></center></div>';
			}
		}
	?>
</div> <!--#content-->
</div> <!--#budget-->
<br/>