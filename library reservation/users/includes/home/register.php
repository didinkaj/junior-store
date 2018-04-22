<div id="register">
<center><h1 class="title">Registration Form</h1></center><br />
<center><hr width="80%" color="#1ca3e3"/></center><br />
<table>
<form autocomplete="on" method="POST" action="">
<tr>
	<td>
		<label for="fname" class="label">First Name:</label> 
	</td>
	<td>
		<label for="mname" class="label">Middle Name:</label> 
	</td>
	<td>
		<label for="lname" class="label">Last Name:</label> 
	</td>
</tr>
<tr>
	<td>
		<input type="text" name="fname" class="textbox" id="fname" required="required" />&nbsp;
	</td>
	<td>
		<input type="text" name="mname" class="textbox" id="mname" placeholder="Optional" />&nbsp;
	</td>
	<td>
		<input type="text" name="lname" class="textbox" id="lname" required="required" />&nbsp;
	</td>
</tr>
<tr><td colspan="3"><hr /></td></tr>
<tr><td colspan="3">
<center>
			<label for="email" class="label">Email Address:</label>&nbsp;
			<input type="email" name="email" class="textbox" id="email" required="required" />&nbsp;&nbsp;&nbsp;
			<label for="pass" class="label">Password:</label>&nbsp;
			<input type="password" name="pass" class="textbox" id="pass" required="required" />
</center>
</td></tr>
<tr><td colspan="3"><hr /></td></tr>
<tr><td colspan="3">
<center>
			<label for="Bdate" class="label">Birthdate:</label>&nbsp;
			<input type="date" name="Bdate" class="textbox" id="Bdate" required="required" />&nbsp;&nbsp;&nbsp;
			<label for="gender" class="label">Gender:</label>&nbsp;
			<select name="gender" id="gender">
				<option value="male">Male</option>	
				<option value="female">Female</option>	
			</select>&nbsp;&nbsp;&nbsp;			
</center>
</td></tr>
<tr><td colspan="3"><hr /></td></tr>

<tr><td colspan="3">
<center>
			<label for="address" class="label">Address:</label>&nbsp;
			<input type="text" name="address" class="textbox" id="address" required="required" />&nbsp;&nbsp;&nbsp;
			<label for="zip" class="label">Zip Code:</label>&nbsp;
			<input type="text" name="zip" class="textbox1" maxlength="4" id="zip" required="required" />&nbsp;&nbsp;&nbsp;
</center>
</td></tr>
<tr><td colspan="3"><hr /></td></tr>
<tr><td colspan="3"><br />
				<center>
					<input type="submit" id="regBtn" name="reg" value=" " />
				</center>
</td></tr>
</form>
</table>
</div>

<div id="resultReg">
	<sub id="fname"></sub>
	<sub id="mname"></sub>
	<sub id="lname"></sub>
</div>