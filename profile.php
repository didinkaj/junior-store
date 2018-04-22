<?php
include("./inc/header.inc.php");
?>
<!-- restrict access of a page to a logged in user-->
<?php
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
?>	
<div class="feeds">
	<div class="leftfeed">
		<div class="lfixed">	
<?php
if(isset($_GET['u'])){
	$username = ($_GET['u']);
	if($username){
		//checks if the user exist restricts access to profile page unless you are logged in
		$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE username='$username' ");
		if(mysqli_num_rows($check)==1){ 
			$get = mysqli_fetch_assoc($check);
			$username = $get['username'];
			$fname = $get['fname'];
			$lname = $get['lname'];	
		}
	else{
			echo "<an error occured";
			header("Location:$user");
		}
	}
}


//profile posts send to database
$post = @$_POST['post'];
if($post!= ""){
	$post = test_input(@$_POST['post']);
	$date_added = date("Y-m-d");
	$added_by = "$user";
	$user_posted_to ="$username";
	
	$sqlcommand = "INSERT INTO posts VALUES('', '$post','$date_added','$added_by','$user_posted_to')";
	$query = mysqli_query($con,$sqlcommand)or die(mysql_error());
}
?>
<div class="pgtitle">
<?php echo "<a href='$username' target='_top' style='font-size: 18px;color:#0084c6;font-weight: 500;'>$fname $lname</a>";?><br/>
</div>
<?php
//checks wether the logged inuser has uploaded a profile picture
$check_pic = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
							$get_row_pic = mysqli_fetch_assoc($check_pic);
							$profile_pic_db = $get_row_pic['profile_pic'];
							$fnamep = $get_row_pic['fname'];
							$lnamep = $get_row_pic['lname'];
if($profile_pic_db==""){
	$profile_pic ="img/profpic.jpg";
}else{
	$profile_pic = $profile_pic_db;
}
?>

<!-- user profile image -->
<div class="photoprof">
<div class="pic" style="height: 123px; padding-top: 0px;">
<table width="100%" height="115px">
	<tr>
	<td><img src="<?php echo$profile_pic; ?>"  alt="<?php echo "$fnamep ";?>" title="<?php echo "$fnamep ";?>'s profile" width="100px" /></td>
							<td valign="top"> 
<?php
		//<!-- buttons and statistics-->

echo "<iframe src='friend_message_ping_buttons.php?u=$username' frameborder='0' style='width:100%;  height:105px;overflow-x: hidden;' >
				
				
	</iframe>";

?>
		
	</td>
	</tr>
</table>
</div>
<!-- add friend message and ping buttons-->
<div class="profilecontents">
<?php

echo "<iframe src='quote.php?u=$username' frameborder='0' style='width:100%;  height:140px;overflow-x: hidden;' >
				
				
	</iframe>";

?>
</div>


<!-- user bios details -->
			
				
</div>

<!-- user friends list details -->
<div class="leftsidecontents">
<div class="photohead">
	<a href="profile.php?friend=<?php echo$username;?>" style="font-size: 18px;color:#0084c6;font-weight: 500;"><?php echo $fname. "'s friends";?></a>
</div>
	<iframe src='friendlist.php?u=<?php echo$username;?>' frameborder='0' style='width:100%;  height:250px;' >
				
				
	</iframe>
	
</div>
</div>
</div>


<div class="centerfeed">
	<div class="cfixed">

	
		<?php						
						//posts
						if(isset($_GET['friend'])){
							echo "<div class='postfoms'>
							<a href='#' style='font-size: 18px;color:#0084c6;font-weight: 500;'>
							 List of all $fname $lname Friends
							</a>
							</div>";
							echo "<div class='postcontents'> ";
							$usernamefriend = ($_GET['friend']);
							if($usernamefriend){
								//checks if the user exist restricts access to profile page unless you are logged in
								$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE username='$usernamefriend' ");
								if(mysqli_num_rows($check)==1){ 
									$get = mysqli_fetch_assoc($check);
									$usernamefriend = $get['username'];
									$fnamefriend = $get['fname'];
									$lnamefriend = $get['lname'];	
									
								//counting friends
									$friendArray = "";
									$countFriend = "";
									$addAsFriend = "";  
									$friendArray12 = "";
									$selectFriendQuery = mysqli_query($con,"SELECT friend_array FROM users WHERE username = '$usernamefriend' ");
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
												echo "<div class='friend' style='width:140px;float:left;'>
												<table border='0px' style='float:left;width:80%;'>
												<tr><td><a href='$friendusername' target='_top'>
												<img src='img/profpic.jpg' alt=\"$friendusername'profile'\" title=\"$friendusername'profile\" height='50' width='55' style='padding-right:1px;'/></a>
												</td>
												<td>
												<a href='$friendusername' target='_top'>$fnamef $lnamef </a>
												 </td></tr></table>
												 </div>";
											}
											else {
												echo "<div class='friend' style='width:140px;float:left;'>
												<table style='float:left;width:80%;'>
												<tr><td>
												<a href='$friendusername' target='_top'><img src='$friendprofilePicture' alt=\"$friendusername'profile\" title=\"$friendusername'profile\" height='50' width='55' style='padding-right:1px;'/></a>
												</td>
												<td>
													<a href='$friendusername' target='_top'>$fnamef $lnamef </a>
												</td></tr></table>
												</div>";
											}
										}
										
									}
									
																	}
								else{
										echo" No friends yet";
									}
																	
								}
							echo "</div>";	
							}
						}
						
						else{
							include("my_prof_post.php");
						}
									
									?>
	</div>
	</div>



<div class="rightfeed">	
	<div class="rfixed">	

	<div class="buddies">
	<a href="#" style="font-size: 18px;color:#0084c6;font-weight: 500;"><?php echo $fname. "'s";?> Junior Photos</a>
	<iframe src="photos.php?uname=<?php echo$username;?>" frameborder="0" style="height:265px;width:100%; overflow-x: hidden;" >
			
			
		</iframe>
		
	</div>
	
	<div class="buddies">
		<a href="#" style="font-size: 18px;color:#0084c6;font-weight: 500;">Connect</a>
		
		<iframe src="people_on_junior.php?u=<?php echo$user;?>" frameborder="0" style="height:250px;width:100%; overflow-x: hidden;" >
			
			
		</iframe>
		
		

</div>
</div>
</div>
</div>

<?php
	
	}
?>