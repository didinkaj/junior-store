 <div id="requirements"><br />	
	<div id="output">
		<?php
			$query = mysql_query("SELECT * FROM requirements WHERE required='Empty' ORDER BY id DESC");
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
			<img src="img/arrow.png" width="20" height="20"/>
			&nbsp;&nbsp;<?php echo $forQ ?>
			</summary><br />
			
			<textarea readonly class="textareaOutput"><?php echo $reQ; ?></textarea><br /><br />
			
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