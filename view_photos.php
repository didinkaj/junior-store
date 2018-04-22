<?php include("./inc/connect.inc.php"); ?>
<!-- restrict access of a page to a logged in user-->
<?php
session_start();
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
?>	
<?php
if(isset($_GET['uid'])){
	$picture = mysql_real_escape_string($_GET['uid']);
	if($picture){
		echo "<div><h2> Photos in this album:</h2>";
		//checks if the user exist restricts access to profile page unless you are logged in
		$check = mysql_query("SELECT * FROM photos WHERE uid='$picture'");
			while($get = mysql_fetch_assoc($check)){
			$uid = $get['uid'];
			$desc = $get['description'];
			$username = $get['username'];
			$date_posted = $get['date_posted'];
			echo "<img src='img/album.jpg' width='130px' />
			</div> ";
			echo "<a   href='view_photos.php?uid=$uid'><b>".$desc."</b></a><br/>";
			
			}
		
		}
	else{
			echo "an error occured";
			exit();
		}
	}

?>






<?php
	
	}
?>