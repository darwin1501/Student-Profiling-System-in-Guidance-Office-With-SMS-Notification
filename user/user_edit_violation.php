<?php
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 2){
$query1= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_SESSION['username']."' AND `user_type`= 2 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1){

// this search query was used in selection box for onchange event.
 $grade7 = mysqli_query($con, "SELECT * FROM grd7");
 $grade8 = mysqli_query($con, "SELECT * FROM grd8");
 $grade9 = mysqli_query($con, "SELECT * FROM grd9");
 $grade10 = mysqli_query($con, "SELECT * FROM grd10");


// echo $_SESSION['violation_id']; 

	 $violation_query = mysqli_query($con," SELECT * FROM std_violation where `violation_id` = '".$_SESSION['violation_id']."' ");
	 $result = mysqli_fetch_array($violation_query);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$violation	 	 = trim(mysqli_real_escape_string($con, $_POST['violation']));
$v_type			 = trim(mysqli_real_escape_string($con, $_POST['v_type']));
$v_grd			 = trim(mysqli_real_escape_string($con, $_POST['v_grd']));
$v_sec		 	 = trim(mysqli_real_escape_string($con, $_POST['v_sec']));
$v_date			 = mysqli_real_escape_string($con, $_POST['v_date']);
$rfc_bk			 = mysqli_real_escape_string($con, $_POST['rfc_bk']);

$sql1 = mysqli_query($con, "UPDATE std_violation set violation = '$violation', v_type = '$v_type', v_grd = '$v_grd', v_sec = '$v_sec', v_date= '$v_date', rfc_bk = '$rfc_bk' WHERE `violation_id` = '".$_SESSION['violation_id']."' ");

$output = "<script>
		swal({
type: 'success',
title: 'Sucessfully Added',
showConfirmButton: false,
timer: 1500
})
</script>"; 


header ("location:user_edit_violation.php");
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
	</head>
	<body>
		<!-- body here -->
		<!-- Form here-->

			<!-- nav bar top-->
			<?php include 'nav_top.php';?>

			
			<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> <!-- Side Nav-->
		<li>
			<a href="user_dashboard.php" class="white-text">
			<i class="fa fa-tachometer-alt  fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Dashboard
				</span>
			</a>
		</li>
		<li>
			<a href="user_add_student.php" class="white-text">
			<i class="fa fa-user-plus fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Add Students
				</span>
			</a>
		</li class="blue-grey darken-4">
		<li>
			<a href="user_search_student.php" class="white-text">
				<i class="fa fa-search fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Search Students
				</span>
			</a>
		</li>
		</ul>
			<div class="card-panel edit-violation-content z-depth-3"><!--  card panel start-->
			<form method="POST">
				<?php echo $output; ?>
	<!--  card panel start-->

		<div class="row">
			<div class="input-field col s8">
				<input name="violation" list="all_violation" type="text" value="<?php echo $result['violation'];?>">
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
			<div class="input-field col s4">
         		<input name="v_date" type="date" class="datepicker" value="<?php echo $result['v_date'];?>">
         		<label for="first_name">Date</label>
        	</div>
		</div>
		<div class="row">
			<select id="gradeLevel" name="v_grd" class="browser-default col s3"><!-- grade level-->
				<option value="<?php echo $result['v_grd'];?>"><?php echo $result['v_grd'];?></option>
				<option>--Select--</option>
				<option value="7">Grade7</option>
				<option value="8">Grade8</option>
				<option value="9">Grade9</option>
				<option value="10">Grade10</option>
			</select>
			
			<select id="section" name="v_sec" class="browser-default col s3 push-s1"> 
				<option value="<?php echo $result['v_sec'];?>"><?php echo $result['v_sec'];?></option>
			</select>
			
		</div>
		<!-- <div class="row">
			<div class="input-field col s3">
				<select name="v_grd">
					<option value="<?php echo $result['v_grd'];?>"><?php echo $result['v_grd'];?></option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
	    		</select>
	    		<label>Grade Level</label>
			</div>
			<div class="input-field col s3">
				<input name="v_sec" list="all_sec" type="text" value="<?php echo $result['v_sec'];?>">
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
			</div>
		</div> -->
		<div class="row">
		<div class="input-field col s3">
			<input name="rfc_bk" type="text" value="<?php echo $result['rfc_bk'];?>">
			<label for="first_name">
				Reference Book
			</label>
		</div>
		</div>
		<div class="group-button-edit-violation">
			<a href="user_violation_page.php" class="waves-effect waves-dark blue-grey lighten-4 black-text btn">
				Go Back
			</a>
			<button class="waves-effect waves-dark blue btn" type="submit" value="submit" style="margin-left:20px;">
				Update
			</button>
		</div>
</form>
			</div><!-- end of card panel-->
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
			<script>
			//Collabsible Items
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
			
		

		

			$('select').material_select();  // This script will show the error warning in drop down SELECT USER TYPE
			
			
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