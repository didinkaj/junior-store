<br/><br/>
<center>
<h2 class="title"><?php echo $fname." ".$mname." ".$lname; ?></h2>
</center>
<div id="profile">
<br/>
<center>Recommended photo : 150 x 150</center>
<center>Recommended file type : JPG</center>
<form method="POST" action="" enctype="multipart/form-data">
<br />
	<div style="zoom: 150%; border:double 2px; width: 200px; margin-left: auto;margin-right: auto;">
		<center>
			<img src="profile/<?php echo $profile; ?>" width="150" height="150">
			
			<input type="file" required="required" name="myFile" class="inputFile">
		</center>
	</div>
<br />
	<input type="hidden" name="profileID" value="<?php echo $id; ?>"/>
	
	<center><input type="submit" name="changeProfile" class="probtn" value=" Upload "/></center>
</form>
<br />
</div>
<?php
if(isset($_POST['changeProfile'])){
$id = $_POST['profileID'];
$filename = md5($id);
$name = $_FILES["myFile"]["name"];
$type = $_FILES["myFile"]["type"];
$size = $_FILES["myFile"]["size"];
$tmp =  $_FILES["myFile"]["tmp_name"];
$err =  $_FILES["myFile"]["error"];

if($err > 0)
	die("Error uploading file! Code: $err.");
else
{

	if($size > 1000000 || $size < 7000) //conditions for the file
	{
		echo "<script>Alert.render('Upload Failed!<br/>Image size is 7Kb to 1Mb.')</script>";
	}else{
	if($type == "image/gif"){
		$ext = "gif";
		$profile = $filename.".".$ext;
		mysql_query("UPDATE users SET profile = '$profile' WHERE id = '$id'");
		move_uploaded_file($tmp, "profile/".$profile);
		echo "
		<script>
			setInterval(
				function(){	window.location='profile.php' },1000
			);
		</script>";
	}
	elseif($type == "image/png"){
		$ext = "png";
		$profile = $filename.".".$ext;
		mysql_query("UPDATE users SET profile = '$profile' WHERE id = '$id'");
		move_uploaded_file($tmp, "profile/".$profile);
		echo "
		<script>
			setInterval(
				function(){	window.location='profile.php' },1000
			);
		</script>";;
	}
	elseif($type == "image/jpg"){
		$ext = "jpg";
		$profile = $filename.".".$ext;
		mysql_query("UPDATE users SET profile = '$profile' WHERE id = '$id'");
		move_uploaded_file($tmp, "profile/".$profile);
		echo "
		<script>
			setInterval(
				function(){	window.location='profile.php' },1000
			);
		</script>";
	}
	elseif($type == "image/jpeg"){
		$ext = "jpg";
		$profile = $filename.".".$ext;
		mysql_query("UPDATE users SET profile = '$profile' WHERE id = '$id'");
		move_uploaded_file($tmp, "profile/".$profile);
		echo "
		<script>
			setInterval(
				function(){	window.location='profile.php' },1000
			);
		</script>";
	}
	else{
		echo "<script>Alert.render('Upload Failed!<br/>Recommend File Type : JPG, JPEG, GIF, PNG')</script>";
	}
		}
	}
}	
?>
