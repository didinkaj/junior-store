	<?php include("./inc/connect.inc.php"); ?>
	<!-- restrict access of a page to a logged in user-->
<?php
session_start();
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
	$user = $_SESSION["user_login"];
	//<!-- restrict access of a page to a logged in user-->
if(isset($_GET['u'])){
	$username = ($_GET['u']);
	if($username){
		//checks if the user exist restricts access to profile page unless you are logged in
		$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE (username='$username') || (email ='$username')");
		if(mysqli_num_rows($check)==1){ 
			$get = mysqli_fetch_assoc($check);
			$username = $get['username'];
			$fname = $get['fname'];
			$lname = $get['lname'];	
		}
	else{
			echo "<an error occured";
			exit();
		}
	}
}
	
?>
	People you might know
	<!--retriving partners from db-->
	<?php	
	}	
//all users on junior store
	//all users on junior store
	$budy = mysqli_query($con,"SELECT * FROM users  ORDER BY id DESC  ")or die(mysql_error());
	while($row = mysqli_fetch_assoc($budy)){
	$usernameall = $row['username'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	//checks  the  profile picture of the user posting msg
				$check_picl = mysqli_query($con,"SELECT profile_pic FROM users WHERE username='$usernameall'");
				$get_row_picl = mysqli_fetch_assoc($check_picl);
				$profile_pic_dbl = $get_row_picl['profile_pic'];
				if($profile_pic_dbl==""){
					$profile_pic ="img/profpic.jpg";
				}else{
					$profile_pic = $profile_pic_dbl;
				}
				
	echo"
	<div class='connectpic' style='padding:5px;'>
	<table>
		<td><a href='$usernameall' target='_top'><img src='$profile_pic' width='30px' height='30px'/></a></td>
		<td><a href='$usernameall' target='_top'>$fname $lname</a></td>
	</table>
	</div>
	";
		
	



	?>
	
<?php
}
?>