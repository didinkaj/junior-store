<div id="calendar">
<br /><br /><br /><br />
	<form method="POST" action="" style="margin-left: 210px;">
	<input type="hidden" name="sessionEmail" value="<?php echo $session; ?>">
	<table border="0" class="tblCP">
	<tr>
		<td>Current Password :</td>
		<td><input type="password" required name="current" placeholder=" Current Password" class="textbox" /></td>
	</tr>
	<tr>
		<td>New Password :</td>
		<td><input type="password" name="new" required placeholder=" New Password" class="textbox" /></td>
	</tr>
	<tr>
		<td>Repeat New Password :</td>
		<td><input type="password" name="repeat" required placeholder=" Repeat New Password" class="textbox" /></td>
	</tr>
	<tr>
		<td colspan="2"><br/>
		<center><hr/><br/></center>
		<center>
		<input type="submit" name="submit" class="submitCP" value=" Saved " />
		</center>
		</td>
	</tr>
	</table>
	</form>
</div>
<?php
	if(isset($_POST['submit'])){
		$sessionEmail = $_POST['sessionEmail'];
		$current = $_POST['current'];
		$current_enc = md5($current);
		$new = $_POST['new'];
		$repeat = $_POST['repeat'];
		$pass_enc = md5($new);
		
		$filterEmail = mysql_query("SELECT * FROM users WHERE email = '$sessionEmail'");
		while($getUserInfo = mysql_fetch_array($filterEmail)){
			$id = $getUserInfo[0];
			$email = $getUserInfo[2];
			$pass = $getUserInfo[3];
		}
		
		if($current_enc == $pass){
			if($new == $pass){
			echo "<script>Alert.render('Your new password cannot be the same as the current password.')</script>";	
			}else{
				if($new == $repeat){
					mysql_query("UPDATE users SET pass = '$pass_enc' WHERE email = '$sessionEmail'");
					echo "<script>Alert.render('Password changed.')</script>";	
					echo "<script>window.open('index.php', '_self')</script>";	
				}else{
					echo "<script>Alert.render('Password does not matched.')</script>";	
				}
			}
		}else{
			echo "<script>Alert.render('Incorrect Current Password.')</script>";
		}
	}
?>