<head>
	<link rel="stylesheet" type="text/css" href="./css/iframe.css"/>
</head>
<?php
session_start();
if(isset($_SESSION["user_login"])){
	$user = $_SESSION["user_login"];
}
else{
	header("Location:index.php");
}
//function to filter inputs and special characters.
				function test_input($str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
				$str = stripslashes($str);
				}
				return ($str);
				}
	$pattern = "/^[a-zA-Z  '.]*$/";
?>
<style>
	body{
		border: 1ps solid #ccc;
		background-color: rgb(204,255,173);
		width: 90%;
		margin:0 auto;
	}
	
</style>
<?php
include("./inc/connect.inc.php");
$getid = $_GET['id'];
?>
<script type='text/javascript'>
	function toggle<?php echo$getid;?>(){
		var ele = document.getElementById('toggleComment<?php echo$getid;?>');
		var text = document.getElementById("displayComment<?php echo$getid;?>");
		if(ele.style.display == "block"){
			ele.style.display = "none";
			
		}else{
			ele.style.display = "block";
		}
	}
</script>
<?php
$suc="";
$fal ="";
if(isset($_POST['postComment'.$getid.''])){
	if(empty($_POST["post_body"])){
		$fal= "<font color='#A52A2A'>Nothing posted, say something</font>";
	}else{
	$post_body = test_input(@$_POST['post_body']);
	$posted_to = "";
	$d = date("Y-m-d");
	$t = date("h:i:sa");
	$insertpost = mysqli_query($con,"INSERT INTO post_comment VALUES('','$post_body','$user','$posted_to','0','$getid','$d','$t')");
	$suc= "<font color='green'>Comment posted</font>";
	//echo "<script type='text/javascript'> window.parent.location.reload(true);</script>" ;
	//echo '<script type="text/javascript"> document.getElementById("toggleComment$getid").style.display="block";</script>' ;
	//echo "<meta http-equiv=\"refresh\" content=\"3; url=frame_comment.php?id=$getid\">";
}
}
?>
<!-- post comment button -->
<div style='float: right;display: inline; margin: 2px 0px 0px 0px;width: 100%;'>
	<?php echo "$suc $fal";?>
<form style="float: right;margin: 5px 0px 15px 0px;">
	<input type="button" onclick="javascript:toggle<?php echo$getid;?>()" value="Comment" 
	style="background-color: #DCE5EE;border: 0px;cursor: pointer;color: #007C4F;font-weight:700;"/>
</form>
</div>

	<br />
	<div id='toggleComment<?php echo$getid;?>' style='display:none;height: 110px; margin-top: 10px;'>
	<form action="frame_comment.php?id=<?php echo$getid; ?>" method="post" name="postComment<?php $getid;?>">
		<table>
			<tr>
				<td><textarea rows="3" cols="65" name="post_body"></textarea></td>
			</tr>
			<tr>
				<td valign="center"><input type="submit" value="Post Comment" name="postComment<?php echo$getid; ?>" style="cursor: pointer;" /></td>
			</tr>
		</table>
	</form><br/><br/>
	</div>
<?php
$get_comment = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id='$getid' ORDER BY id DESC ");
$count = mysqli_num_rows($get_comment);
if($count!=0){
while($comment = mysqli_fetch_assoc($get_comment))
									{
									$comment_body = $comment['post_body'];
									$posted_by = $comment['user'];
									$posted_to = $comment['posted_to'];
									$removed = $comment['post_removed'];
									$date = $comment['date'];
									$time = $comment['time'];									
																	
									//checks wether the logged inuser has uploaded a profile picture
									$check_pic = mysqli_query($con,"SELECT * FROM users WHERE username='$posted_by'");
									$get_row_pic = mysqli_fetch_assoc($check_pic);
									$profile_pic_db = $get_row_pic['profile_pic'];
									$fnamec = $get_row_pic['fname'];
									$lnamec = $get_row_pic['lname'];
									if($profile_pic_db==""){
										$profile_pic ="img/profpic.jpg";
									}else{
										$profile_pic = $profile_pic_db;
									}
											//displaying the comment							
									echo"
									<div class='cimage' style='float:left; margin-right:  10px;'>
									<img src='$profile_pic' width='30px' height='30px' />
									</div>
									<table width='90%' style='float:left;height:auto;margin-bottom:4px; border:1px solid #ccc;'>
									<tr>									
										<td><a href='$posted_by' target='_top'>$fnamec $lnamec</a> Posted on <a href='#'> $date </a>@ <a href='#'>$time </a></td>
									</tr>
									<tr>
										<td>" . $comment_body .'</td>
									</tr>
									</table>
									';
									}

}
else {
	echo "<center><br/>Be first to comment</center>";
}

?>

<a href="#" ></a>
