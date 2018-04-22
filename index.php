<?php include ("./inc/header.inc.php"); ?>
<!-- if user not logged out it takes you to h-->
<?php
	if(isset($_SESSION["user_login"])){
		header("Location:home.php");
	}
	else{
?>	
<div class="body">
	<table class="layouttable">
		<tr>
			<td>
<div class="contents">
		<?php
		//registeration code
		        $reg = @$_POST['reg'];
				$fname = $lname = $username = $email = $email2 = $password = $password2 = $d = $u_check =""; 
				//function to filter inputs and special characters.
				function test_input($data) {
					return $data;
					}
				//varriable initialisation
				$fname = test_input(@$_POST['fname']);
			    $lname = test_input(@$_POST['lname']);
				$username = test_input(@$_POST['username']);
			    $email = test_input(@$_POST['email']);
				$email2 = test_input(@$_POST['email2']);
				$password = test_input(@$_POST['password']);
				$password2 = test_input(@$_POST['password2']);
				$pattern = "/^[a-zA-Z  '.]*$/";
				$d = date("Y-m-d");
				//error flag
				$iserror = false;
				//
				
				// validation/error variables
				$fnameErr = $lnameErr = $usernameErr = $emailErr = $email2Err =  $passwordErr = $password2Err = "";
			// validation code for register form
if($reg){
					//1 firstname
					if(empty($_POST["fname"])){
						$fnameErr = "Enter your First Name ";
						$iserror = true;
				     }
					 else{
					 	//filter characters only
					 if(!preg_match($pattern, $fname)){
					 	$fnameErr = "Only letters are allowed for your First Name";
						 $iserror = true;
					 }else{
					 	if(strlen($fname)>30 || strlen($fname)<3){
							$fnameErr = "First Name must be between 3 and 30 characters";
							$iserror = true;
								}
						$fname = test_input(@$_POST['fname']);
					 }
					}
					 
					//2 secondname field
					if(empty($_POST["lname"])){
						$lnameErr = "Enter your last Name ";
						$iserror = true;
					}
					 else{
					 	 //filter characters only
					 if(!preg_match($pattern, $lname)){
					 	$lnameErr = "Only letters are allowed for your Second Name";
						 $iserror = true;
					 }else{
					 	if(strlen($lname)<3 || strlen($lname)>30){
							$lnameErr = "Secondname must be between 3 and 30 characters";
							$iserror = true;
								}
						$lname = test_input(@$_POST['lname']);
						}
					}
					
					 //3 username field
					 if(empty($_POST["username"])){
						$usernameErr = "Enter your UserName";
						 $iserror = true;
					}
					 else{
					 	//filter characters only
					 if(!preg_match($pattern, $username)){
					 	$usernameErr = "Only letters are allowed for your Username";
						 $iserror = true;
					 }else{
					 	if(strlen($username)>30 || strlen($username)<3){
							$usernameErr = "username must be between 3 and 30 characters";
							$iserror = true;
								}else{
									//checks if username exist
						$s_check = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
			            $scheck = mysqli_num_rows($s_check);
						if($scheck != 0){
						$usernameErr = "username already taken try another one"	;
							$iserror = true;
							}else{
								$username = test_input(@$_POST['username']);
							}
								}
						
					 }
					}
					 
					 //4 email address field
					  if(empty($_POST["email"])){
						$emailErr = "Enter an Email address";
						  $iserror = true;
					}
					 else{
					 	//validity of the address
					 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					 	$emailErr = "Enter a valid Email address";
						 $iserror = true;
					 }
						
					}
					 
					//5 email 2 address field
					 if(empty($_POST["email2"])){
						$email2Err = "Enter a Confirmation of your email address";
						 $iserror = true;
					}
					 else{						
					 	//validity of the address
					 if(!filter_var($email2, FILTER_VALIDATE_EMAIL)){
					 	$email2Err = "Enter a valid Email address";
						 $iserror = true;
					 }else{
						 //if email match
					 if($email!=$email2){
					 	 $email2Err = "Email address doesn't match"	;
						 $iserror = true;
						  }
					 else{
						$email2 = test_input(@$_POST['email2']);
					 }
					 }	
					
					 }
					 //6 password field
					 if(empty($_POST["password"])){
						$passwordErr = "Enter your Password";
						 $iserror = true;
					}
					 else{
					 	if(strlen($password)<5){
							$passwordErr = "Password must be between password atleast 5 characters";
							$iserror = true;
								}
						$password = test_input(@$_POST['password']);
					}
					 //7 password confirmation field
					if(empty($_POST["password2"])){
						$password2Err = "Enter a Confirmation of your password";
						$iserror = true;
					}
					 else{
					 	//password length
					 	if(strlen($password)<5){
							$passwordErr = "Password must be atleast 5 characters";
							$iserror = true;
								}else
								{
									if($password==$email){
										$passwordErr = "choose a strong password rather than your email address";
										$iserror = true;
									}
					 
					//if passswords match
					 if($password!=$password2){
					 	$password2Err = "password doesn't match";
					 	$iserror = true;
						  }
					 
					 else{
					 	$u_check = mysqli_query($con,"SELECT Email FROM users WHERE email='$email'");
			            $check = mysqli_num_rows($u_check);
						if($check != 0){
						$emailErr = "Email address already taken try another one"	;
							$iserror = true;
							}
						else{
					 	$password2 = test_input(@$_POST['password2']);
							
						}
			       		
					}
					 
								}	
				}
					 //query to insert data to db
					 if(!$iserror){
					 	$d = date("Y-m-d");
							$act=0;
							mysqli_query($con,"INSERT INTO users (fname,lname,username,email,password,sign_up_date,activated)
								VALUES ('$fname','$lname','$username','$email','$password','$d','$act')");	
								$_SESSION["user_login"]=$username;
							header("Location: memorabilia.php");
							
					 }
					 
			}				
									 


?>
<?php
		//login
		//variables
	$password_loginErr = $user_loginErr = $loginErr =$emaildb="";
	$user_login = $password_login =$usernamedb= $passdb ="";
	$login = @$_POST['login'];
				if($login){
					//checkes if username or email is empty				
						if(empty($_POST["user_login"])){
						$user_loginErr = "Enter your Email Address or username";
							}
						else{
							$user_login = test_input($_POST["user_login"]);
						  }
					//checks if password field is empty
						if(empty($_POST["password_login"])){
						$password_loginErr = "Enter your password";
							}
						else{
					//loging in code
					
						$password_login = test_input($_POST["password_login"]);
						$sql = mysqli_query($con,"SELECT id,username,email,password FROM users WHERE (username ='$user_login' || email ='$user_login') AND (password = '$password_login') LIMIT 1");
						$getlogin = mysqli_fetch_array($sql);
						$usernamedb =$getlogin['username'];
						$passdb = $getlogin['password'];
						$emaildb = $getlogin['email'];
						if(($usernamedb==$user_login && $passdb==$password_login)||($emaildb==$user_login && $passdb==$password_login)){
						$usercount = mysqli_num_rows($sql);
						if($usercount == 1){
							while($row = mysqli_fetch_assoc($sql)){
							$id = $row["id"];
							} 
							$_SESSION["user_login"]=$usernamedb;
							header("Location: memorabilia.php");
							exit();
						   }
							else
							{
								$loginErr = "Login information incorrect check and try again";
							}
						}else{
								$loginErr = "Login information incorrect check and try again";
							}			
					 }				
			}


	
		?>
			<div class="contleft">	
				<div class="intro">
					<h2>Memorabilia</h2>
					<p >Memories are Golden.  Childhood, memories are nostalgical. Junior Store, 
						is here to capture them.  
					</p>
					<p>
						Junior store is intended to help parents capture
					    these memories chronologically, sharing information on early childhood parenting and 
						educate mothers on different stages of their children. 
						Upon maturity, parents can handover these memories to their children.

					</p>
				</div>
			<!-- login form-->
						<h2>Log in below </h2>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="lgi" onclick="return(validate());">
							<table cellspacing="18px" valign="top" width="100%" id="login">
								<tr>
									<td>
										<input class="regf" type="text"  class="regform" name="user_login" placeholder="Username or Email Address " value="<?php echo$user_login;?>" required="required"/>
										<span class="error"> <?php echo $user_loginErr;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<input class="regf"  type="password"  class="regform" name="password_login" placeholder="Password" value="<?php echo$password_login;?>" required="required"/>
										<span class="error"> <?php echo $password_loginErr;?></span>
										<span class="error"> <?php echo $loginErr;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<input id = "reg" type="submit"  value="Log In" name="login" />
										
									</td>
								</tr>
								<tr>
									<td><span style="color:green;">Forgot password ? Click <a href="forgotpass.php"><b>here</b></a></span></td>
								</tr> 
							</table>
						</form>
						
					</div>
	
					<div class="contright">		
				<!-- login form-->	
						<h2> Sign up below for more</h2></legend>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" width="100%"  name="rg" onclick="return(check());">
							<table cellspacing="18px" width="100%" >
								<tr>
									<td>
										<input class="regf" type="text" name="fname" class="regform" placeholder="First Name" value="<?php echo$fname;?>" required="required" /> 
										<span class="error"><?php echo $fnameErr;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<input class="regf" type="text" name="lname" class="regform" placeholder="Second Name" value="<?php echo$lname;?>" required="required"/>
										<span class="error"> <?php echo $lnameErr;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<input class="regf" type="text" name="username" class="regform" placeholder="Username"  value="<?php echo$username;?>" required="required"/>
										<span class="error"> <?php echo $usernameErr;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<input class="regf" type="email" name="email" class="regform" placeholder="Email  Address "  value="<?php echo$email;?>" required="required"/>
										<span class="error"> <?php echo $emailErr;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<input class="regf" type="email" name="email2" class="regform" placeholder="Email  Address (again) "  value="<?php echo$email2;?>" required="required"/>
										<span class="error"> <?php echo $email2Err;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<input class="regf" type="password" name="password" class="regform" placeholder="Password" value="<?php echo$password;?>" required="required"/>
										<span class="error"> <?php echo $passwordErr;?></span>
									</td>
								</tr>
								<tr>
									<td>
										<input class="regf" type="password" name="password2" class="regform" placeholder="Password (again)"  value="<?php echo$password2;?>" required="required"/>
										<span class="error"> <?php echo $password2Err;?></span>
									</td>
								</tr>
								<tr>
									<td><input id="reg" type="submit"  value="Register" name="reg" /></td>
								</tr>
											
							</table>
						</form>	
			</div>
			
	
</div>	

		</td>
	</tr>
</table>
</div>
	<?php include ("./inc/footer.inc.php"); ?>	
<?php
	
	}
?>