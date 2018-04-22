<?php session_start(); include "functions/conn.php";
if (!$_SESSION['name']){
	header("location:login.php");
}
?>

<html>
<head>
	<title>Change Email Address | UOE Main Library, Main compus, eldoret</title>
<link rel="icon" href="img/logo.png" type="image/x-png" /> 
<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/forms.css" media="all"/>
</head>
<body>
	<div id="header">	
		<?php include "includes/menu.php"; ?>		
		<?php include "includes/navi.php"; ?>		
	</div> <!--#header-->
	
	
	<div id="contents">
	<center><h1 class="title">Change Email Address</h1></center><br /><br />
		<div id="cpass">
		<?php
			if(isset($_POST['submit'])){
				$current = $_POST['current'];
				$new = $_POST['new'];
				$repeat = $_POST['repeat'];
				
				$queryAdmin = mysql_query("SELECT * FROM admin");
				while($getAdmin = mysql_fetch_array($queryAdmin)){
					$name = $getAdmin[1];
					$email = $getAdmin[2];
				}
				if($current == $email){
					if($new == $current){
						echo "<center>
							<img src='img/wrong.png'>
						  <label class='lblMsg'>
							Your new email address cannot be the same as your previous email address.<br>
						  </label>
						  </center>";
					}else{
						if($new == $repeat){
							mysql_query("UPDATE admin SET email = '$new'");
						echo "<center>
							<img src='img/right.png'>
						  <label class='lblMsg2'>
							Email Address Changed.<br>
						  </label>
						  </center>";
						}else{
							echo "<center>
							<img src='img/wrong.png'>
						  <label class='lblMsg'>
							New email address does not matched.<br>
						  </label>
						  </center>";
						}
					}
				}else{
					echo "<center>
						<img src='img/wrong.png'>
						  <label class='lblMsg'>
							Incorrect Email Address.<br>
						  </label>
						  </center>";
				}
			}
		?>
		<br />
			<form method="POST" action="changeEmail.php" autocomplete="on">
			<table class="cpass">
				<tr>
					<td colspan="2">
						<center><hr><br></center>
					</td>
				</tr>
				
				<tr>
					<td>
						<label class="label">Current Email Address : </label>
					</td>
					<td>
						<input required type="text" value="" name="current" placeholder=" Current Email Address" class="textbox2"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="label">New Email Address : </label>
					</td>
					<td>
						<input required type="text" name="new" placeholder=" New Email Address" class="textbox2"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="label">Repeat New Email Address : &nbsp;</label>
					</td>
					<td>
						<input required autocomplete="off" type="text" name="repeat" placeholder=" Repeat New Email Address" class="textbox2"/>
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
	</div><!--#contents-->
	
	<div id="footer">
	<hr>
		<?php include "includes/footer.php"; ?>
	</div> <!--#footer-->
</body>
</html>