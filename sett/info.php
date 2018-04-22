
<?php

//<!-- profile update script-->
	$suc = "";
	$updateinfo =@$_POST['updateinfo'];
		// selecting Firstname ,Second name, Bios
		$get_info = mysqli_query($con,"SELECT fname, lname,email,bio FROM users WHERE username='$user'");
		$get_row = mysqli_fetch_assoc($get_info);
		$firstname =$get_row['fname'];
		$secondname = $get_row['lname'];
		$emailupdate = $get_row['email'];
		$profbio = $get_row['bio'];
		$errorflag = false;
		//submiting user updates to database
		if(isset($updateinfo)){
			$updated_fname = test_input(@$_POST['updated_fname']);
			$updated_lname = test_input(@$_POST['updated_lname']);
			$updated_email= test_input(@$_POST['updated_email']);
			$bio = test_input(@$_POST['bio']);
			
			//validating fields
			if(!preg_match($pattern, $bio)){
				if(strlen($bio)<3){
					echo "<span class='erroru'>Your firstname must be more than 2 characters</span>";
					$errorflag = true;
				}
					else{
						echo "<span class='erroru'>only letters are allowed</span>";
						$errorflag = true;
					}
			}else{
				$bio = $_POST['bio'];
			}
						
				if(!preg_match($pattern, $updated_fname)){
				if(strlen($updated_fname)<3){
					echo "<span class='error'>Your firstname must be more than 2 characters</span>";
				$errorflag = true;
				}
					else{
						$errorflag = true;
				echo "<span class='erroru'>only letters are allowed</span>";
					}
			}else{
				$updated_fname = $_POST['updated_fname'];
			}
				if(!preg_match($pattern, $updated_lname)){
					if(strlen($updated_lname)<3){
						$errorflag = true;
						echo "<span class='erroru'>Your lastname must be more than 2 characters</span>";}
					else{
						$errorflag = true;
				       echo "<span class='erroru'>only letters are allowed</span>";}
				}else{
					$updated_lname = $_POST['updated_lname'];
				}
				if($updated_email!=""){
					 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$updated_email)) {
					  $errorflag = true;
						 echo "<span class='erroru'>invalid email</span>";
					}else{			
						$updated_email= $_POST['updated_email'];
					}
				}else{
					echo "<span class='erroru'>enter a valid email address</span>";
				}
				
				if(!$errorflag){
					//submitting to database
					$info_submit_query = mysqli_query($con,"UPDATE users SET fname='$updated_fname', lname='$updated_lname',email= '$updated_email',bio='$bio' WHERE username='$user'");
					$suc = "<font color='green'><br/>updated successfully</font>";
					//echo "<script type='text/javascript'>alert('Details updated')</script>";
					echo "<script type='text/javascript'> window.parent.location.href='home.php?info=$user'</script>" ;
					//echo "<meta http-equiv=\"refresh\" content=\"2; url=$user\">";
					
				}
			}
		

?>	
<div class="outupdate">
<div class="update">
<form action="home.php?info=<?php echo$user?>" method="POST" ><br />
		<span style="font-size: 18px;color:#0084c6;font-weight: 500;margin: 5px;">Update Your Profile Details</span><hr style="color: #f0f0f0;margin-top: 3px;" />
		<table width="95%" style="margin: 0px auto;" cellspacing="15px">
			<?php echo$suc;?>
			<tr>
					<td>First Name:<br />
						<input type="text" name="updated_fname" id="fname" value="<?php echo$firstname; ?>" /></td>
			</tr>
			<tr>
					<td>Second Name:<br />
						<input type="text" name="updated_lname" id="sname" value="<?php echo$secondname; ?>" /></td>
			</tr>
			<tr>
					<td>Email Address:<br />
						<input type="email" name="updated_email" id="uname "   value="<?php echo$emailupdate; ?>" /></td>
			</tr>		
			<tr>
			<td colspan="2" bgcolor="#ffffff">About you:<br /><textarea name="bio" id="aboutyou " rows="3"  style="background-color: #ffffff;width: 100%;" /><?php echo$profbio;?></textarea></td> 
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="updateinfo" id="updateinfo" value="Update info"/></td>
			</tr>
		</table>
</form>
</div>
</div>



