<div id="cpass">
<br/>
		<?php
		$msg = "";
			if(isset($_POST['submit'])){
				$to = trim($_POST['to']);
				$subject = "St. Julian Parish Church | Janiuay, Iloilo";
				$message = trim($_POST['messageTXT']);
				$from = "Administrator";
				$header = "Message From : Administrator (".$from.")";
				date_default_timezone_set("Asia/Manila");
				$date = date("M d Y  H:i");
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
							function(){	window.location='inbox.php' },1500
						);
					</script>";
				}
			}
		}
		
			if(isset($_POST['back'])){
				echo "<script>window.location='inbox.php'</script>";
			}
		?>
		<?php
			$targetEmail = $_GET['targetEmail'];
	
			$queryEmail = mysql_query("SELECT * FROM users WHERE id = '$targetEmail'");
			while($getEmail = mysql_fetch_array($queryEmail)){
				$f = $getEmail['fname'];
				$m = $getEmail['mname'];
				$l = $getEmail['lname'];
				$senderName = $f." ".$m." ".$l;
				$email = $getEmail['email'];
			}
		?>
		<br />
			<form method="POST" action="">
			<table class="cpass">
				<!-- <tr>
					<td colspan="2">
						<center><hr><br></center>
					</td>
				</tr> -->
				
				
	<center><label class="label">Reply To : &nbsp;
			<b><?php echo $senderName ?><input type="hidden" readonly name="to" value="<?php echo $email; ?>"></b>
			</label>
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
						<textarea class="textarea" name="messageTXT" placeholder="Wite message here..."><?php echo $msg; ?></textarea>
					</center>
					</td>
				</tr>	
				<tr>
					<td colspan="2">
					<center>
					<br /><hr><br>
						<input  type="submit" name="submit" value=" Send " class="submit"/>
						<a href="inbox.php"> <button name="back" class="submit" href="inbox.php">&nbsp; Back &nbsp;</button> </a>
					</center>
					</td>
				</tr>	
			</table>
			</form>
		</div>