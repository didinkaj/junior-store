<!-- restrict access of a page to a logged in user-->
<head>
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>
	<link rel="stylesheet" type="text/css" href="./css/home.css"/>
	<link rel="stylesheet" type="text/css" href="./css/profile.css"/>
</head>
<?php 
$con = mysqli_connect("localhost","root","","junior") or die("error connecting to server");
?>
<?php
session_start();
	if(!isset($_SESSION["user_login"])){
		header("Location:index.php");
	}else{
		$user = $_SESSION["user_login"];
?>	

<div>
			<a href="memorabilia.php" target="_top" style="font-size: 18px;color:#0084c6;font-weight: 500;text-decoration: none;">Children accounts on Junior</a>
			<!-- fetching picture-->
			<?php
			$get_junior = mysqli_query($con, "SELECT * FROM junior_account WHERE created_by!='$user'");
			$numrows = mysqli_num_rows($get_junior);
			while($row = mysqli_fetch_assoc($get_junior)){
				$id = $row['id'];
				$jfname = $row['fname'];
				$jlname = $row['lname'];
				$jnname = $row['lname'];
				$jabout = $row['about'];
				$created_by = $row['created_by'];
				$dob = $row['dob'];
				$img_url = $row['img_url'];
				if($img_url==""){
					$pic="img/child.jpg";
				}else{
					$pic = "userdata/junior_prof_pic/".$img_url;
				}
			//getting parents name
			$get_parent = mysqli_query($con, "SELECT * FROM users WHERE username='$created_by'");
			$parentrow = mysqli_fetch_assoc($get_parent);
			$parentfname = $parentrow['fname'];
			$parentlname = $parentrow['lname'];
			
			
			//album name
			echo "<div class='juniorframe' style='margin-top:5px; border-bottom:1px solid #ccc;width:99%;'>
			<table width='100%'>
			<tr>
			<td width='30%'><a  href='memorabilia.php?jid=$id' target = '_top'><img src='$pic' width='80px' height='80px'/></a></td>
			<td valign='top'><a href='memorabilia.php?jid=$id' target = '_top'><span style='color:#0084c6;font-family: times, serif;font-size:14px;'>".$jfname." " .$jlname." " .$jnname.":</span></a><br/>
			<span style='font-family: times, serif; font-size:14px;'>$jabout <br/>
			Parent: <a href='profile.php?u=$created_by' target = '_top' style='color:#000080;'>$parentfname $parentlname</a></span>
			</td>
			</tr>";
			
			//upload form
			
			
			echo'
			</table></div>';
			} 
			?>
			</div>




<?php
	}
	?>