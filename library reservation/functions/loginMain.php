<?php
if(isset($_POST['login'])){

	$pass = md5($_POST['pass']);
	$email = $_POST['email'];
	
	$check_user = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
	
	$run = mysql_query($check_user);
	if(mysql_num_rows($run) > 0){
	$check_status = mysql_query("SELECT * FROM users WHERE email = '$email' AND pass = '$pass'");
		while ($r = mysql_fetch_array($check_status)){
		$status = $r['status'];
	}
		if($status == '1'){
		$_SESSION['email'] = $email;
		echo "<script>window.location='users'</script>";
		}
	}else{
		echo '
		<center><div class="error">
		Incorrect Email or Password<br/>
		Create New Account If Not Yet Registered
		</div></center>
		';
	}
}
?>