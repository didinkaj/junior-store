<?php include("./inc/connect.inc.php"); ?>
<?php
session_start();
if(!isset($_SESSION["user_login"])){
	$user="";
}
else{
	$user = $_SESSION["user_login"];
	$check = mysqli_query($con,"SELECT username, fname, lname FROM users WHERE (username='$user') ");
		if(mysqli_num_rows($check)==1){ 
			$get =mysqli_fetch_array($check);
			$username = $get['username'];
			$fname = $get['fname'];
			$lname = $get['lname'];	}
		// selects the number of unread messages
		$get_unreadmsg = mysqli_query($con,"SELECT opened FROM pvt_messages WHERE (user_to='$user' && opened ='no' && deleted='no')");
		$get_unread =mysqli_fetch_array($get_unreadmsg);
		$unread_numrows1 = mysqli_num_rows($get_unreadmsg);
		$unread_numrows = "(".$unread_numrows1.")";
		//counts the number of friend requests
		$get_friendrequests = mysqli_query($con,"SELECT user_to FROM friends_request WHERE user_to = '$user' ");
		$pending_requests =mysqli_fetch_array($get_friendrequests);
		$requests_numrows1 = mysqli_num_rows($get_friendrequests);
		$requests_numrows = "(".$requests_numrows1.")";
		//counts the number of pings
		$get_poke = mysqli_query($con,"SELECT user_to FROM poke WHERE user_to = '$user' ");
		$pending_poke =mysqli_fetch_array($get_poke);
		$poke_numrows1 = mysqli_num_rows($get_poke);
		$poke_numrows = "(".$poke_numrows1.")";
		//total notifications
		$total_control_panel_notification = $poke_numrows1 + $requests_numrows1 + $unread_numrows1;
		$total_control_panel_notification = "[".$total_control_panel_notification."]"; 
		//album numbers
		$my_alums = mysqli_query($con,"SELECT * FROM albums WHERE created_by='$user'");
		$album_no = mysqli_num_rows($my_alums);
		$album_no = "[".$album_no."]";
		//function to filter inputs and special characters.
				function test_input($str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
				$str = stripslashes($str);
				}
				return $str;
				}
				$pattern = "/^[a-zA-Z  '.]*$/";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<meta http-equiv="refresh" content="300">
		<title>JUNIOR STORE</title>
		<meta name="description" content="junior store management system a online archive/directory for childhood memories">
		<meta name="author" content="johnson Didinya">
		<meta name="viewport" content="width=device-width, initial-scale=0">
		<link rel="stylesheet" type="text/css" href="./css/style.css"/>
		<link rel="stylesheet" type="text/css" href="./css/home.css"/>
		<link rel="stylesheet" type="text/css" href="./css/profile.css"/>
		<script type="text/javascript" src="./js/main.js">	</script>
	</head>
	<body>
		
		<table class="headertable">
			<tr>
				<td>
			<div class="header">
			<div id="headerwrapper">
				<table class="menutable" >
					<tr>
						<td >
				<div class="banner"	>
					<img src="./img/logo1.jpg" height="56px" width="" style="border: none;"/>
					<img src="./img/logo.jpg" height="56px" width="200px" style="border: none;"/>
				</div>
							
            <div id="menu">
            	
         
            	<?php
            	$active=$active2=$active3=$active4=$active5=$active6=$active7=$active8="";
            	$currentPage = basename($_SERVER['SCRIPT_NAME']); 
            	if($user){
            		
					if($currentPage == 'home.php') {
						$active="active";
					}else
					
					if($currentPage == "profile.php") {
						$active2="active";
					}else
					
					if($currentPage == "memorabilia.php") {
						$active3="active";
					}
					else
					
					if($currentPage == "albums.php") {
						$active4="active";
					}
					
					
					
					
         	echo"
					<ul>
						<li	><a href='home.php' id='$active'>Home Panel $total_control_panel_notification</a></li>
						<li ><a href=$user id='$active2'> Share</a></li>
						<li ><a href='memorabilia.php' id='$active3'>Memorabilias</a></li>
						<li ><a href='albums.php' id='$active4'>Albums$album_no</a></li>
						<li ><a href='logout.php'>Logout [$fname]</a></li>
					</ul>";
					}else{
						
						if($currentPage == "index.php") {
						$active5="active";
					}
						else
					
					if($currentPage == "forgotpass.php") {
						$active6="active";
					}
					else
					
					if($currentPage == "about.php") {
						$active7="active";
					}
					else
					
					if($currentPage == "contact.php") {
						$active8="active";
					}
					
						
						echo'
					<ul>
						<li ><a href="index.php" id="'.$active5.'">Account</a></li>
						<li ><a href="about.php" id='.$active7.'>About</a></li>
						<li ><a href="contact.php" id='.$active8.'>Contact</a></li>
						<li ><a href="forgotpass.php" id='.$active6.'>Help</a></li>
						
					</ul>';
					}
					?>
				</div>
				
	
				
						</td>	
					</tr>
				</table>
				</div>
			</div>
			</td>
		</tr>
		</table>
		
		<?php
	//checks wether the user has uploaded a profile picture
	$check_pic = mysqli_query($con,"SELECT * FROM users WHERE username='$user'");
	$get_row_pic =mysqli_fetch_array($check_pic);
	$profile_pic_db = $get_row_pic['profile_pic'];
	$fnamep = $get_row_pic['fname'];
	$lnamep = $get_row_pic['lname'];
	if($profile_pic_db==""){
		$profile_pic ="img/profpic.jpg";
	}else{
		$profile_pic = $profile_pic_db;
	}
	?>
		