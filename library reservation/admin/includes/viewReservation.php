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
	$target = $_GET['target'];
	
	$query_target = mysql_query("SELECT * FROM reserved WHERE id='$target'");
	$filter_target = mysql_num_rows($query_target);
	$array = mysql_fetch_array($query_target);

	if($filter_target == 0){
		echo "<script>window.location='reserved.php'</script>";
	}else{
	
	if($array['event'] == "Wedding"){
?>	
	<div class="view">
		<center><h2>Reserved Event : <b><?php echo $array['event'] ?></b> </h2></center>
		
		<br /><center><hr width="70%"/></center>
		
		<table border="0" class="view_table">
			<tr>
				<td width="200">Reservation Date : </td>
				<td><b><?php echo $array['date'] ?></b></td>
			</tr>
			
			<tr>
				<td>Reservation Time : </td>
				<td><b><?php echo $array['time'] ?></b></td>
			</tr>
			
			<tr>
				<td>Wedding Class : </td>
				<td><b><?php echo $array['offer'] ?></b></td>
			</tr>
			
			<tr>
				<td>Address : </td>
				<td><b><?php echo $array['address'] ?></b></td>
			</tr>
			
			<tr>
				<td>Submitted Date : </td>
				<td><b><?php echo $array['dateAdded'] ?></b></td>
			</tr>
			
			<tr>
				<td>Reserved By : </td>
				<td><b><?php echo strtoupper($array['name']) ?></b></td>
			</tr>
		</table>
	</div>
	
	<br/><center><hr width="63%"/></center><br/>
	
	<div style="width: 350px; margin-left: auto; margin-right: auto;">
	<center>
	<a href="functions/delReservation.php?target=<?php echo $target ?>">
	<div class="linkbtn">
		Delete
	</div>
	</a>
		
	<a href="reserved.php">
	<div class="linkbtn">
		Back
	</div>
	</a>	
	</center>
	</div>
<?php		
	}elseif($array['event'] == "Burial"){	
?>	
	<div class="view">
		<center><h2>Reserved Event : <b><?php echo $array['event'] ?></b> </h2></center>
		
		<br /><center><hr width="70%"/></center>
		
		<table border="0" width="500" class="view_table">
			<tr>
				<td width="200">Reservation Date : </td>
				<td><b><?php echo $array['date'] ?></b></td>
			</tr>
			
			<tr>
				<td>Reservation Time : </td>
				<td><b><?php echo $array['time'] ?></b></td>
			</tr>
			
			<tr>
				<td>Name of Deceased : </td>
				<td><b><?php echo $array['offer'] ?></b></td>
			</tr>
			
			<tr>
				<td>Address : </td>
				<td><b><?php echo $array['address'] ?></b></td>
			</tr>
			
			<tr>
				<td>Submitted Date : </td>
				<td><b><?php echo $array['dateAdded'] ?></b></td>
			</tr>
			
			<tr>
				<td>Reserved By : </td>
				<td><b><?php echo strtoupper($array['name']) ?></b></td>
			</tr>
		</table>
	</div>
	
	<br/><center><hr width="63%"/></center><br/>
	
	<div style="width: 350px; margin-left: auto; margin-right: auto;">
	<center>
	<a href="functions/delReservation.php?target=<?php echo $target ?>">
	<div class="linkbtn">
		Delete
	</div>
	</a>
		
	<a href="reserved.php">
	<div class="linkbtn">
		Back
	</div>
	</a>	
	</center>
	</div>
<?php		
	}elseif($array['event'] == "Christening"){	
?>	
	<div class="view">
		<center><h2>Reserved Event : <b><?php echo $array['event'] ?></b> </h2></center>
		
		<br /><center><hr width="70%"/></center>
		
		<table border="0" width="500" class="view_table">
			<tr>
				<td width="200">Reservation Date : </td>
				<td><b><?php echo $array['date'] ?></b></td>
			</tr>
			
			<tr>
				<td>Reservation Time : </td>
				<td><b><?php echo $array['time'] ?></b></td>
			</tr>
			
			<tr>
				<td>Baptismal Name : </td>
				<td><b><?php echo $array['cname'] ?></b></td>
			</tr>
			
			<tr>
				<td>Father's Name : </td>
				<td><b><?php echo $array['mr'] ?></b></td>
			</tr>
			
			<tr>
				<td>Mother's Name : </td>
				<td><b><?php echo $array['mrs'] ?></b></td>
			</tr>
			
			<tr>
				<td>Address : </td>
				<td><b><?php echo $array['address'] ?></b></td>
			</tr>
			
			<tr>
				<td>Submitted Date : </td>
				<td><b><?php echo $array['dateAdded'] ?></b></td>
			</tr>
			
			<tr>
				<td>Reserved By : </td>
				<td><b><?php echo strtoupper($array['name']) ?></b></td>
			</tr>
		</table>
	</div>
	
	<br/><center><hr width="63%"/></center><br/>
	
	<div style="width: 350px; margin-left: auto; margin-right: auto;">
	<center>
	<a href="functions/delReservation.php?target=<?php echo $target ?>">
	<div class="linkbtn">
		Delete
	</div>
	</a>
		
	<a href="reserved.php">
	<div class="linkbtn">
		Back
	</div>
	</a>	
	</center>
	</div>
<?php		
	}else{	
?>
	<div class="view">
		<center><h2>Reserved Event : <b><?php echo $array['event'] ?></b> </h2></center>
		
		<br /><center><hr width="70%"/></center>
		
		<table border="0" width="500" class="view_table">
			<tr>
				<td width="200">Reservation Date : </td>
				<td><b><?php echo $array['date'] ?></b></td>
			</tr>
			
			<tr>
				<td>Reservation Time : </td>
				<td><b><?php echo $array['time'] ?></b></td>
			</tr>
			
			<tr>
				<td>Address : </td>
				<td><b><?php echo $array['address'] ?></b></td>
			</tr>
			
			<tr>
				<td>Submitted Date : </td>
				<td><b><?php echo $array['dateAdded'] ?></b></td>
			</tr>
			
			<tr>
				<td>Reserved By : </td>
				<td><b><?php echo strtoupper($array['name']) ?></b></td>
			</tr>
		</table>
	</div>
	
	<br/><center><hr width="63%"/></center><br/>
	
	<div style="width: 350px; margin-left: auto; margin-right: auto;">
	<center>
	<a href="functions/delReservation.php?target=<?php echo $target ?>">
	<div class="linkbtn">
		Delete
	</div>
	</a>
		
	<a href="reserved.php">
	<div class="linkbtn">
		Back
	</div>
	</a>	
	</center>
	</div>
<?php		
	}}
?>

</div>