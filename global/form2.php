	<div class="row">
		<div class="input-field col s6">
			<input name="lrn" type="text" data-length="12" value="<?php echo $arr2['lrn'];?>">
			<label for="first_name">LRN</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col s6">
			<input name="fullname" type="text" class="validate" value="<?php echo $arr2['full_name'];?>" required>
			<label for="first_name">Fullname</label>
		</div>
		<div class="input-field col s2">
			<select name="gender">
				<option value="<?php echo $arr2['gen'];?>"><?php echo $arr2['gen'];?></option>
				<option value="male">male</option>
				<option value="female">female</option>
			</select>
		</div>
		</div> <!-- end of row-->
		<div class="row">
			<div class="input-field col s4">
				<input name="dob" type="text" class="datepicker" value="<?php echo $arr2['dob'];?>">
				<label for="first_name">Date of Birth</label>
			</div>
			<div class="input-field col s4">
				<input name="nationality" type="text" class="validate" value="<?php echo $arr2['nat'];?>" required>
				<label for="first_name">Nationality</label>
			</div>
			<div class="input-field col s4">
				<input name="religion" type="text" class="validate" value="<?php echo $arr2['rel'];?>" required>
				<label for="first_name">Religion</label>
			</div>
			</div><!-- end of row-->
			<div class="row">
				<div class="input-field col s7">
					<input name="address" type="text" class="validate" value="<?php echo $arr2['addr'];?>" required>
					<label for="first_name">Address</label>
				</div>
				<div class="input-field col s5">
					<input name="telno" type="text" class="validate" value="<?php echo $arr2['tel'];?>" required>
					<label for="first_name">Tel.No</label>
				</div>
				</div><!-- end of row-->
				<div class="row">
					<div class="input-field col s4">
						<input name="father" type="text" class="validate" value="<?php echo $arr2['fathers_name'];?>" required>
						<label for="first_name">Father</label>
					</div>
					<div class="input-field col s1">
						<input name="f_age" type="text" class="validate" value="<?php echo $arr2['fathers_age'];?>" required>
						<label for="first_name">Age</label>
					</div>
					<div class="input-field col s4">
						<input name="f_occu" type="text" class="validate" value="<?php echo $arr2['fathers_occu'];?>" required>
						<label for="first_name">Occupation</label>
					</div>
					</div><!-- end of row-->
					<div class="row">
						<div class="input-field col s4">
							<input name="mother" type="text" class="validate" value="<?php echo $arr2['mothers_name'];?>" required>
							<label for="first_name">Mother</label>
						</div>
						<div class="input-field col s1">
							<input name="m_age" type="text" class="validate" value="<?php echo $arr2['mothers_age'];?>" required>
							<label for="first_name">Age</label>
						</div>
						<div class="input-field col s4">
							<input name="m_occu" type="text" class="validate" value="<?php echo $arr2['mothers_occu'];?>" required>
							<label for="first_name">Occupation</label>
						</div>
						</div><!-- end of row-->
						<div class="row">
						<div class="input-field col s3">
							<input name="no_child" type="text" class="validate" value="<?php echo $arr2['no_of_child'];?>" required>
							<label for="first_name">No. of Childern in the Family</label>
						</div>
						<div class="input-field col s3">
							<input name="no_boys" type="text" class="validate" value="<?php echo $arr2['no_of_boys'];?>" required>
							<label for="first_name">No. of Boys</label>
						</div>
						<div class="input-field col s3">
							<input name="no_girls" type="text" class="validate" value="<?php echo $arr2['no_of_girls'];?>" required>
							<label for="first_name">No. of Girls</label>
						</div>
						</div><!-- end of row-->
						<div class="row">
							<div class="input-field col s3">
								<input name="siblings" type="text" class="validate" value="<?php echo $arr2['sib_pos'];?>" required>
								<label for="first_name">Siblings Position</label>
							</div>
							<div class="input-field col s3">
								<input name="living" type="text" class="validate" value="<?php echo $arr2['lvg_whom'];?>" required>
								<label for="first_name">Living with whom</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s5">
								<input name="elem_grd" type="text" class="validate" value="<?php echo $arr2['elem_school'];?>" required>
								<label for="first_name">Elementary School Graduated from</label>
							</div>
							<div class="input-field col s3">
								<input name="sy" type="text" class="validate" value="<?php echo $arr2['elem_sy'];?>" required>
								<label for="first_name">School Year</label>
							</div>
						</div>
						<div class="row">
						<div class="col s3 push-s9">
							<button class="waves-effect waves-dark blue btn" type="submit">Update</button>
						</div>
					</div>