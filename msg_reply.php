<?php 
$con = mysql_connect("localhost","root","") or die("error connecting to server");
mysql_select_db("junior", $con) or die("error connecting to database");
//function to filter inputs and special characters.
				function test_input($str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
				$str = stripslashes($str);
				}
				return mysql_real_escape_string($str);
				}
	$pattern = "/^[a-zA-Z  '.]*$/";
?>

<?php
session_start();
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
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
			echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/jss/index.php\">";
			exit();
		}
	$msg_body = test_input(@$_POST['sendmsg']);
	//check that a user doesn't send himself a message
			if($username != $user){
				//send code
				if(isset($_POST['sendsms'])){
					$msg_body = test_input(@$_POST['sendmsg']);
					$date = date("Y-m-d");
					$opened = "no";
					$deleted = "no";
					
					if($msg_body == "enter message you wish to send"){
						echo "You have not typed anything Type a message to send ";
					}
					
					else
						if(strlen($msg_body)<2){
							echo "message too short";
					}
					else{
					$send_msg = mysql_query("INSERT INTO pvt_messages VALUES('','$user','$username','$msg_body','$date','$opened','$deleted')");
					echo "message sent succesfully";
						}
			}
				//checks user names posting
						        	$check = mysql_query("SELECT * FROM users WHERE (username='$username') ");
										$get = mysql_fetch_assoc($check);
										$fname = $get['fname'];
										$lname = $get['lname'];
				//form to send message
				echo "
				<form action='sendmessage_iframe.php?u=$username' method='POST' >
				Compose message: to <a href='$username' style='text-decoration:none;' target = '_top'>$fname $lname</a>
				<br /><br />
				<textarea rows='8' cols='80' style='background-color:#ffffff; width:90%;' name='sendmsg' placeholder='Enter your wish to send' ></textarea><p /> 
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