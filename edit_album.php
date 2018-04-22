<?php include("./inc/connect.inc.php"); ?>
<!-- restrict access of a page to a logged in user-->
<?php
session_start();
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
			$username = $_SESSION["user_login"];
?>
	
	
		
			<!-- fetching albums-->
			<?php
			if(isset($_GET['u'])){
				$id = $_GET['u'];
				$pattern = '/[^0-9]+/';
				$filter = intval(preg_replace($pattern, '', $id));
				//echo"<br/>";
				//echo$filter;
				
				
			$get_album = mysqli_query($con,"SELECT * FROM albums WHERE created_by='$username' && id='$filter' ORDER BY id DESC");
			$numrows = mysqli_num_rows($get_album);
			while($row = mysqli_fetch_assoc($get_album)){
				$id = $row['id'];
				$album_title = $row['album_title'];
				$album_description = $row['album_description'];
				$creadted_by = $row['created_by'];
				$creadted_for = $row['created_for'];
				$date_created = $row['date_created'];
				$uid = $row['uid'];
				
				$suc="";
				// delete album
				if(isset($_POST['dela'.$uid.''])){
					//echo "am active";
					//effect deletion fo album
					$delete = mysqli_query($con,"DELETE FROM albums WHERE uid='$uid'");
					$delete_photos = mysqli_query($con,"DELETE FROM photos WHERE uid='$uid'");
					$suc= "<span style= 'color:green'>album being deleted</span";
					echo "<script type='text/javascript'> window.parent.location.href='albums.php'</script>" ;
					//header("Location:albums.php");
			} 
				// edit code
			if(isset($_POST['editala'.$uid.''])){
				$updated_title = @$_POST['altitle'];
				$updated_description = @$_POST['aldescription'];
				if($updated_title != ""){
					if($updated_description != ""){
					$updateresults = mysqli_query($con,"UPDATE albums SET album_title='$updated_title', album_description='$updated_description ' WHERE (created_by='$username') AND (uid='$uid')");
					$suc= "<span style='color:green'>details updated</span";
					//echo "string";
					echo "<meta http-equiv=\"refresh\" content=\"1;  \">";
					//header("Location:albums.php?u=$id");
					//echo "<script type='text/javascript'> window.parent.location.href='albums.php?u=$id'</script>" ;
					}
				}
				
			}
				//album name
			echo "<span>$suc</span>
			<div class='albumframe' style='margin-top:5px; border-bottom:1px solid #ccc;'>
			<table width='100%'>
			<tr>
			<td width='30%'><img src='img/album.jpg' width='60px' height='60px'/></td>
			<td valign='top'><span style='font-family: times, serif; font-size:14px;color:#123456;' >
			Create for:  $creadted_for<br/>
			Created on : $date_created </span>
			</td>
			</tr>";
			
			//edit  form
			
			
			
			echo'<tr><td colspan="2"><div class="albumphoto">
			
			<form action="edit_album.php?u='.$id.'"  method="post" >
				<table>
				<tr>
					<td>Title: <input type="text" name="altitle" value="'.$album_title.' "/></td>
					</tr>
					<tr>
					<td><textarea name="aldescription" rows="3" style="width:100%;"/>'.$album_description.'</textarea></td>
					</tr>
					<tr>
					<td style="float:right;" ><input type="submit" name="editala'.$uid.'" value="Save Updates" /> </td>
					<td style="float:left;" ><input type="submit" name="dela'.$uid.'" value="Delete" /> </td>
					</tr>
				</table>
			</form></div></td>
			</tr>
			</table></div>
			<hr/>';}
			
			
			}else
			if(isset($_GET['inactive']))
			{
				
			}
			
			else{
			
			$get_album = mysqli_query($con,"SELECT * FROM albums WHERE created_by='$username' ORDER BY id DESC LIMIT 1");
			$numrows = mysqli_num_rows($get_album);
			while($row = mysqli_fetch_assoc($get_album)){
				$id = $row['id'];
				$album_title = $row['album_title'];
				$album_description = $row['album_description'];
				$creadted_by = $row['created_by'];
				$creadted_for = $row['created_for'];
				$date_created = $row['date_created'];
				$uid = $row['uid'];
				
				$suc="";
				// delete album
				if(isset($_POST['del'.$uid.''])){
					//echo "am active";
					//effect deletion fo album
					$delete = mysqli_query($con,"DELETE FROM albums WHERE uid='$uid'");
					$delete_photos = mysqli_query($con,"DELETE FROM photos WHERE uid='$uid'");
					$suc= "<span style= 'color:green'>album being deleted</span";
					echo "<script type='text/javascript'> window.parent.location.href='albums.php'</script>" ;
			} 
				// edit code
			if(isset($_POST['edital'.$uid.''])){
				$updated_title = @$_POST['altitle'];
				$updated_description = @$_POST['aldescription'];
				if($updated_title != ""){
					if($updated_description != ""){
					$updateresults = mysqli_query($con,"UPDATE albums SET album_title='$updated_title', album_description='$updated_description ' WHERE (created_by='$username') AND (uid='$uid')");
					$suc= "<span style='color:green'>details updated</span";
					echo "<meta http-equiv=\"refresh\" content=\"2;  url=albums.php\">";
					}
				}
				
			}
				//album name
			echo "
			<span>$suc</span>
			<div class='albumframe' style='margin-top:5px; border-bottom:1px solid #ccc;'>
			
			<table width='100%'>
			<tr>
			<td width='30%'><img src='img/album.jpg' width='60px' height='60px'/></td>
			<td valign='top'>
			<span style='font-family: times, serif; font-size:14px;color:#123456;' >
			Create for:  $creadted_for</br>
			Created on : $date_created </span>			
			</td>
			</tr><tr><td colspan='2'>";
			
			//edit  form
			
			
			
			echo'<div class="albumphoto">
			
			<form action="edit_album.php"  method="post" >
				<table>
				<tr>
					<td>Title: <input type="text" name="altitle" value="'.$album_title.' "/></td>
					</tr>
					<tr>
					<td><textarea name="aldescription" rows="3" style="width:100%;"/>'.$album_description.'</textarea></td>
					</tr>
					<tr>
					<td style="float:right;" ><input type="submit" name="edital'.$uid.'" value="Save Updates" onclick="javascript: window.parent.location.reload(true);"/> </td>
					<td style="float:left;" ><input type="submit" name="del'.$uid.'" value="Delete" onclick="javascript: window.parent.location.reload(true);"/> </td>
					</tr>
				</table>
			</form></div></td>
			</tr>
			</table></div>
			<hr/>';
			
			
			
			}
}
			?>



<!--<iframe onafterupdate="home"></iframe>-->
<?php

	
	}

?>
		