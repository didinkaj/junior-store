<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>

<?php
session_start();
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
	$user = $_SESSION["user_login"];
	
	

$check_for_pokes = mysqli_query($con,"SELECT * FROM poke WHERE user_to='$user'");
$poke_number = mysqli_num_rows($check_for_pokes);
if($poke_number == ""){
		//echo "You haven't been poked yet";
	}else{
while($poke = mysqli_fetch_assoc($check_for_pokes)){
	$id = $poke['id'];
	$user_to =$poke['user_to'];
	$user_from =$poke['user_from'];
	//checks names
	$check_name = mysqli_query($con,"SELECT * FROM users WHERE username='$user_from'");
	$get_row = mysqli_fetch_assoc($check_name);
	$name1 = $get_row['fname'];
	
	if(@$_POST['poke_'.$user_from.'']){
		$delete_poke = mysqli_query($con,"DELETE FROM poke WHERE user_from = '$user_from' && user_to='$user_to' ");
		$create_new_poke = mysqli_query($con,"INSERT INTO poke VALUES('','$user','$user_from')");
	    echo "You poked $name1 back"; 
		echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;	
		echo "<meta http-equiv=\"refresh\" content=\"0; url=my_poke.php\">";	
		
}
		//cancelling ping
if(isset($_POST['cancelping'.$user_from.''])){
	$check_if_ping_exist_cancel = mysqli_query($con,"SELECT * FROM poke WHERE (user_to='$user'&& user_from='$user_from') ");
	$check_if_existc= mysqli_num_rows($check_if_ping_exist_cancel);
	if($check_if_existc!=0){
		//delete
	$deleteping =  mysqli_query($con,"DELETE FROM poke WHERE (user_to='$user'&& user_from='$user_from')");
	echo "ignoring...";
	echo "<meta http-equiv=\"refresh\" content=\"2\">";
	echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;
	}
}
	
		//checks wether the user has uploaded a profile picture
			$check_pic = mysqli_query($con,"SELECT * FROM users WHERE username='$user_from'");
			$get_row_pic = mysqli_fetch_assoc($check_pic);
			$profile_pic_db = $get_row_pic['profile_pic'];
			$fname = $get_row_pic['fname'];
			$lname = $get_row_pic['lname'];
			if($profile_pic_db==""){
				$profile_pic ="img/profpic.jpg";
			}else{
				$profile_pic = $profile_pic_db;
			}
	
	
	echo '<div class="ping" >
			<table border="0px" width="100%"  padding="0px" cellspacing="0px">
					<tr>
					<td width="25%" valign="top"><a href="'.$user_from.'" target = "_top"><img src="'.$profile_pic.'" width="40px" height ="40px" style="float:left;"/></a></td>
					<td width="75%">
					    <table>
						    <tr><td colspan="2"><a href="'.$user_from.'" target = "_top">'. $fname.'  '. $lname.'</a></td></tr>
							<tr><td colspan="2">pinged you</td></tr>
							<tr><td><form action="my_poke.php" method="POST">
							<input type="submit" name="poke_'.$user_from.'" value="Ping back"/></td><td valign="top">
							<input type="submit" name="cancelping'.$user_from.'" value="Ignore"/>
							</form></td></tr>
						</table>
					  </td>
					    
				   </tr>
			      </table><hr style="color:#ccff9b; "/>
			      </div>';
	
	echo "
	";
	
	
	}
	}

	}
//send pokes
$check_for_pokess = mysqli_query($con,"SELECT * FROM poke WHERE user_from='$user'");
$poke_numbers = mysqli_num_rows($check_for_pokess);
while($pokes = mysqli_fetch_assoc($check_for_pokess)){
	$id = $pokes['id'];
	$user_to =$pokes['user_to'];
	$user_from =$pokes['user_from'];
	echo "";

		//checks wether the user has uploaded a profile picture
			$check_pic = mysqli_query($con,"SELECT * FROM users WHERE username='$user_to'");
			$get_row_pic = mysqli_fetch_assoc($check_pic);
			$profile_pic_db = $get_row_pic['profile_pic'];
			$fname = $get_row_pic['fname'];
			$lname = $get_row_pic['lname'];
			if($profile_pic_db==""){
				$profile_pic ="img/profpic.jpg";
			}else{
				$profile_pic = $profile_pic_db;
			}
			//delete poke
	if(@$_POST['poke_'.$user_to.'']){
		$delete_poke = mysqli_query($con,"DELETE FROM poke WHERE user_from = '$user' && user_to='$user_to' ");
	    echo "Ping to $fname cancelled"; 
		//echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;	
		echo "<meta http-equiv=\"refresh\" content=\"1; url=my_poke.php\">";	
		
}
	
	echo '<div class="ping" >
			<table border="0px" width="100%"  padding="0px" cellspacing="0px">
					<tr>
					<td width="25%" valign="top"><a href="'.$user_to.'" target = "_top"><img src="'.$profile_pic.'" width="40px" height ="40px" style="float:left;"/></a></td>
					<td width="75%">
					    <table>
						    <tr><td>You sent a ping to</td></tr>
							<tr><td><a href="'.$user_to.'" target = "_top">'. $fname.'  '. $lname.'</a></td></tr>
							<tr><td><form action="my_poke.php" method="POST">
							<input type="submit" name="poke_'.$user_to.'" value="Cancel Ping "/>
							</form></td></tr>
						</table>
					  </td>
					    
				   </tr>
			      </table><hr style="color:#ccff9b; "/>
			      </div>';
	
	
}
	
?>
