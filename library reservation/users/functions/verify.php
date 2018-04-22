<?php
	if(isset($_POST['activate'])){
		$code = $_POST['code'];
		$session = $_SESSION['email'];
		
		$query = mysql_query("SELECT * FROM users WHERE email = '$session'");
		
		while($r = mysql_fetch_array($query)){
			$id = $r[0];
		}
		
		$md5 = md5($id);
		if($code == $md5){
			mysql_query("UPDATE users SET status='1' WHERE id='$id'");
			echo "<script>window.open('index.php','_self')</script>";
		}
		else{
			echo "The code you entered is invalid.";
		}
	}
?>