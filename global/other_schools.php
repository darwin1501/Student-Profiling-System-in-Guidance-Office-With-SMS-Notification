	<br>
	<div class="divider"></div>
	<br>
	<label><h5>Other Schools Attended</h5></label>
	<br>
	<div class="row">
		<div class="col s1 push-s11">
		<a href="../admin/admin_add_school.php"  class="tooltipped" data-position="top" data-delay="50" data-tooltip="Add School">
			<i class="fa fa-plus-circle fa-4x icon-pad-5" style="color:#2196f3;"></i>
		</a>
	</div>
	</div>
	<?php

	// this query will find all matching lrn from table other_sch to std_prf.
 $other_sch_query = mysqli_query($con," SELECT * FROM other_sch where `lrn` = '$lrn'"); 

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
			<a href="admin_edit_student.php?edit=1&school_id=<?php echo $row["school_id"];?>"  class="tooltipped" data-position="top" data-delay="50" data-tooltip="Edit">
				<i class="fa fa-pencil-alt fa-2x icon-pad-5" style="color:#4caf50; margin-left:10px;"></i>
			</a>
		</div>
		<div class="col s2 push-s6">
			<a href="admin_edit_student.php?delete=1&school_id=<?php echo $row["school_id"];?>"  class="tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" onclick="return confirm('Do you want to delete this?')">
				<i class="fa fa-trash fa-2x icon-pad-5" style="color:#f44336;"></i>
			</a>
		</div>
	</div>
	<br>
	<div class="divider"></div>
	<?php
		}
	}
	}else{
		echo "No Schools Added Yet";
	}?>