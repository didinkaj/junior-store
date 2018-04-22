<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>

<?php
session_start();

	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
	$user = $_SESSION["user_login"];
	
	?>			   
					   
					  
								<table>
									<tr>
										<td><img src="img/sec.jpg" width="50px" height="50px" /></td>
										<td><a href="../home.php?pass=<?php echo$user?>" target="_top">Change Password</td>
									</tr>
									<tr>
										<td><img src="img/info.jpg" width="55px" height="50px" /></td>
										<td><a href="../home.php?info=<?php echo$user?>" target="_top">Edit Your Details</td>
									</tr>
									<tr>
										<td><img src="img/pro.jpg" width="50px" height="50px" /></td>
										<td><a href="../home.php?pic=<?php echo$user?>" target="_top">Change Profile picture</td>
									</tr>
								</table>
<?php
	}

?>					