<?php 
ob_start();
session_start();
include '../database/db.php';
// echo $_SESSION['student_id'];
//get student information
$student_info = mysqli_query($con, "SELECT * FROM std_prf WHERE student_id = '".$_SESSION['student_id']."'");
$result = mysqli_fetch_array($student_info);
 ?>
<!DOCTYPE html>
<html class="light-blue">
<head>
	<title>Students Information</title>
	<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../assets/stepper/materialize-stepper.min.css">
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<style type="text/css">
		/* =========== tab color =============*/
.tabs .tab a{
    color:#0d47a1;
}
.tabs .tab a:hover,.tabs .tab a.active {
	background-color:transparent;
	color:#2196f3;
}
.tabs .tab.disabled a,.tabs .tab.disabled a:hover {
	color:rgba(102,147,153,0.7);	
}
.tabs .indicator {
	background-color:#2196f3;
}

.text-font{
font-size:20px;
}
	</style>	
</head>
<body>

<div class="card-panel z-depth-4" style="width:70%; height:590px; margin-top:2%; margin-left:16%; overflow-y:scroll;">
      <div class="row"> <!-- tab row-->
    	<div class="col s12">
	      <ul class="tabs">
	      	<!-- TAB -->
		        <li class="tab col s6">
		        	<a href="#test1" class="active">Profile</a>
		        </li>
		        <li class="tab col s6">
		        	<a class="active" href="#test2">Violation</a>
		        </li>
	      </ul>
   		</div>
    <!-- ################ PROFILE ##################### -->
    <div id="test1" class="col s10 push-s1" style="margin-top:5%;"> <!-- profile content-->
    	<div class="row">
			<span class="col s3 pull-s1 text-font">
				<b>LRN:</b>&nbsp;<?php echo $result['lrn'];?>
			</span>
		</div>
		<div class="row">
			<span class="col s5 text-font">
				<b>Fullname:</b>&nbsp;<?php echo $result['full_name'];?>
			</span>
			<span class="col s2 text-font">
				<b>Age:</b>&nbsp;<?php echo $result['age'];?>
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
		<label><h5>Other Schools Attended</h5></label>
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
    <?php 
 //find student violation
	$find_lrn = mysqli_query($con, "SELECT * FROM std_violation WHERE lrn = '".$result['lrn']."'");
while ($row = mysqli_fetch_array($find_lrn)) { ?>
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
			<span class="col s8 text-font">
				<b>Reference Book:</b>&nbsp;<?php echo $row['rfc_bk'];?>
			</span>
		</div>
		<br>
		<div class="divider"></div>
		<br>
<?php } ?>
</div>
  </div> <!-- tab end row-->                   
</div>

<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
<script>
	 $(document).ready(function(){
    $('ul.tabs').tabs();
</script>
</body>
</html>