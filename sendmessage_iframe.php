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
			echo "an error occured try again";
		}
		$msg_body = strip_tags(@$_POST['sendmsg']);
	//check that a user doesn't send himself a message
			if($username != $user){
				//send code
				if(isset($_POST['sendsms'])){
					$msg_body = strip_tags(@$_POST['sendmsg']);
					$date = date("Y-m-d");
					$opened = "no";
					$deleted = "no";
					
					if($msg_body == "enter message you wish to send"){
						echo "You have not typed anything Type a message to send ";
					}
					
						if(strlen($msg_body)<2){
							echo "message too short";
					}
					else{
					$send_msg = mysql_query("INSERT INTO pvt_messages VALUES('','$user','$username','$msg_body','$date','$opened','$deleted')");
					echo "<font color='green'>message sent succesfully</font>";
						}
			}
				//checks user names posting
						        	$check = mysql_query("SELECT * FROM users WHERE (username='$username') ");
										$get = mysql_fetch_assoc($check);
										$fnames = $get['fname'];
										$lnames = $get['lname'];
				//form to send message
				echo "
				<form action='sendmessage_iframe.php?u=$username' method='POST' >
				<b> Compose message: to <a href='$username' style='text-decoration:none;' target = '_top'>$fnames $lnames</a><b>
				<br />
				<textarea rows='7' cols='80'style='background-color:#ffffff; width:90%;' name='sendmsg' placeholder='Enter the message you wish to send' ></textarea><p /> 
				<input type='submit' value='Send Message' name='sendsms'/>
				</form>
				
				";
				
			}
			else{
				echo "you cannot send yourself a message";
				header("Location: $user");
			}
	}
}
?>
</div>
<div class="rightfeed">
	</div>
</div>
<?php
	
	}
?>