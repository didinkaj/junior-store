<?php
if(isset($_POST['register'])){
	
	$fname = ucwords(trim(($_POST['fname'])));
	$mname = ucwords(trim(($_POST['mname'])));
	$lname = ucwords(trim(($_POST['lname'])));
	$address = ucwords(trim(($_POST['address'])));
	$age = trim($_POST['ageYrs']);
	$email = trim($_POST['email']);
	$contact = trim($_POST['contact']);
	$pass = $_POST['pass'];
	$rpass = $_POST['rpass'];
	$pass_enc = md5($pass);
	$gender = $_POST['gender'];
	$profile = "user.jpg";
	//$subject = "This is SUBJECT";
	//$header = "Header";
	//$parameter = "Parameter";
	//$message = "My Message\nNew line here";
	
	if($phone == NULL){
	$phone = "None";
	}
	
	if(is_numeric($fname)){
		echo "<script>Alert.render('Invalid First Name')</script>";		
	}else{
	
	if(empty($fname)){
		echo "<script>Alert.render('Invalid First Name')</script>";	
	}else{
		
	if(is_numeric($mname)){
		echo "<script>Alert.render('Invalid Middle Name')</script>";		
	}else{
		
	if(empty($mname)){
		echo "<script>Alert.render('Invalid Middle Name')</script>";	
	}else{
		
	if(is_numeric($lname)){
		echo "<script>Alert.render('Invalid Last Name')</script>";		
	}else{
		
	if(empty($lname)){
		echo "<script>Alert.render('Invalid Last Name')</script>";	
	}else{

	if(is_numeric($address)){
		echo "<script>Alert.render('Invalid Address')</script>";		
	}else{
		
	if(empty($address)){
		echo "<script>Alert.render('Invalid Address')</script>";	
	}else{

	if(!is_numeric($age)){
		echo "<script>Alert.render('Invalid Age')</script>";		
	}else{
		
	if(empty($age)){
		echo "<script>Alert.render('Invalid Age')</script>";	
	}else{
		
	if(is_numeric($email)){
		echo "<script>Alert.render('Invalid Email Address')</script>";		
	}else{
		
	if(empty($email)){
		echo "<script>Alert.render('Invalid Email Address')</script>";	
	}else{
		
	if($pass != $rpass){
		echo "<script>Alert.render('Password Does Not Matched')</script>";	
	}else{
		
	$check_user = mysql_query("SELECT * FROM users WHERE email = '$email' AND contact = '$contact'");
	if(mysql_num_rows($check_user) >= 0){
	$query = "INSERT INTO users (profile, email, pass, fname, mname, lname, address, age, contact, gender, status, active) VALUES 
	('$profile', '$email', '$pass_enc','$fname', '$mname','$lname','$address','$age', '$contact', '$gender', '1', '0')";
		if(mysql_query($query)){
			echo "<script>Alert.render('Registration Complete.')</script>";
			//mail('$email','$subject','$message');
			$_SESSION['email'] = $email;
			echo "
			<script>
				setInterval(
					function(){	window.location='users' },3000
				);
			</script>";
			
		}else{
			echo "<script>Alert.render('Failed to register new user. Please try again later.')</script>";
			echo "
			<script>
				setInterval(
					function(){	window.location='index.php' },3000
				);
			</script>";
		}
	}else{
		echo "<script>Alert.render('<b>$email</b> is already registered.')";
		echo "
			<script>
				setInterval(
					function(){	window.location='registration.php' },3000
				);
			</script>";
	}
		
	}}}}}}}}}}}}}
}
?>