<br />
			<center><p class="msg">Please enter your new password.</p></center>
			<br />
			<form method="POST" action="">
			<input  type="password" name="pass" required class="emailTxt" placeholder=" Enter new password here"/>
			
			<input  type="password" name="repeat" required class="emailTxt" placeholder=" Repeat password"/><br>
			<input  type="hidden" name="id" required class="emailTxt" value="<?php echo $_SESSION['IDcode']; ?>"/>
				<br /><br />
				<input  type="submit" name="submit" class="submit" value=" Continue ">
			</form>