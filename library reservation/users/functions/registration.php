<?php
if(isset($_POST['register'])){
	$fname = trim(($_POST['fname']));
	$mname = trim($_POST['mname']);
	$lname = trim($_POST['lname']);
	$address = trim($_POST['address']);
	$age = $_POST['ageYrs'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$phone = $_POST['phone'];
	$pass = md5($_POST['pass']);
	$gender = $_POST['gender'];
	$profile = "None";
	
	$check_user = mysql_query("SELECT * FROM users WHERE email = '$email' AND contact = '$contact'");
	if(mysql_num_rows($check_user) >= 0){
	$query = "INSERT INTO users (profile, email, pass, fname, mname, lname, address, age, contact, phone, gender, status, active) VALUES 
	('$profile', '$email', '$pass','$fname', '$mname','$lname','$address','$age', '$contact', '$phone', '$gender', '0', '0')";
		if(mysql_query($query)){
			echo "<script>window.open('users/verificationCode.php','_self')</script>";
		}else{
			echo "<script>alert('Failed to register new user. Please try again later.')</script>";
		}
	}else{
		echo "<script>alert('Your email address or contact number has already been registered. Please register a new email address and contact number.')
			window.open('http://localhost/church/registration.php','_self')
		</script>";
	}
}
?>