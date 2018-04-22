<?php include ("./inc/header.inc.php"); ?>
<!-- restrict access of a page to a logged in user-->
<?php
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
?>	
<?php
if(isset($_GET['u'])){
	$username = ($_GET['u']);
	if($username){
		//checks if the user exist restricts access to profile page unless you are logged in
		$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE (username='$username') || (email ='$username')");
		if(mysqli_num_rows($check)==1){ 
			$get =  mysqli_fetch_assoc($check);
			$username = $get['username'];
			$fname = $get['fname'];
			$lname = $get['lname'];	
		}
	else{
			echo "<an error occured";
			exit();
		}
	}
}
?>

<script type="text/javascript">
<!--
function delayer(){
    window.location = "albums.php"
}
//-->
</script>


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
			        	<div class="albumform" style="border-left:1px solid #ccc;border-right:1px solid #ccc;width: 100%;">
			        	<?php
			        	//send album code
			        	$jlname="";
			        	$alname = @($_POST['alname']);
						$aldesc = @($_POST['aldesc']);
						$jlname = @$_POST['jlname'];
						$date = date("Y-m-d");
						$created_by = $user;
						$fal=$fal1="";
						$suc = "";
						if(isset($_POST['sendal'])){											
							if($alname==""){
								$fal= "<span style='color:brown;'>Enter album name</span>";
							}else if($jlname==""){
									$fal = "<span style='color:brown;'>Select a junior name</span>";
									echo$jlname;
								}else if($jlname=="No records found"){
										$fal1 = "<span style='color:brown;'>You need to create a junior first</span>";
									}
								else if($aldesc==""){
									$fal = "<span style='color:brown;'>Enter album description</span>";
								}
							
							else{
								
								$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ0123456789";
								$rand_dir_name = substr(str_shuffle($chars),0,15);
								$insert_data = mysqli_query($con,"INSERT INTO albums (album_title, album_description, created_by,created_for, date_created,uid) VALUES('$alname','$aldesc','$created_by','$jlname','$date','$rand_dir_name')");
								$suc = "<span style='color:green;'>Album created successfully</span>";
								//echo "<script type='text/javascript'> window.parent.location.href='albums.php?u=$id'</script>" ;
								//header("Location:albums.php");
								echo "<meta http-equiv=\"refresh\" content=\"2;  url=albums.php\">";
							}
						}
			        	
			        	
			        	
			        	?>
			        	<!-- create album form-->
			        	
			        		<a href="albums.php" style="font-size: 18px;color:#0084c6;font-weight: 500;">Create New album</a>
			        	<form method="post" action="albums.php">
			        		<table cellspacing="5px"  width="100%">
			        			<?php echo$suc; echo$fal;echo$fal1;?>
			        			<tr>
			        			<td width="10%">Album Name:</td>
								<td><input type="text" name="alname" value="<?php echo$alname;?>"/></td>
								</tr>
								<tr>
			        			<td width="10%">Junior For:</td>
								<td>
									<select name="jlname"  >
												
											<?php										
											echo"<option>$jlname</option>";										
											$selectjunior = mysqli_query($con,"SELECT * FROM junior_account WHERE created_by='$username'");
											$countj = mysqli_num_rows($selectjunior);
											if($countj>0){
											while($reslj =  mysqli_fetch_assoc($selectjunior)){
												$nickname =  $reslj['nname'];
												echo "<option>$nickname</option>";
											}
											}else{
												echo "<option>No records found</option>";
											}
											?>																			
									</select>
								</td>
								</tr>
								<tr>
			        			<td valign="top">Album description:</td>
								<td><textarea name="aldesc" rows="3" cols="15" ><?php echo$aldesc;?></textarea></td>
								</tr>
								<tr>
									<td></td>
								<td><input type="submit" value="Create album" name="sendal"/></td>
								</tr>
							</table>
							</form>
						</div>
						<!--edit album -->
						
					
						<div style="border:1px solid #ccc;width: 100%;"><table width="99%"><tr><td style="width: 50%;">
						<a href="albums.php" style="font-size: 18px;color:#0084c6;font-weight: 500;">Edit  albums</a></td><td>
						<form action="albums.php" method="post">
						<table><tr><td width="80%">
						<select style="background-color:#CF9;border:0px;" name ='ald'>
							<option >--select album--</option>
							<?php 
							$allist = mysqli_query($con,"SELECT * FROM albums Where created_by='$username'");
							while($fetch =  mysqli_fetch_assoc($allist)){
							$altitle = $fetch['album_title'];
							$createdfor = $fetch['created_for']; 
							$alid = $fetch['id'];
							echo "<option style='background-color:white;'>
								$alid. $altitle for $createdfor
								</option>";
							}
							?>
								
							
						</select></td><td align="right">
						<input type="submit" name="alb" value="Edit" style="background-color: #eee;border: 1px solid #aaa; border-radius: 2px; padding:5px;"/>
						</td></tr></table>
						</form></td></tr></table>
						<?php
						$sub="";
							$sub= @$_POST['alb'];
						if($sub){
						$alb = $_POST['ald'];	
							//echo "$alb";
							if($alb!="--select album--"){
								echo"<iframe src='edit_album.php?u=$alb'  frameborder='0' style='width:100%;  height:250px; overflow-y: scroll;overflow-x: hidden;'>
				
				
								</iframe>";
							}else{
								echo"<iframe src='edit_album.php'  frameborder='0' style='width:100%;  height:250px; overflow-y: scroll;overflow-x: hidden;'>
				
				
								</iframe>";
							}
						}else{
						
						?>
						<iframe src='edit_album.php'  frameborder='0' style='width:100%;  height:250px; overflow-y: scroll;overflow-x: hidden;'>
				
				
						</iframe>
						<?php }?>
						</div>
						</div>
							
</div>
			        	
<div class="centerfeed">	
			<div class="cfoxed">			
						
						<div class="postcontents" >
							<!-- loading photos for particular albus-->
							<div style="margin: 0px auto; padding: 3px; width: 103%; ">
								<table  width="100%" style="">
									<tr><td>
							<?php
								if(isset($_GET['nickname'])){
									//title
									$nickname = ($_GET['nickname']);
									$album_all = mysqli_query($con,"SELECT * FROM junior_account WHERE nname='$nickname' ORDER BY id DESC");
									$altitle =  mysqli_fetch_assoc($album_all);
										$fnamea = $altitle['fname'];
										$snamea = $altitle['lname'];
										echo '<div style="width:100%;"><a href="albums.php" style="font-size: 18px;color:#0084c6;font-weight: 500;">'.$nickname.' '.$fnamea.' '. $snamea.' albums</a></div>';
									if($nickname){
										//album name
										$album_name = mysqli_query($con,"SELECT * FROM albums WHERE created_for='$nickname' ORDER BY id DESC");
										while($get_album_title =  mysqli_fetch_assoc($album_name)){
										$title = $get_album_title['album_title'];
										$descp = $get_album_title['album_description'];
										$date = $get_album_title['date_created'];		
										$uid = $get_album_title['uid'];									
											//album no of photos
										$checknum = mysqli_query($con,"SELECT * FROM photos WHERE uid='$uid' ORDER BY id DESC");
										$countnum = mysqli_num_rows($checknum);
									echo "<div id='albumframe$nickname' style='margin-top:5px; border-bottom:1px solid #ccc; width:50%;float:left;'>
									$fal
									<table width='100%'>
									<tr>
									<td width='30%'><a  href='albums.php?pics=$uid' target='_top' ><img src='img/album.jpg' width='80px' height='80px' title='Open Album'/></a></td>
									<td valign='top'><a href='albums.php?pics=$uid' target='_top'><span style='color:#0084c6;font-size:14px;'> ".$title."<br/></span></a>			 
									<span style='font-family: times, serif; font-size:14px;'>$descp <br/></span>
									<span style='font-family: times, serif; font-size:14px;'>Total Photos: <a href='albums.php?pics=$uid' target='_top'>$countnum </a></span>
									<span style='font-size:12px;color:#654321;'><br/>Created on $date </span>
									</td>
									</tr>";
									
															echo'<tr><td colspan="2"><div class="albumphoto" style="margin-top:5px;">
									<form action="albums.php?nickname='.$nickname.'"  method="post" enctype="multipart/form-data">
										<table>
											<tr>
											<td><input type="file" name="profpic" style="background-color: #fff; width: 100%;" /></td>
											</tr>
											<tr>
											<td><textarea name="description" placeholder="say something about the photo" style="width: 100%;" /></textarea></td>
											</tr>
											<tr>
											<td><input type="submit" name="uploadpic'.$uid.'" value="Upload a Picture to this album" /> </td>
											</tr>
										</table>
									</form></div></td>
									</tr>
									</table></div>';
									//upload photo code
								$fal="";
								if(isset($_POST['uploadpic'.$uid.''])){
							if(((@$_FILES['profpic']["type"]=="image/jpeg" )|| (@$_FILES['profpic']["type"]=="image/png") || (@$_FILES['profpic']["type"]=="image/gif")) && (@$_FILES['profpic']["size"]<1048576)){
							
								$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ0123456789";
								$rand_dir_name = substr(str_shuffle($chars),0,15);
								mkdir("userdata/user_photos/$rand_dir_name");
								if(file_exists("userdata/user_photos/$rand_dir_name/".@$_FILES["profpic"]["name"])){
									echo @$_FILES["profpic"]["name"]."Already exist";
								}else{
									move_uploaded_file(@$_FILES["profpic"]["tmp_name"], "userdata/user_photos/$rand_dir_name/".$_FILES["profpic"]["name"]);
									//echo "uploaded and stored in: userdata/user_photos/$rand_dir_name/".@$_FILES["profpic"]["name"];
									$_profile_pic_name = @$_FILES["profpic"]["name"];
									$date = date("Y-m-d");
									$description = @$_POST['description'];
									$profile_pic_query = mysqli_query($con,"INSERT INTO photos (id,uid,username,date_posted,description,image_url) VALUES ('','$uid','$username','$date','$description','$rand_dir_name/$_profile_pic_name')");
									echo "<script type='text/javascript'> window.parent.location.href='albums.php?pics=$uid'</script>" ;
								}
								
						}else
							{
								$fal= "<span style='color:brown;'>invalid file your image must not be larger than 1MB and must be either .jpeg, .gif .png</span>";
							}
						}
										}
										
										
										}
									else{
											echo "an error occured";
											
										}
									}else if(isset($_GET['pics'])){
										$picture = ($_GET['pics']);						
										//album name
										$album_name = mysqli_query($con,"SELECT * FROM albums WHERE uid='$picture'");
										$get_album_title =  mysqli_fetch_assoc($album_name);
										$title = $get_album_title['album_title'];
										//checks for number of photos in the clicked album
										$check = mysqli_query($con,"SELECT * FROM photos WHERE uid='$picture' ORDER BY id DESC");
										$count = mysqli_num_rows($check);
										echo '<a href="albums.php" style="font-size: 18px;color:#0084c6;font-weight: 500;">'.$count.' Photos in '. $title.' album</a><br/>';
											while($get =  mysqli_fetch_assoc($check)){
											$uid = $get['uid'];
											$desc = $get['description'];
											$username = $get['username'];
											$date_posted = $get['date_posted'];
											$image_url = $get['image_url'];
											$desc1 = substr($desc,0, 15);
											$desc1more = "";
											if(strlen($desc)>=15){
												$desc1more = "<a href='#' style='color:blue; background-color:#ffffff;'>...</a>";
											}
											echo "<div class='pics' style='float:left; padding:2px;width:116px;z-index:100;'><a href='userdata/user_photos/$image_url' target='_blank'><img src='userdata/user_photos/$image_url' title='$desc' width='110px' height='110px' /></a>	<br/>										
											<b>$desc1 $desc1more.</b><div style='float:right; margin-top:-110px;z-index:1000;'></div>
											</div>";
											
											}
									}
									
									
									else{
										//checks for number of photos in all albums
										$check = mysqli_query($con,"SELECT * FROM photos WHERE username='$username' ORDER BY id DESC");
										$count = mysqli_num_rows($check);
										//displays all photos that were recently uploaded
										$album_num = mysqli_query($con,"SELECT * FROM albums WHERE created_by='$user'");
										$alnum = mysqli_num_rows($album_num);
										echo"<a href='albums.php' style='font-size: 18px;color:#0084c6;font-weight: 500;padding:5px;'>$count Photos in all $alnum albums</a><br/>";
										$check = mysqli_query($con,"SELECT * FROM photos WHERE username='$user' ORDER BY id DESC ");
										
											while($get =  mysqli_fetch_assoc($check)){
											$uid = $get['uid'];
											$desc = $get['description'];
											$username = $get['username'];
											$date_posted = $get['date_posted'];
											$image_url = $get['image_url'];
											$desc1 = substr($desc,0, 15);
											$desc1more = "";
											if(strlen($desc)>=15){
												$desc1more = "<a href='#' style='color:blue; background-color:#ffffff;'>...</a>";
											}
											
											echo "<div class='pics'style='float:left; padding:3px;width:116px;'><a href='userdata/user_photos/$image_url' target='_blank'><img src='userdata/user_photos/$image_url' title='$desc' width='110px' height='110px'/></a>	<br/>										
											<b>$desc1 $desc1more.</b>
											</div>";
											}
								
										
									}
								
								?>
							
								</td></tr>
							</table>
							</div>
							<br />
						</div>
						</div>
			        	
</div>

<div class="rightfeed">
	<div class="rfixed"  >
			<div>
			<a href="albums.php" style="font-size: 18px;color:#0084c6;font-weight: 500;overflow-y: scroll;overflow-x: hidden;"">Your Junior Photo Buckets</a>
			<iframe src='album_lists.php' frameborder='0' height='590px'  style='width:100%; overflow-x: hidden;'>
							
						</iframe>
			</div>
			</div>
	
</div>
</div>

<?php
	
	}
?>
