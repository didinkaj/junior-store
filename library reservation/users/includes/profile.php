<br/><br/>
<center>
<h2 class="title"><?php echo $fname." ".$mname." ".$lname; ?></h2>
</center>
<div id="profile">
<br/>
<form method="POST" action="">
	<div id="pic">	
		<img src="profile/<?php echo $profile; ?>" width="150" height="150">
	</div>
	<div id="line1">
		<p style="font-size: 5px;">&nbsp;</p>
		First Name : <b><?php echo $fname; ?></b>
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>	
		
		<p style="font-size: 5px;">&nbsp;</p>
		Middle Name :<b><?php echo $mname; ?></b>
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
		<p style="font-size: 5px;">&nbsp;</p>
		Last Name : <b><?php echo $lname; ?></b>
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
		<p style="font-size: 5px;">&nbsp;</p>
		E-mail Address : <b><?php echo $email; ?></b>
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
		<p style="font-size: 5px;">&nbsp;</p>
		Contact Number : <b><?php echo $contact; ?></b>
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
	</div>
	
	<br /><p style="font-size: 5px;">&nbsp;</p>
	<center><hr width="90%" color="#236ddc"/></center>
	<br /><p style="font-size: 5px;">&nbsp;</p>
	
	<div id="line2">
		<p style="font-size: 5px;">&nbsp;</p>
		Age : <b><?php echo $age; ?></b>
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>	
		
		<p style="font-size: 5px;">&nbsp;</p>
		Address :<b><?php echo $address; ?></b>
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
		<p style="font-size: 5px;">&nbsp;</p>
		Gender : <b><?php echo $gender; ?></b>
		<br/><p style="font-size: 5px;">&nbsp;</p><hr>
		
	</div>
		<br /><p style="font-size: 5px;">&nbsp;</p>
	<br />
	<center>
	<a href="editProf.php?target=<?php echo $id ?>" class="probtn"> &nbsp;Edit Info&nbsp; </a>
	</center>
</form>
<br />
</div>
