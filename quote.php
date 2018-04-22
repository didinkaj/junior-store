<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>

<?php
session_start();
if(!isset($_SESSION["user_login"])){
	echo"error";
}
else{
	$user = $_SESSION["user_login"];
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
			echo "error occured";
			exit();
		}
	}
}
	?>
<span style="color:#0084c6;">Favourite quote:</span><br />
				<?php
						$about = mysqli_query($con,"SELECT bio FROM users WHERE username='$username'");
						$get_results = mysqli_fetch_assoc($about);
						$about_the_user = $get_results['bio'];
						if($about_the_user!=""){
							echo'
							<table>
							<tr>
							<td><img src="sett/img/info.jpg" width="40px" height="40px" /></td>
							<td valign="top">'.$about_the_user.'</td>
							</tr>
							</table>
							';
						}else{
							echo'<table>
							<tr>
							<td><img src="sett/img/info.jpg" width="40px" height="40px" /></td>
							<td>No quote yet</td>
							</tr>
							</table>';
						}
				?>

	
	<?php
		
	}
	?>