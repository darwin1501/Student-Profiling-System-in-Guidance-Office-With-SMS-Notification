

<div class="collapsible-header orange lighten-1"><b class="orange-text text-darken-4"><h4>Grade 9</h4></b></div>
<div class="collapsible-body">
<div class="row">
		<div class=" col s1 card light-blue darken-4" style="width:15%; height: 100px;">
			<div class="white-text" style="padding-left:15px;">
				<ul>
					<li><h4><?php echo $total_count_of_male_GRD9; ?></h4></li>
					<li><p>Male</p></li>
				</ul>
			</div>
		</div>
		<div class=" col s1 card red darken-1" style="width:15%; height:100px; margin-left:2%;">
			<div class="white-text" style="padding-left:15px;">
				<ul>
					<li><h4><?php echo $total_count_of_female_GRD9; ?></h4></li>
					<li><p>Female</p></li>
				</ul>
			</div>
		</div>
		<div class=" col s1 push-s1 card green darken-1" style="width:15%; height: 100px; margin-left:2%;">
			<div class=" white-text" style="padding-left:15px;">
				<ul>
					<li>
						<h4>
						<?php echo $total_count_of_minor_GRD9; ?>
						</h4>
					</li>
					<li>
						<p>Minor</p>
					</li>
				</ul>
			</div>
		</div>
		<div class=" col s1 push-s1 card yellow darken-3" style="width:15%; height: 100px; margin-left:2%;">
			<div class=" white-text" style="padding-left:15px;">
				<ul>
					<li>
						<h4>
						<?php echo $total_count_of_major_GRD9?>
						</h4>
						<li>
							<p>Major</p>
						</li>
					</ul>
				</div>
			</div>
			<div class=" col s1 push-s1 card blue darken-1" style="width:15%; height: 100px; margin-left:2%;">
				<div class=" white-text" style="padding-left:15px;">
					<ul>
						<li>
							<h4 >
							<?php echo $total_violation_GRD9;?>
							</h4>
						</li>
						<li>
							<p >Total Violation</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<br>
		<br>
<!-- put this inside the collabsible -->
	<button class="btn_export_grd9 tooltipped" type="button" data-position="right" data-delay="50" data-tooltip="Export to Excel"><i class="fa fa-file-alt fa-4x icon-pad-5" style="color:#4caf50"></i></button>

<!-- collasible start body -->
					<table class="striped tbl_export_grd9">
						<thead>
							<th class="noExl">id</th>
							<th>Section</th>
							<th>Male</th>
							<th>Female</th>
							<th>Minor Violation</th>
							<th>Major Violation</th>
							<th>Total Violation</th>
							<th class="noExl">Action</th>
						</thead>
						<tbody>

			<?php 

			// this will select all section in grade 7
			$section = mysqli_query($con, "SELECT * FROM `grd9` ORDER BY section ASC");

			//check if there is result
			if(mysqli_num_rows($section) > 0){

				//loop the data inside the grd7 table
				while($row = mysqli_fetch_array($section)) { ?>

				<!-- loop the condition -->

				<!-- select all violation from the given date -->
			<?php	$query_grd9	= mysqli_query($con, 	"SELECT * FROM std_violation INNER JOIN grd9 ON std_violation.v_sec = grd9.section WHERE v_sec = '".$row['section']."'  AND v_grd = 9 AND v_date BETWEEN '$result_date_from' AND '$result_date_to' "); 
				// count all violation
				$total_violation_grd9 = mysqli_num_rows($query_grd9);

				//select all male student from the given date
				$male_grd9 = mysqli_query($con, 	"SELECT * FROM std_prf INNER JOIN std_violation ON std_prf.lrn = std_violation.lrn WHERE v_sec = '".$row['section']."' AND gen = 'male'  AND v_grd = 9 AND v_date BETWEEN '$result_date_from' AND '$result_date_to' "); 
				// count all male student
				$result_male_grd9 = mysqli_num_rows($male_grd9);

				//select all female student from the given date
				$female_grd9 = mysqli_query($con, 	"SELECT * FROM std_prf INNER JOIN std_violation ON std_prf.lrn = std_violation.lrn WHERE v_sec = '".$row['section']."' AND gen = 'female' AND v_grd = 9 AND v_date BETWEEN '$result_date_from' AND '$result_date_to' "); 
				// count all female student
				$result_female_grd9 = mysqli_num_rows($female_grd9);

				//select all minor violation from the given date
				$minor_grd9 = mysqli_query($con, 	"SELECT * FROM std_prf INNER JOIN std_violation ON std_prf.lrn = std_violation.lrn WHERE v_sec = '".$row['section']."' AND v_type = 'minor' AND v_grd = 9 AND v_date BETWEEN '$result_date_from' AND '$result_date_to' "); 
				// count all minor violation
				$result_minor_grd9 = mysqli_num_rows($minor_grd9);

				//select all major violation from the given date
				$major_grd9 = mysqli_query($con, 	"SELECT * FROM std_prf INNER JOIN std_violation ON std_prf.lrn = std_violation.lrn WHERE v_sec = '".$row['section']."' AND v_type = 'major' AND v_grd = 9 AND v_date BETWEEN '$result_date_from' AND '$result_date_to' "); 
				// count all major
				$result_major_grd9 = mysqli_num_rows($major_grd9);
			?>


								<!--  all data goes here -->
								<tr>
					 				<td class="noExl">
					 				<?php echo $row['grd9_id'];?>	
					 				</td>
					 				<td><?php echo $row['section'];?></td>
					 				<td><?php echo $result_male_grd9; ?></td>
					 				<td><?php echo $result_female_grd9; ?></td>
					 				<td><?php echo $result_minor_grd9; ?></td>
					 				<td><?php echo $result_major_grd9; ?></td>
					 				<td><?php echo $total_violation_grd9;?></td>
					 				<td class="noExl">
								 		<a type="button" href="../generate_report/generate.php?grd9=1&section=<?php echo $row["section"];?>" target ="_blank" class ="tooltipped" data-position="right" data-delay="50" data-tooltip="View">
								 			<i class="fa fa-eye fa-2x icon-pad-5" style="color:#6200ea"></i>
			    						</a>
					 				</td>
					 			</tr>
										<?php	

										} // end while

						} ?> <!-- end if -->

						</tbody>
					</table>

<!-- collasible end body -->

</div>