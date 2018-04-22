<?php include ("./inc/header.inc.php"); ?>
<!-- restrict access of a page to a logged in user-->
<?php
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
?>		
<?php
//profile posts send to database
$err = "";
$profps="";
$post = @$_POST['post'];
$send = @$_POST['send'];
if($send){
if($post!= ""){
	$post = test_input(@$_POST['post']);
	$date_added = date("Y-m-d");
	$added_by = "$user";
	$user_posted_to ="$user";
	
	$sqlcommand = "INSERT INTO posts VALUES('', '$post','$date_added','$added_by','$user_posted_to')";
	$query = mysqli_query($con,$sqlcommand)or die(mysql_error());
}else{
	$err = "<span style='color:brown;background-color:pink;'>Your post is black</span>";
}
}
?>

<div class="feeds">
		
			        <div class="leftfeed">	
			        	<div class="lfixed">
			        		<div class="pgtitle">
			        			<?php echo "<a href='$username' target='_top' style='font-size: 18px;color:#0084c6;font-weight: 500;'>$fname $lname</a>";?><br/>
			        			</div>
			        	
			        	
			        	<div class="photoprof">
						<div class="pic" style="width: 100%;">
						<table width="100%" >
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
			        	
			        	</div>
						<?php 
							
						
						
						?>
						<!-- side navigation menus -->
						<div class="settings">
							<ul style="list-style-type: none; color: #ffffff;margin:2px 0px 3px 0px;">
							<li><a href="home.php">Settings</a></li>
							</ul>
							<!-- settings menu and options   -->
						<iframe src='sett/settings.php' frameborder='0' height='180px'  style='width:100%; overflow-x: hidden;'>
							
						</iframe>
						</div>
						
						<div class="poke" height="200px">
						<ul style="list-style-type: none; color: red;margin:2px 2px 3px 0px;">
						<li><a href="home.php">Pings<?php echo" ";echo"$poke_numrows";?></a></li>
						</ul>
						<iframe src='my_poke.php' frameborder='0' height='200px' style='width:100%; overflow-x: hidden;' >
		
		
						</iframe>
						</div>
						
					</div>	
					</div>
					
<div class="centerfeed">	
	<div class="cfixed">
						
						<!-- received message view -->
						
						<?php						
						if(isset($_GET['umsg'])){
							$sucmsg= "";
							$usernamemsg = ($_GET['umsg']);
							if($usernamemsg){
								//checks if the user exist restricts access to profile page unless you are logged in
								$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE username='$usernamemsg' ");
								if(mysqli_num_rows($check)==1){ 
									$get = mysqli_fetch_assoc($check);
									$usernamemsg = $get['username'];
									$fnamemsg = $get['fname'];
									$lnamemsg = $get['lname'];	
									?>
									<!--msg reply-->
									<div class="postfom" style="width: 95%;margin: 5px auto;">
										<div class="noticeboard" style="display:;"><?php echo$sucmsg;?>
											<table><tr><td>
												<a href="#" style="font-size: 18px;color:#0084c6;font-weight: 500;">
													Your Chats with <?php echo "$lnamemsg $fnamemsg";?> 
													</a>
											</td></tr></table>
										</div>
										<form action="home.php?umsg=<?php echo$usernamemsg;?>" method="post" style="margin-top: 9px;">
											<table>
												<tr>
													<td width="85%"><textarea id="post" name="sendmsg" rows="2" cols="85" required="required"  placeholder="Reply messages ...."></textarea></td>
													<td style="padding-left: 15px;"><input type="submit" name="sendsms" value="reply" id="send" /></td>
												</tr>
											</table>
										</form>
									
									<div class="outupdate" style="margin:-15px auto;width: 95%;">
									<div class="updatepic" style="width: 98%;margin: 15px auto;">
									
									<?php	
																	
									//send message to db
									$msg_body = test_input(@$_POST['sendmsg']);
									
									
												//send code
												if(isset($_POST['sendsms'])){
													$msg_body = test_input(@$_POST['sendmsg']);
													$date = date("Y-m-d");
													$opened = "no";
													$deleted = "no";
													
													if($msg_body == "enter message you wish to send"){
														echo "You have not typed anything Type a message to send ";
													}
													
													else
														if(strlen($msg_body)<2){
															echo "message too short";
													}
													else{
													$send_msg = mysqli_query($con,"INSERT INTO pvt_messages VALUES('','$user','$usernamemsg','$msg_body','$date','$opened','$deleted')");
													$sucmsg= "message sent succesfully";
													
														}
											}
											
									
								// grab messages chat from logged in user read messages
							 	$grab_messages = mysqli_query($con,"SELECT * FROM pvt_messages WHERE ((user_to='$user' && deleted='no' && user='$usernamemsg')||(user='$user' && user_to='$usernamemsg'&& deleted='no')) ORDER BY id DESC");
							 	$numrow_read = mysqli_num_rows($grab_messages);
							 	if($numrow_read != 0){
								while($get_messages = mysqli_fetch_assoc($grab_messages)){
									$id = $get_messages['id'];
									$user_from= $get_messages['user'];
									$user_to  = $get_messages['user_to'];
									$msg_body  = $get_messages['msg_body'];
									$date = $get_messages['date'];
									$opened = $get_messages['opened'];
									$deleted = $get_messages['deleted'];
									
																
									if(strlen($msg_body)>5000){
									 $msg_body = substr($msg_body, 0, 5000 )."...";
									}else{
										$msg_body = $msg_body;
										//delete function of the messages
										if(isset($_POST['delete_'.$id.''])){
											$delete_msg_query = mysqli_query($con,"UPDATE pvt_messages SET deleted = 'yes' WHERE id = '$id'");
											echo "<meta http-equiv=\"refresh\" content=\"0; url=home.php?umsg=$usernamemsg\">";
										}
										
										
									}
									
									
									
									$sent=$received="";
									if($user_from==$user){
										$sent="Sent";
										echo"<div class='msg' style='padding-top:5px;padding-left:10px;border:1px solid #ddd;border-radius:0px 25px 25px 25px;margin:5px;'>
									<table width='91%' style='margin-left:30px;'>
									<tr><td width='10%'>
									<form method='post' action='home.php?umsg=$usernamemsg' name='$msg_body'> 
									<a href='$user_from'  target = '_top'><img src='$profile_pic' width='40px' height ='35px' style='float:left;'/> </a>
									</td><td width='88%'>
									<a href='$user_from'  target = '_top'>$fname $lname </a>
									<font size='2px'>$date</font><br/>
									<div style='font-size:15px; color:#123456;width:98%;'>
									$msg_body
									</div>
									</td>
									<td valign='top'>
									<input type='submit' name = 'delete_$id' value = 'x' title='Delete this message' style='padding:2px;border:0px;color:#0084c6;background-color:rgb(204,255,153);'/>
									</td>
									</tr>
									</table>
									<table width='96%' style='margin:0 auto;'>
									<tr>
									<td width='70%'></td>
									<td width='25%'></td>
									<td width='5%'>
									</td>
									</tr>
									</table>
									</form>
									
									
									
									</div>
									";
									}else{
										$received = "Received";
										echo"<div style='padding-top:5px;padding-left:10px;border:2px solid #aaa;border-radius:25px 25px 0px 25px; margin:5px;'>
									<table width='96%' style=''>
									<tr><td width='10%'>
									<form method='post' action='home.php?umsg=$usernamemsg' name='$msg_body'> 
									<a href='$user_from'  target = '_top'><img src='$profile_pic' width='40px' height ='35px' style='float:left;'/> </a>
									</td><td width='88%'>
									<a href='$user_from'  target = '_top'>$fname $lname </a>
									<font size='2px'>$date</font><br/>
									<div style='font-size:15px; color:#123456;width:98%;'>
									$msg_body
									</div>
									</td>
									<td valign='top'>
									<input type='submit' name = 'delete_$id' value = 'x' title='Delete this message' style='padding:2px;border:0px;color:#0084c6;background-color:rgb(204,255,153);'/>
									</td>
									</tr>
									</table>
									<table width='96%' style='margin:0 auto;'>
									<tr>
									<td width='70%'></td>
									<td width='25%'></td>
									<td width='5%'>
									</td>
									</tr>
									</table>
									</form>
									
									
									
									</div>
									";
									}
									
									
								}
								}
						else{
							echo "you have no unmessages";
						}
									
								}
							}
						echo "</div></div></div>";
						}else 
						//change password
						if(isset($_GET['pass'])){
							
							$usernamesett = ($_GET['pass']);
							if($usernamesett){
								//checks if the user exist restricts access to profile page unless you are logged in
								$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE username='$usernamesett' ");
								if(mysqli_num_rows($check)==1){ 
									$get = mysqli_fetch_assoc($check);
									$usernamesett = $get['username'];
									$fnamesett = $get['fname'];
									$lnamesett = $get['lname'];										
									include("sett/password.php");									
									}
									}
							
							}else
							//change infomation
						if(isset($_GET['info'])){
							
							$usernameinfo = ($_GET['info']);
							if($usernameinfo){
								//checks if the user exist restricts access to profile page unless you are logged in
								$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE username='$usernameinfo' ");
								if(mysqli_num_rows($check)==1){ 
									$get = mysqli_fetch_assoc($check);
									$usernameinfo = $get['username'];
									$fnameinfo = $get['fname'];
									$lnameinfo = $get['lname'];
									include("sett/info.php");									
									}
									}
							
							}else
							//change profile pic
						if(isset($_GET['pic'])){
							$usernamepic = ($_GET['pic']);
							if($usernamepic){
								//checks if the user exist restricts access to profile page unless you are logged in
								$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE username='$usernamepic' ");
								if(mysqli_num_rows($check)==1){ 
									$get = mysqli_fetch_assoc($check);
									$usernamepic = $get['username'];
									$fnamepic = $get['fname'];
									$lnamepic = $get['lname'];	
									include("sett/change_prof_pic.php");
							
						
											$profp = @$_POST['profp'];
											if($profp){
												//change profile picture
												$update_prof = mysqli_query($con,"UPDATE users SET profile_pic='$image_url' WHERE username='$user'");
											}
																	
									}
								
							}
												
									
							
							}
							else{
									//<!-- world news-->
									include("worldfeed.php");
								}
								?>
								
								
								
							</div>
</div>					

					
				<div class="rightfeed">
					<div class="rfixed">
						<div class="buddies">				
						<?php 
							echo '
							<ul style="list-style-type: none; color: #ffffff; margin:2px 0px 3px 0px;">
							<li><a href="home.php" >New Messages '.$unread_numrows.'</a></li>
							</ul> ';
							
						?>
						
						<iframe src='my_messages.php' frameborder='0' height = '255px' style='width:100%;  overflow-x: hidden;'  >
		
		
						</iframe>
						</div>	
						<div class="buddies">
							<?php
							echo'
							<ul style="list-style-type: none; color: #ffffff;margin:2px 0px 3px 0px;">
							<li><a href="home.php" >Friends Requests '.$requests_numrows.'</a></li>
							</ul>
							';
							?>
							<iframe src='friend_requests.php' frameborder='0' height = '250px' style='width:100%; overflow-x: hidden;' >
		
		
						</iframe>
						</div>
					</div>
			       </div>
	
</div>	
<?php
	
	}
?>

