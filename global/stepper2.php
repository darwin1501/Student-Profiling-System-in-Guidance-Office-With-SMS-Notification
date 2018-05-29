

		<ul class="stepper horizontal" style="min-height:1078px;"> <!-- materialize Stepper-->
			<li class="step active"> <!-- ================================First Content here ============= -->
				<div class="step-title waves-effect">Student Profile</div>
					<div class="step-content"> 
					<div class="row">				
						<div class="input-field col s6">
							<input name="lrn" type="text" value="<?php echo $arr2['lrn'];?>">
							<label for="first_name">LRN</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input name="fullname" type="text" class="validate" value="<?php echo $arr2['full_name'];?>" required>
							<label for="first_name">Fullname</label>
						</div>
						<div class="input-field col s1">
							<input name="age" type="text" class="validate" value="<?php echo $arr2['age'];?>" required>
							<label for="first_name">Age</label>
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
					<div class="button-float">
						<button class="waves-effect waves-dark blue btn" style="margin-top:-1950px;" type="submit">Update</button>
					</div>
				</div> 
			</li> <!-- =============================================== End First Content ========================-->
			<li class="step"><!--====================================== Second Content ===========================-->
				<div class="step-title waves-effect">
					Schools Attended
				</div> 
				<div class="step-content">
					<a href="admin_add_school.php">
   						<i class="material-icons medium right">add_circle</i>
    				</a>
					<div class="row">
					<?php
					 if(mysqli_num_rows($other_sch_query) > 0){

					 	

					 	while($row = mysqli_fetch_array($other_sch_query)) { 

						if(empty($row['other_sch_name'])){
					 		echo " ";
					 	}else{

					 		?>


					 	<div class="row">
						 	<p class=" col s1 p-label">
						 			School:
						 	</p>
							<p class="col s4" style="margin-left:-25px;">
								<?php echo $row['other_sch_name'];?>		
							</p>
							<p class=" col s2 p-label pull-s1">
						 			School Year:
						 		</p>
							<p class="col s1 pull-s2">
								<?php echo $row['other_sy'];?>		
							</p>
							<p class=" col s1 p-label pull-s1">
						 			Grade:
						 	</p>
							<p class="col s1 pull-s2" style="margin-left:50px;">
								<?php echo $row['other_grd'];?>		
							</p>
						</div>
						<div class="row">
							<p class="col s2 p-label">
								Section:
							</p>
							<p class="col s2 pull-s2" style="margin-left:60px;">
								<?php echo $row['other_sec'];?>		
							</p>
							<p class="col s2 p-label pull-s1 ">
								Class Adviser:
							</p>
							<p class="col s2 pull-s2" style="margin-left:5px;">
								<?php echo $row['other_cls_ad'];?>		
							</p>
						</div>
						<div class="row">
							<div class="col s2 push-s7">
						<a href="admin_edit_student.php?edit=1&school_id=<?php echo $row["school_id"];?>" class="btn-floating btn-small green">
   						   <i class="material-icons">create</i>
    					</a>
    						</div>	
    				<div class="col s2 push-s6">
    					<a href="admin_edit_student.php?delete=1&school_id=<?php echo $row["school_id"];?>" onclick="return confirm('Do you want to delete this?')" class="btn-floating btn-small red" style=" ">
   						   <i class="material-icons">delete_forever</i>
    					</a>
    				</div>
    				</div>
						<br>
						<div class="divider"></div>
					<?php 
						}
					}
					}else{
						echo "no results found";				
					}?>
					</div>
					<!-- <div class="step-actions"> -->
<!-- 						<div class="step-actions">
							<button class="waves-effect waves-dark grey btn previous-step "  style="margin-top:-800px;">Back</button>
							<button class="waves-effect green waves-dark btn next-step"  style="margin-top:-800px;">Next</button>
						</div> -->
					<!-- </div> -->
				</div>
			</li><!--===================================== End Second Content ===========================-->
			<li class="step"><!--===================================== Third Content ===========================-->
				<div class="step-title waves-effect">Violation</div>
				<div class="step-content">
					<a href="admin_add_violation.php">
   						<i class="material-icons medium right">add_circle</i>
    				</a>
					<div class="row">
				<?php
					 if(mysqli_num_rows($violation_query) > 0){
					 	while($row = mysqli_fetch_array($violation_query)) { ?>
					 	<div class="row">
						 	<p class=" col s1 p-label">
						 			Violation:
						 	</p>
							<p class="col s4" style="margin-left:-15px;">
								<?php echo $row['violation'];?>		
							</p>
							<p class=" col s2 pull-s2 p-label">
						 			Violation Type:
						 	</p>
							<p class="col s1 pull-s3" style="margin-left:20px;">
								<?php echo $row['v_type'];?>		
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
							<p class="col s2 ">
										
							</p>
						<div class="row">
							<p class="col s2 pull-s2 p-label ">
									Description:
							</p>
						</div>
						<div class="row">
							<p class="col s8">
								<?php echo $row['v_description'];?>		
							</p>
						</div>
						
						<div class="row">
							<div class="col s2 push-s7">
						<a href="admin_edit_student.php?edit2=1&violation_id=<?php echo $row["violation_id"];?>" class="btn-floating btn-small green">
   						   <i class="material-icons">create</i>
    					</a>
    						</div>	
    				<div class="col s2 push-s6">
    					<a href="admin_edit_student.php?delete2=1&violation_id=<?php echo $row["violation_id"];?>" onclick="return confirm('Do you want to delete this?')" class="btn-floating btn-small red">
   						   <i class="material-icons">delete_forever</i>
    					</a>
    				</div>
    				</div>
						<br>
						<div class="divider"></div>
					<?php 
						}
					}else{
						echo "no results found";				
					}?>
					</div>	
				<!-- 	<div class="step-actions">
						<button class="waves-effect waves-dark grey btn previous-step "  style="margin-top:-400px;">Back</button>
						<button class="waves-effect green waves-dark btn next-step"  style="margin-top:-400px;">Next</button>
					</div> -->

				</div>
			</li>
		</ul> <!-- end of the materialize stepper-->

