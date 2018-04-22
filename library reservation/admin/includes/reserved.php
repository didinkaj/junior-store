<?php
	$numReserved = mysql_num_rows(mysql_query("SELECT * FROM reserved WHERE status = 'Approved'"));	 
	$numPending = mysql_num_rows(mysql_query("SELECT * FROM reserved WHERE status = 'Pending'"));	 
?>
<div id="sublink">
	<a href="reservations.php" class="subLink">Make Reservation</a> | 
	<b><a href="#" class="subLink">Reserved Events (<b><?php echo $numReserved ?></b>)</a></b> |
	<a href="pending.php" class="subLink">Pending Events (<b><?php echo $numPending ?></b>)</a> |
    <a href="addEvent.php" class="subLink">Add Event List</a>
</div>
<br />
<div id="reservation_form">


<?php
	$qNum = mysql_query("SELECT * FROM reserved WHERE status = 'approved'");
	$gNum = mysql_num_rows($qNum);
if(isset($_GET['filter'])){
	$filter = $_GET['filter'];
	if($filter == "all"){
		$filterdb = "";
		$selected_event = '<option class="not" value="'.$filter.'"> All Event </option>';
	}else{
		$filterdb = " AND event='$filter'";
		$selected_event = '<option class="not" value="'.$filter.'"> '.$filter.' </option>';
	}
}else{
	$selected_event = '<option class="not"> Select Event: </option>';
	$filterdb = "";
}
?>
<form method="GET" action="" class="formGet" style="float: right;">
<p style="font-size: 15px;">&nbsp;</p><label>Filter Event : </label>
<select name="filter" onchange="this.form.submit()" class="txt2">
<?php echo $selected_event ?>
<option value="all"> All Event </option>
<option value="Wedding"> Wedding </option>
<option value="Christening"> Christening </option>
<option value="Burial"> Burial </option>
<?php
   $q_event = mysql_query("SELECT * FROM events");
   while($get_event = mysql_fetch_array($q_event)){
   	$dbevent = $get_event[1];
?>
<option value="<?php echo $dbevent; ?>"> <?php echo ucwords($dbevent); ?> </option>
<?php } ?>
</select>
</form>


<div id="dblist">
<p style="font-size: 8px;">&nbsp;</p>
<form method="POST" action="">
<div style="border-bottom: solid 1px; width: 900px; padding-bottom: 3px;">
<label for="masterCbox" class="toggle" title="Mark/Unmark All Students Below"/>
<input type="checkbox" id="masterCbox" onchange="chkAll(this,'cBox')"/> Toggle All
</label>
<input type='submit' class="confirmmarked" style="padding: 3px; font-size: 16px;" value='Delete Marked'/>
<input type="submit" name="delMark" id="delmark" class="triggerBtn"/>
&nbsp; 
<form method="POST" action="">
<input type="text" name="keyword" placeholder="Search Keyword Here" class="txt2"/>
<input type='submit' style="padding: 3px; font-size: 16px;" name="srch_keyword" value='Search'/>
</form>
</div><br />
<?php 
$perpage = 10;
$pages_query = mysql_query("SELECT COUNT('id') FROM reserved");
$pages = ceil(mysql_result($pages_query, 0) / $perpage);

$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $perpage;
if(isset($_POST['srch_keyword'])){
	$keyword = $_POST['keyword'];
	$filter_status = "AND status = 'approved'";
	$insert_keyword = "AND cname LIKE '$keyword%' $filter_status $filterdb OR name LIKE '$keyword%' $filter_status $filterdb OR mr LIKE '$keyword%' $filter_status $filterdb OR mrs LIKE '$keyword%' $filter_status $filterdb OR offer LIKE '$keyword%' $filter_status $filterdb OR address LIKE '$keyword%' $filter_status $filterdb";
	$query = mysql_query("SELECT * FROM reserved WHERE status = 'approved' $insert_keyword "." $filterdb LIMIT $start, $perpage"); 
}else{
	$query = mysql_query("SELECT * FROM reserved WHERE status = 'approved' $filterdb LIMIT $start, $perpage"); 
}
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
</script>
<?php
while($row = mysql_fetch_array($query)){ 
	$id1 = $row[0];
	$name = $row['name'];
	$date = $row['date'];
	$time = $row['time'];
	$event = $row['event'];
	$dateAdded = $row['dateAdded'];
?>
<div class="line">
<table border="0" width="800" class="dblist">
<tr>
<td>
<a href="viewReservation.php?target=<?php echo $id1 ?>" style="color: #000; cursor: default;" title="Click for details">
	<input type="hidden" name="link[]" value="<?php echo $row['link'] ?>"/>
	<input type="checkbox" id="<?php echo $id1; ?>" name="id[]" value="<?php echo $row['id'] ?>" title="Mark/Unmark" class="cBox"/>
	<label><b><?php echo $event ?></label></b>	<br/>
	<center><sup> <?php echo $date ?></sup></center>
</a>
</td>
<td width="550">
<a href="viewReservation.php?target=<?php echo $id1 ?>" style="color: #000; cursor: default;" title="Click for details">
<small>Reserved By :</small><label style="margin-left:5px;"><?php echo $name ?></label><br/>
<sup>Date Added : <?php echo $dateAdded ?></sup>
</a>
</td>
<td width="50">
<div title="Delete <?php echo $event. " Reservation from ".$name; ?>?" class="confirmdel" onclick="Confirm.render('Delete <?php echo $event. " Reservation of ".$name; ?>?','delete_field','<?php echo $id1 ?>')"></div>
</td>
</tr>
</table>
</div> <!-- .line -->
<?php } ?> 
</form>
<script>
function deletePost(id){
	document.location.href="functions/delReservation.php?target=" + id;
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
		echo "<script>Alert.render('No Event/s Selected')</script>";
	}else{	
		$implodeID = implode(", ", $id);
		$qDelete = mysql_query("DELETE FROM reserved WHERE id IN(".$implodeID.")") or die ("Error In Deleting Reservation\\nMaintenance Required");
		if(isset($qDelete)){
			echo "<script>Alert.render('Selected Event/s Deleted')</script>";
			echo "
			<script>
				setInterval(
					function(){	window.location='reserved.php' },2000
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