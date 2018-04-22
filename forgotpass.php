<?php include("inc/header.inc.php");?>
<div class="feeds">
		
<div class="leftfeed">
</div>
<div class="centerfeed">
<h1 style='font-size:20px;'></h1>
<div class="outupdate">
<div class="update">
	<?php
	$msg="";
	$sub = @$_POST['sendreset'];
	if($sub){
		$email = $_POST['email'];
		$username = $_POST['uname'];
		$check_query = mysql_query("SELECT * FROM users WHERE email='$email' || username='$username'");
		$res = mysql_fetch_assoc($check_query);
		$count = mysql_num_rows($check_query);		
		$dbemail = $res['email'];
		$dbuname = $res['username'];
		$dbpass = $res['password'];
		if($email!="" && $username!=""){
			if($count==1){
		if($dbemail==$email && $dbuname==$username){
		$msg = "<span style='color:green;font-size:15px;'>A reset link has been sent to this email address $dbemail</span>";
			echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php\">";
		}else{
			$msg = "<span style='color:red;font-size:15px;'>Email address or username is incorrect</span>";
		}
		}else{
			$msg = "<span style='color:red;font-size:15px;'>User doesnot exist</span>";
			
		}
		}else{
			$msg = "<span style='color:red;font-size:15px;'>Fill all the fields</span>";
		}
	}
	
	?>
<form action="forgotpass.php" method="post"><br />
		<span style="font-size: 18px;color:#0084c6;font-weight: 500;margin: 5px;">Password Resssetting</span><hr style="color: #f0f0f0;margin-top: 3px;" />
		<?php //echo "$err";?>
		<table width="95%" style="margin: 0px auto;" cellspacing="15px">
			<tr>
					<td>Email Address:<br/>	
					<input type="email" name="email" placeholder="Enter your registration Email address " required="required"/></td>
			</tr>
			<tr>
					<td>Username:<br />
						 <input type="text" name="uname" placeholder="Enter your current uaername" required="required"/></td>
			</tr>
			<tr>
			<td colspan="2"><input type="submit" name="sendreset"  value="Reset Password"/></td>
			</tr>
	</table>
		<?php echo "$msg";?>
</form>
</div>
</div>
</div>
<div class="rightfeed">
</div>
</div>
<?php include("inc/footer.inc.php");?>