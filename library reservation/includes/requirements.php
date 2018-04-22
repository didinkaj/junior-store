<center><h1 class="title">Reservation Requirements</h1></center>
		<?php
			$query = mysql_query("SELECT * FROM requirements ORDER BY id ASC");
			while($getQ = mysql_fetch_array($query)){
				$idQ = $getQ[0];
				$forQ = $getQ[1];
				$reQ = $getQ[2];	
		?>				
		<details>
			<summary class="sum">
			<script>
				if (window.chrome){ document.write('<img src="admin/img/arrow.png" width="20" height="20"/>'); }
			</script>	
			&nbsp;&nbsp;<?php echo $forQ ?>
			</summary><br />
			<center>
			<textarea readonly class="textareaOutput"><?php echo $reQ; ?></textarea><br /><br />
			</center>
			<center>			
			<?php 
			
			if($forQ == "Wedding"){
				echo "";
			}elseif($forQ == "Burial"){
				echo "";
			}elseif($forQ == "Christening"){
				echo "";	
			}else{
				echo "";
			}	
			?>
			
			<p style="font-size: 8px;">&nbsp;</p><hr width="90%">
			</center>
		</details>	
			
		<?php }	?>