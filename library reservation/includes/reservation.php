<div id="reservation">
<br /><br />
<center><h3>You must <b>Sign In</b> to Make Reservation</h3></center>
<center>
	<form method="POST" action="">
		<?php include "functions/loginRes.php" ?>
			<table>
				<tr>
					<td><label for="email">Email Address : &nbsp;</label></td>
					<td><input autofocus class="textboxlogin" autocomplete type="text" name="email" id="email" /></td>
				</tr>
				<tr>
					<td><label for="pass">Password : </label></td>
					<td><input class="textboxlogin" type="password" name="pass" id="pass" /></td>
				</tr>
				<tr>
					<td colspan="2">
					<br />
						<center><hr /></center>
					<br />
					<center>
					<input type="submit" name="login" id="signin" class="submitlogin" value="Sign In" />
					<input type="reset" name="reset" id="reset" class="submitlogin" value="Clear" />
					</center>
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
					<br />
						<center><hr /></center>
					<br />
					<center>
					<a href="recovery.php"><div class="link">Forgot Password?</div></a>
					<a href="registration.php"><div class="link">Register New User</div></a>
					</center>
					</td>
				</tr>
			</table>
		</form>
</center>
</div>