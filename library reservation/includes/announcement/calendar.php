<?php
	include "functions/conn.php";
?>
	<script>
			function goLastMonth(month, year){
				if(month == 1){
					--year;
					month = 13;
				}
				--month
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if(monthlength <= 1){
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			}
			
			function goNextMonth(month, year){
				if(month == 12){
					++year;
					month = 0;
				}
				++month
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if(monthlength <= 1){
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			}
		</script>
		<?php
		date_default_timezone_set("Asia/Manila");
		if(isset($_GET['day'])){
			$day = $_GET['day']; 
		}else{
			$day = date("j");
		}
		
		if(isset($_GET['month'])){
			$month = $_GET['month'];
		}else{
			$month = date("n");
		}
		
		if(isset($_GET['year'])){
			$year = $_GET['year'];
		}else{
			$year = date("Y");
		}
				
			$currentTimeStamp = strtotime("$year-$month-$day");
			$monthName = date("F", $currentTimeStamp);
			$numDays = date("t", $currentTimeStamp);
			$counter = 0;
		?>
	
<div id="calendar">
<br />
<div id="legend">
	<center><h4><u>Color Code</u></h4></center>
	<br />
	<center><sub>Today :</sub></center>
	<center><img src="img/today.png" width="30" style="border:solid 1px;"/></center><p style="font-size: 8px;">&nbsp;</p>
	<hr />
	<center><sub>Reserved :</sub></center>
	<center><img src="img/event.png" width="30" style="border:solid 1px;"/></center><p style="font-size: 8px;">&nbsp;</p>
	<hr />
	<center><sub>Pending :</sub></center>
	<center><img src="img/pending.png" width="30" style="border:solid 1px;"/></center>
	<hr />
	<center><sub>Reserved / Pending :</sub></center>
	<center><img src="img/double.png" width="30" style="border:solid 1px;"/></center>
</div>
		<table border='1'>
			<tr>
				<td>
	<input type='button' class="calendarBtn" title="Previous Month" value='Prev' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)">
				</td>
				<td colspan='5'><?php echo $monthName.", ".$year; ?></td></td>
				<td>
	<input type='button' class="calendarBtn" title="Next Month" value='Next' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year?>)">
				</td>
			</tr>
			
			<tr>
				<td width='50px'>Sun</td>
				<td width='50px'>Mon</td>
				<td width='50px'>Tue</td>
				<td width='50px'>Wed</td>
				<td width='50px'>Thu</td>
				<td width='50px'>Fri</td>
				<td width='50px'>Sat</td>
			</tr>
			<?php
				echo "<tr>";
				
				for($i = 1; $i < $numDays+1; $i++, $counter++){
					$timeStamp = strtotime("$year-$month-$i");
					if($i == 1){
						$firstDay = date("w", $timeStamp);
						for($j = 0; $j < $firstDay; $j++, $counter++){
							echo "<td>&nbsp;</td>";
						}//for($j = 0; $j < $firstDay; $j++, $counter++)
					}//if($i == 1)
					if($counter % 7 == 0){
						echo "</tr><tr>";
					}//if($counter % 7 == 0)
					$monthstring = $month;
					$monthlength = strlen($monthstring);
					$daystring = $i;
					$daylength = strlen($daystring);
					if($monthlength <= 1){
						$monthstring = "0".$monthstring;
					}
					if($daylength <= 1){
						$daystring = "0".$daystring;
					}
					$todaysDate = date("Y-m-d");
					$dateToCompare = $year.'-'.$monthstring.'-'.$daystring;
					$dateEvent = date('M. d, Y',strtotime($dateToCompare));
					echo "<td align='center' ";
					
					//highlighting today's date'
					if($todaysDate == $dateToCompare){
						echo "class='today' title='Today'";
					
					}else{
					$dateEvent = date('M. d, Y',strtotime($dateToCompare));
						$sqlCount = "SELECT * FROM reserved WHERE date='".$dateEvent."' AND status='Pending'";
						$sqlCount2 = "SELECT * FROM reserved WHERE date='".$dateEvent."' AND status='Approved'";
						$pending_eventNum = mysql_num_rows(mysql_query($sqlCount));
						$approved_eventNum = mysql_num_rows(mysql_query($sqlCount2));
						if($pending_eventNum >= 1 && $approved_eventNum >= 1){
							echo "class='double' title='View Reserved and Pending Event'";
						}elseif($approved_eventNum >= 1){
							echo "class='event' title='View Reserved Event'";
						}elseif($pending_eventNum >= 1){
							echo "class='pending' title='View Pending Event'";
						}
					}
					
					echo "><a class='days' name='day' href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
				}//for($i = 1; $i < $numDays+1; $i++, $counter++)
				
				echo "</tr>";
			?>
		</table><br />
</div><br />
<?php
$dateSelected = $year."-".$month."-".$day;
date_default_timezone_set("Asia/Manila");
$date_conv = date('M. d, Y',strtotime($dateSelected));
$viewDate = date('F d, Y',strtotime($dateSelected));
$now = date('F d, Y');

	$sqlEvent = "SELECT * FROM reserved WHERE date='".$date_conv."'";
	$resultEvent = mysql_query($sqlEvent);

	if(isset($_GET['day'])){
		echo '<center><h2>Date Selected : <b>'.$viewDate.'</b></h2></center>';
	}
	while($events = mysql_fetch_array($resultEvent)){
		$name = $events['name'];
		$eventDB = $events['event'];
		$time = $events['time'];
		$cname = $events['cname'];
		$offer = $events['offer'];
		$mr = $events['mr'];
		$mrs = $events['mrs'];
		$status = $events['status'];
	if($eventDB == "personal study"){
?>	
	<div id="sched">
		<table border="0" class="view_event_table">
			<tr>
				<td width="200">Reservation Status :</td>
				<td><b><?php echo ucwords($status) ?></b></td>
			</tr>
			<tr>
				<td width="200">Seat Number :</td>
				<td><b><?php echo $eventDB ?></b></td>
			</tr>
			<tr>
				<td width="200">Reserved By :</td>
				<td><b><?php echo $name ?></b></td>
			</tr>
			<tr>
				<td width="200">Time :</td>
				<td><b><?php echo $time ?></b></td>
			</tr>
			<tr>
				<td width="200">Seat 1 :</td>
				<td><b><?php echo $cname ?></b></td>
			</tr>
			<tr>
				<td width="200">Room Name :</td>
				<td><b><?php echo $mr ?></b></td>
			</tr>
			<tr>
				<td width="200">Floor Number :</td>
				<td><b><?php echo $mrs ?></b></td>
			</tr>
		</table>
	</div>
<?php
 	}elseif($eventDB == "Personal Study"){
 ?>
 	<div id="sched">
		<table border="0" class="view_event_table">
			<tr>
				<td width="200">Reservation Status :</td>
				<td><b><?php echo ucwords($status) ?></b></td>
			</tr>
			<tr>
				<td width="200">Seat Number :</td>
				<td><b><?php echo $eventDB ?></b></td>
			</tr>
			<tr>
				<td width="200">Reserved By :</td>
				<td><b><?php echo $name ?></b></td>
			</tr>
			<tr>
				<td width="200">Time :</td>
				<td><b><?php echo $time ?></b></td>
			</tr>
		</table>
	</div>
<?php
 	}elseif($eventDB == "Burial"){
 ?>
  	<div id="sched">
		<table border="0" class="view_event_table">
			<tr>
				<td width="200">Reservation Status :</td>
				<td><b><?php echo ucwords($status) ?></b></td>
			</tr>
			<tr>
				<td width="200">Seat Number :</td>
				<td><b><?php echo $eventDB ?></b></td>
			</tr>
			<tr>
				<td width="200">Reserved By :</td>
				<td><b><?php echo $name ?></b></td>
			</tr>
			<tr>
				<td width="200">Time :</td>
				<td><b><?php echo $time ?></b></td>
			</tr>
			<tr>
				<td width="200">Room Status :</td>
				<td><b><?php echo $offer ?></b></td>
			</tr>
		</table>
	</div>
<?php
 	}else{
 ?>
  	<div id="sched">
		<table border="0" class="view_event_table">
			<tr>
				<td width="200">Reservation Status :</td>
				<td><b><?php echo ucwords($status) ?></b></td>
			</tr>
			<tr>
				<td width="200">Seat Number :</td>
				<td><b><?php echo $eventDB ?></b></td>
			</tr>
			<tr>
				<td width="200">Reserved By :</td>
				<td><b><?php echo $name ?></b></td>
			</tr>
			<tr>
				<td width="200">Time :</td>
				<td><b><?php echo $time ?></b></td>
			</tr>
		</table>
	</div>
<?php  }} ?>
<br />