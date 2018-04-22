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
	//counting friends
	$friendArray = "";
	$countFriend = "";
	$addAsFriend = "";  
	$friendArray12 = "";
	$selectFriendQuery = mysqli_query($con,"SELECT friend_array FROM users WHERE username = '$username' ");
	$friendRow = mysqli_fetch_assoc($selectFriendQuery);
	$friendArray = $friendRow['friend_array'];
	if($friendArray != "" ){
		$friendArray = explode(",", $friendArray);
		$countFriend = count($friendArray);
		$friendArray12 = array_slice($friendArray, 0, 12);
		$i = 0;
//<!-- friends list code -->

	if($countFriend!=0){
		foreach ($friendArray12 as $key => $value) {
			$i++;
			$getFriendQuery = mysqli_query($con,"SELECT * FROM users WHERE username='$value' LIMIT 1");
			$getFriendRow = mysqli_fetch_assoc($getFriendQuery);
			$friendusername = $getFriendRow['username'];
			$friendprofilePicture = $getFriendRow['profile_pic'];
			
			//checks user names posting
						        	$check = mysqli_query($con,"SELECT * FROM users WHERE (username='$friendusername') ");
										$get = mysqli_fetch_assoc($check);
										$fnamef = $get['fname'];
										$lnamef = $get['lname'];
			if($friendprofilePicture ==""){
				echo "
				<table border='0px' style='float:left;width:80%;'>
				<tr><td><a href='$friendusername' target='_top'>
				<img src='img/profpic.jpg' alt=\"$friendusername'profile'\" title=\"$friendusername'profile\" height='50' width='55' style='padding-right:1px;'/></a>
				</td>
				<td>
				<a href='$friendusername' target='_top'>$fnamef $lnamef </a>
				 </td></tr></table>";
			}
			else {
				echo "<table style='float:left;width:80%;'>
				<tr><td>
				<a href='$friendusername' target='_top'><img src='$friendprofilePicture' alt=\"$friendusername'profile\" title=\"$friendusername'profile\" height='50' width='55' style='padding-right:1px;'/></a>
				</td>
				<td>
					<a href='$friendusername' target='_top'>$fnamef $lnamef </a>
				</td></tr></table>";
			}
		}
		
	}
	
	?>
	
	<?php
	}
else{
		echo" No friends yet";
	}
	}
	?>