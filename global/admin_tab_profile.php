      <div class="row" style="margin-top:60px;"> <!-- tab row-->
    	<div class="col s12">
	      <ul class="tabs">
	      	<!-- TAB -->
		        <li class="tab col s6">
		        	<a href="#test1" class="active"><b><h5>Profile</h5></b></a>
		        </li>
		        <li class="tab col s6">
		        	<a href="#test2"><b><h5>Violation</h5></b></a>
		        </li>
	      </ul>
   		</div>
    <!-- ################ PROFILE ##################### -->
    <div id="test1" class="col s10 push-s1" style="margin-top:5%;"> <!-- profile content-->
    	<div class="row">
			<div class="col s3">
				<a href="admin_edit_student.php">
					<button class="btn blue">Edit Profile</button>
				</a>
			</div>
		</div>
    	<div class="row">
			<span class="col s3 text-font">
				<b>LRN:</b>&nbsp;<?php echo $result['lrn'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s5 text-font">
				<b>Fullname:</b>&nbsp;<?php echo $result['full_name'];?>
			</span>
			<span class="col s2 text-font">
				<b>Age:</b>&nbsp;<?php echo $diff->format('%y');?>
			</span>
			<span class="col s1 push-s1 text-font">
				<b>Gender:</b>&nbsp;<?php echo $result['gen'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s4 text-font">
				<b>Date of Birth:</b>&nbsp;<?php echo $result['dob'];?>
			</span>
			<span class="col s4 push-s1 text-font">
				<b>Nationality:</b>&nbsp;<?php echo $result['nat'];?>
			</span>
			<span class="col s4 text-font">
				<b>Religion:</b>&nbsp;<?php echo $result['rel'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s11 text-font">
				<b>Address:</b>&nbsp;<?php echo $result['addr'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s11 text-font">
				<b>Telephone/cellphone No:</b>&nbsp;<?php echo $result['tel'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s5 text-font">
				<b>Father:</b>&nbsp;<?php echo $result['fathers_name'];?>
			</span>
			<span class="col s2 text-font">
				<b>Age:</b>&nbsp;<?php echo $result['fathers_age'];?>
			</span>
			<span class="col s4 push-s1 text-font">
				<b>Occupation:</b>&nbsp;<?php echo $result['fathers_occu'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s5 text-font">
				<b>Mother:</b>&nbsp;<?php echo $result['mothers_name'];?>
			</span>
			<span class="col s2 text-font">
				<b>Age:</b>&nbsp;<?php echo $result['mothers_age'];?>
			</span>
			<span class="col s4 push-s1 text-font">
				<b>Occupation:</b>&nbsp;<?php echo $result['mothers_occu'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s4 text-font">
				<b>No. of Child:</b>&nbsp;<?php echo $result['no_of_child'];?>
			</span>
			<span class="col s4 push-s1 text-font">
				<b>No. of Boys:</b>&nbsp;<?php echo $result['no_of_boys'];?>
			</span>
			<span class="col s4 text-font">
				<b>No. of Girls:</b>&nbsp;<?php echo $result['no_of_girls'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s5 text-font">
				<b>Siblings Position:</b>&nbsp;<?php echo $result['sib_pos'];?>
			</span>
			<span class="col s5 text-font">
				<b>Living With Whom:</b>&nbsp;<?php echo $result['lvg_whom'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s12 text-font">
				<b>Elementary School Graduated From:</b>&nbsp;<?php echo $result['elem_school'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s5 text-font">
				<b>School Year:</b>&nbsp;<?php echo $result['elem_sy'];?>
			</span>
		</div>
		<br>
		<div class="divider"></div>
		<br>
		<label><h5>Schools Attended</h5></label>
		<br>
		<br>
		    <?php 
 //find student violation
$find_lrn = mysqli_query($con, "SELECT * FROM other_sch WHERE lrn = '".$result['lrn']."'");

while ($row = mysqli_fetch_array($find_lrn)) { ?>
		<div class="row">
			<span class="col s10 text-font">
				<b>School:</b>&nbsp;<?php echo $row['other_sch_name'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s5 text-font">
				<b>Section:</b>&nbsp;<?php echo $row['other_sec'];?>
			</span>
			<span class="col s6 text-font">
				<b>Grade:</b>&nbsp;<?php echo $row['other_grd'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s6 text-font">
				<b>School Year:</b>&nbsp;<?php echo $row['other_sy'];?>
			</span>
			<span class="col s6 pull-s1 text-font">
				<b>Adviser:</b>&nbsp;<?php echo $row['other_cls_ad'];?>
			</span>
		</div>
		<br>
		<div class="divider"></div>
		<br>
 <?php } ?>
    </div><!-- end profile content -->
    <!-- ################# VIOLATION ##################### -->
    <div id="test2" class="col s12 push-s1" style="margin-top:5%;">
    	<!-- violation content here-->
    	<div class="row">
			<div class="col s4 push-s7">
				<a href="admin_violation_page.php">
					<button class="btn blue">Edit Offenses</button>
				</a>
			</div>
    	</div>
    <?php 
 //find student violation ordered by date
	$find_lrn = mysqli_query($con, "SELECT * FROM std_violation WHERE lrn = '".$result['lrn']."' ORDER BY v_date DESC");

while ($row = mysqli_fetch_array($find_lrn)) { 

//Select All Section
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
	<div class="row">
			<span class="col s12 text-font">
				<b>Violation:</b>&nbsp;<?php echo $row['violation'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s12 text-font">
				<b>Violation Type:</b>&nbsp;<?php echo $row['v_type'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s2 text-font">
				<b>Grade:</b>&nbsp;<?php echo $row['v_grd'];?>
			</span>
			<span class="col s6 text-font">
				<b>Section:</b>&nbsp;<?php echo $row['v_sec'];?>
			</span>
			<span class="col s3 pull-s2 text-font">
				<b>Date:</b>&nbsp;<?php echo $row['v_date'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s4 text-font">
				<b>Reference Book:</b>&nbsp;<?php echo $row['rfc_bk'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s4 text-font">
				<b>Adviser:</b>&nbsp;<?php echo $adviser['adviser'];?>
			</span>
		</div>
		<br>
		<div class="divider"></div>
		<br>
<?php } ?>
</div>
  </div> <!-- tab end row-->