<?php
	if(isset($_POST['loginBtn'])){
		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$pass_enc = md5($pass);
	
	$check_admin = "SELECT * FROM admin WHERE name = '$name' AND pass = '$pass'";
	$run = mysql_query($check_admin);
	if(@mysql_num_rows($run) > 0){
		$_SESSION['name'] = $name;
		echo "<script>window.location='../admin/'</script>";
	}else{
		echo "Incorrect Admin Name or Password!";
	}
}
?>