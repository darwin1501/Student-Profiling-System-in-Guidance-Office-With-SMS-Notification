

		<ul class="stepper horizontal non-linear" style="min-height:978px; overflow: hidden;"> <!-- materialize Stepper-->
			<li class="step active"> <!-- ================================First Content here ============= -->
				<div class="step-title waves-effect">Add Student Profile</div>
					<div class="step-content"> 
					<div class="row">
						<div class="input-field col s6">
							<input name="lrn" type="text" data-length="12" class="validate" required>
							<label for="first_name">LRN</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input name="fullname" type="text"  class="validate" required>
							<label for="first_name">Fullname</label>
						</div>
						<div class="input-field col s1">
							<input name="age" type="text" required>
							<label for="first_name">Age</label>
						</div>
						<div class="input-field col s2">
							<!-- <input name="gender" type="text" class="validate" required>
							<label for="first_name">Gender</label> -->
							<select name="gender" required>
								  <option value="" disabled selected>Gender</option>	
							      <option value="male">male</option>
							      <option value="female">female</option>
	    					</select>
						</div>
					</div> <!-- end of row-->
					<div class="row">
						<div class="input-field col s4">
         					 <input name="dob" type="text" class="datepicker">
         					 <label for="first_name">Date of Birth</label>
        				</div>
						<div class="input-field col s4">
							<input name="nationality" type="text" required>
							<label for="first_name">Nationality</label>
						</div>
						<div class="input-field col s4">
							<input name="religion" type="text" required>
							<label for="first_name">Religion</label>
						</div>
					</div><!-- end of row-->
					<div class="row">
						<div class="input-field col s7">
							<input name="address" type="text" required>
							<label for="first_name">Address</label>
						</div>
						<div class="input-field col s5">
							<input name="telno" type="text" required>
							<label for="first_name">Tel.No</label>
						</div>
					</div><!-- end of row-->
					<div class="row">
						<div class="input-field col s4">
							<input name="father" type="text" required>
							<label for="first_name">Father</label>
						</div>
						<div class="input-field col s1">
							<input name="f_age" type="text" required>
							<label for="first_name">Age</label>
						</div>
						<div class="input-field col s4">
							<input name="f_occu" type="text" required>
							<label for="first_name">Occupation</label>
						</div>
					</div><!-- end of row-->
					<div class="row">
						<div class="input-field col s4">
							<input name="mother" type="text" required>
							<label for="first_name">Mother</label>
						</div>
						<div class="input-field col s1">
							<input name="m_age" type="text" required>
							<label for="first_name">Age</label>
						</div>
						<div class="input-field col s4">
							<input name="m_occu" type="text" required>
							<label for="first_name">Occupation</label>
						</div>
					</div><!-- end of row-->
					<div class="row">
						<div class="input-field col s3">
							<input name="no_child" type="text" required>
							<label for="first_name">No. of Childern in the Family</label>
						</div>
						<div class="input-field col s3">
							<input name="no_boys" type="text" required>
							<label for="first_name">No. of Boys</label>
						</div>
						<div class="input-field col s3">
							<input name="no_girls" type="text" required>
							<label for="first_name">No. of Girls</label>
						</div>
					</div><!-- end of row-->
					<div class="row">
						<div class="input-field col s3">
							<input name="siblings" type="text" class="validate" required>
							<label for="first_name">Siblings Position</label>
						</div>
						<div class="input-field col s3">
							<input name="living" type="text" class="validate" required>
							<label for="first_name">Living with whom</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s5">
							<input name="elem_grd" type="text" class="validate" required>
							<label for="first_name">Elementary School Graduated from</label>
						</div>
						<div class="input-field col s3">
							<input name="sy" type="text" class="validate" required>
							<label for="first_name">School Year</label>
						</div>
					</div>
					<div class="step-actions">
						<button class="waves-effect waves-dark btn next-step">Next</button>
					</div>
				</div> 
			</li> <!-- =============================================== End First Content ========================-->
			<li class="step"><!--====================================== Second Content ===========================-->
				<div class="step-title waves-effect optional">Schools Attended</div>
				<label class="left">Optional</label>
				<div class="step-content">
					<div class="row">
						<div class="input-field col s3">
							<input name="school_att1" type="text" >
							<label for="first_name">School</label>
						</div>
						<div class="input-field col s2">
							<input name="sy_att1" type="text" >
							<label for="first_name">School Year</label>
						</div>
						<div class="input-field col s2">
							<input name="grd1" type="text" >
							<label for="first_name">Grade</label>
						</div>
						<div class="input-field col s2">
							<input name="sec1" type="text" >
							<label for="first_name">Section</label>
						</div>
						<div class="input-field col s3">
							<input name="class_ad1" type="text" >
							<label for="first_name">Class Adviser</label>
						</div>
					</div>
					<div class="step-actions">
						<button class="waves-effect waves-dark btn next-step"  style="margin-top:-400px;">Next</button>
						<button class="waves-effect waves-dark btn-flat previous-step"  style="margin-top:-400px;">Back</button>
					</div>
				</div>
			</li><!--===================================== End Second Content ===========================-->
			<li class="step"><!--===================================== Third Content ===========================-->
				<div class="step-title waves-effect">Violation</div>
				<div class="step-content">
					<div class="row">
						<div class="input-field col s3">
							<input name="violation" type="text"  required>
							<label for="first_name">Violation</label>
						</div>
						 <div class="input-field col s2">
		  					<select name="v_type">
							      <option value="minor">minor</option>
							      <option value="major">major</option>
	    					</select>
	    					<label>Violation Type</label>
 						 </div>			
						 <div class="input-field col s3">
         					 <input name="v_date" type="text" class="datepicker">
         					 <label for="first_name">Date</label>
        				</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s3">
							<input name="v_grd" type="text"  required>
							<label for="first_name">Grade</label>
						</div>
						<div class="input-field col s3">
							<input name="v_sec" type="text"  required>
							<label for="first_name">Section</label>
						</div>
        			</div>
        			<div class="row">
						<div class="input-field col s12">
         					 <textarea name= "v_des" id="textarea1" class="materialize-textarea" required></textarea>
         					 <label for="textarea1">Violation Description</label>
       					</div>
					</div>
					    <p class="tooltipped" data-position="left" data-delay="50" data-tooltip="Check this if you want to notify parents">
					      <input name="notify" type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
					      <label for="filled-in-box">Notify the parents?</label>
			   		   </p>
					<div class="step-actions">
						<button class="waves-effect waves-dark btn" type="submit" value="submit" style="margin-top:-300px;">SUBMIT</button> <!-- This button will submit the form-->
						<button class="waves-effect waves-dark btn-flat previous-step"  style="margin-top:-300px;">Back</button>
					</div>
				</div>
			</li>
		</ul> <!-- end of the materialize stepper-->

