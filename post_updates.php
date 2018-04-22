	<?php 
							
												
							// retriving posts from db-
								$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$user' ORDER BY id DESC LIMIT 10")or die(mysql_error());
								while ($row = mysql_fetch_assoc($getposts)){
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
									
									if($user_posted_to == $added_by  )
									{
											//counts the number of coments 
									$commentid = mysql_query("SELECT * FROM post_comment WHERE post_id=$id");
									$getcid = mysql_fetch_assoc($commentid);
									$getid = $getcid['post_id'];
									$get_comment = mysql_query("SELECT * FROM post_comment WHERE post_id='$getid' ORDER BY id DESC ");
									$count = mysql_num_rows($get_comment);
									$count = "(".$count.")";
										
										echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
										<th><div class='NewsFeedOptions'>
										options
										</div></th></tr><tr>
										<td style='width:10%;'><div class='postpic' ><a href='$added_by'><img src='$profile_pic' width='50px' height='50px'/></a><p/><p/></div></td>
										<td style='width:90%;'><div class='postdetails' ><a href='$added_by'>Posted by $added_by on <b>$date_added</b></a></br>$body</br></div><br/></td>
										</tr>
										<tr><td colspan='2'><a href='#' onClick = 'javascript:toggle$id()'>Comments$count</a>
										<div id='toggleComment$id' style='display:none'>
										<iframe src='./frame_comment.php?id=$id  ' frameborder='0' style='height:auto;width:100%; min-heigh:10px; ' >
		
		
										</iframe>
										</div>
										</td>
										</tr>
										</table></div>";	
									}
								if($user_posted_to != $added_by  ){
					
								//checks  the  profile picture of the user posting msg
								$check_picl = mysql_query("SELECT profile_pic FROM users WHERE username='$added_by'");
								$get_row_picl = mysql_fetch_assoc($check_picl);
								$profile_pic_dbl = $get_row_picl['profile_pic'];
								if($profile_pic_dbl==""){
									$profile_picl ="img/profpic.jpg";
								}else{
									$profile_picl = "userdata/profile_pics/".$profile_pic_dbl;
								}
									
										//counts the number of coments 
									$commentid = mysql_query("SELECT * FROM post_comment WHERE post_id=$id");
									$getcid = mysql_fetch_assoc($commentid);
									$getid = $getcid['post_id'];
									$get_comment = mysql_query("SELECT * FROM post_comment WHERE post_id='$getid' ORDER BY id DESC ");
									$count = mysql_num_rows($get_comment);
									$count = "(".$count.")";
																
									//checks user names being posted to
						        	$check = mysql_query("SELECT * FROM users WHERE (username='$user_posted_to') ");
										$get = mysql_fetch_assoc($check);
										$fnameto = $get['fname'];
										$lnameto = $get['lname'];
										//checks user names posting
						        	$check = mysql_query("SELECT * FROM users WHERE (username='$added_by') ");
										$get = mysql_fetch_assoc($check);
										$fnamefrom = $get['fname'];
										$lnamefrom = $get['lname'];
																	
								  echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
								  <td><div class='NewsFeedOptions'>
									options
								  </div></td></tr><tr>
								  <td style='width:10%;'><div class='postpic' ><img src='$profile_picl' width='50px' height='50px'/><p/><p/> <br/></div></td>
								  <td style='width:90%;'><div class='postdetails' >By<a href='$added_by'>  $fnamefrom $lnamefrom </a>--> <a href='$user_posted_to '>$fnameto $lnameto</a> on <b>$date_added</b><br/> $body <br/><br/></div></td>
								  </tr>
								  <tr><td colspan='2'><a href='#' onClick = 'javascript:toggle$id()'s>Comments $count</a>
								  <div id='toggleComment$id' style='display:none'>
									<iframe src='./frame_comment.php?id=$id  ' frameborder='0' style='height:auto;width:100%; min-heigh:10px; ' >
	
	
									</iframe>
									</div>
								</td></tr>
								  </table></div>";
									}
									}


									
							
						?>