<center><h1 class="title">Confirm Reservation</h1></center>
				
		<details>
			<summary class="sum">
			<script>
				if (window.chrome){ document.write('<img src="../admin/img/arrow.png" width="20" height="20"/>'); }
			</script>	
			&nbsp;&nbsp;<?php echo $forQ ?>
			</summary><br />
			<center>
			<textarea readonly class="textareaOutput"><?php echo $reQ; ?></textarea><br /><br />
			</center>
			<center>			
			<?php 
			
			if($forQ == "personal study"){
				echo "";
			}elseif($forQ == "Free WIFI"){
				echo "";
			}elseif($forQ == "Discussion Room"){
				echo "";	
			}else{
				echo "";
			}	
			?>
			
			<p style="font-size: 8px;">&nbsp;</p><hr width="90%">
			</center>
		</details>	
			
		