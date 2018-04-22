<div id="reservation_form">
<form method="GET" action="" class="formGet" style="float: right;">
<p style="font-size: 15px;">&nbsp;</p>
<select name="filter" onchange="this.form.submit()" class="txt2">
<option> Sort Messages: </option>
<option value="ORDER BY id DESC"> New Messages </option>
<option value="ORDER BY id ASC"> Old Messages </option>
</select>
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
$pages_query = mysql_query("SELECT COUNT('id') FROM msg WHERE sender = 'Administrator'");
$pages = ceil(mysql_result($pages_query, 0) / $perpage);

$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $perpage;
$query = mysql_query("SELECT * FROM msg WHERE sender = 'Administrator' AND define='Administrator' $filterdb LIMIT $start, $perpage"); 
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
<input type='submit' class="confirmsent" style="padding: 3px; border:" value='Delete Marked'/>
<input type="submit" name="delMark" id="sentmark" class="triggerBtn" />
</div><br />
<?php
while($row = mysql_fetch_array($query)){ 
	$id1 = $row[0];
	$recipient = $row['recipient'];
	$sender = $row['sender'];
	$name = $row['name'];
	$date = $row['date'];

$queryUsername = mysql_query("SELECT * FROM users WHERE email='$recipient'");
$getUserName= mysql_fetch_array($queryUsername);
$profile = $getUserName['profile'];
$f = $getUserName['fname'];
$m = $getUserName['mname'];
$l = $getUserName['lname'];
$userName = $f." ".$m." ".$l;
?>

<div class="line">
<a href="viewsent.php?target=<?php echo $id1 ?>">
<table border="0" width="700" class="dblist">
<tr>
<td width="10">
	<input type="checkbox" id="<?php echo $id1; ?>" name="id[]" value="<?php echo $row['id'] ?>" title="Mark/Unmark" class="cBox"/>
</td>
<td>
	<img src="../users/profile/<?php echo $profile ?>" width="50" height="50" class="prof_thumb"/>
</td>
<td width="640">
	<label style="margin-left: 20px; cursor: pointer;"><b><?php echo $userName; ?></b></label><br />
	<sup style="margin-left: 20px; cursor: pointer;"><?php echo $date; ?></sup>
</td>
<td width="50">
	<p style="font-size: 8px;">&nbsp;</p>
	<a href="functions/delSentMsg.php?del=<?php echo $id1 ?>">
	<img title="Delete  <?php echo $name; ?>?" src="img/del.png" style="float: left;">
	</a>
	<a href="functions/delSentMsg.php?del=<?php echo $id1 ?>" id="delsent" class="triggerBtn">
	</a>
</td>
</tr>
</table>
</a>
</div> <!-- .line -->
<?php } ?> 
</form>
<?php

if(isset($_POST['delMark'])){
	if(empty($id) || $id == 0){
		echo "<script>Alert.render('No Messages Selected')</script>";
	}else{	
		$implodeID = implode(", ", $id);
		$qDelete = mysql_query("DELETE FROM msg WHERE id IN(".$implodeID.")") or die ("Error In Deleting Reservation\\nMaintenance Required");
		if(isset($qDelete)){
			echo "<script>Alert.render('Selected Messages Deleted')</script>";
			echo "
			<script>
				setInterval(
					function(){	window.location='sent.php' },2000
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
$order = (isset($_ROW['order']));

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