
		<div class="row">
			<div class="input-field col s12">
				<input name="violation" list="all_violation" type="text" style="font-size:20px;" required>
				<label for="first_name">
					Violation
				</label>
				<datalist id="all_violation">
				<?php
				$all_violation = mysqli_query($con, "SELECT * FROM `all_violation`");
				 if(mysqli_num_rows($all_violation) > 0){
					 	while($row = mysqli_fetch_array($all_violation)) { ?>
			   			 <option value="<?php echo $row['violation']; ?>">

							<?php	} 
						} ?>
			  </datalist>
			</div>
		</div>
		<div class="row">
			<label class="col s3">Grade Level</label>
		</div>
		<div class="row">
			<select id="gradeLevel" name="v_grd" class="browser-default font40 col s12 " required=""><!-- grade level-->
				<option>--Select--</option>
				<option value="7">Grade7</option>
				<option value="8">Grade8</option>
				<option value="9">Grade9</option>
				<option value="10">Grade10</option>
			</select>
		</div>
		<div class="row">
			<label class="col s3">Section</label>
		</div>
		<div class="row">
			<select id="section" name="v_sec" class="browser-default font40 col s12 " required=""> 
			</select>
		</div>
		<div class="row">
			<div class="input-field col s4">
				<input name="rfc_bk" type="text" style="font-size:20px;" required>
				<label for="first_name">
					Reference Book
				</label>
			</div>
			<div class="input-field col s6 push-s1">
				<input name="v_date" id="buildDate" type="date" style="font-size:20px;" class="datepicker picker__input"  required>
				 <label for="buildDate" data-error="fill in date" data-success="right" class="">Date</label>
			</div>
		</div>
		<div class="row">
			<div class="col l12 m12">
				<p class="tooltipped" data-position="left" data-delay="50" 
					data-tooltip="Check this if you want to notify parents">
					<input name="notify" type="checkbox" class="filled-in" id="filled-in-box" />
					<label for="filled-in-box">Notify the parents?</label>
				</p>
			</div>
		</div>

		


 