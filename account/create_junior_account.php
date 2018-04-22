<!-- restrict access of a page to a logged in user-->
<style>
	a {
		text-decoration: none;
		font-family: arial,helvetica,"Trebuchet MS",verdana,tahoma,sans-serif;
	}
	input{
		width: 100%;
	}
	select {
		width: 30%;
		margin-left: 3px;
	}
	textarea{
		width: 100%;
	}
	.error{
		color:brown;
	}
</style>
<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>
<?php
  session_start();
	if(!isset($_SESSION["user_login"])){
		//header("Location:index.php");
		header("Location:index.php");
	}else{
		$user = $_SESSION["user_login"];
		//count number of jumior
		$numjunior = mysqli_query($con,"SELECT * FROM junior_account WHERE created_by='$user'");
		$jnum = mysqli_num_rows($numjunior);
		//echo$jnum;
		if(isset($_GET['add']) || $jnum==0){
		//echo$_GET['add'];
?>	

<?php
//send album code
						//function to filter inputs and special characters.
						$jdoby=$jdobm=$jdobd="";
				function test_input($str) {
				$str = @trim($str);
				
				}
			        	$pattern = "/^[a-zA-Z  '.]*$/";
						$jfname = test_input(@($_POST['jfname']));
						$jlname = test_input(@($_POST['jlname']));
						$jnname = test_input(@($_POST['jnname']));
						$jabout = test_input(@($_POST['jabout']));
						$date = date("Y-m-d");
						$created_by = $user;
						$iserror = false;
						//error variables
						$jfnameErr = $jlnameErr =$jnnameErr =$jdobErr =$jaboutErr="";
						//submitting to database
						if(isset($_POST['jsend'])){
								//1 firstname
					if(empty($_POST["jfname"])){
						$jfnameErr = "Enter The First Name ";
						$iserror = true;
				     }
					 else{
					 	//filter characters only
					 if(!preg_match($pattern, $jfname)){
					 	$jfnameErr = "Only letters are allowed for your First Name";
						 $iserror = true;
					 }else{
					 	if(strlen($jfname)>30 || strlen($jfname)<3){
							$jfnameErr = "First Name must be between 3 and 30 characters";
							$iserror = true;
								}
						$jfname = test_input(@$_POST['jfname']);
					 }
					}
					 //2 secondname
					if(empty($_POST["jlname"])){
						$jlnameErr = "Enter The Second Name ";
						$iserror = true;
				     }
					 else{
					 	//filter characters only
					 if(!preg_match($pattern, $jlname)){
					 	$jlnameErr = "Only letters are allowed for your second Name";
						 $iserror = true;
					 }else{
					 	if(strlen($jlname)>30 || strlen($jlname)<3){
							$jlnameErr = "second Name must be between 3 and 30 characters";
							$iserror = true;
								}
						$jlname = test_input(@$_POST['jlname']);
					 }
					}
					 //3 nickname
					if(empty($_POST["jnname"])){
						$jnnameErr = "Enter The Nick Name ";
						$iserror = true;
				     }
					 else{
					 	//filter characters only
					 if(!preg_match($pattern, $jnname)){
					 	$jnnameErr = "Only letters are allowed for your nick Name";
						 $iserror = true;
					 }else{
					 	if(strlen($jnname)>30 || strlen($jnname)<3){
							$jnnameErr = "Nick Name must be between 3 and 30 characters";
							$iserror = true;
								}else{
									//check if name exist in db
									$nickname = mysqli_query($con,"SElECT * FROM junior_account WHERE nname='$jnname'");
									$count = mysqli_num_rows($nickname);
									if($count>0){
										$jnnameErr = "Nick Name already taken try another one";
										$iserror = true;
									}
								}
						
					 }
					}
					  //3 date
					if(empty($_POST["jdoby"])||empty($_POST["jdoby"])||empty($_POST["jdoby"])){
						$jdobErr = "Enter The Date of Birth ";
						$iserror = true;
						
					}else{
						$jdoby = @$_POST['jdoby'];
						$jdobm = @$_POST['jdobm'];
						$jdobd = @$_POST['jdobd'];
					
						if(checkdate($jdobm,$jdobd,$jdoby)){
							$jdoby = test_input(@$_POST['jdoby']);
							$jdobm = test_input(@$_POST['jdobm']);
							$jdobd = test_input(@$_POST['jdobd']);	
							$jodb = "$jdoby-$jdobm-$jdobd";						
						}else{
							$jdobErr = "Invalid date ";
							$iserror = true;
						}
					}
					//4 about
					if(empty($_POST["jabout"])){
						$jaboutErr = "Enter something about the account ";
						$iserror = true;
				     }
					 else{
					 	//filter characters only
					 if(!preg_match($pattern, $jabout)){
					 	$jaboutErr = "Only letters are allowed for your about";
						 $iserror = true;
					 }else{
					 	if(strlen($jabout)>50 || strlen($jfname)<3){
							$jaboutErr = "about must be between 3 and 50 characters";
							$iserror = true;
								}
						$jabout= test_input(@$_POST['jabout']);
					 }
					}
					
					//query to insert data to db
					 if(!$iserror){
					 	$jdob = "$jdoby-$jdobm-$jdobd";	
					 	$d = date("Y-m-d");
							$created_by = $user;
							mysqli_query($con,"INSERT INTO junior_account (fname,lname,nname,dob,about,date_created,created_by)
								VALUES ('$jfname','$jlname','$jnname','$jdob','$jabout','$d','$created_by')");	
								echo "<span style='color:green;'>Accont created successfully</span>";
							echo "<meta http-equiv=\"refresh\" content=\"3; url=create_junior_account.php\">";
							echo "<script type='text/javascript'> window.parent.location.href='../memorabilia.php'</script>" ;
							
							
					 }
							
							
						}
			        	
			        	
			        	
			        	?>
			        	<!-- create junior account form-->
			        	<a href="../memorabilia.php" id="tit" style="font-size: 18px;color:#0084c6;font-weight: 510;" target="_top">Create Junior Account</a>
			        	<form method="post" action="create_junior_account.php?add="add">
			        		<table cellspacing="0px"  width="100%" cellpadding="2px">
			        			<tr>
			        			<td colspan="2" valign="top"><center><img src="../img/child.jpg" width="55px" /></center></td>
			        			</tr>
			        			<tr>
			        			<td width="10%">First Name:</td>
								<td><input type="text" name="jfname" required="required" value="<?php echo$jfname;?>"/><br/><span class="error"><?php echo$jfnameErr;?></span></td>
								
								</tr>
								<tr>
			        			<td width="10%">Second Name:</td>
								<td><input type="text" name="jlname" required="required" value="<?php echo$jlname;?>"/><br/><span class="error"><?php echo$jlnameErr;?></span></td>
								</tr>
								<tr>
			        			<td width="10%">Nick Name:</td>
								<td><input type="text" name="jnname" required="required"  value="<?php echo$jnname;?>"/><br/><span class="error"><?php echo$jnnameErr;?></span></td>
								</tr>
								<tr>
			        			<td width="10%">Date of birth:</td>
								<td><select placeholder="yyyy" required="required"  name="jdoby" value="<?php echo$jdoby;?>">
									<option><?php echo$jdoby;?></option>
									<?php 
									$i=date("Y");
									for($i=$i-1;$i<=2016;$i++){
									 echo "<option>$i</option>";}?> 
									 </select>
									<select placeholder="mm" required="required"  name="jdobm" value="<?php echo$jdobm;?>">
										<option><?php echo$jdobm;?></option>
										<?php 
									$i=1;
									for($i;$i<=12;$i++){
									 echo "<option>$i</option>";}?> 
										
									</select>
									<select placeholder="dd" required="required"  name="jdobd" value="<?php echo$jdobd;?>">
										<option><?php echo$jdobd;?></option>
									<?php 
									$i=1;
									for($i;$i<=31;$i++){
									 echo "<option>$i</option>";}
									 ?> 
										
									</select> 
									<br/><span class="error" >
										<?php echo$jdobErr;?></span></td>
								</tr>
								<tr>
			        			<td valign="top">About:</td>
								<td><textarea name="jabout" rows="3" cols="18" required="required"  ><?php echo$jabout;?></textarea><br/><span class="error"><?php echo$jaboutErr;?></span></td>
								</tr>
								<tr>
									<td></td>
								<td><input type="submit" value="Create Account" name="jsend" style="margin-top: 10px;"/></td>
								</tr>
							</table>
							</form>
						</div>
						<!--edit album -->




<?php
	}else{
		echo '<a href="#" style="font-size: 18px;color:#0084c6;font-weight: 500;">
									junior Accounts
									</a> &nbsp; <a href="create_junior_account.php?add="add"" style="font-family: times, serif; font-size:14px;color:#654321;">Add account</a>';
		//display junior accounts
		echo "<iframe src='../my_junior_list.php' frameborder='0' height='375px'  style='width:100%;overflow-x: hidden;overflow-y: scroll; '>
							
				</iframe>";
	}
	}

	?>