<div id="reservation_form">
<?php
	$qNum = mysql_query("SELECT * FROM users WHERE email!='Administrator'");
	$gNum = mysql_num_rows($qNum);
?>
<form method="GET" action="" class="formGet" style="float: right;">
<p style="font-size: 15px;">&nbsp;</p>
<select name="filter" onchange="this.form.submit()" class="txt2">
<option> Sort Users: </option>
<option value="ORDER BY id DESC"> New Users </option>
<option value="ORDER BY id ASC"> Old Users </option>
</select>
</form>
<form method="POST" action="srchUsers.php">
	<input type="text" name="keyword" placeholder=" Search Keyword" class="srchTxt"/>
	<input type="submit" name="srch" class="srchBtn" value=" "/>
</form>
<div id="dblist">
<?php 
if(isset($_GET['filter'])){
		$filterdb = $_GET['filter'];
		if($filterdb == "all"){
		$filterdb = "";
		}else{
		$filterdb;
		}
	}else{
		$filterdb = "ORDER By id DESC";
	}
	
$perpage = 10;
$pages_query = mysql_query("SELECT COUNT('id') FROM users WHERE email!='Administrator'");
$pages = ceil(mysql_result($pages_query, 0) / $perpage);

$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $perpage;
$query = mysql_query("SELECT * FROM users WHERE email!='Administrator' $filterdb LIMIT $start, $perpage"); 
if(mysql_num_rows($query) == 0){
	echo "<br/><center><h3>Empty Record</h3></center>";
}else{
?>
<script>
	function chkAll(master,cName){
		var cbArray = document.getElementsByClassName(cName);
		for(var i = 0; i < cbArray.length; i++){
			var cb = document.getElementById(cbArray[i].id);
			cb.checked = master.checked;
		}
	}
</script><p style="font-size: 8px;">&nbsp;</p>
<form method="POST" action="">
<div style="border-bottom: solid 1px; width: 900px; padding-bottom: 3px;">
<label for="masterCbox" class="toggle" title="Mark/Unmark All Students Below"/>
<input type="checkbox" id="masterCbox" onchange="chkAll(this,'cBox')"/> Toggle All
</label>
<input type='submit' class="confirmmarked" style="padding: 3px; border:" value='Delete Marked'/>
<input type="submit" name="delMark" id="delmark" class="triggerBtn" />

<label style="margin-left: 30px;">Total Users : <?php echo $gNum - 1; ?></label>
</div><br />
<?php
while($row = mysql_fetch_array($query)){ 
	$id1 = $row[0];
	$profile = $row['profile'];
	$email = $row['email'];;
	$fname = $row['fname'];
	$mname = $row['mname'];
	$lname = $row['lname'];
	$name = $fname." ".$mname." ".$lname;
	$address = $row['address'];
	$age = $row['age'];
	$contact = $row['contact'];
	$gender = $row['gender'];
	$status = $row['status'];
	$active = $row['active'];
	
	if($fname == " Administrator"){
		echo "";
	}if($email == " Administrator"){
		echo "";
	}else{
?>
<div class="line">
<table border="0" width="700" class="dblist">
<tr>
<td width="10">
	<input type="checkbox" id="<?php echo $id1; ?>" name="id[]" value="<?php echo $row['id'] ?>" title="Mark/Unmark" class="cBox"/>
</td>
<td>
<a href="userProfile.php?target=<?php echo $id1 ?>">
	<img src="../users/profile/<?php echo $profile ?>" width="50" height="50" class="prof_thumb"/>
</a>
</td>
<td width="640">
<a href="userProfile.php?target=<?php echo $id1 ?>" style="color:#000;">
	<label style="margin-left: 20px; cursor: pointer;"><b><?php echo $name; ?></b></label><br />
	<label style="margin-left: 20px; cursor: pointer;"><?php echo $email; ?></label>
</a>
</td>
<td width="50">
	<p style="font-size: 8px;">&nbsp;</p>
	<div title="Delete  <?php echo $name; ?>?" class="confirmdel" onclick="Confirm.render('Delete  <?php echo $name; ?>?','delete_field','<?php echo $id1 ?>')"><img title="Delete  <?php echo $name; ?>?" src="img/del.png" style="float: left;"></div>
</td>
</tr>
</table>
</div> <!-- .line -->
<?php }} ?> 
</form>
<script>
function deletePost(id){
	document.location.href="functions/delUser.php?target=" + id;
}
</script>
<?php 
echo "<script>";
include 'script/confirm.js';
echo "</script>";
?>
<?php

if(isset($_POST['delMark'])){
	if(empty($id) || $id == 0){
		echo "<script>Alert.render('No User/s Selected')</script>";
	}else{	
		$implodeID = implode(", ", $id);
		$qDelete = mysql_query("DELETE FROM users WHERE id IN(".$implodeID.")") or die ("Error In Deleting Reservation\\nMaintenance Required");
		if(isset($qDelete)){
			echo "<script>Alert.render('Selected User/s Deleted')</script>";
			echo "
			<script>
				setInterval(
					function(){	window.location='users.php' },2000
				);
			</script>";	
		}else{
			echo "<script>Alert.render('Error In Deleting Reservation<br/>Maintenance Required')</script>";
		}
	}
}
?>
</div> <!-- #contents -->
<div class='hr'> <hr  /> </div>

<div id="pagination">
<div id="pageUp">
<?php 
$prev = $page - 1;
$next = $page + 1;
$begin = 1;
$end = $pages;

if(!($page == 1))
{
echo "<a href='?page=$begin&order=$order' title='Go to First Page'><img src='img/fpage.png'class='paginationLink'  width='30' height='30'></a> &nbsp;";
}

if(!($page <= 1))
{
echo "<a href='?page=$prev&order=$order' title='Previous Page'><img src='img/prev.png'class='paginationLink'  width='30' height='30'></a>  &nbsp;";
}

if(!($page >= $pages)) 
{
echo " <a href='?page=$next&order=$order' title='Next Page'><img src='img/next.png'class='paginationLink'  width='30' height='30'></a>  &nbsp;";
}

if(!($page == $pages))
{
echo "<a href='?page=$end&order=$order' title='Go to Last Page'><img src='img/lpage.png'class='paginationLink'  width='30' height='30'></a>";
}
?>
</div> <!--#pageUp-->

<div id="pageDown">
<?php
	for($x=1; $x <= $pages; $x++)
	{
		echo ($x == $page) ? '<big class="pageSel"><a href="?page='.$x.'&order='.$order.'"><div class="boxPageAc">'.$x.'</div></a></big> ' : '<a href="?page='.$x.'&order='.$order.'"  class="pageSec"><div class="boxPage">'.$x.'</div></a>';
	}
}
?>
</div> <!--#pageDown-->
</div> <!-- #Pagination -->
</div>