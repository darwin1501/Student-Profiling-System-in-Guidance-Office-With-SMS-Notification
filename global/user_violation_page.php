	<br>
	<br>
<?php
					 if(mysqli_num_rows($violation_query) > 0){
					 	while($row = mysqli_fetch_array($violation_query)) { 

					 	// find violation
					 	$violation_type = mysqli_query($con, "SELECT * FROM all_violation WHERE violation = '".$row['violation']."'");

					 	$result = mysqli_fetch_array($violation_type);

					 			
					 	$section_query = mysqli_query($con, "SELECT * FROM all_sec WHERE section = '".$row['v_sec']."'");

					 	$adviser = mysqli_fetch_array($section_query);

					 	//if section was SPA it will search in 4 tables grd7, grd8, grd9, and grd10
					 	if ($row['v_sec'] == 'SPA') {
					 		
					 		if ($row['v_grd'] == 7 ) {
					 			
					 			$find_spa_in_grd7 = mysqli_query($con, "SELECT * FROM grd7 WHERE section = 'SPA'");

					 			$spa_result = mysqli_fetch_array($find_spa_in_grd7);

					 			$adviser['adviser'] = $spa_result['adviser'];
					 		}

					 		if ($row['v_grd'] == 8 ) {
					 			
					 			$find_spa_in_grd7 = mysqli_query($con, "SELECT * FROM grd8 WHERE section = 'SPA'");

					 			$spa_result = mysqli_fetch_array($find_spa_in_grd7);

					 			$adviser['adviser'] = $spa_result['adviser'];
					 		}

					 		if ($row['v_grd'] == 9 ) {
					 			
					 			$find_spa_in_grd7 = mysqli_query($con, "SELECT * FROM grd9 WHERE section = 'SPA'");

					 			$spa_result = mysqli_fetch_array($find_spa_in_grd7);

					 			$adviser['adviser'] = $spa_result['adviser'];
					 		}

					 		if ($row['v_grd'] == 10 ) {
					 			
					 			$find_spa_in_grd7 = mysqli_query($con, "SELECT * FROM grd10 WHERE section = 'SPA'");

					 			$spa_result = mysqli_fetch_array($find_spa_in_grd7);

					 			$adviser['adviser'] = $spa_result['adviser'];
					 		}

					 	}

					 	//if section was SPFL it will search in 4 tables grd7, grd8, grd9, and grd10
					 	if ($row['v_sec'] == 'SPFL') {
					 		
					 		if ($row['v_grd'] == 7 ) {
					 			
					 			$find_spa_in_grd7 = mysqli_query($con, "SELECT * FROM grd7 WHERE section = 'SPFL'");

					 			$spa_result = mysqli_fetch_array($find_spa_in_grd7);

					 			$adviser['adviser'] = $spa_result['adviser'];
					 		}

					 		if ($row['v_grd'] == 8 ) {
					 			
					 			$find_spa_in_grd7 = mysqli_query($con, "SELECT * FROM grd8 WHERE section = 'SPFL'");

					 			$spa_result = mysqli_fetch_array($find_spa_in_grd7);

					 			$adviser['adviser'] = $spa_result['adviser'];
					 		}

					 		if ($row['v_grd'] == 9 ) {
					 			
					 			$find_spa_in_grd7 = mysqli_query($con, "SELECT * FROM grd9 WHERE section = 'SPFL'");

					 			$spa_result = mysqli_fetch_array($find_spa_in_grd7);

					 			$adviser['adviser'] = $spa_result['adviser'];
					 		}

					 		if ($row['v_grd'] == 10 ) {
					 			
					 			$find_spa_in_grd7 = mysqli_query($con, "SELECT * FROM grd10 WHERE section = 'SPFL'");

					 			$spa_result = mysqli_fetch_array($find_spa_in_grd7);

					 			$adviser['adviser'] = $spa_result['adviser'];
					 		}
					 	}

					 													?>
					 <div class="container">
					 	<div class="row">
						 	<p class=" col s1 p-label">
						 			Violation:
						 	</p>
							<p class="col s4" style="margin-left:-15px;">
								<?php echo $row['violation'];?>		
							</p>
							<p class=" col s2 p-label">
						 			Violation Type:
						 	</p>
							<p class="col s1 pull-s1" style="margin-left:20px;">
								<?php echo $result['violation_type'];?>		
							</p>
						</div>
						<div class="row">	
							<p class=" col s1 p-label ">
							 			Grade:
							 </p>
							 <p class="col s3 pull-s1 " style="margin-left:50px;">
									<?php echo $row['v_grd'];?>		
							</p>
							<p class="col s2 pull-s2 p-label" style="margin-left:18px;">
								Section:
							</p>
							<p class="col s2  pull-s4" style="margin-left:55px;">
									<?php echo $row['v_sec'];?>		
							</p>

							<p class="col s2  pull-s4">
								<span class="p-label">Date:</span> <?php echo $row['v_date'];?>	
							</p>
						<div class="row">
							<p class="col s2 p-label ">
								Adviser:
							</p>
							<p class="col s4 pull-s1">
								<?php echo $adviser['adviser'];?>		
							</p>
						</div>
						<div class="row">
							<p class="col s3 ">
								<span class="p-label">Reference Book:&nbsp;</span><?php echo $row['rfc_bk'];?>	
							</p>
						</div>
						<div class="row">
							<?php  
							if ($row['status'] == 1) {
								echo "<div class='green white-text' 
								            style='width:120px; 
										    height:auto; 
										    padding-left:10px;
										    border-radius:10px;'>
										    	<b>notification sent</b>
									   </div>
									";
							}else{
								echo "<div class='red white-text' 
										   style='width:150px; 
										   height:auto; 
										   padding-left:10px;
										   border-radius:10px'>
										   		<b>notification not sent!</b>
									  </div>
									";
									?>
								<a href="user_violation_page.php?send=1&violation_id=<?php echo $row["violation_id"];?>">
										<div class ="btn blue white-text"
											style ='margin-top:20px;'>
										Send Now?
									 	 </div>
									  </a>
						<?php			  	
							}
							?>
						</div>
						
						<div class="row">
							<div class="col s2 push-s7">
						<a href="user_edit_student.php?edit2=1&violation_id=<?php echo $row["violation_id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Edit">
   						   <i class="fa fa-pencil-alt fa-2x icon-pad-5" style="color:#4caf50; margin-left:10px;"></i>
    					</a>
    						</div>	
    				</div>
    			</div>
    		</div>
						<br>
						<div class="divider"></div>
					<?php 
						}
					}else{
						echo "No Violation found";				
					}?>