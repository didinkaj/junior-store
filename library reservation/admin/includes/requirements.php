 <div id="requirements"><br />
	<div id="input">
		<?php
			$query = mysql_query("SELECT * FROM requirements WHERE required='Empty'");
			$num_query = mysql_num_rows($query);
			
			if($num_query == 0){
				echo "";
			}else{
				echo '
					<center><a href="emptyreq.php" style="color: #000;border: solid 2px; padding: 10px;">' .$num_query.' Empty Requirements (Click to update) </a></center>
					<br/>
				';
			}
		?>
	</div>
	
	<div id="output">
		<?php
			$query = mysql_query("SELECT * FROM requirements ORDER BY id DESC");
			while($getQ = mysql_fetch_array($query)){
				$idQ = $getQ[0];
				$forQ = $getQ[1];
				$reQ = $getQ[2];
				
				$deleteLink = '&nbsp; <a href="functions/delReq.php?target=<?php echo $idQ; ?>" title="Delete requirement info.">
			<img src="img/remove.png" width="25" height="25"/>
			<sup class="hideme">Delete</sup>
			</a>';
		
		?>				
		<details>
			<summary class="sum">
			<script>
				if (window.chrome){ document.write('<img src="img/arrow.png" width="20" height="20"/>'); }
			</script>	
			&nbsp;&nbsp;<?php echo $forQ ?>
			</summary><br />
			
			<textarea readonly class="textareaOutput"><?php echo $reQ; ?></textarea><br /><br />
			
			<center>			
			<?php 
			
			if($forQ == "personal study room"){
				echo "";
			}elseif($forQ == "Burial"){
				echo "";
			}elseif($forQ == "Christening"){
				echo "";	
			}else{
				echo "";
			}	
			?>
			
			
			
			<a href="editReq.php?target=<?php echo $idQ; ?>" title="Edit requirement info.">
			<img style="border: solid 1px;" src="img/edit.png" width="25" height="25"/>
			 <label style="color: #000;">Edit</label> 
			<!-- <sup class="hideme">Edit</sup> -->
			</a>
			
			<p style="font-size: 8px;">&nbsp;</p><hr width="90%">
			</center>
		</details>	
			
		<?php }	?>
	</div>
</div>
<br />	 