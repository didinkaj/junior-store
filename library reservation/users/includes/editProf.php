<br/><br />
<center>
<h2 class="title"><?php echo $fname." ".$mname." ".$lname; ?></h2>
</center>
<div id="profile">
<br/>
<form method="POST" action="">
	<div id="pic">
		<img src="profile/<?php echo $profile; ?>" width="150" height="150">
		<center><a href="changePic.php" class="changePro" title="Change Profile Picture">Change Profile</a></center>
	</div>
<?php
if(isset($_POST['editInfoBtn'])){
		$fname = ucwords(trim($_POST['fname']));
		$mname =ucwords(trim($_POST['mname']));
		$lname = ucwords(trim($_POST['lname']));
		$email = trim($_POST['email']);
		$contact = trim($_POST['contact']);
		$age = trim($_POST['age']);
		$address = ucwords(trim($_POST['address']));
		$gender = trim($_POST['gender']);
		$id = $_POST['id'];

if(empty($fname)){
	echo "<script>Alert.render('Invalid First Name')</script>";
}else{

if(is_numeric($fname)){
	echo "<script>Alert.render('Invalid First Name')</script>";
}else{
	
if(empty($mname)){
	echo "<script>Alert.render('Invalid Middle Name')</script>";
}else{

if(is_numeric($mname)){
	echo "<script>Alert.render('Invalid Middle Name')</script>";
}else{
	
if(empty($lname)){
	echo "<script>Alert.render('Invalid Last Name')</script>";
}else{

if(is_numeric($lname)){
	echo "<script>Alert.render('Invalid Last Name')</script>";
}else{
	
if(empty($email)){
	echo "<script>Alert.render('Invalid Email Address')</script>";
}else{

if(is_numeric($email)){
	echo "<script>Alert.render('Invalid Email Address')</script>";
}else{	

if(empty($age)){
	echo "<script>Alert.render('Invalid Age')</script>";
}else{

if(!is_numeric($age)){
	echo "<script>Alert.render('Invalid Age')</script>";
}else{	

if(empty($address)){
	echo "<script>Alert.render('Invalid Address')</script>";
}else{

if(is_numeric($address)){
	echo "<script>Alert.render('Invalid Address')</script>";
}else{	

if(empty($gender)){
	echo "<script>Alert.render('Invalid Gender')</script>";
}else{

if(is_numeric($gender)){
	echo "<script>Alert.render('Invalid Gender')</script>";
}else{

	if(!is_numeric($contact)){
		$contact == "None";
	}
	if(empty($contact)){
		$contact == "None";
	}
		$updatequery = mysql_query("UPDATE users SET 
		fname = '$fname',
		mname = '$mname',
		lname = '$lname',
		email = '$email',
		contact = '$contact',
		age = '$age',
		address = '$address',
		gender = '$gender'
		
		WHERE id = '$id'");
		
	if($updatequery){
		echo "<script>Alert.render('Update Saved!')</script>";
		echo "
		<script>
			setInterval(
				function(){	window.location='profile.php' },2000
			);
		</script>";
	}else{
		echo "<script>Alert.render('Error Occur! Please Try Again Later')</script>";
		echo "
		<script>
			setInterval(
				function(){	window.location='profile.php' },2000
			);
		</script>";
	}
}}}}}}}}}}}}}}
}
?>
<?php 
	$query = mysql_query("SELECT * FROM users WHERE email = '$email'");
	while($r2 = mysql_fetch_array($queryUser)){
		$id = $r[0];
		$profile = $r['profile'];
		$email = $r['email'];;
		$fname = $r['fname'];
		$mname = $r['mname'];
		$lname = $r['lname'];
		$address = $r['address'];
		$age = $r['age'];
		$contact = $r['contact'];
		$gender = $r['gender'];
		$status = $r['status'];
		$active = $r['active'];
	}
?>
	<div id="line1">
		<p style="font-size: 5px;">&nbsp;</p>
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		First Name : <input type="text" name="fname" class="textboxEdit" value="<?php echo $fname; ?>">
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>	
		
		<p style="font-size: 5px;">&nbsp;</p>
		Middle Name : <input type="text" name="mname" class="textboxEdit" value="<?php echo $mname; ?>">
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
		<p style="font-size: 5px;">&nbsp;</p>
		Last Name : <input type="text" name="lname" class="textboxEdit" value="<?php echo $lname; ?>">
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
		<p style="font-size: 5px;">&nbsp;</p>
		E-mail Address : <input type="text" name="email" class="textboxEdit" value="<?php echo $email; ?>">
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
		<p style="font-size: 5px;">&nbsp;</p>
		Contact Number : <input type="text" name="contact" class="textboxEdit" value="<?php echo $contact; ?>">
	</div>
	
	<br />
	<center><hr width="90%" color="#236ddc"/></center>
	<br />
	<div id="line2">
		<p style="font-size: 5px;">&nbsp;</p>
		Age : <input type="text" name="age" class="textboxEdit" value="<?php echo $age; ?>">
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>	
		
		<p style="font-size: 5px;">&nbsp;</p>
		Address : <input type="text" name="address" class="textboxEdit" value="<?php echo $address; ?>">
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
		<p style="font-size: 5px;">&nbsp;</p>
		Gender : <select name="gender" class="textboxEdit">
					<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				 </select>
	</div>
		<br /><p style="font-size: 5px;">&nbsp;</p>

	<center>
	<input type="submit" name="editInfoBtn" class="probtn" value=" &nbsp;Update Info&nbsp; "/>
	</center>
</form>
<br />
</div>