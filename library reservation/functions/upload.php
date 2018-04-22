<?php 
//properties of uploaded file
$name = $_FILES["changePro"]["name"];
$type = $_FILES["changePro"]["type"];
$size = $_FILES["changePro"]["size"];
$tmp =  $_FILES["changePro"]["tmp_name"];
$err =  $_FILES["changePro"]["error"];

if($err > 0)
	die("Error uploading file! Code: $err.");
else
{
	if($type == "image/png" || $size > 1000000 || $size < 10000) //conditions for the file
	{
		echo "<script>alert('Upload Failed! File size is maximum of 1Mb and minimum of 10kb.')
			window.open('profile.php','_self')</script>";
	}
	else
	{
	move_uploaded_file($tmp, "profile/".$name);
	echo "<script>alert('Upload Complete.')
			window.open('profile.php','_self')</script>";
	}
}
?>	