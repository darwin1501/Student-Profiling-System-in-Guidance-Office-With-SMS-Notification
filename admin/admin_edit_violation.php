<?php
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 1){
$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."' AND `user_type`= 1 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1){

// this search query was used in selection box for onchange event.
 $grade7 = mysqli_query($con, "SELECT * FROM grd7");
 $grade8 = mysqli_query($con, "SELECT * FROM grd8");
 $grade9 = mysqli_query($con, "SELECT * FROM grd9");
 $grade10 = mysqli_query($con, "SELECT * FROM grd10");

 //find the current violation
	 $violation_query = mysqli_query($con," SELECT * FROM std_violation where `violation_id` = '".$_SESSION['violation_id']."' ");
	 $result = mysqli_fetch_array($violation_query);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$violation	 	 = trim(mysqli_real_escape_string($con, $_POST['violation']));
$v_type			 = trim(mysqli_real_escape_string($con, $_POST['v_type']));
$v_grd			 = trim(mysqli_real_escape_string($con, $_POST['v_grd']));
$v_sec		 	 = trim(mysqli_real_escape_string($con, $_POST['v_sec']));
$v_date			 = mysqli_real_escape_string($con, $_POST['v_date']);
$rfc_bk			 = mysqli_real_escape_string($con, $_POST['rfc_bk']);
//update query
$sql1 = mysqli_query($con, "UPDATE std_violation set violation = '$violation', v_type = '$v_type', v_grd = '$v_grd', v_sec = '$v_sec', v_date= '$v_date', rfc_bk = '$rfc_bk' WHERE `violation_id` = '".$_SESSION['violation_id']."' ");
//alert
$output = "<script>
		swal({
type: 'success',
title: 'Sucessfully Added',
showConfirmButton: false,
timer: 1500
})
</script>"; 
//reload
header ("location:admin_edit_violation.php");
}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Violation</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../assets/stepper/materialize-stepper.min.css">
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
		<!-- onchange script-->
		<?php include 'onchange.php';?>
	</head>
	<body>


	<!-- nav bar top-->
	<?php include 'nav_top.php';?>
			
	<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> <!-- Side Nav-->
		<li>
			<a href="admin_dashboard.php" class="white-text">
			<i class="fa fa-tachometer-alt  fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Dashboard
				</span>
			</a>
		</li>
		<li>
			<a href="admin_add_student.php" class="white-text">
			<i class="fa fa-user-plus fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Add Students
				</span>
			</a>
		</li>
		<li><a href="admin_add_user.php" class="white-text">
			<i class="fa fa-user-plus fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Add User
				</span>
			</a>
		</li>
		<li>
			<a href="admin_search_student.php" class="white-text">
				<i class="fa fa-search fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Search Students
				</span>
			</a>
		</li>
		<li>
			<a href="view_accounts.php" class="white-text">
				<i class="fa fa-users fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Manage Accounts
				</span>
			</a>
		</li>
		<li>
			<a href="admin_students_record.php" class="white-text">
				<i class="fa fa-address-card fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Students Record
				</span>
			</a>
		</li>
		<li>
			<a href="collection_of_violation.php" class="white-text">
				<i class="fa fa-cubes fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Collection of Violation
				</span>
			</a>
		</li>
		<li class="no-padding">
			<ul class="collapsible collapsible-accordion">
				<li>
					<a class="collapsible-header" class="white-text">
					<i class="fa fa-chevron-down fa-2x icon-pad-5 icon-white"></i>
					<span class="white-text" style="margin-left:10%;">Year Level</span></a>
					<div class="collapsible-body blue-grey darken-3">
						<ul>
							<li><a href="year_level/grade7.php" class="white-text">Grade 7</a></li>
							<li><a href="year_level/grade8.php" class="white-text">Grade 8</a></li>
							<li><a href="year_level/grade9.php" class="white-text">Grade 9</a></li>
							<li><a href="year_level/grade10.php" class="white-text">Grade 10</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</li>
		</ul>
			<div class="card-panel edit-violation-content z-depth-3"><!--  card panel start-->
			<form method="POST">
				<?php echo $output; ?>
	<!--  card panel start-->
		<div class="row">
			<div class="input-field col s5">
				<input name="violation" list="all_violation" type="text" value="<?php echo $result['violation'];?>" required>
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
			<!-- date -->
			<div class="input-field col s4">
         		<input name="v_date" type="date" class="datepicker" value="<?php echo $result['v_date'];?>" required>
         		<label for="first_name">Date</label>
        	</div>
		</div>
		<div class="row">
			<label class="col s3">Grade Level</label>
			<label class="col s3 push-s1">Section</label>
		</div>
		<div class="row">
			<!-- onchange-->
			<select id="gradeLevel" name="v_grd" class="browser-default col s3"><!-- grade level-->
				<option value="<?php echo $result['v_grd'];?>"><?php echo $result['v_grd'];?></option>
				<option value="7">Grade7</option>
				<option value="8">Grade8</option>
				<option value="9">Grade9</option>
				<option value="10">Grade10</option>
			</select>
			<!-- sections -->		
			<select id="section" name="v_sec" class="browser-default col s3 push-s1"> 
				<option value="<?php echo $result['v_sec'];?>"><?php echo $result['v_sec'];?></option>
			</select>	
		</div>
		<!-- <div class="row">
				<select id="gradeLevel" name="v_grd" class="browser-default col s2" required>
					<option value="<?php echo $result['v_grd'];?>"><?php echo $result['v_grd'];?></option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
	    		</select> -->
	    		<!-- <select id="section" name="v_sec" class="browser-default col s3 push-s2"> 
	    			<option value="<?php echo $result['v_sec'];?>"><?php echo $result['v_sec'];?></option>
			</select> -->
			<!-- <div class="input-field col s3">
				<input name="v_sec" list="all_sec" type="text" value="<?php echo $result['v_sec'];?>" required>
				<label for="first_name">
					Section
				</label>
				<datalist id="all_sec">
				<?php
				$all_section = mysqli_query($con, "SELECT * FROM `all_sec`");
				 if(mysqli_num_rows($all_section) > 0){
					 	while($row = mysqli_fetch_array($all_section)) { ?>
			   			 <option value="<?php echo $row['section']; ?>">

							<?php	} 
						} ?>
				</datalist>
			</div> -->
		<div class="row">
			<div class="input-field col s3">
				<input name="rfc_bk" type="text" value="<?php echo $result['rfc_bk'];?>" required>
				<label for="first_name">
					Reference Book
				</label>
			</div>
		</div>
		<div class="group-button-edit-violation">
			<a href="admin_violation_page.php" class="waves-effect waves-dark blue-grey lighten-4 black-text btn">
				Go Back
			</a>
			<button class="waves-effect waves-dark blue btn" type="submit" value="submit" style="margin-left:40px;">
				Update
			</button>
		</div>
</form>
			</div><!-- end of card panel-->
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
			<script>
			//Collapsible sidenav
			$(".button-collapse").sideNav();

			// script for the datepicker
			$(function(){
			$('.stepper').activateStepper();
			}); //
			$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15, // Creates a dropdown of 15 years to control year,
			today: 'Today',
			clear: 'Clear',
			close: 'Ok',
			format: 'yyyy-mm-dd', 
			closeOnSelect: false // Close upon selecting a date,
			});	
			
			function anyThing() {
			  setTimeout(function(){ $('.stepper').nextStep(); }, 1500);
			}

			$(function(){
			   $('.stepper').activateStepper();
			});

			$('select').material_select();  // This script will show the error warning in drop down SELECT USER TYPE
			$('select[required]').css({
			display: 'inline',
			position: 'absolute',
			float: 'left',
			padding: 0,
			margin: 0,
			border: '1px solid rgba(255,255,255,0)',
			height: 0,
			width: 0,
			top: '2em',
			left: '3em',
			opacity: 0,
			pointerEvents: 'none'
			});
		
			</script>
	<?php
		}else{
			header ("location:../index.php");
			}
		}else{
			header ("location:../index.php");
		}
			?>
		</body>
		</html><!-- END of body html here-->