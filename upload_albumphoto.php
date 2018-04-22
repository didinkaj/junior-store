<?php 
$con = mysql_connect("localhost","root","") or die("error connecting to server");
mysql_select_db("junior", $con) or die("error connecting to database");
?>
<?php
session_start();
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
		$user = $_SESSION["user_login"];
		?>	
	<?php
	if(isset($_POST['uploadpic'])){
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
				$date = ("Y-m-d");
				$profile_pic_query = mysql_query("INSERT INTO photos (id,uid,username,date_posted,description,image_url) VALUES ('','test','$user','$date','description','$rand_dir_name/$_profile_pic_name')");
				//header("location:upload_albumphoto.php");
				echo "string";
			}
			
	}else
		{
			echo "invalid file your image must not be larger than 1MB and must be either .jpeg, .gif .png";
		}
	}
	
	?>
	<form action=""  method="post" enctype="multipart/form-data">
		<table>
			<tr>
			<td><input type="file" name="profpic" style="background-color: #fff; width: 100%;" /></td>
			<td><input type="submit" name="uploadpic" value="Upload Picture" /> </td>
			</tr>
		</table>
	</form>
	

<?php

	}
?>