<div id="requirements"><br />
	<div id="input">
<?php	
	$target = $_GET['target'];
	$qTarget = mysql_query("SELECT * FROM requirements WHERE id = '$target'");
	while($getID = mysql_fetch_array($qTarget)){
		$getFor = $getID[1];
		$getReq = $getID[2];
	}
?>	
		<form method="POST" action="">
			<center><label for="for">Requirements For : </label>&nbsp;
			<input type="hidden" name="id" value="<?php echo $target; ?>" />
			<b><?php echo $getFor; ?></b></center>
			<p style="font-size: 8px;">&nbsp;</p><br />
			<center><label for="req">Requirements : </label></center>
			<p style="font-size: 8px;">&nbsp;</p>
			<center>
			<textarea required id="req" class="textareaReq" name="req" placeholder=" Enter two line every requirement..."><?php echo $getReq; ?></textarea>
			</center><br />
			<center>
			<input type="submit" name="submit" value=" Update Changes " class="submit"/>
			</center>
		</form>
			<center>
			<input type="submit" name="submit" value=" Back " class="submit" onclick="window.location='requirements.php'"/>
			</center>
	<?php
		if(isset($_POST['submit'])){
			$id = trim($_POST['id']);
			$req = trim($_POST['req']);
			
			if($req == NULL){
				echo "<script>Alert.render('Please input requirements before submitting.')</script>";
			}
			else{
			$q = mysql_query("SELECT * FROM requirements WHERE reqfor='$for' AND required='$req'");
			if(mysql_num_rows($q) == 0){
				$query = mysql_query("UPDATE requirements SET required = '$req' WHERE id = '$id'");
			if($query){
				echo "<script>Alert.render('Update Saved')</script>";
				echo "
				<script>
					setInterval(
						function(){	window.location='requirements.php' },1500
					);
				</script>";
			}
			else{
				echo "<script>Alert.render('Requirements Failed To Update. Please Try Again Later')</script>";
				echo "
				<script>
					setInterval(
						function(){	window.location='requirements.php' },3000
					);
				</script>";
			}
			}else{
				echo "<script>Alert.render('No Update Changed')</script>";
				echo "
				<script>
					setInterval(
						function(){	window.location='requirements.php' },1500
					);
				</script>";
			}
			
			}
		}
	?>
	</div>
</div>