<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>

<?php
session_start();
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
	$user = $_SESSION["user_login"];
				
		$findrequests = mysqli_query($con,"SELECT * FROM friends_request WHERE user_to = '$user'");
		$numrows = mysqli_num_rows($findrequests);
		//no friends
		if($numrows == 0){
			
			//gets sent requests
				$pendingfindrequests = mysqli_query($con,"SELECT * FROM friends_request WHERE user_from = '$user'");
			while($get_row1 = mysqli_fetch_assoc($pendingfindrequests)) {
				$user_to =$get_row1['user_to'];
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
			//sent requests
			//displays the friends request and their profile pictures
			echo '
			<a href="'.$user_to.'" target = "_top"><img src="'.$profile_pic.'" width="50px" height ="45px" style = "float:left;padding-top:0px;""/></a>
			<table border="0px" width="80%">
					<tr>
					    <td width="70%">You sent a request to</br><a href="'.$user_to.'" target = "_top">'. $fname.'  '. $lname.' </a>
							<form method="POST" action="friend_requests.php">
							<table>
								<td><input type="submit" name="cancelrequest'.$user_to.'" value="cancel request "/></td></tr>
							</table>
							</form>
					    </td>
					   
					 </tr>
				</table><hr style="color:#ccff9b; "/>';	
				//cancelling friend request
			if(isset($_POST['cancelrequest'.$user_to])){
			//deleting request if cancelled
			$cancel_request = mysqli_query($con,"DELETE FROM friends_request WHERE user_to ='$user_to' && user_from ='$user'");
			echo"Ignoring Request";
			echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;
			echo "<meta http-equiv=\"refresh\" content=\"1; url=friend_requests.php\">";
			//header("Location: friend_requests.php");	
			}
			
			}
			
			$user_from = "";
		} else {
			while($get_row = mysqli_fetch_assoc($findrequests)) {
				$id = $get_row['id'];
				$user_from =$get_row['user_from'];
				$user_to =$get_row['user_to'];
				
			
				
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
			//displays the friends request and their profile pictures
			echo '
			<a href="'.$user_from.'" target = "_top"><img src="'.$profile_pic.'" width="50px" height ="45px" style = "float:left;padding-top:0px;""/></a>
			<table border="0px" width="80%">
					<tr>
					    <td width="70%"><a href="'.$user_from.'" target = "_top">'. $fname.'  '. $lname.' </a>wants to be friends with you</br>
							<form method="POST" action="friend_requests.php">
							<table>
								<tr><td><input type="submit" name="acceptrequest'.$user_from.'" value="accept "/></td>
								<td><input type="submit" name="ignorerequest'.$user_from.'" value="ignore "/></td></tr>
							</table>
							</form>
					    </td>
					   
					 </tr>
				</table><hr style="color:#ccff9b; "/>';	
	
		?>
		<!-- accepting friend requests -->
		
		<?php 
		if(isset($_POST['acceptrequest'.$user_from])){
			
			//get friend array for logged in user
			$get_friend_check = mysqli_query($con,"SELECT friend_array FROM users WHERE username = '$user'");
			$get_friend_row = mysqli_fetch_assoc($get_friend_check);
			$friend_array =$get_friend_row['friend_array'];
			$friendarray_explode = explode(",",$friend_array);
			$friendarray_count = count($friendarray_explode);
			
			//get friend array for whom the request is from
			$get_friend_check_friend = mysqli_query($con,"SELECT friend_array FROM users WHERE username = '$user_from'");
			$get_friend_row_friend = mysqli_fetch_assoc($get_friend_check_friend);
			$friend_array_friend =$get_friend_row_friend['friend_array'];
			$friendarray_explode_friend = explode(",",$friend_array_friend);
			$friendarray_count_friend = count($friendarray_explode_friend);
	
			
			if($friend_array == ""){
				$friendarray_count = count(NULL);			
			}
			
			if($friend_array_friend == ""){
				$friendarray_count_friend = count(NULL);			
			}
			
			if($friendarray_count == NULL){
				$add_friend_query = mysqli_query($con,"UPDATE users SET friend_array = CONCAT(friend_array,'$user_from') WHERE username='$user'");
			}
			if($friendarray_count_friend  == NULL){
				$add_friend_query = mysqli_query($con,"UPDATE users SET friend_array = CONCAT(friend_array,'$user_to') WHERE username='$user_from'");
			}
			//more than 1 friends
			if($friendarray_count >= 1){
				$add_friend_query = mysqli_query($con,"UPDATE users SET friend_array = CONCAT(friend_array,',$user_from') WHERE username='$user'");
			}
			if($friendarray_count_friend  >= 1){
				$add_friend_query = mysqli_query($con,"UPDATE users SET friend_array = CONCAT(friend_array,',$user_to') WHERE username='$user_from'");
			}
				//add to friendbook
			$add_to_friend_book = mysqli_query($con,"INSERT INTO friendsbook VALUES('','$user','$user_from','') ");
			
			//deleting request after acceptance
			$delete_request = mysqli_query($con,"DELETE FROM friends_request WHERE user_to ='$user_to' && user_from ='$user_from'");
			echo"Adding Friend...";
			echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;
			echo "<meta http-equiv=\"refresh\" content=\"1; url=friend_requests.php\">";
		
		}
			//ignoring friend request
			if(isset($_POST['ignorerequest'.$user_from])){
			//deleting request if ignored
			$ignore_request = mysqli_query($con,"DELETE FROM friends_request WHERE user_to ='$user_to' && user_from ='$user_from'");
			echo"Ignoring friend request...";
			echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;
			echo "<meta http-equiv=\"refresh\" content=\"1; url=friend_requests.php\">";
			}
		?>
	
		<?php
		}
// pending friend requests
	$pendingfindrequests = mysqli_query($con,"SELECT * FROM friends_request WHERE user_from = '$user'");
			while($get_row1 = mysqli_fetch_assoc($pendingfindrequests)) {
				$user_to =$get_row1['user_to'];
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
			//sent requests
			//displays the friends request and their profile pictures
			echo '
			<a href="'.$user_to.'" target = "_top"><img src="'.$profile_pic.'" width="50px" height ="45px" style = "float:left;padding-top:0px;""/></a>
			<table border="0px" width="80%">
					<tr>
					    <td width="70%">You sent a request to</br><a href="'.$user_to.'" target = "_top">'. $fname.'  '. $lname.' </a>
							<form method="POST" action="friend_requests.php">
							<table>
								<td><input type="submit" name="cancelrequest'.$user_to.'" value="cancel request "/></td></tr>
							</table>
							</form>
					    </td>
					   
					 </tr>
				</table><hr style="color:#ccff9b; "/>';	
					//cancelling friend request
			if(isset($_POST['cancelrequest'.$user_to])){
			//deleting request if cancelled
			$cancel_request = mysqli_query($con,"DELETE FROM friends_request WHERE user_to ='$user_to' && user_from ='$user'");
			echo"Ignoring request...";
			echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;
			echo "<meta http-equiv=\"refresh\" content=\"1; url=friend_requests.php\">";	
			}
			
			}


		}
?>
		

<?php

	}

?>