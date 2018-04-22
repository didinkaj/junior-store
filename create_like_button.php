<?php
include("./inc/header.inc.php");
?>

<?php
session_start();
if(isset($_SESSION["user_login"])){
	$user = $_SESSION["user_login"];
}
else{
	$user="";
}

?>
<style>
	body{
		border: 1ps solid #ccc;
		background-color: rgb(204,255,173);
		width: 90%;
		margin:0 auto;
	}
	
</style>
<body>
<div class="feeds">
	 <div class="leftfeed">
	 </div>
	 <div class="centerfeed">
	 	<h2>Create your like button</h2>
<form action="create_like_button.php" method="post">
	<input type="text" name="like_button_url" value="Enter the url to share....." size="5 0" onclick="value='' " />
	<input type="submit" value="Create" name="create" />
</form>

<?php
	if(isset($_POST['like_button_url'])){
		$like_button_url = strip_tags($_POST['like_button_url']);
		$like_button_url12 = strstr($like_button_url, 'http://');
		
	
		echo$like_button_url;
		$username=$user;
		$date = date("Y-m-d");
		$uid = rand(449853,9999999999999999999999999999999999999999999999999999999999999999999999);
		$uid = md5($uid); 
		echo $uid;
		
			if($like_button_url12){
			$create_buttons = mysql_query("INSERT INTO like_buttons VALUES('','$username','$like_button_url12','$date','$uid')");
				echo "
				<div style='width:400px;heigth:250px;border:1px solid grey;'>
				&lt;iframe href=http://localhost/jss/like_button_frame.php?$uid=&gt;
				&lt;/iframe&gt;
				</div>
				";
		}else{
			$like_button_url = "http://".$like_button_url;
			$create_buttons = mysql_query("INSERT INTO like_buttons VALUES('','$username','$like_button_url','$date','$uid')");
			
		}
	}
?>
</div>
</div>

</body>