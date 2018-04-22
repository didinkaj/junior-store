 <div id="announcement"><br>
		 <center><p class="warningMsg"><b>Warning</b>: Once you update announcement all comments will be deleted.</p></center>
		 <!--Get Announcement Info from Database-->
		 <?php 
		 	$queryAnnouncement = mysql_query("SELECT * FROM announcement");
			while($getAnnouncement = mysql_fetch_array($queryAnnouncement)){
				$title_Announcement = $getAnnouncement['title'];
				$detail_Announcement = $getAnnouncement['detail'];
				$date_Announcement = $getAnnouncement['date'];
			}
		 ?>
<form method='POST' action='functions/announcement.php'>	
	<center>
		<input type='text' name='title' title='Post/Replace Recent Announcement Title' value='<?php echo $title_Announcement ?>' class='textbox' placeholder=' Post/Replace Recent Announcement Title' required>
	</center>
	<br>
			
	<center>
		<textarea class='textarea' name='details' required placeholder=' Post/Replace Recent Announcement' title=' Post/Replace Recent Announcement'><?php echo $detail_Announcement; ?></textarea>
	</center>
		<center><label class='dateComment'>Posted on <?php echo $date_Announcement ?></label></center>
	<br />
	<center><hr width="72%"/></center>
	<center>
	
	<input title='All recent comments will permanently delete.' type='submit' class='confirm'  value=' Update Announcement '>	
	<input type="submit" name='submit' class="triggerBtn" id="updateme">
	<p style="font-size: 8px;">&nbsp;</p>
	</center>
</form>
</div><!--#announcement-->
		 
<div id="comments">
 <!--Get Comments Info from Database-->
 <?php 
	$queryComments = mysql_query("SELECT * FROM comments ORDER BY id DESC");
	while($getComments = mysql_fetch_array($queryComments)){
		$idcomment = $getComments[0];
		$name = $getComments['user'];
		$comment = $getComments['comment'];
		$profile = $getComments['profile'];
		$date = $getComments['date'];
 ?>
	<div class='commentors'>
		<img src='../users/profile/<?php echo $profile ?>' title='<?php echo $name ?>' width='55' height='55' class='thumbPic'>
		&nbsp;<textarea readonly title='Date Posted : <?php echo $date ?>' class='commentTextarea'><?php echo $comment ?></textarea>
		<table border="0">
			<tr><td><p style="font-size: 8px;">&nbsp;</p>
		<?php
			if($profile == "logo.png"){
				$view = "";
			}else{
				$get = $getComments[3];
				$q = mysql_query("SELECT * FROM users WHERE profile = '$get'");
				while($r = mysql_fetch_array($q)){
					$id = $r[0];
				}
				$view = "<a href='userProfile.php?target=$id' class='commentOpt'>View Profile</a>";
			}
		?>
				<?php echo $view ?>
			</td></tr><tr><td>
			<a style="color:#000" href='functions/delComment.php?del=<?php echo $idcomment ?>' class='//linkconfirm'>Delete Comment</a>
			<a href='functions/delComment.php?del=<?php echo $idcomment ?>' id="delcom" class="triggerBtn"></a>
			</td></tr>
		</table>
		<center><label class='dateComment'>Commented on <?php echo $date ?></label></center>
	</div>

		<?php } ?>
</div><!--#comments-->
<script>
function deletePost(id){
	document.location.href="functions/delUser.php?target=" + id;
}
</script>
<?php 
echo "<script>";
include 'script/confirm.js';
echo "</script>";
?>
<div id="myComment">
	<!--Post Admin Comment-->
	<form method='POST' action='functions/comment.php'>
		<div class='commentMe'>
			<img src='img/logo.png' title='Admin' width='50' height='50' class='thumbPic'>
			<textarea title='Admin Comment' required placeholder='Post your comment here...' autofocus name='comment' class='myComment'></textarea>
			<br />&nbsp;&nbsp;<input type="submit" name="submit" class="submit" value=" Comment "><p style="font-size: 8px;">&nbsp;</p>
		</div>
	</form>
</div><!--#myComment-->

<br />