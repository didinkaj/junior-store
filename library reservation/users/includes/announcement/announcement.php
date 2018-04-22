<div id="annBoard-Wrap">
				<div id="board">
					<center><h3 class="ann_Title"><?php echo $title; ?></h3></center><br />
					<?php echo $detail; ?>
					<br /><br /><center><hr width="95%" /></center>
					<center>
					<small>Date Posted: <b><?php echo $date; ?></b></small>
					</center>
				</div> <!--#board-->
				
				<div id="commentBox">
			
			<!-- MySQL data for comments -->
				<?php
					$queryAnnouncement = mysql_query("SELECT * FROM comments ORDER BY id DESC");
					while($r = mysql_fetch_array($queryAnnouncement)){
						$user = $r['user'];
						$comment = $r['comment'];
						$profileThumb = $r['profile'];
						$dateComm = $r['date'];
				echo '
				<div class="commentor">
				<img src="profile/'.$profileThumb.'" width="50" height="50" title="'.$user.'" class="thumbPic"> 
				
				<textarea readonly="" class="commMsg">'.$comment.'</textarea>
				
				<br /><center><em class="date">'.$dateComm.'</em></center>
				</div> <!--.commentor-->
								
				';
				}?>
			</div> <!--#commentBox-->
			<div id="commentMe">
			<form method="POST" action="">
				<img src="profile/<?php echo $profile; ?>" width="50" height="50" title="<?php echo $fname." ".$lname; ?>" class="thumbPic"> 
				<textarea name="comment" class="commMe" placeholder="  Type your comment here..."></textarea>
				<input type="submit" name="commentBtn" title="Submit your comment" value="Comment" id="commentBtn" />
			</form>
			<?php include 'functions/comment.php'; ?>
			</div> <!--#commentMe-->
</div><!--#annBoard-Wrap-->