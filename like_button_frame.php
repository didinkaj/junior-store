<?php include("./inc/connect.inc.php"); ?>
<?php
session_start();
if(isset($_SESSION["user_login"])){
	$user = $_SESSION["user_login"];
}
else{
	$user="";
}

?>
<?php
$id = ""; 
if(isset($_GET['uid'])){
	$uid = mysql_real_escape_string($_GET['uid']);
	if($uid){
		//checks if the user exist restricts access to profile page unless you are logged in
		$get_likes = mysql_query("SELECT * FROM likes WHERE uid='$uid' "); 
		if(mysql_num_rows($get_likes)==1){ 
			$get = mysql_fetch_assoc($get_likes);
			$uid = $get['uid'];
			$total_likes= $get['total_likes'];
			$total_likes= $total_likes + 1;
			$remove_likes= $total_likes - 2;
	
			}else{
				die("Error..");
			}
		//like button code
	if(isset($_POST['likebutton_'])){
		$like = mysql_query("UPDATE likes SET total_likes='$total_likes' WHERE uid='$uid'"); 
		$user_like = mysql_query("INSERT INTO user_like VALUES('','$user','$uid')");
		header("Location: like_button_frame.php?uid=$uid");
	}
	
	//unlike button code
	if(isset($_POST['unlikebutton_'])){
		$total_likes= $total_likes - 1;
		$like = mysql_query("UPDATE likes SET total_likes='$remove_likes' WHERE uid='$uid'"); 
		$remove_like = mysql_query("DELETE FROM user_like WHERE user='$user' && uid='$uid'");
		header("Location: like_button_frame.php?uid=$uid");
	}
	}
}

//cecks for previous likes
$check_for_likes = mysql_query("SELECT * FROM user_like WHERE user = '$user' && uid = '$uid'");
$numrow_likes = mysql_num_rows($check_for_likes);
if($numrow_likes>=1){
	echo"
<form action='like_button_frame.php?uid=$uid' method='post'>
	<input type='submit' name='unlikebutton_$id' value='Unlike' />
	<div style='display:inline'>
	$total_likes likes
    </div>
</form>
";	
}
else if($numrow_likes == 0){
	
echo"
<form action='like_button_frame.php?uid=$uid' method='post'>
	<input type='submit' name='likebutton_$id' value='like' />
	<div style='display:inline'>
	$total_likes likes
    </div>
</form>
";
}	
?>
