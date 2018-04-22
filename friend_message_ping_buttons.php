<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>
<style>
.overview{
	color:#0084c6;
	font-family: arial,helvetica,"Trebuchet MS",verdana,tahoma,sans-serif;
	font-size: 13px;
	margin-top: 4px;
}
	input[type="submit"]{
		width: 100%;
		margin-top: 0px;
		text-align: left;
		color:#0084c6;	
		background: rgb(204,255,153);
		border: 1px solid rgb(204,255,153);
		margin-bottom:2px;
		cursor: pointer;
		padding-bottom: 2px;
	padding-top:2px; 
				
	}
input[type="submit"]:hover{
	background-color: #fcc;
	padding-bottom: 2px;
	padding-top:2px;
}
.profnum{
	color: #D2691E;
	margin-right: 5%;
	margin-left: 15%;
}
</style>

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
	

//<!-- add friend and message buttons-->
	if(isset($_POST['addfriend'])){
		$friend_request = $_POST['addfriend'];
		$user_to = $user;
		$user_from = $username;
		if($user_to == $username){
			echo "you cannot send a friend request to yourself";
		}else{
			$create_request = mysqli_query($con,"INSERT INTO friends_request VALUES('','$user_to','$user_from') ");
			//echo "<h4>Friend request sent successfully</h4>";
		}
		
	}else{
		//do no thing
	}
	
	
		
?>


<!-- send message button -->
<?php
if(isset($_POST['sendmessage'])){
	echo "<script type='text/javascript'> window.parent.location.href='home.php?umsg=$username'</script>" ;
	
}
?>
<!-- poke code-->
<?php
if(isset($_POST['ping'])){
	$check_if_poked = mysqli_query($con,"SELECT * FROM poke WHERE (user_to='$username'&& user_from='$user') ");
	$check_if_found = mysqli_num_rows($check_if_poked);
	if($check_if_found==1){
		//echo "Wait to be pinged back";
	}else{
	if($username == $user){
		//echo "You cannot ping yourself";
	}else{
	$poke_user = mysqli_query($con,"INSERT INTO poke VALUES('','$user','$username')");
	//checks names
	$check_name = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
	$get_row = mysqli_fetch_assoc($check_name);
	$name1 = $get_row['fname'];
	//echo "$name1 has been pinged";
	}
	} 
 }
//ping back
if(isset($_POST['pingback'])){
	$check_if_ping_exist = mysqli_query($con,"SELECT * FROM poke WHERE (user_to='$user'&& user_from='$username') ");
	$check_if_exist = mysqli_num_rows($check_if_ping_exist);
	if($check_if_exist!=0){
	//delete
	$deleteping =  mysqli_query($con,"DELETE FROM poke WHERE (user_to='$user'&& user_from='$username')");
	//add new
	$pokeback_user = mysqli_query($con,"INSERT INTO poke VALUES('','$user','$username')");
	}
	}
	//cancelling ping
if(isset($_POST['cancelping'])){
	$check_if_ping_exist_cancel = mysqli_query($con,"SELECT * FROM poke WHERE (user_to='$username'&& user_from='$user') ");
	$check_if_existc= mysqli_num_rows($check_if_ping_exist_cancel);
	if($check_if_existc!=0){
		//delete
	$deleteping =  mysqli_query($con,"DELETE FROM poke WHERE (user_to='$username'&& user_from='$user')");
	}
}

?>

<?php
//cancelling request
//cancelling friend request
			if(isset($_POST['cancel'])){
			//deleting request if cancelled
			$ignore_request = mysqli_query($con,"DELETE FROM friends_request WHERE user_to ='$username' && user_from ='$user'");
			//echo"request cancelled";
			//header("Location: friend_requests.php");	
			}
//ignoring request
//ignore friend request
			if(isset($_POST['ignore'])){
			//deleting request if ignored
			$ignore_request = mysqli_query($con,"DELETE FROM friends_request WHERE user_to ='$user' && user_from ='$username'");
			//echo"request ignored";
			//header("Location: friend_requests.php");	
			}
			
			
	//remove friend buttons
	//user = logined in
	//username = current profile
	$frind1="";
	$frind2="";
	if(@$_POST['removefriend']){
		//friend array for logged in user
		$add_friend_check = mysqli_query($con,"SELECT friend_array FROM users WHERE username = '$user'");
		$get_friend_row = mysqli_fetch_assoc($add_friend_check);
		$friend_array = $get_friend_row['friend_array'];
		$friend_array_explode = explode(",", $friend_array);
		$friend_array_explode_count = count($friend_array_explode);
		
		
		//friend array for the current profile on
		$add_friend_check_username = mysqli_query($con,"SELECT friend_array FROM users WHERE username = '$username'");
		$get_friend_row_username = mysqli_fetch_assoc($add_friend_check_username);
		$friend_array_username = $get_friend_row_username['friend_array'];
		$friend_array_explode_username = explode(",", $friend_array_username);
		$friend_array_explode_count_username = count($friend_array_explode_username);

		//varriables username on profile
		$usernamecomma = ",".$username;
		$usernamecomma2 = $username.",";
		
		//variables friend user logged in
		$usercomma = ",".$user;
		$usercomma2 = $user.",";
		
	
		//username on profile
		if(strstr($friend_array , $usernamecomma)){
			$frind1 = str_replace($usernamecomma, "", $friend_array );
		}
		else
		if(strstr($friend_array , $usernamecomma2)){
			$frind1 = str_replace($usernamecomma2, "", $friend_array );
		}
		else
		if(strstr($friend_array  , $username)){
			$frind1 = str_replace($username, "", $friend_array );
		}
		
	
	//echo$friend_array_username ;
		//logged in
		if(strstr($friend_array_username  , $usercomma)){
			$frind2 = str_replace($usercomma, "", $friend_array_username);
		}
		else
		if(strstr($friend_array_username , $usercomma2)){
			$frind2 = str_replace($usercomma2, "", $friend_array_username);
		}
		else
		if(strstr($friend_array_username  , $user)){
			$frind2 = str_replace($user, "", $friend_array_username);
		}
			//remove friend from friendbook
			$add_to_friend_book = mysqli_query($con,"DELETE FROM friendsbook WHERE (user='$user' && friend='$username')||(user='$username' && friend='$user') ");
		
		// query to effect friend removal
		$removeFriendQuery_username = mysqli_query($con,"UPDATE users SET friend_array = '$frind2' WHERE username ='$username' ");
		$removeFriendQuery = mysqli_query($con,"UPDATE users SET friend_array = '$frind1' WHERE username ='$user'");
		echo "user removed successfull";
		header("Location: friend_message_ping_buttons.php?u=$username");
	}
	?>
	
	<!-- add / remove /  friend form button form-->
<form action="friend_message_ping_buttons.php?u=<?php echo$username;?>" method="POST">
	<?php
	$friendArray = "";
	$countFriend = "";
	$addAsFriend = "";  
	$friendArray12 = "";
	$selectFriendQuery = mysqli_query($con,"SELECT friend_array FROM users WHERE username = '$username' ");
	$friendRow = mysqli_fetch_assoc($selectFriendQuery);
	$friendArray = $friendRow['friend_array'];
	
	
	//echo$count_requests;
	
	if($friendArray != "" ){
		$friendArray = explode(",", $friendArray);
		$countFriend = count($friendArray);
		$friendArray12 = array_slice($friendArray, 0);

	$i = 0;
	if(in_array($user,$friendArray)){
		$addAsFriend = '<input type="submit" name="removefriend" value="Unfriend"><br/>';
	}

	else {
		//add friend
		
		if($username!= $user){
		//pending friend requests
	$request_pending = mysqli_query($con,"SELECT * FROM friends_request WHERE (user_from='$user' && user_to='$username') || (user_from='$username'&&user_to='$user')");
	$fectch_pending = mysqli_fetch_assoc($request_pending);
	$pending_request_array = $fectch_pending ['user_to'];
	$pending_request_array1 = $fectch_pending ['user_from'];
	//cancelling request
	if(($pending_request_array==$username) ){
				$addAsFriend = '<input type="submit" name="cancel" value="Cancel Request" ><br/>';
			}else{
		
//ignore request
		if( ($pending_request_array1==$username)){
				$addAsFriend = '<input type="submit" name="ignore" value="Ignore Request"><br/>';
			}else{
		$addAsFriend = '<input type="submit" name="addfriend" value="Add Friend"><br/>';
			}
			}
		}
	
	}
	echo$addAsFriend;
}else
	{
		if($username!= $user){
			//pending friend requests
	$request_pending = mysqli_query($con,"SELECT * FROM friends_request WHERE (user_from='$user' && user_to='$username') || (user_from='$username'&&user_to='$user')");
	$fectch_pending = mysqli_fetch_assoc($request_pending);
	$pending_request_array = $fectch_pending ['user_to'];
	$pending_request_array1 = $fectch_pending ['user_from'];
	//cancelling request
	if(($pending_request_array==$username) ){
				$addAsFriend = '<input type="submit" name="cancel" value="Cancel Request"><br/>';
			}else{
		
//ignore request
		if( ($pending_request_array1==$username)){
				$addAsFriend = '<input type="submit" name="ignore" value="Ignore Request"><br/>';
			}else{
		$addAsFriend = '<input type="submit" name="addfriend" value="Add Friend"><br/>';
			}
			}
		
		}
		echo$addAsFriend;
	}
	
	
	?>
	<?php
	if($username!= $user){
		echo'
	<input type="submit" name="sendmessage" value="Send Message"/><br/>';
	}
	?>
	<!-- ping button-->
	<?php
	if($username!= $user){
		//checks received ping 
		$pingfrom = mysqli_query($con,"SELECT * FROM poke WHERE (user_from='$username') && (user_to='$user') ");
		$selectfrom = mysqli_fetch_assoc($pingfrom);
		$receivedpokes = $selectfrom['user_to'];
		//checks sent
		$pingto = mysqli_query($con,"SELECT * FROM poke WHERE (user_from='$user') && (user_to='$username') ");
		$selectto = mysqli_fetch_assoc($pingto);
		$sentpokes = $selectto['user_from'];
			
		if($user==$receivedpokes){
			echo'	<input type="submit" name="pingback" value=" Ping Back"/>';
		}else
			if($user==$sentpokes){
			echo'	<input type="submit" name="cancelping" value="Cancel Ping"/>';
		}else{
			echo'	<input type="submit" name="ping" value=" Ping"/>';
		}
		}
	
	?>
	<?php
	//counting friends and wall poast
	
		$add_friend_check_username = mysqli_query($con,"SELECT friend_array FROM users WHERE username = '$username'");
		$get_friend_row_username = mysqli_fetch_assoc($add_friend_check_username);
		$friend_array_username = $get_friend_row_username['friend_array'];
		$friend_array_explode_username = explode(",", $friend_array_username);
		$friend_array_explode_count_username = count($friend_array_explode_username);
		if($friendArray != "" ){
			if($user==$username){
		if($friend_array_explode_count_username==1){
		echo "<div class='overview'>
		<span class='profnum'> $friend_array_explode_count_username</span>Friend 
		</div>";
		}else{
			echo "<div class='overview'>
		<span class='profnum'>$friend_array_explode_count_username </span>Friends
		</div>";
		}
	}
}
		
		if($user==$username){
		//counting number of posts
		$mypost = mysqli_query($con,"SELECT * FROM posts WHERE added_by = '$user'");
		$count_post = mysqli_num_rows($mypost);
		// number of posts
		if($count_post==1){
		echo "<div class='overview'>
		<span class='profnum'>$count_post </span>Post
		</div>";
		}else{
			if($count_post>=2){
			echo "<div class='overview'>
		<span class='profnum'>$count_post </span>Posts
		</div>";
		}else{
				echo "<div class='overview'>
				<span class='profnum'>0</span> Posts
				</div>";
		}
	}
		//counting juniors
		$my_juinior = mysqli_query($con,"SELECT * FROM junior_account WHERE created_by='$user'");
		$count = mysqli_num_rows($my_juinior);
		// number of posts
		if($count==1){
		echo "<div class='overview'>
		<span class='profnum'>$count </span>Junior
		</div>";
		}else{
			if($count_post>=2){
			echo "<div class='overview'>
		<span class='profnum'>$count </span>Juniors
		</div>";
		}else{
				echo "<div class='overview'>
				<span class='profnum'>0 </span>Juniors
				</div>";
		}
	}
		//counting users on junior store
		$junior_users = mysqli_query($con,"SELECT * FROM users");
		$count_users = mysqli_num_rows($junior_users);
		echo "<div class='overview'>
		<span class='profnum'>$count_users</span>Users
		</div>";
		//counting albums
		
}
	?>
</form> 
	
	<?php
		
	}
	?>