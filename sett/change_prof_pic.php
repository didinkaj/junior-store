<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
//mysql_select_db("junior", $con) or die("error connecting to database");
?>

<?php

	if(isset($_GET['u'])){
	$username = mysql_real_escape_string($_GET['u']);
	if($username){
		//checks if the user exist restricts access to profile page unless you are logged in
		$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE (username='$username') || (email ='$username')");
		if(mysqli_num_rows($check)==1){ 
			$get = mysqli_fetch_assoc($check);
			$username = $get['username'];
			$fname = $get['fname'];
			$lname = $get['lname'];	
		}
	else{
			echo "error occured";
			exit();
		}
	}
}
	
	
//checks wether the user has uploaded a profile picture
	$check_pic = mysqli_query($con,"SELECT profile_pic FROM users WHERE username='$user'");
	$get_row_pic = mysqli_fetch_assoc($check_pic);
	$profile_pic_db = $get_row_pic['profile_pic'];
	if($profile_pic_db==""){
		$profile_pic ="img/profpic.jpg";
	}else{
		$profile_pic = "userdata/profile_pics/".$profile_pic_db;
	}
	
	//upload script
	$err="";
if(isset($_FILES['profpic'])){
	if(((@$_FILES['profpic']["type"]=="image/jpeg" )|| (@$_FILES['profpic']["type"]=="image/png") || (@$_FILES['profpic']["type"]=="image/gif")) && (@$_FILES['profpic']["size"]<1048576)){
		
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ0123456789";
			$rand_dir_name = substr(str_shuffle($chars),0,15);
			mkdir("userdata/profile_pics/$rand_dir_name");
			if(file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profpic"]["name"])){
				echo @$_FILES["profpic"]["name"]."Already exist";
			}else{
				move_uploaded_file(@$_FILES["profpic"]["tmp_name"], "userdata/profile_pics/$rand_dir_name/".$_FILES["profpic"]["name"]);
				//echo "uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profpic"]["name"];
				$_profile_pic_name = @$_FILES["profpic"]["name"];
				$profile_pic_query = mysqli_query($con,"UPDATE users SET profile_pic='userdata/profile_pics/$rand_dir_name/$_profile_pic_name' WHERE username='$user'");
				//header("location:change_prof_pic.php");
				echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;
			}
			
	}else
		{
			$err= "invalid file your image must not be larger than 1MB and must be either .jpeg, .gif .png";
		}
	
	
}
?>

<div class="outupdate" style="width: 95%;margin:0px auto;  ">
<div class="updatepic">
	<!-- profile picture upload and changing-->
	
	<form action="home.php?pic=<?php echo$user?>"  method="post" enctype="multipart/form-data">
		<span style="font-size: 18px;color:#0084c6;font-weight: 500;margin: 5px;"> Upload new Profile Picture</span>
		<table width="100%">
			<tr>
			<td><input type="file" name="profpic" placeholder="Browse from your device" style="background-color: #fff; width: 100%;height: 30px;" /> </td>
			<td valign="top"><input type="submit" name="uploadpic" value="Upload Picture" /> </td>
			</tr>
			<tr>
				<td></td><td></td>
			</tr>
		
	<tr><td colspan="2">
		
	<?php
	//checks for number of photos in all albums
	$check = mysqli_query($con,"SELECT * FROM photos WHERE username='$username' ORDER BY id DESC");
	$count = mysqli_num_rows($check);
	//displays all photos that were recently uploaded
	echo" <a href='#' style='font-size: 18px;color:#0084c6;font-weight: 500;padding:5px;'>Select one Picture to be your profile picture- $count Photos in all albums </a><br/>";
	$check = mysqli_query($con,"SELECT * FROM photos WHERE username='$user' ORDER BY id DESC ");
		while($get = mysqli_fetch_assoc($check)){
		$uid = $get['uid'];
		$desc = $get['description'];
		$username = $get['username'];
		$date_posted = $get['date_posted'];
		$image_url = $get['image_url'];
		$id = $get['id'];
		$desc1 = substr($desc,0, 10);
		$desc1more = "";
		if(strlen($desc)>=10){
			$desc1more = "<a href='#' style='color:blue; background-color:#ffffff;'>...</a>";
		}
		echo "";
		echo "<div class='pics'style='float:left; padding:3px;width:116px;margin-left:8px;'>
		<form action='home.php?pic=$user' method='post'><button style='border:1px;cursor:hand;' name='profps'.$id>
		<img src='userdata/user_photos/$image_url' title='Click to Make profile picture' width='110px' height='110px'/>	<br/>			
		</button> <input type='hidden' value='$id' name='picno_$id' />
		<b><input type='submit' value='&radic;'.$id.'' name='$id' style='padding:0px;' title='click to make profile picture'/>$desc1 $desc1more</b>	
		</form>
		</div>";
		
		$picid = @$_POST[$id];
		if(isset($picid)){
			
			//echo"userdata/user_photos/"."$image_url";
			$img="userdata/user_photos/"."$image_url";
			$profile_pic_query = mysqli_query($con,"UPDATE users SET profile_pic='$img' WHERE username='$user'");
			echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;
		}
											
		
		
	}
	?>
	</td></tr>
	</table>
	</form>

	</div>
</div>

	
	
	
	
	<?php	
	//
	
	
	?>