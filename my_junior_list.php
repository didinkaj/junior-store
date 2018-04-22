<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>
<style>
a{
	text-decoration: none;
	
}
	
</style>
<?php
session_start();
if(!isset($_SESSION["user_login"])){
	$user="";
}
else{
	$user = $_SESSION["user_login"];
	?>
	<div style="min-width: 100%;">

<?php
			$get_junior_account = mysqli_query($con,"SELECT * FROM junior_account WHERE created_by='$user' ");
			$numrows =  mysqli_num_rows($get_junior_account);
			if($numrows!=0){
			while($row =  mysqli_fetch_assoc($get_junior_account)){
				$id = $row['id'];
				$jfname = $row['fname'];
				$jlname = $row['lname'];
				$jnname= $row['nname'];
				$jabout= $row['about'];
				$date_created = $row['date_created'];
				$dob = $row['dob'];
				$img_url =$row['img_url'];
			//checks for profile picture
	$check_pic = mysqli_query($con,"SELECT img_url FROM junior_account WHERE created_by='$user' && id='$id'");
	$get_row_pic =  mysqli_fetch_assoc($check_pic);
	$profile_pic_db = $get_row_pic['img_url'];
	if($profile_pic_db==""){
		$profile_pic ="img/child.jpg";
	}else{
		$profile_pic = "userdata/junior_prof_pic/".$profile_pic_db;
	}
			
			//upload photo code
			$fal="";
			if(isset($_POST['uploadpic'.$id.''])){
		if(((@$_FILES['profpic']["type"]=="image/jpeg" )|| (@$_FILES['profpic']["type"]=="image/png") || (@$_FILES['profpic']["type"]=="image/gif")) && (@$_FILES['profpic']["size"]<1048576)){
		
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ0123456789";
			$rand_dir_name = substr(str_shuffle($chars),0,15);
			mkdir("userdata/junior_prof_pic/$rand_dir_name");
			if(file_exists("userdata/junior_prof_pic/$rand_dir_name/".@$_FILES["profpic"]["name"])){
				echo @$_FILES["profpic"]["name"]."Already exist";
			}else{
				move_uploaded_file(@$_FILES["profpic"]["tmp_name"], "userdata/junior_prof_pic/$rand_dir_name/".$_FILES["profpic"]["name"]);
				//echo "uploaded and stored in: userdata/user_photos/$rand_dir_name/".@$_FILES["profpic"]["name"];
				$_profile_pic_name = @$_FILES["profpic"]["name"];
				$profile_pic_query = mysqli_query($con,"UPDATE junior_account SET img_url='$rand_dir_name/$_profile_pic_name' WHERE (id='$id') && (created_by='$user')");
				//header("Location:my_junior_list.php");
				echo "<script type='text/javascript'> window.parent.location.href='memorabilia.php?id=$id'</script>" ;
				//echo "string";
			}
			
	}else
		{
			$fal= "<span style='color:brown;'>invalid file your image <br/>must not be larger than <br/>1MB and must be<br/> either .jpeg, .gif .png</span>";
		}
	}
		?>
			<script type='text/javascript'>
								function toggle<?php echo$id;?>(){
									var ele = document.getElementById('pic<?php echo$id;?>');
									var prof = document.getElementById('prof<?php echo$id;?>');
									if(ele.style.display == "block"){
										ele.style.display = "none";
										prof.style.display = "block";
										
									}else{
										ele.style.display = "block";
										prof.style.display = "none";
									}
								}
								
							</script>
			<?php
			//dete code
			$sucdel=$sucde2=$sucde3=$sucdelete="";	
			$del=@$_POST['delp'.$id.''];
			
			if(isset($del)){			
				$sucde2 = "<div style='float:left; width:200px;'><span style='color:maroon;margin-left:1px;'>Are you want to delete this Account?</span></div>";
				$sucdel = "<div style='float:left; width:50px;height:0px;'><span style='color:red;'><form method='post'><input type='submit'  name='yes$id' value='yes' id='del' style='border:1px;cursor:pointer;color:red;' /></form></span></div>";
				$sucde3 = "<div style='float:left;width:50px;'><span style='color:green;'><form method='post'><input type='submit'   name='no$id' value='no' id='no' style='border:1px;cursor:pointer;color:blue;' /></form></span></div>";
			}
			//effect deletions
			
			$yes = @$_POST['yes'.$id.''];
			if(isset($yes)){			
				$delete_post = mysqli_query($con,"DELETE FROM junior_account_posts WHERE posted_to='$id' ");
				$delete_account = mysqli_query($con,"DELETE FROM junior_account WHERE id='$id'");
				$sucdelete = "<span style='color:green;margin-left:10px;'>Account is being deleted</span>";
				//echo "<meta http-equiv=\"refresh\" content=\"1; url=albums.php\">";
				//header("Location:memorabilia.php");
				echo "<script type='text/javascript'> window.parent.location.href='account/create_junior_account.php'</script>" ;
			}
			
				//delete post form										
			$del ='<form action="" method="post">
			<input type="submit" name="delp'.$id.'" value="x" id="del" style="border:0px;cursor:pointer;color:blue;padding:0px;width:px;background-color:rgb(204,255,153);" />
			</form>';	
			//junior account  name
			$jabouts = substr($jabout,0, 30);
			$jfname = substr($jfname,0, 15);
			$jlname = substr($jlname,0, 15);
			$jnname = substr($jnname,0, 6);
			echo "<div  style='margin:0px 0px 0px 0px;padding:0px; border-right:0px solid #ccc; float:left; width:215px;min-height:40px;border-bottom:1px solid #ccc;overflow-x:hidden;'>
			<div> $sucdelete</div>
			<table width='100%' >
				<tr><td>
					<div id='prof$id' style='display:block;'>
							<table width='100%'>
							<tr>
							<td width='30%' valign='top'><a  href='memorabilia.php?id=$id' target='_top' ><img src='$profile_pic' title='$jabout' width='80px' height='80px'/></a></td>
							<td width='68%' valign='top'><a href='memorabilia.php?id=$id' target='_top'><span style='color:#0084c6;font-size:14px;'>".$jfname." " .$jlname." </span></a><br/>
							<span style='font-family: times, serif; font-size:14px;' >Born on: $dob<br/>Nickname:<a href='#'>$jnname</a><br/>$fal</span>
							</td>
							<td width='2%' valign='top'>$del</td>	
							</tr>					
							</table>
					</div></td>
				</tr>";
			echo "<tr>
			<td><span style='font-family: times, serif; font-size:14px;color:#123456;' >P$jabouts...</span></td>
			
			</tr>";
			
			//upload form
			/*echo "<tr>
						<td colspan='3'><input type='button' value='Change Profile Picture' onClick = 'javascript:toggle$id()'/></td>
				 </tr>";*/
			//prof picture for junior code
			echo'
			</table>'.$sucde2.''. $sucde3 .''.$sucdel.'</div>';
			} 
			}else{
				echo "You have not create any account for your junior";
			}
			?>
			</div>
			
<?php
}
?>