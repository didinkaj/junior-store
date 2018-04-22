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
	<center><img src="../img/today.png" width="30" style="border:solid 1px;"/></center><p style="font-size: 8px;">&nbsp;</p>
	<hr />
	<center><sub>Reserved :</sub></center>
	<center><img src="../img/event.png" width="30" style="border:solid 1px;"/></center><p style="font-size: 8px;">&nbsp;</p>
	<hr />
	<center><sub>Pending :</sub></center>
	<center><img src="../img/pending.png" width="30" style="border:solid 1px;"/></center>
	<hr />
	<center><sub>Reserved / Pending :</sub></center>
	<center><img src="../img/double.png" width="30" style="border:solid 1px;"/></center>
</div>
		<table border='1' class="calendar_table">
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
				<td width='98'>Sun</td>
				<td width='98'>Mon</td>
				<td width='98'>Tue</td>
				<td width='98'>Wed</td>
				<td width='98'>Thu</td>
				<td width='98'>Fri</td>
				<td width='98'>Sat</td>
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
	$query_approved = mysql_query("SELECT * FROM reserved WHERE date='".$date_conv."' AND status='approved'");
	$resultEvent = mysql_query($sqlEvent);
	$numEvent = mysql_num_rows($resultEvent);
	$num_approved = mysql_num_rows($query_approved);
	
	if(isset($_GET['day'])){
	if($numEvent == 0){
		echo '<center><h3>Date Selected : <b>'.$viewDate.'</b> (No Event)</h3></center>';
	}else{
		if($num_approved > 0){
			echo '<center><h3>Date Selected : <b>'.$viewDate.'</b>
			&nbsp;&nbsp;<a href="printevents.php?date='.$viewDate.'" title="Print Only Approved Event/s" class="submit">Print</a></h3></center>';
			echo '<br/>';
		}else{
			echo '<center><h3>Date Selected : <b>'.$viewDate.'</b></center>';
			echo '<br/>';	
		}
	}
		
	}else{
		echo '<center><h3>Select scheduled date to print</h3></center>';
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
		$uc_status = ucwords($status);
	if($eventDB == "Christening"){
?>	
	<div id="sched">
		<div class="line">
			<div class="left"><label>Event : </label></div>
			<div class="right"><label><b><?php echo $eventDB ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Reservation Status : </label></div>
			<div class="right"><label><b><?php echo $uc_status ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Reserved By : </label></div>
			<div class="right"><label><b><?php echo $name ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Time : </label></div>
			<div class="right"><label><b><?php echo $time ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Name : </label></div>
			<div class="right"><label><b><?php echo $cname ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Father's Name : </label></div>
			<div class="right"><label><b><?php echo $mr ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Mother's Name : </label></div>
			<div class="right"><label><b><?php echo $mrs ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
		</div>
	</div>
<?php
 	}elseif($eventDB == "Wedding"){
 ?>
 	<div id="sched">
		<div class="line">
			<div class="left"><label>Event : </label></div>
			<div class="right"><label><b><?php echo $eventDB ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>

			<div class="left"><label>Reservation Status : </label></div>
			<div class="right"><label><b><?php echo $uc_status ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Reserved By : </label></div>
			<div class="right"><label><b><?php echo $name ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Time : </label></div>
			<div class="right"><label><b><?php echo $time ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
		</div>
	</div>
<?php
 	}elseif($eventDB == "Burial"){
 ?>
  	<div id="sched">
		<div class="line">
			<div class="left"><label>Event : </label></div>
			<div class="right"><label><b><?php echo $eventDB ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>

			<div class="left"><label>Reservation Status : </label></div>
			<div class="right"><label><b><?php echo $uc_status ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
						
			<div class="left"><label>Reserved By : </label></div>
			<div class="right"><label><b><?php echo $name ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Time : </label></div>
			<div class="right"><label><b><?php echo $time ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Deceased : </label></div>
			<div class="right"><label><b><?php echo $offer ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
		</div>
	</div>
<?php
 	}else{
 ?>
 	<div id="sched">
		<div class="line">
			<div class="left"><label>Event : </label></div>
			<div class="right"><label><b><?php echo $eventDB ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>

			<div class="left"><label>Reservation Status : </label></div>
			<div class="right"><label><b><?php echo $uc_status ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
						
			<div class="left"><label>Reserved By : </label></div>
			<div class="right"><label><b><?php echo $name ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
			
			<div class="left"><label>Time : </label></div>
			<div class="right"><label><b><?php echo $time ?></b></label></div>
			<p style="font-size:8px;">&nbsp;</p>
		</div>
	</div>
<?php  }} ?>
<br />