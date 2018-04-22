<!-- password reset script-->
<?php
	error_reporting(0);
	$sendupdt =@$_POST['sendupdt'];
	//variables
	$oldpass = test_input(@$_POST['oldpass']);
	$newpass = test_input(@$_POST['newpass']);
	$rnewpass = test_input(@$_POST['rnewpass']);
	$err="";
	if($sendupdt){
		//form submitted
		$password_db = mysqli_query($con,"SELECT * FROM users WHERE username = '$user'");
		while($row = mysqli_fetch_assoc($password_db)){
			$password_db = $row['password'];
		//checks if old password and db passord match
		if($oldpass==$password_db){
			//continues to change the old password
			//checking if the new passwords match
			if($newpass==$rnewpass){
				//updating the user password in the db
				if(strlen($newpass)<=4)
				{
					$err= "<span class='err'>your password must be more than 4 characters</span>";
				}
				else {
				$update_password_query = mysqli_query($con,"UPDATE users SET password='$newpass' WHERE username='$user'");
				$err= "<span class='err'>success your password has been updated</span>";
				}
			}
			else{
				$err="<span class='err'>Your New passwords don't match</span>";
			}
		}
		else {
			$err= "<span class='err'>Your old password is incorrrect</span>";
		}
		}
		
	}else
		{
			
		}
	?>
<!-- styling form page-->
<style>

</style>
<div class="outupdate">
<div class="update">
<form action="home.php?pass=<?php echo$user?>" method="post"><br />
		<span style="font-size: 18px;color:#0084c6;font-weight: 500;margin: 5px;">Change password</span><hr style="color: #f0f0f0;margin-top: 3px;" />
		<?php echo "$err";?>
		<table width="95%" style="margin: 0px auto;" cellspacing="15px">
			<tr>
					<td>Current Password:<br/>	
					<input type="password" name="oldpass" required="required"/></td>
			</tr>
			<tr>
					<td>Your New Password:<br />
						 <input type="password" name="newpass" required="required"/></td>
			</tr>
			<tr>
					<td>Repeat New Password:&nbsp;&nbsp;<br /> <input type="password" name="rnewpass"  required="required"/></td>
			</tr>
			<tr>
			<td colspan="2"><input type="submit" name="sendupdt"  value="Reset Password"/></td>
			</tr>
	</table>
	
</form>
</div>
</div>
<?php
	
?>