<?php include("inc/header.inc.php");?>
<div class="feeds">
		
<div class="leftfeed">
</div>
<div class="centerfeed">
<h1 style='font-size:20px;'></h1>

	<div class="outupdate">
<div class="update">
<form action="contact.php" method="POST" ><br />
		<span style="font-size: 18px;color:#0084c6;font-weight: 500;margin: 5px;">Contact Junior Store Admin</span><hr style="color: #f0f0f0;margin-top: 3px;" />
		<p>Phone Number: 0712328250	</p>
		<p>Email Address: didinkajohnson@yahoo.com</p>
		<table width="95%" style="margin: 0px auto;" cellspacing="15px">
			
			<tr>
					<td>First Name:<br />
						<input type="text" name="fname" id="fname" value="" required="required"/></td>
			</tr>
			<tr>
					<td>Second Name:<br />
						<input type="text" name="lname" id="sname" value="" /></td>
			</tr>
			<tr>
					<td>Email Address:<br />
						<input type="email" name="email" id="uname "   value="" /></td>
			</tr>		
			<tr>
			<td colspan="2" bgcolor="#ffffff">Your message:<br /><textarea name="msg" required="required" id="aboutyou " rows="3"  style="background-color: #ffffff;width: 100%;" /></textarea></td> 
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="send" id="updateinfo" value="Send Message"/></td>
			</tr>
		</table>
</form>
<?php
$send = @$_POST['send'];
if($send){
	$msg = $_POST['msg'];
	if($msg!=""){
	echo "Thank you very much Your message has been received";
	echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php\">";
	}
}
?>
</div>
</div>

</div>
<div class="rightfeed">
</div>
</div>
<?php include("inc/footer.inc.php");?>