<style>
	a{
		text-decoration: none;
	}
</style>

<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>
<?php
session_start();
if(!isset($_SESSION["user_login"])){
	echo "An error occurd";
}
else{
	$username = $_SESSION["user_login"];
	?>

<!-- fetching albums-->
			<?php
			$get_album_nic = mysqli_query($con,"SELECT DISTINCT created_for FROM albums WHERE created_by='$username' && created_for!='' ORDER BY id DESC");
			while($res_nic = mysqli_fetch_assoc($get_album_nic)){
				$nickname = $res_nic['created_for'];
			//junior name
			$get_jnames = mysqli_query($con,"SELECT * FROM junior_account WHERE nname='$nickname' ORDER BY id DESC");		
			$res_jnames = mysqli_fetch_assoc($get_jnames);
			$jfname = $res_jnames['fname']; 
			$jlname = $res_jnames['lname']; 
			$img_url = $res_jnames['img_url'];
			
			if($img_url==""){
				$pic ="img/child.jpg";
			}else{
				$pic = "userdata/junior_prof_pic/".$img_url;
			}
		
			
			$get_album = mysqli_query($con,"SELECT * FROM albums WHERE created_for='$nickname' ORDER BY id ASC");
			$num = mysqli_num_rows($get_album);
			$numrows = mysqli_num_rows($get_album);
			$row = mysqli_fetch_assoc($get_album);
				$id = $row['id'];
				$album_title = $row['album_title'];
				$album_description = $row['album_description'];
				$creadted_by = $row['created_by'];
				$date_created = $row['date_created'];
				$uid = $row['uid'];
			
			
			

			//album name
			echo "<div id='albumframe$uid' width='95%'style='margin-top:5px; border-bottom:1px solid #ccc;verflow-y: scroll;overflow-x: hidden;'>
			<table width='100%'>
			<tr>
			<td width='30%'><a  href='albums.php?nickname=$nickname' target='_top' ><img src='$pic' width='80px' height='80px' title='Open Album'/></a></td>
			<td valign='top'><a href='albums.php?nickname=$nickname' target='_top'><span style='color:#0084c6;font-size:14px;'>".$jfname." ".$jlname." ".$nickname."<br/></span></a>			 
			<span style='font-family: times, serif; font-size:14px;'>Photo Bucket: <a href='albums.php?nickname=$nickname' target='_top'>$num Albums</a></span>
			<span style='font-size:12px;color:#654321;'><br/>Created on $date_created</span>
			</td>
			</tr>";
			
			?>
		<script type="text/javascript">
		<!--
		function refresh(){
		    window.location = "albums.php?uid=<?php echo$uid;?>"
		}
		//-->
		</script>
			
			<?php
				//album lists
				$get_albumal = mysqli_query($con,"SELECT * FROM albums WHERE created_for='$nickname' ORDER BY id DESC LIMIT 3");
				while($listal=mysqli_fetch_assoc($get_albumal )){
					$uidal = $listal['uid'];
					// count photos in albums
					$checknum = mysqli_query($con,"SELECT * FROM photos WHERE uid='$uidal' ORDER BY id DESC");
					$countnum = mysqli_num_rows($checknum);
					$al_title = $listal['album_title'];
				echo "<tr><table width='100%'><tr>
				<td width='60%'><span style='color:#0084c6;font-size:14px;'><a href='albums.php?nickname=$nickname' style='color:#123456;'target='_top'>$al_title</a></td>
				<td><a href='albums.php?pics=$uidal' style='color:#0084c6;' target='_top'>$countnum </a><font color='#123456'>Photos</font></td>
				</span></tr></table></tr>";
				}
			echo'
			</table></div>';
			} 
			?>
			
<?php
}
?>