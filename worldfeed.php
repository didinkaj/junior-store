
<?php include("./inc/connect.inc.php"); ?>
<div class="postfom">
							<div class="noticeboard" style="display:;">
								<?php echo$err;?>
								<table><tr><td>
								<a href="#" style="font-size: 18px;color:#0084c6;font-weight: 500;">
									<!--<?php echo "$user";?> -->Realtime World Updates at a glace
								</a>
								</td></tr></table>
							</div>
							<form action="home.php" method="post" style="margin-top: 9px;">
							<table>
								<tr>
									<td width="85%"><textarea id="post" required="required" name="post" rows="2" cols="85" placeholder="Post a question Say something ...."></textarea></td>
									<td style="padding-left: 15px;"><input type="submit" name="send" value="Post" id="send" /></td>
								</tr>
							</table>
							</form>
							
							</div>
						<div class="postcontents" style=""> 
							<!-- post iframe -->
							
							<?php 						
							/*//cycles
							$getpostsa = mysqli_query($con,"SELECT * FROM posts ORDER BY id DESC");
							$fetch = mysqli_fetch_assoc($getpostsa);							
							$id = $fetch['id'];
							$friendsbook = mysqli_query($con,"SELECT * FROM friendsbook");
							$frienddata = mysqli_fetch_assoc($friendsbook );
							$id2 = $frienddata['id'];
							$count = $id+$id2 ;							
							
							for($i=$count;$i>0;$i--){								
							//retring freind array							
							$getfriend = mysqli_query($con,"SELECT * FROM friendsbook WHERE (user='$user')||(friend='$user')&&(id='$i')");
							$friends = mysqli_fetch_assoc($getfriend);
							$userdb =$friends['user'];
							$friendarry =$friends['friend'];														
								//accepted request received	
								if($userdb == $user){
									//retriving posts from db-
									//echo "$friendarry";
								$getposts = mysqli_query($con,"SELECT * FROM posts WHERE (added_by = '$friendarry' || added_by = '$user')&&(id='$i')")or die(mysql_error());
								$getpost = mysqli_fetch_assoc($getposts);
								$numcm =mysqli_num_rows($getposts);
								//echo "$numcm";
								if($numcm==1){
								$post = $getpost['body'];
								$added_by = $getpost['added_by'];
								echo "$added_by: $post<br/><br/>";
								}
								
								}
								
								else{
									//retriving posts from db-
									echo "$userdb<br/>";
									echo "$i";
								$getposts1 = mysqli_query($con,"SELECT * FROM posts WHERE (added_by = '$user') && (id='$i')");
								$getpost1 = mysqli_fetch_assoc($getposts1);
								$numcm =mysqli_num_rows($getposts1);
								//echo "$numcm";
								if($numcm==1){
								$post1 = $getpost1['body'];
								$added_by1 = $getpost1['added_by'];
								echo "$added_by1: $post1<br/><br/>";
								}
								}
								
								}*/
								
							
							//all users

							
							
												
							// retriving posts from db-
								$getposts = mysqli_query($con,"SELECT * FROM posts ORDER BY id DESC LIMIT 10")or die(mysql_error());
								$countpost = mysqli_num_rows($getposts);
								//checks wether a user has ever made any posts
								if($countpost != 0){
								while ($row = mysqli_fetch_assoc($getposts)){
									$id = $row['id'];
									$body = $row['body'];
									$date_added = $row['date_added'];
									$added_by = $row['added_by'];
									$user_posted_to = $row['user_posted_to'];
									
										//checks user names
						        	$check = mysqli_query($con,"SELECT * FROM users WHERE (username='$added_by') ");
										$get = mysqli_fetch_assoc($check);
										$fnameby = $get['fname'];
										$lnameby = $get['lname'];	
									
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
									
									if($user_posted_to == $added_by  )
									{
										//checks  the  profile picture of the user posting msg
								$check_picl = mysqli_query($con,"SELECT * FROM users WHERE username='$added_by'");
								$get_row_picl = mysqli_fetch_assoc($check_picl);
								$profile_pic_dbl = $get_row_picl['profile_pic'];
								if($profile_pic_dbl==""){
									$profile_pic ="img/profpic.jpg";
								}else{
									$profile_pic = $profile_pic_dbl;
								}
										//counts the number of coments 
									$commentid = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id=$id");
									$getcid = mysqli_fetch_assoc($commentid);
									$getid = $getcid['post_id'];
									$get_comment = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id='$getid' ORDER BY id DESC ");
									$count = mysqli_num_rows($get_comment);
									$count = "(".$count.")";
								// display block if comments present
								if($count!=0){
									$display ="block";
								}else{
									$display ="none";
								}
								
										//display profile posts
										echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
										<th><div class='NewsFeedOptions'>
										Options
										</div></th></tr><tr>
										<td style='width:10%;'><div class='postpic' ><a href='$added_by'><img src='$profile_pic' width='50px' height='50px'/></a><p/><p/></div></td>
										<td style='width:90%;'><div class='postdetails' ><a href='$added_by'> $fnameby $lnameby on <b>$date_added</b></a></br>$body</br></div><br/></td>
										</tr>
										<tr><td colspan='2'><a href='#' onClick = 'javascript:toggle$id()'>Comments$count</a>
										<div id='toggleComment$id' style='display:$display'>
										<iframe src='./frame_comment.php?id=$id ' frameborder='0' style='height:auto;width:100%; min-heigh:10px; ' >
										</iframe>
										</div>
										</td>
										</tr>
										</table></div>";
										
										}
									
								if($user_posted_to != $added_by  ){
					
								//checks  the  profile picture of the user posting msg
								$check_picl = mysqli_query($con,"SELECT * FROM users WHERE username='$added_by'");
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
										//checks user names postin
						        	$check = mysqli_query($con,"SELECT * FROM users WHERE (username='$added_by') ");
										$get = mysqli_fetch_assoc($check);
										$fnamefrom = $get['fname'];
										$lnamefrom = $get['lname'];
								//counts the number of coments 
									$commentid = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id=$id");
									$getcid = mysqli_fetch_assoc($commentid);
									$getid = $getcid['post_id'];
									$get_comment = mysqli_query($con,"SELECT * FROM post_comment WHERE post_id='$getid' ORDER BY id DESC ");
									$count1 = mysqli_num_rows($get_comment);
									$count = "(".$count1.")";
									
									// display block if comments present
									$display = "";
								if($count1!=0){
									$display ="block";
								}else{
									$display ="none";
								}
								
								
								  echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
								  <td><div class='NewsFeedOptions'>
									Options
								  </div></td></tr><tr>
								  <td style='width:10%;'><div class='postpic' ><img src='$profile_picl' width='50px' height='50px'/><p/><p/> <br/></div></td>
								  <td style='width:90%;'><div class='postdetails' >By<a href='$added_by'>  $fnamefrom $lnamefrom</a>--> <a href='$user_posted_to '>$fnameto $lnameto</a> on <b>$date_added</b><br/> $body <br/><br/></div></td>
								  </tr>
								  <tr><td colspan='2'><a href='#' onClick = 'javascript:toggle$id()'s>Comments$count</a>
								  <div id='toggleComment$id' style='display:$display'>
									<iframe src='./frame_comment.php?id=$id  ' frameborder='0' style='height:auto;width:100%; min-heigh:10px;overflow-x: hidden; ' >
				
				
									</iframe>
									</div>
								</td></tr>
								  </table></div>";
													}
								}
				}else{
					echo "<h2>Welcome to junior store happy to see you here you have not made any posts yet<h2>";
				}

									
							
						?>
						
							</div>