<br/><center><hr width="80%" color="#1ca3e3"/></center><br />

<div id="resultReg">
<center>
	<sub id="fnameRes"></sub>
	<sub id="mnameRes"></sub>
	<sub id="lnameRes"></sub>
	<sub id="addRes"></sub>
	<sub id="ageRes"></sub>
	<sub id="emailRes"></sub>
	<sub id="passRes"></sub>
	<sub id="mobRes"></sub>
	<sub id="phoRes"></sub>
	<sub id="repRes"></sub>
	<sub id="genRes"></sub>
</center>
</div>
<br />
<center><hr width="80%" color="#1ca3e3"/></center><br />

<form autocomplete="on" method="POST" action="">
<div class="line">
	<label>Name : </label>
	<input type="text" name="fname" class="textboxreg" placeholder="First Name" id="fname" required="required" onkeydown="firstname(this)" onkeyup="firstname(this)"/>
	<input type="text" name="mname" class="textboxreg" id="mname" placeholder="Middle Name (Optional)" onkeydown="middlename(this)" onkeyup="middlename(this)"/>
	<input type="text" name="lname" class="textboxreg" placeholder="Last Name" id="lname" required="required" onkeydown="lastname(this)" onkeyup="lastname(this)"/>
</div>

<div class="line">
	<label for="address">Address:</label>
	<input type="text" name="address" class="textboxAdd" id="address" placeholder="Street Town, Province" onkeydown="addr(this)" onkeyup="addr(this)"  required="required" />
	
	<label for="ageYrs">Age:</label>
	<input type="text" name="ageYrs" class="textboxAge" maxlength="2" id="ageYrs" onkeydown="age(this)" onkeyup="age(this)"  required="required" />
	
	<label for="gender">Gender:</label>
	<select name="gender" onkeydown="genderVal(this)" id="gender" onkeyup="genderVal(this)">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
	</select>
</div>

<div class="line">
	<label for="address">Email Address : </label>
	<input type="email" name="email" class="textboxEmail" id="email" placeholder="Required" onkeydown="emailVal()" onkeyup="emailVal()"  required="required" />
	
	<label for="address">&nbsp;Contact Number : </label>
	<input type="text" name="contact" class="textboxCont"  maxlength="11" id="mobile" onkeydown="mob(this)" onkeyup="mob(this)" />
</div>

<div class="line">
	<label>Password : </label>
	<input type="password" name="pass" class="textboxreg" id="pass" onkeydown="password(this)" onkeyup="password(this)" required="required" />
	
	<label>&nbsp;&nbsp;Repeat Password : </label>
	<input type="password" class="textboxreg" name="rpass" id="rpass" onkeydown="repeat(this)" onkeyup="repeat(this)" required="required" />
</div>

<div class="line">
	<sub style="font-size: 5px;">&nbsp;</sub><hr><br />
	<center>
		<input type="submit" name="register" value=" " id="regBtn" disabled="true" />
	</center>
</div>
</form>
<script src="js/valReg.js"></script>