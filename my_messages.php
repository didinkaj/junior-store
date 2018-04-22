<head>
	<meta http-equiv="refresh" content="300">
</head>
<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>

<?php
session_start();
if(!isset($_SESSION["user_login"])){
	header("Location:index.php");
}
else{
	$user = $_SESSION["user_login"];
	 	// grab unmessages from logged in user
	 	$grab_messages = mysqli_query($con,"SELECT * FROM pvt_messages WHERE user_to='$user' && opened='no' && deleted='no' GROUP BY user ORDER BY id DESC");
		$numrow = mysqli_num_rows($grab_messages);
	 	if($numrow != 0){
		while($get_messages = mysqli_fetch_assoc($grab_messages)){
			$id = $get_messages['id'];
			$user_from= $get_messages['user'];
			$user_to  = $get_messages['user_to'];
			$msg_body  = $get_messages['msg_body'];
			$date = $get_messages['date'];
			$opened = $get_messages['opened'];
			$deleted = $get_messages['deleted'];
			?>
			<script type="text/javascript">
	function toggle<?php echo$id;?>(){
		var ele = document.getElementById("toggleText<?php echo$id;?>");
		var text = document.getElementById("displayText<?php echo$id;?>");
		if(ele.style.display == "block"){
			ele.style.display = "none";
			
		}else{
			ele.style.display = "block";
		}
	}
</script>
		<?php	
			if(strlen($msg_body)>150){
			 $msg_body = substr($msg_body, 0, 150 )."...";
			}else{
				$msg_body = $msg_body;
				if(isset($_POST['setopened_'.$id.''])){
					//update the messsage set to read
					$setopen_query = mysqli_query($con,"UPDATE pvt_messages SET opened='yes' WHERE id = '$id'||user='$user_from'");
					//refreshes a page					
				echo "<script type='text/javascript'> window.parent.location.href='home.php?umsg=$user_from'</script>" ;
				}
			}
			
			//checks wether the user has uploaded a profile picture
			$check_pic = mysqli_query($con,"SELECT * FROM users WHERE username='$user_from'");
			$get_row_pic = mysqli_fetch_assoc($check_pic);
			$profile_pic_db = $get_row_pic['profile_pic'];
			$fname = $get_row_pic['fname'];
			$lname = $get_row_pic['lname'];
			if($profile_pic_db==""){
				$profile_pic ="img/profpic.jpg";
			}else{
				$profile_pic = $profile_pic_db;
			}
			
			
			echo" " ."<p />
			<form method='post' action='my_messages.php' name='$msg_body'> 
			<a href='$user_from' target='_top' > <img src='$profile_pic' width='50px' height='45px' style='float:left;padding-right:5px;''/> $fname $lname</a>
			<font size='2px'>$date</font><br/>
			<input type='button' name='openmsg' value='Sent you a new message.........' onClick = 'javascript:toggle$id()' 
			style='padding:3px 0px 3px 0px;margin:3px 0px 3px 0px;background-color:inherit;border:0px;'/>
			<table width='100%'>
			<tr>
			<td width='20%'></td>
			<td width='55%'><input type='submit' name = 'setopened_$id' value = 'Read'/></td>
			<td width ='25%'></td>
			</tr>
			</table>
			</form>
			<div id='toggleText$id' style='display:none'>
			$msg_body;
			</div>
			<hr style='color:#ccff9b;'/>
		";
		
		}
				}
else{
	echo "";
}
	 	?>
	 	
	 	
	 	<?php
	 	// grab messages from logged in user read messages
	 	$grab_messages = mysqli_query($con,"SELECT * FROM pvt_messages WHERE (user_to='$user' && opened='yes' && deleted='no') GROUP BY user  ORDER BY id DESC");
	 	$numrow_read = mysqli_num_rows($grab_messages);
	 	if($numrow_read != 0){
		while($get_messages = mysqli_fetch_assoc($grab_messages)){
			$id = $get_messages['id'];
			$user_from= $get_messages['user'];
			$user_to  = $get_messages['user_to'];
			$msg_body  = $get_messages['msg_body'];
			$date = $get_messages['date'];
			$opened = $get_messages['opened'];
			$deleted = $get_messages['deleted'];
			
			?>
		<script type="text/javascript">
			function toggler<?php echo$id;?>(){
				var ele = document.getElementById("toggleText<?php echo$id;?>");
				var text = document.getElementById("displayText<?php echo$id;?>");
				if(ele.style.display == "block"){
					ele.style.display = "none";
					
				}else{
					ele.style.display = "block";
				}
			}
		</script>
			<?php
			
			if(strlen($msg_body)>150){
			 $msg_body = substr($msg_body, 0, 150 )."...";
			}else{
				$msg_body = $msg_body;
				//delete function of the messages
				if(isset($_POST['delete_'.$id.''])){
					$delete_msg_query = mysqli_query($con,"UPDATE pvt_messages SET deleted = 'yes' WHERE id = '$id'");
					echo "<meta http-equiv=\"refresh\" content=\"0; url=my_messages.php?u=$user_from\">";
				}
				
				
			}
			if(@$_POST['reply_'.$id.'']){
				echo "<script type='text/javascript'> window.parent.location.href='home.php?umsg=$user_from'</script>" ;
			}
			
			//checks wether the user has uploaded a profile picture
			$check_pic = mysqli_query($con,"SELECT * FROM users WHERE username='$user_from'");
			$get_row_pic = mysqli_fetch_assoc($check_pic);
			$profile_pic_db = $get_row_pic['profile_pic'];
			$fname = $get_row_pic['fname'];
			$lname = $get_row_pic['lname'];
			if($profile_pic_db==""){
				$profile_pic ="img/profpic.jpg";
			}else{
				$profile_pic = $profile_pic_db;
			}
			
			echo"
			<form method='post' action='my_messages.php' name='$msg_body'> 
			<a href='home.php?umsg=$user_from' target='_top'><img src='$profile_pic' width='50px' height ='45px' style='float:left;padding-right:5px;'/> 
			$fname $lname </a>
			<font size='2px'>$date</font><br/>
			<div id='toggleText$id' style='display; '>
			$msg_body;
			</div>
			<table width='100%'>
			<tr>
			<td width='70%'></td>
			<td width='25%'><input type='submit' name = 'reply_$id' value = 'Reply'/></td>
			<td width='5%'><input type='submit' name = 'delete_$id' value = 'X' title='Delete this message'/></td>
			</tr>
			</table>
			</form>
			
			
			<hr style='color:#ccff9b; '/>";
		}
		}
else{
	echo "you have no unmessages";
}
	 	?>
	 
<?php
	
	}
?>