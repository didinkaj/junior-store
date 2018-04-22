<?php 
$con = mysql_connect("localhost","root","") or die("error connecting to server");
mysql_select_db("junior", $con) or die("error connecting to database");
?>

<?php
session_start();
if(!isset($_SESSION["user_login"])){
	echo"error";
}
else{
	$user = $_SESSION["user_login"];
	if(isset($_GET['u'])){
	$username = mysql_real_escape_string($_GET['u']);
	if($username){
		//checks if the user exist restricts access to profile page unless you are logged in
		$check = mysql_query("SELECT username, fname, lname FROM users WHERE (username='$username') || (email ='$username')");
		if(mysql_num_rows($check)==1){ 
			$get = mysql_fetch_assoc($check);
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
	$check_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$user'");
	$get_row_pic = mysql_fetch_assoc($check_pic);
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
				$profile_pic_query = mysql_query("UPDATE users SET profile_pic='$rand_dir_name/$_profile_pic_name' WHERE username='$user'");
				//header("location:change_prof_pic.php");
				echo "<script type='text/javascript'> window.parent.location.href='home.php'</script>" ;
			}
			
	}else
		{
			$err= "invalid file your image must not be larger than 1MB and must be either .jpeg, .gif .png";
		}
	
	
}
?>
	<!-- profile picture upload and changing-->
	<span style="color:#0084c6;">Change Profile Picture</span>
<div class="photoprof">	
	<?php echo$err?>
	<table width="100%">
		<tr>
			<td></td>
			<td><img src="<?php echo$profile_pic; ?>" width="80px" height="75px"/></td>
			</td>
		</tr>
	</table>
</div>
	<form action="change_prof_pic.php"  method="post" enctype="multipart/form-data">
		<table>
			<tr>
			<td><input type="file" name="profpic" style="background-color: #fff; width: 100%;" /></td>
			</tr><tr><td><input type="submit" name="uploadpic" value="Upload Picture" /> </td>
			</tr>
		</table>
	</form>

	</div>
<div class="centerfeed">
	
	
	
	
	<?php	
	}
	?>