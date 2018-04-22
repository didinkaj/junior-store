<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>
<style>
	a{
		text-decoration:none;
	}
</style>
<?php
session_start();
if(!isset($_SESSION["user_login"])){
	echo"error";
}
else{
	$user = $_SESSION["user_login"];
	if(isset($_GET['uname'])){
	$username = ($_GET['uname']);
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
	
?>
<?php



//post event form
if($user==$username){
	
//retriving photos from database
$get_photos = mysqli_query($con,"SELECT * FROM photos WHERE username='$username' ORDER BY id DESC");
$count = mysqli_num_rows($get_photos);
if($count>0){
while($fetch_photo = mysqli_fetch_assoc($get_photos)){
	$image_url = $fetch_photo['image_url'];
	$description = $fetch_photo['description'];
	$image = "userdata/user_photos/".$image_url;
	echo "
	<div style='float:left; padding:1px;margin:2px 1px 0px 0px;'>
		<a href='$image' target='_blank'><img src='$image'  alt='$description' title='$description' width='118px' height='118px' style='border:2px solid #ccc;'/></a>		
	</div>
	";
	
}
}else{
	echo "Not uploaded any photos yet";
}

}else{
	
//retriving photos from database
$get_photos = mysqli_query($con,"SELECT * FROM photos WHERE username='$username' ORDER BY id DESC");
$count = mysqli_num_rows($get_photos);
if($count>0){
while($fetch_photo = mysqli_fetch_assoc($get_photos)){
	$image_url = $fetch_photo['image_url'];
	$description = $fetch_photo['description'];
	$image = "userdata/user_photos/".$image_url;
	echo "
	<div style='float:left; padding:1px;margin:2px 1px 0px 0px;'>
		<img src='$image'  alt='$description' title='$description' width='118px' height='118px' style='border:2px solid #ccc;'/>		
	</div>
	";
	
}
}else{
	echo "Not uploaded any photos yet";
}

}


?>
<?php
}
?>