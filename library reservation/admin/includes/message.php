<div id="cpass"><br/>
		<?php
		$msg = "";
			if(isset($_POST['submit'])){
				$to = trim($_POST['to']);
				$subject = "St. Julian Parish Church | Janiuay, Iloilo";
				$message = trim($_POST['messageTXT']);
				$from = "Administrator";
				$header = "Message From : Administrator (".$from.")";
				date_default_timezone_set("Asia/Manila");
				$date = date("M. d, Y - h:i A");
				$msg = $message;
				
				if($to == NULL){
					echo "<center><img src='img/wrong.png'> <label class='lblMsg'>Select Recipient.</label></center><br>";
				}else{
				if($message == NULL){
					echo "<center><img src='img/wrong.png'> <label class='lblMsg'>Please enter your message.</label></center><br>";
				}else{
					
					$query = "INSERT INTO msg (recipient, sender, name, message, subject, status, date, define) VALUES ('$to', '$from', '$from', '$message', '$header', 'unread', '$date', '$from')";
					mysql_query($query);
					
					$query2 = "INSERT INTO msg (recipient, sender, name, message, subject, status, date, define) VALUES ('$to', '$from', '$from', '$message', '$header', 'unread', '$date', '$to')";
					mysql_query($query2);
					$_SESSION['to'] = $to;
					echo "<script>Alert.render('Message Sent')</script>";
				    echo "
					<script>
						setInterval(
							function(){	window.location='message.php' },3000
						);
					</script>";
							}
			}
		}
		?>
		<br />
			<form method="POST" action="message.php">
			<table class="cpass">
				<!-- <tr>
					<td colspan="2">
						<center><hr><br></center>
					</td>
				</tr> -->
				
				
	<center><label class="label">Send To : &nbsp;</label>
	
	<select name="to" class="select">
		<option value="" selected class="optUni">Select Recipient</option>
		<?php
		$queryUsers = mysql_query("SELECT * FROM users WHERE email != ' Administrator'");
		while($getUsers = mysql_fetch_array($queryUsers)){
			$profile = $getUsers['profile'];
			$email = $getUsers['email'];
			$fname = $getUsers['fname'];
			$mname = $getUsers['mname'];
			$lname = $getUsers['lname'];								
		?>
		<?php $name = $fname." ".$mname." ".$lname; ?>
		<option class="opt" value="<?php echo $email ?>"><?php echo $name ?></option>
		<?php } ?>
	</select>
	</center>
	
				<tr>
					<td colspan="2">
						<center><br /><br />
							<label class="label">Your Message Below : &nbsp;</label>
						</center>
					</td>
				</tr>
				<tr>
					<td colspan="2">
					<center>
						<textarea autofocus required class="textarea" name="messageTXT" placeholder="Wite message here..."><?php echo $msg; ?></textarea>
					</center>
					</td>
				</tr>	
				<tr>
					<td colspan="2">
					<center>
					<br /><hr><br>
						<input  type="submit" name="submit" value=" Send " class="submit"/>
					</center>
					</td>
				</tr>	
			</table>
			</form>
		</div>