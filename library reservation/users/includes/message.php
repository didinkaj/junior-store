<div id="message"> 
	<br /><br />
	<form method="POST" action="message.php">
	<label id="emailResult"></label>
	<br /><p style="font-size: 6px;">&nbsp;</p>
	
	<center>
	Recipient :<select name="to" class="select">
				 <?php
					$queryUsers = mysql_query("SELECT * FROM users WHERE email != '$email' ORDER BY id ASC");
					while($getUsers = mysql_fetch_array($queryUsers)){
						$emailAd = $getUsers[2];
						$name = $getUsers['fname']." ".$getUsers['mname']." ".$getUsers['lname'];
				 ?>
					<option value="<?php echo $emailAd; ?>"><?php echo $name; ?></option>
				<?php } ?>
			   </select>
	</center>
		<br /><br />
		
		<center><label for="messageTXT">Message : </label></center>
		<center>
		<textarea name="messageTXT" maxlength="500" id="messageTXT" required="required" placeholder=" Type your message here..."></textarea>
		</center>
		<br />
		<center>
		<input type="submit" title="Your message will be send to the recipient you entered." name="sendUser" id="sendBtn" value=" Send Message " class="submit">
		</center>
		<br /><p style="font-size: 6px;">&nbsp;</p>
	</form>
</div>
