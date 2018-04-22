<div id="cpass"><br />
		<?php
			if(isset($_POST['submit'])){
				$current = $_POST['current'];
				$new = $_POST['new'];
				$repeat = $_POST['repeat'];
				$md5Curr = md5($current);
				$md5New = md5($new);
				
				$queryAdmin = mysql_query("SELECT * FROM admin");
				while($getAdmin = mysql_fetch_array($queryAdmin)){
					$name = $getAdmin[1];
					$email = $getAdmin[2];
					$pass = $getAdmin[3];
				}
				if($md5Curr == $pass){
					if($new == $current){
						echo "<center>
							<img src='img/wrong.png'>
						  <label class='lblMsg'>
							Your new password cannot be the same as your previous password.<br>
						  </label>
						  </center>";
					}else{
						if($new == $repeat){
							mysql_query("UPDATE admin SET pass = '$md5New'");
						echo "<center>
							<img src='img/right.png'>
						  <label class='lblMsg2'>
							Password Changed.<br>
						  </label>
						  </center>";
						}else{
							echo "<center>
							<img src='img/wrong.png'>
						  <label class='lblMsg'>
							New password does not matched.<br>
						  </label>
						  </center>";
						}
					}
				}else{
					echo "<center>
						<img src='img/wrong.png'>
						  <label class='lblMsg'>
							Incorrect Password.<br>
						  </label>
						  </center>";
				}
			}
		?>
		<br />
			<form method="POST" action="changePass.php">
			<table class="cpass">
				<tr>
					<td colspan="2">
						<center><hr><br></center>
					</td>
				</tr>
				
				<tr>
					<td>
						<label class="label">Current Password : </label>
					</td>
					<td>
						<input required type="password" name="current" placeholder=" Current Password" class="textbox"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="label">New Password : </label>
					</td>
					<td>
						<input required type="password" name="new" placeholder=" New Password" class="textbox"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="label">Repeat New Password : &nbsp;</label>
					</td>
					<td>
						<input required type="password" name="repeat" placeholder=" Repeat New Password" class="textbox"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
					<center>
					<br /><hr><br>
						<input  type="submit" name="submit" value=" Saved " class="submit"/>
					</center>
					</td>
				</tr>			
			</table>
			</form>
		</div>