<br />
			<center><p class="msg">Paste your code below.</p></center>
			<br />
			<form method="POST" action="">
				<input  type="text" name="code" required class="emailTxt" placeholder=" Paste the code here..."/>
				<input  type="hidden" name="id" required class="emailTxt" value="<?php echo $_SESSION['IDcode']; ?>"/>
				<br /><br />
				<input  type="submit" name="submit" class="submit" value=" Continue ">
			</form>