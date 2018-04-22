	<!--profile posts form-->
	<div class="postfom">
		<div class="noticeboard" style="display:;">
			<table><tr><td>
				<a href="#" style="font-size: 18px;color:#0084c6;font-weight: 500;">
					<?php echo "$lname $fname";?> Profile Updates
					</a>
			</td></tr></table>
		</div>
		<form action="<?php $username;?>" method="post" style="margin-top: 9px;">
			<table>
				<tr>
					<td width="85%"><textarea id="post" name="post" rows="2" cols="85" required="required"  placeholder="Post a question Say something ...."></textarea></td>
					<td style="padding-left: 15px;"><input type="submit" name="send" value="Post" id="send" /></td>
				</tr>
			</table>
		</form>
	</div>
<!--profile posts are retrieved from the database-->
	<div class="postcontents"> 
	<?php
		$getposts = mysqli_query($con,"SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 30")or die(mysql_error());
		while ($row = mysqli_fetch_assoc($getposts)){
			$id = $row['id'];
			$body = $row['body'];
			$date_added = $row['date_added'];
			$added_by = $row['added_by'];
			$user_posted_to = $row['user_posted_to'];
			
				?>
			<script type='text/javascript'>
				function toggle<?php echo$id;?>(){
					var ele = document.getElementById('toggleComment<?php echo$id;?>');
					var text = document.getElementById("displayComment<?php echo$id;?>");
					if(ele.style.display == "block"){
						ele.style.display = "none";
						
					}else{
						ele.style.display = "block";
					}
				}
				

			</script>
					<?php
					//dete code
					$sucdel=$sucde2=$sucde3="";	
					$del=@$_POST['del'.$id.''];
					
					if(isset($del)){			
						$sucde2 = "<div style='float:left; width:200px;'><span style='color:green;margin-left:10px;'>Are you want to delete this post?</span></div>";
						$sucdel = "<div style='float:left; width:50px;height:0px;'><span style='color:red;'><form method='post'><input type='submit'  name='yes$id' value='yes' id='del' style='border:1px;cursor:pointer;color:red;' /></form></span></div>";
						$sucde3 = "<div style='float:left;width:50px;'><span style='color:green;'><form method='post'><input type='submit'   name='no$id' value='no' id='no' style='border:1px;cursor:pointer;color:blue;' /></form></span></div>";
					}
					//effect deletions
					
					$yes = @$_POST['yes'.$id.''];
					if(isset($yes)){			
						$delete_post = mysqli_query($con,"DELETE FROM posts WHERE id='$id' && user_posted_to='$username' ");						
						$delete_comment = mysqli_query($con,"DELETE FROM post_comment WHERE post_id='$id' && user='$username'");
						$sucdel = "<span style='color:green;margin-left:10px;'>Comment being deleted deleted</span>";
						echo "<meta http-equiv=\"refresh\" content=\"0.1; url=$username\">";
					}
					
					
					if($user_posted_to == $added_by  )
					{
						//checks user names posting
						        	$check = mysqli_query($con,"SELECT * FROM users WHERE (username='$added_by') ");
										$get = mysqli_fetch_assoc($check);
										$fname = $get['fname'];
										$lname = $get['lname'];
							//counts the number of coments 
									$commentid = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id=$id");
									$getcid = mysqli_fetch_assoc($commentid);
									$getid = $getcid['post_id'];
									$get_comment = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id='$getid' ORDER BY id DESC ");
									$count = mysqli_num_rows($get_comment);
									$count = "(".$count.")";
								
						if($user==$username){
							$del ='	<form action="" method="post">
									<input type="submit"   name="del'.$id.'" value="x" id="del" style="border:0px;cursor:pointer;color:blue;" />
									</form>';
						}
	
						echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
						<td colspan='2'><div class='NewsFeedOptions'>
						Options <div style='float:right; width:50%;'>$sucde2 $sucde3 $sucdel </div>
						</div></td>
						<td valign='top'>$del</td>
						</tr>
						<tr>
						<td style='width:10%;'><div class='postpic' ><a href='$added_by'><img src='$profile_pic' width='50px' height='50px'/></a><p/><p/></div></td>
						<td style='width:88%;'><div class='postdetails' ><a href='$added_by'>$fname $lname on <b>$date_added</b></a></br>$body</br></div><br/></td>
						<td valign='top'></td> 
						</tr>
						<tr><td colspan='2'><a href='#' onclick = 'javascript:toggle$id()'>Comments$count</a>
						
						<div id='toggleComment$id' style='display:none'>
						<iframe src='./frame_comment.php?id=$id ' frameborder='0' style='height:auto;width:100%; min-heigh:10px; ' >
						</iframe>
						</div>
						</td>
						</tr>
						</table></div>";	
					}
				if($user_posted_to != $added_by  ){
					
	
				//checks  the  profile picture of the user posting msg
				$check_picl = mysqli_query($con,"SELECT profile_pic FROM users WHERE username='$added_by'");
				$get_row_picl = mysqli_fetch_assoc($check_picl);
				$profile_pic_dbl = $get_row_picl['profile_pic'];
				if($profile_pic_dbl==""){
					$profile_picl ="img/profpic.jpg";
				}else{
					$profile_picl = $profile_pic_dbl;
				}
					//checks user names being posted to
						        	$check = mysqli_query($con,"SELECT * FROM users WHERE (username='$user_posted_to') ");
										$get = mysqli_fetch_assoc($check);
										$fnameto = $get['fname'];
										$lnameto = $get['lname'];
										//checks user names posting
						        	$check = mysqli_query($con,"SELECT * FROM users WHERE (username='$added_by') ");
										$get = mysqli_fetch_assoc($check);
										$fnamefrom = $get['fname'];
										$lnamefrom = $get['lname'];
						//counts the number of coments 
									$commentid = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id=$id");
									$getcid = mysqli_fetch_assoc($commentid);
									$getid = $getcid['post_id'];
									$get_comment = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id='$getid' ORDER BY id DESC ");
									$count = mysqli_num_rows($get_comment);
									$count = "(".$count.")";
									
						if($user==$username){					
							$del ='	<form action="" method="post">
									<input type="submit" onclick="confirmation()" name="del'.$id.'" value="x" id="del" style="border:0px;cursor:pointer;color:blue;" />
									</form>';
						}
												
				  echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
				  <td colspan='2'><div class='NewsFeedOptions'>
					options <div style='float:right; width:50%;'>$sucde2 $sucde3 $sucdel </div>
				  </div></td><td valign='top'>$del</td></tr><tr>
				  <td style='width:10%;'><div class='postpic' ><img src='$profile_picl' width='50px' height='50px'/><p/><p/> <br/></div></td>
				  <td style='width:90%;'><div class='postdetails' >By<a href='$added_by'>  $fnamefrom $lnamefrom </a>--> <a href='$user_posted_to '> $fnameto $lnameto</a> on <b>$date_added</b><br/> $body <br/><br/></div></td>
				  <td valign='top'></td> 
				  </tr>
				  <tr><td colspan='2'><a href='#' onClick = 'javascript:toggle$id()'s>Comments$count</a>
				  <div id='toggleComment$id' style='display:none'>
					<iframe src='./frame_comment.php?id=$id  ' frameborder='0' style='height:auto;width:100%; min-heigh:10px;overflow-x: hidden; ' >


					</iframe>
					</div>
				</td></tr>
				  </table></div>";
					}
	}
		?>
		</div>