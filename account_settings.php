<?php include ("./inc/header.inc.php"); ?>
<!-- restrict access of a page to a logged in user-->
<?php
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
?>	
<div class="feeds">
	<!-- profile picture upload-->
<div class="leftfeed">
	<!-- upload profile picture script-->
<?php
//checks wether the user has uploaded a profile picture
	$check_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$user'");
	$get_row_pic = mysql_fetch_assoc($check_pic);
	$profile_pic_db = $get_row_pic['profile_pic'];
	if($profile_pic_db==""){
		$profile_pic ="img/profpic.jpg";
	}else{
		$profile_pic = "userdata/profile_pics/".$profile_pic_db;
	}
//upload script
if(isset($_FILES['profpic'])){
	if(((@$_FILES['profpic']["type"]=="image/jpeg" )|| (@$_FILES['profpic']["type"]=="image/png") || (@$_FILES['profpic']["type"]=="image/gif")) && (@$_FILES['profpic']["size"]<1048576)){
		
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ0123456789";
			$rand_dir_name = substr(str_shuffle($chars),0,15);
			mkdir("userdata/profile_pics/$rand_dir_name");
			if(file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profpic"]["name"])){
				echo @$_FILES["profpic"]["name"]."Already exist";
			}else{
				move_uploaded_file(@$_FILES["profpic"]["tmp_name"], "userdata/profile_pics/$rand_dir_name/".$_FILES["profpic"]["name"]);
				//echo "uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profpic"]["name"];
				$_profile_pic_name = @$_FILES["profpic"]["name"];
				$profile_pic_query = mysql_query("UPDATE users SET profile_pic='$rand_dir_name/$_profile_pic_name' WHERE username='$user'");
				header("location:account_settings.php");
			}
			
	}else
		{
			echo "invalid file your image must not be larger than 1MB and must be either .jpeg, .gif .png";
		}
	
	
}
?>
<!-- profile picture upload and changing-->
	 Profile Picture
<div class="photoprof">	
	
		<img src="<?php echo$profile_pic; ?>" width="120px" /><br />
</div>
	<form action=""  method="post" enctype="multipart/form-data">
		<table>
			<tr>
			<td><input type="file" name="profpic" style="background-color: #fff; width: 100%;" /></td>
			</tr><tr><td><input type="submit" name="uploadpic" value="Upload Picture" /> </td>
			</tr>
		</table>
	</form>

	</div>
<div class="centerfeed">

<!-- password reset script-->
<?php
	error_reporting(0);
	$sendupdt =@$_POST['sendupdt'];
	//variables
	$oldpass = @$_POST['oldpass'];
	$newpass = @$_POST['newpass'];
	$rnewpass = @$_POST['rnewpass'];
	
	if($sendupdt){
		//form submitted
		$password_db = mysql_query("SELECT * FROM users WHERE username = '$user'");
		while($row = mysql_fetch_assoc($password_db)){
			$password_db = $row['password'];
		//checks if old password and db passord match
		if($oldpass==$password_db){
			//continues to change the old password
			//checking if the new passwords match
			if($newpass==$rnewpass){
				//updating the user password in the db
				if(strlen($newpass)<=4)
				{
					echo "your password must be more than 4 characters";
				}
				else {
				$update_password_query = mysql_query("UPDATE users SET password='$newpass' WHERE username='$user'");
				echo "success your password has been updated";
				}
			}
			else{
				echo"Your New passwords don't match";
			}
		}
		else {
			echo "Your old password is incorrrect";
		}
		}
		
	}else
		{
			
		}
	?>



<h3> Edit your account settings below</h3>
<form action="account_settings.php" method="post">
		<p><h3>Change your password</h3></p>
		<table >
			<tr>
					<td>Your Old Passord:</td>
					<td> <input type="text" name="oldpass" id="oldpassword" size="40"/></td>
			</tr>
			<tr>
					<td>Your New Passord:</td>
					<td> <input type="text" name="newpass" id="newpassword" size="40"/></td>
			</tr>
			<tr>
					<td>Repeat New Passord:&nbsp;&nbsp;</td>
					<td> <input type="text" name="rnewpass" id="rnewpassword" size="40"/></td>
			</tr>
			<tr>
			<td colspan="2"><input type="submit" name="sendupdt" id="resetpsw " value="Reset Password"/></td>
			</tr>
	</table>
</form>

<!-- profile update script-->
	<?php
	$updateinfo =@$_POST['updateinfo'];
		// selecting Firstname ,Second name, Bios
		$get_info = mysql_query("SELECT fname, lname,email,bio FROM users WHERE username='$user'");
		$get_row = mysql_fetch_assoc($get_info);
		$firstname =$get_row['fname'];
		$secondname = $get_row['lname'];
		$emailupdate = $get_row['email'];
		$profbio = $get_row['bio'];
		//submiting user updates to database
		if($updateinfo){
			$updated_fname = @$_POST['updated_fname'];
			$updated_lname = @$_POST['updated_lname'];
			$updated_email= @$_POST['updated_email'];
			$bio = @$_POST['bio'];
			//validating fields
			if(strlen($updated_fname)<3){
				echo "Your firstname must be more than 2 characters";
			}else{
				if(strlen($updated_lname)<3){
				echo "Your lastname must be more than 2 characters";
				}else{
					//submitting to database
					$info_submit_query = mysql_query("UPDATE users SET fname='$updated_fname', lname='$updated_lname',email= '$updated_email',bio='$bio' WHERE username='$user'");
					echo "your profile information has been updated successfully";
					header("location:$user");
				}
			}
		}

?>	

<form action="account_settings.php" method="POST">
		<p><h3>Update Your Profile Details</h3></p>
		<table >
			<tr>
					<td>First Name:</td>
					<td> <input type="text" name="updated_fname" id="fname" size="40" value="<?php echo$firstname; ?>"/></td>
			</tr>
			<tr>
					<td>Second Name:</td>
					<td> <input type="text" name="updated_lname" id="sname" size="40" value="<?php echo$secondname; ?>"/></td>
			</tr>
			<tr>
					<td>Email Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td> <input type="email" name="updated_email" id="uname " size="40" value="<?php echo$emailupdate; ?>"/></td>
			</tr>		
			<tr>
			<td colspan="2">About you:</td> 
			</tr>
			<tr>
			<td colspan="2" bgcolor="#ffffff"><textarea name="bio" id="aboutyou " rows="7"  style="background-color: #ffffff;width: 100%;" /><?php echo$profbio;?></textarea></td> 
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="updateinfo" id="updateinfo " value="Update info"/></td>
			</tr>
		</table>
</form>
</div>

</div>
<?php
	
	}
?>