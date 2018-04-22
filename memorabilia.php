<?php include ("./inc/header.inc.php"); ?>
<!-- restrict access of a page to a logged in user-->
<?php
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
?>		
<?php

?>

<div class="feeds">
		
			        <div class="leftfeed">	
			        	<div class="lfixed">
			        		<div class="pgtitle">
			        			<?php echo "<a href='$username' target='_top' style='font-size: 18px;color:#0084c6;font-weight: 500;'>$fname $lname</a>";?><br/>
			        			</div>
			        
			        	<div class="photoprof">
						<div class="pic">
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
							<!-- memorabilia create accounts   -->
						<div style="border:1px solid #ccc;border-top: 0px;width: 100%;">
						
						<iframe src='account/create_junior_account.php' frameborder='0' height='430px'  style='width:100%; overflow-x: hidden;overflow-y: scroll;'>
							
						</iframe>
						</div>
						</div>
					</div>
					
<div class="centerfeed">	
	<div class="cfixed">
						<!--<div class="postfom" style="min-height: 120px;" >
							<div class="noticeboard" style="display:;">
								<a href="memorabilia.php" style="font-size: 18px;color:#0084c6;font-weight: 500;">
									<?php echo "$lname $fname";?>'s  junior Accounts
									</a>
								</div>
				 gets the junior accounts				
				<iframe src='my_junior_list.php' frameborder='0' height='100px'  style='width:100%;overflow-x: hidden; '>
							
				</iframe>	
									
									
						</div>-->
						<script type='text/javascript'>
	function toggle(){
		var ele = document.getElementById('pics');
		if(ele.style.display == "block"){
			ele.style.display = "none";
			
		}else{
			ele.style.display = "block";
		}
	}
</script>
						
						<div class="postcontents" style="margin-top: 2px;"> 
								
						<?php
											
								if(isset($_GET['id'])){															
									$id = ($_GET['id']);
									if($id){
										//junior name details 
										$junior_name = mysqli_query($con,"SELECT * FROM junior_account WHERE id='$id' AND created_by ='$user'");
										$count = mysqli_num_rows($junior_name);
										if($count!=0){
										$get_junior = mysqli_fetch_array($junior_name);
										$jfname = $get_junior['fname'];
										$jlname = $get_junior['lname'];
										$jnname = $get_junior['nname'];
										$created_by = $get_junior['created_by'];
										$img_url = $get_junior['img_url'];
										
												//checks for profile picture
										$check_pic = mysqli_query($con,"SELECT img_url FROM junior_account WHERE created_by='$user' && id='$id'");
										$get_row_pic = mysqli_fetch_array($check_pic);
										$profile_pic_db = $get_row_pic['img_url'];
										if($profile_pic_db==""){
											$profile_pic ="img/child.jpg";
										}else{
											$profile_pic = "userdata/junior_prof_pic/".$profile_pic_db;
										}
										//send post to db code
										$suc = $fal = "";
										$post = @$_POST['post'];
										$sub = @$_POST['sub'.$id.''];
										if($sub){
										if($post!= ""){
											$date_added = date("Y-m-d");
											$added_by = "$user";
											$junior_posted_to ="$id";
											$sqlcommand = mysqli_query($con,"INSERT INTO junior_account_posts (body,posted_by,date_posted,posted_to) VALUES('$post','$added_by','$date_added', '$junior_posted_to')");
											$suc = "<span style='color:green'>Post submitted successfully</span>";
											echo "<meta http-equiv=\"refresh\" content=\"1; url=memorabilia.php?id=$id\">";
										}else{
											$fal = "<span style='color:brown'>Write something before posting</span>";
											echo "<meta http-equiv=\"refresh\" content=\"1; url=memorabilia.php?id=$id\">";
										}
										}
										
										//echo '<div><a href="#" style="font-size: 18px;color:#0084c6;font-weight: 500;">
									// '.$jfname.' '.$jlname.' '.$jnname.' \'s Accounts</a></div>';
										//form to send junior posts 
										echo "<div style='height:1px;'></div>";
										echo "<table width='100%'> <tr><td width='8%'>";
										echo "<img src='$profile_pic ' width='57px' height='57px'/></td>";
										//table details
										echo'<td valign="top">
										<table width="90%"><tr>'.$suc. ''.$fal.'
											<form action="memorabilia.php?id='.$id.'" method="post" style="margin-top: 9px;">
											<td width="88%"><textarea id="post" name="post" style="background-color:whitesmoke"rows="2" required="required" cols="25" placeholder="Say something .... about '.$jfname.'"></textarea></td>
											<td width="12%" valign="top"><input type="submit" name="sub'.$id.'" value="Post" style="border-radius:50px;height:55px;" id="sendm" /></td>
											</form>
										</tr></table>
										</td></tr>';
								
										echo "<tr>
										<td colspan='2'><button onclick='toggle()'style='background-color:#EDEDED;border:1px solid #ccc;cursor:pointer;padding:2px;'>Change Profile Picture</button></td>
										<tr>";
										//upload code
											$fal="";
											if(isset($_POST['uploadpic'.$id.''])){
										if(((@$_FILES['profpic']["type"]=="image/jpeg" )|| (@$_FILES['profpic']["type"]=="image/png") || (@$_FILES['profpic']["type"]=="image/gif")) && (@$_FILES['profpic']["size"]<1048576)){
										
											$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ0123456789";
											$rand_dir_name = substr(str_shuffle($chars),0,15);
											mkdir("userdata/junior_prof_pic/$rand_dir_name");
											if(file_exists("userdata/junior_prof_pic/$rand_dir_name/".@$_FILES["profpic"]["name"])){
												echo @$_FILES["profpic"]["name"]."Already exist";
											}else{
												move_uploaded_file(@$_FILES["profpic"]["tmp_name"], "userdata/junior_prof_pic/$rand_dir_name/".$_FILES["profpic"]["name"]);
												//echo "uploaded and stored in: userdata/user_photos/$rand_dir_name/".@$_FILES["profpic"]["name"];
												$_profile_pic_name = @$_FILES["profpic"]["name"];
												$profile_pic_query = mysqli_query($con,"UPDATE junior_account SET img_url='$rand_dir_name/$_profile_pic_name' WHERE (id='$id') && (created_by='$user')");
												//header("Location:my_junior_list.php");
												echo "<script type='text/javascript'> window.parent.location.href='memorabilia.php?id=$id'</script>" ;
												//echo "string";
											}
											
									}else
										{
											$fal= "<span style='color:brown;'>invalid file your image must not be larger than 1MB and must be either .jpeg, .gif .png</span>";
										}
									}
									//upload form
										echo '<tr>
										<td colspan="2"><div style="display:none" id="pics">
										
										<form action="memorabilia.php?id='.$id.'"  method="post" enctype="multipart/form-data">
										<table width="70%">
											<tr>
											<td><input type="file" name="profpic"  style="background-color: #fff; width: 100%;" /></td>
									
											<td><input type="submit" style="background-color:#EDEDED;border:1px solid #ccc;color:#0084C6;cursor:pointer;padding:2px;" name="uploadpic'.$id.'" value="Upload profile picture" /> </td>
											</tr>
										</table>
									</form>
										
										</div></tr>';
										echo "<tr><td colspan='2'>$fal</td></tr>";
									
										echo'</table>';
										//retriving comments from database
										$getposts = mysqli_query($con,"SELECT * FROM junior_account_posts WHERE posted_to='$id' ORDER BY id DESC ")or die(mysql_error());
										$countpost = mysqli_num_rows($getposts);
										//checks wether a user has ever made any posts
										if($countpost != 0){
										while ($row = mysqli_fetch_array($getposts)){
											$id = $row['id'];
											$body = $row['body'];
											$date_posted = $row['date_posted'];
											$posted_by = $row['posted_by'];
											$posted_to = $row['posted_to'];
												//dete code
											$sucdel=$sucde2=$sucde3=$sucdelete="";	
											$del=@$_POST['delp'.$id.''];
											
											if(isset($del)){			
												$sucde2 = "<div style='float:left; width:200px;'><span style='color:maroon;margin-left:10px;'>Are you want to delete this post?</span></div>";
												$sucdel = "<div style='float:left; width:50px;height:0px;'><span style='color:red;'><form method='post'><input type='submit'  name='yes$id' value='yes' id='del' style='border:1px;cursor:pointer;color:red;' /></form></span></div>";
												$sucde3 = "<div style='float:left;width:50px;'><span style='color:green;'><form method='post'><input type='submit'   name='no$id' value='no' id='no' style='border:1px;cursor:pointer;color:blue;' /></form></span></div>";
											}
											//effect deletions
											
											$yes = @$_POST['yes'.$id.''];
											if(isset($yes)){			
												$delete_post = mysqli_query($con,"DELETE FROM junior_account_posts WHERE id='$id' ");
												$sucdelete = "<span style='color:green;margin-left:10px;'>Comment is being deleted</span>";
												echo "<meta http-equiv=\"refresh\" content=\"1; url=memorabilia.php?id=$posted_to\">";
											}
											//delete post form										
										$del ='<form action="" method="post">
										<input type="submit" name="delp'.$id.'" value="x" id="del" style="border:0px;cursor:pointer;color:blue;" />
										</form>';	
										
														
											//display profile posts
										echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
										<td colspan='2'><div class='NewsFeedOptions'>
										Options <div style='float:right; width:50%;'>$sucde2 $sucde3 $sucdel $sucdelete</div>
										</div></td>
										<td valign='top'>$del</td>
										</tr><tr>
										<td style='width:10%;'><div class='postpic' ><a href='#'><img src='$profile_pic' width='50px' height='50px'/></a><p/><p/></div></td>
										<td style='width:88%;'><div class='postdetails' ><a href='#'> $jfname $jlname on <b>$date_posted</b></a></br>$body</br></div><br/></td>
										<td valign='top'></td> 
										</tr>
										
										</table></div>";
											
										
											}
											}else{
												echo "No posts yet";
											}
										
										

										
										}else{
											echo "sorry an error occured";
										}
									}
								}else
									if(isset($_GET['jid'])){
									$jid = ($_GET['jid']);
									if($jid){
										//retriving comments from database
										$getposts = mysqli_query($con,"SELECT * FROM junior_account_posts WHERE posted_to = '$jid'")or die(mysql_error());
										$countpost = mysqli_num_rows($getposts);					
										//checks wether a user has ever made any posts
									if($countpost != 0){
										echo "<div style='color:#0084C6;height:1px ;'></div>";
										while ($row = mysqli_fetch_array($getposts)){
											$id = $row['id'];
											$body = $row['body'];
											$date_posted = $row['date_posted'];
											$posted_by = $row['posted_by'];
											$posted_to = $row['posted_to'];	
										//junior name
										$junior_name = mysqli_query($con,"SELECT * FROM junior_account WHERE id='$jid' ");
										$count = mysqli_num_rows($junior_name);
										$get_junior = mysqli_fetch_array($junior_name);
										$jfname = $get_junior['fname'];
										$jlname = $get_junior['lname'];
										$jnname = $get_junior['nname'];
										$created_by = $get_junior['created_by'];
										$profile_pic_db = $get_junior['img_url'];
										
												//checks for profile picture									
										if($profile_pic_db==""){
											$profile_pic ="img/child.jpg";
										}else{
											$profile_pic = "userdata/junior_prof_pic/".$profile_pic_db;
										}
									
										//display profile posts
										//echo "<div style='color:##0084C6'>$jfname  $jlname  Account Posts </div>";
										echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
										<th><div class='NewsFeedOptions'>
										Options
										</div></th></tr><tr>
										<td style='width:10%;'><div class='postpic' ><a href='#'><img src='$profile_pic' width='50px' height='50px'/></a><p/><p/></div></td>
										<td style='width:90%;'><div class='postdetails' ><a href='#'> $jfname $jlname on <b>$date_posted</b></a></br>$body</br></div><br/></td>
										</tr>
										</table></div>";
										}
										}else{
											echo "<h2>No  posts found</h2>";
										}
									}
									}	
				
								
								else{
									if(!isset($_GET['jid'])){
										//retriving comments from database
										$getposts = mysqli_query($con,"SELECT * FROM junior_account_posts WHERE posted_by = '$user' ORDER BY id DESC  LIMIT 20")or die(mysql_error());
										$countpost = mysqli_num_rows($getposts);
										//checks wether a user has ever made any posts
										if($countpost != 0){
										while ($row = mysqli_fetch_array($getposts)){
											$id = $row['id'];
											$body = $row['body'];
											$date_posted = $row['date_posted'];
											$posted_by = $row['posted_by'];
											$posted_to = $row['posted_to'];	
											//junior name
										$junior_name = mysqli_query($con,"SELECT * FROM junior_account WHERE id='$posted_to'");
										$count = mysqli_num_rows($junior_name);
										$get_junior = mysqli_fetch_array($junior_name);
										$jfname = $get_junior['fname'];
										$jlname = $get_junior['lname'];
										$jnname = $get_junior['nname'];
										$created_by = $get_junior['created_by'];
										$img_url = $get_junior['img_url'];
										
												//checks for profile picture
										$check_pic = mysqli_query($con,"SELECT img_url FROM junior_account WHERE id='$posted_to'");
										$get_row_pic = mysqli_fetch_array($check_pic);
										$profile_pic_db = $get_row_pic['img_url'];
										if($profile_pic_db==""){
											$profile_pica ="img/child.jpg";
										}else{
											$profile_pica = "userdata/junior_prof_pic/".$profile_pic_db;
										}
									
											//display profile posts
										echo"<div class='postcontainer'><table width='100%' style='margin-bottom:3px;'><tr>
										<th><div class='NewsFeedOptions'>
										Options
										</div></th></tr><tr>
										<td style='width:10%;'><div class='postpic' ><a href='#'><img src='$profile_pica' width='50px' height='50px'/></a><p/><p/></div></td>
										<td style='width:90%;'><div class='postdetails' ><a href='#'> $jfname $jlname on <b>$date_posted</b></a></br>$body</br></div><br/></td>
										</tr>										
										</table></div>";
										
										}
									}
								}
								}
?>

			<?php
			//juniors on junior store accounts
								
			
			
			
			?>

							</div>
							</div>
</div>
					
				<div class="rightfeed">
					<div class="rfixed">
								<!-- memorabilia accounts   -->
						<iframe src='memorabilia_account_list.php' frameborder='0' height='590px'  style='width:100%; overflow-x: hidden;'>
							
						</iframe>
						</div>
			       </div>
	
</div>	
<?php
	
	}
?>

