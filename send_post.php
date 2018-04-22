<?php
include("./inc/connect.inc.php"); 
session_start();
if(!isset($_SESSION["user_login"])){
	$user="";
}
else{
	$user = $_SESSION["user_login"];
	}

//profile posts send to database
$post = $_POST['post'];
if($post!= ""){
	$date_added = date("Y-m-d");
	$added_by = "$user";
	$user_posted_to ="$username";
	
	$sqlcommand = "INSERT INTO posts VALUES('', '$post','$date_added','$added_by','$user_posted_to')";
	$query = mysql_query($sqlcommand)or die(mysql_error());
}
else{
	echo "You must enter something in the field before you send";
}
?>
