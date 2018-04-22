<?php 
include "functions/conn.php";
//properties of uploaded file
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

	if($size > 1000000 || $size < 10000) //conditions for the file
	{
		echo "<script>alert('Upload Failed! Image size is 10Kb to 1Mb.')</script>";
		echo "<script>window.open('profile-trigger.php','_self')</script>";
	}else{
	if($type == "image/gif"){
		$ext = "gif";
		$profile = $filename.".".$ext;
		mysql_query("UPDATE users SET profile = '$profile' WHERE id = '$id'");
		move_uploaded_file($tmp, "profile/".$profile);
		echo "<script>window.open('profile-trigger.php','_self')</script>";
	}
	elseif($type == "image/png"){
		$ext = "png";
		$profile = $filename.".".$ext;
		mysql_query("UPDATE users SET profile = '$profile' WHERE id = '$id'");
		move_uploaded_file($tmp, "profile/".$profile);
		echo "<script>window.open('profile-trigger.php','_self')</script>";
	}
	elseif($type == "image/jpg"){
		$ext = "jpg";
		$profile = $filename.".".$ext;
		mysql_query("UPDATE users SET profile = '$profile' WHERE id = '$id'");
		move_uploaded_file($tmp, "profile/".$profile);
		echo "<script>window.open('profile-trigger.php','_self')</script>";
	}
	elseif($type == "image/jpeg"){
		$ext = "jpg";
		$profile = $filename.".".$ext;
		mysql_query("UPDATE users SET profile = '$profile' WHERE id = '$id'");
		move_uploaded_file($tmp, "profile/".$profile);
		echo "<script>window.open('profile-trigger.php','_self')</script>";
	}
	else{
		echo "<script>alert('Upload Failed! Recommend File Type : JPG, JPEG, GIF, PNG')</script>";
		echo "<script>window.open('profile-trigger.php','_self')</script>";
	}
		}
	}
}	
echo "<script>window.open('profile-trigger.php','_self')</script>";
?>