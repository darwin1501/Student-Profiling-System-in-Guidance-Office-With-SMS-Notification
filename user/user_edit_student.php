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

// the $_SESSION['student_id'] was the student_id from std_prf

// this query will find the std_prf.student_id
$query1= mysqli_query($con,"SELECT * FROM std_prf WHERE `student_id`= '".$_SESSION['student_id']."' ");

$arr2 = mysqli_fetch_array($query1);
$lrn =  $arr2['lrn'];// the std_prf.lrn will find all matching records from all tables.
$number = $arr2['tel'];
$name = $arr2['full_name'];

$_SESSION['lrn'] = $lrn; // set the lrn in session
$_SESSION['tel'] = $number;// set the lrn in number
$_SESSION['full_name'] = $name;// set the lrn in number

// lrn violation
 $violation_query = mysqli_query($con," SELECT * FROM std_violation where `lrn` = '$lrn'"); 
$violation_lrn_result = mysqli_fetch_array($violation_query);

//lrn other school
 $school = mysqli_query($con," SELECT * FROM other_sch where `lrn` = '$lrn'"); 
$result_school_lrn = mysqli_fetch_array($school);

// if the edit button was click
// this button is for the school form
if (isset($_GET['edit'])) {
$school_id = $_GET["school_id"];
$_SESSION['school_id'] = $school_id;
 header ("Location: user_edit_school.php");// this will reload the page 
}

// if (isset($_GET['delete'])) {
// $school_id = $_GET["school_id"];
// $delete = mysqli_query($con,"DELETE  FROM other_sch WHERE school_id = $school_id");
//  // this will reload the page 
//  header ("Location: user_edit_student.php");
//    $output = "<script>
// swal({
//   type: 'success',
//   title: 'Sucessfully Deleted',
//   showConfirmButton: false,
//   timer: 1500
// })
// </script>";
// }
// this button is for the violation form
if (isset($_GET['edit2'])) {
$violation_id = $_GET["violation_id"];
$_SESSION['violation_id'] = $violation_id;
 header ("Location: user_edit_violation.php");// this will reload the page 
}

if (isset($_GET['delete2'])) {
$violation_id = $_GET["violation_id"];
$delete = mysqli_query($con,"DELETE  FROM std_violation WHERE violation_id = $violation_id");
 header ("Location: user_edit_student.php"); // this will reload the page 
}
// if the edit button was click
// echo $_SESSION['id']; this is the id from the admin_search_student.php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

// first step
$lrn		 	 = mysqli_real_escape_string($con, $_POST['lrn']);
$fullname		 = trim(mysqli_real_escape_string($con, $_POST['fullname']));
$age 			 = trim(mysqli_real_escape_string($con, $_POST['age']));
$gender			 = trim(mysqli_real_escape_string($con, $_POST['gender']));
$dob 			 = mysqli_real_escape_string($con, $_POST['dob']);
$nationality	 = trim(mysqli_real_escape_string($con, $_POST['nationality']));
$religion 		 = trim(mysqli_real_escape_string($con, $_POST['religion']));
$address 		 = trim(mysqli_real_escape_string($con, $_POST['address']));
$telno 			 = trim(mysqli_real_escape_string($con, $_POST['telno']));
$father 		 = trim(mysqli_real_escape_string($con, $_POST['father']));
$f_age 			 = trim(mysqli_real_escape_string($con, $_POST['f_age']));
$f_occu 		 = trim(mysqli_real_escape_string($con, $_POST['f_occu']));
$mother 		 = trim(mysqli_real_escape_string($con, $_POST['mother']));
$m_age 			 = trim(mysqli_real_escape_string($con, $_POST['m_age']));
$m_occu 		 = trim(mysqli_real_escape_string($con, $_POST['m_occu']));
$no_child		 = trim(mysqli_real_escape_string($con, $_POST['no_child']));
$no_boys 		 = trim(mysqli_real_escape_string($con, $_POST['no_boys']));
$no_girls 		 = trim(mysqli_real_escape_string($con, $_POST['no_girls']));
$siblings 		 = trim(mysqli_real_escape_string($con, $_POST['siblings']));
$living 		 = trim(mysqli_real_escape_string($con, $_POST['living']));
$elem_grd 		 = trim(mysqli_real_escape_string($con, $_POST['elem_grd']));
$sy 			 = trim(mysqli_real_escape_string($con, $_POST['sy']));

//Second Step




// $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
// first query


$sql1 = mysqli_query($con, "UPDATE std_prf set lrn = '$lrn', full_name = '$fullname', age = '$age', gen = '$gender', dob = '$dob', nat ='$nationality', rel = '$religion', addr = '$address', tel = '$telno', fathers_name ='$father', fathers_age = '$f_age', fathers_occu = '$f_occu', mothers_name = '$mother', mothers_age = '$m_age', mothers_occu = '$m_occu', no_of_child = '$no_child', no_of_boys = '$no_boys', no_of_girls = '$no_girls', sib_pos = '$siblings', lvg_whom = '$living', elem_school = '$elem_grd', elem_sy = '$sy' WHERE `student_id`= '".$_SESSION['student_id']."' ");

$sql2 = mysqli_query($con, "UPDATE std_violation set lrn = '$lrn' WHERE `lrn` = '".$violation_lrn_result['lrn']."'");

$sql2 = mysqli_query($con, "UPDATE other_sch set lrn = '$lrn' WHERE `lrn` = '".$result_school_lrn['lrn']."'");




header ("location:user_edit_student.php"); // this will update the page

// $update_pwd=mysqli_query($con, "UPDATE admin set password='$encrypted' where  username ='".$_SESSION['username']."'");

}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Student</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/stepper/materialize-stepper.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
		</ul><!-- Nav end -->

	<form method="POST" action="admin_edit_student.php">
		<div class="card-panel student-content z-depth-3"><!--  card panel start-->
			<!-- card navigation here-->
			<nav>
				<div class="nav-wrapper green">
					<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li class="active"><a href="user_edit_student.php">Student Profile</a></li>
						<li><a href="user_violation_page.php">Violation</a></li>
					</ul>
				</div>
			</nav>
		<div class="row">
			<?php echo $output; ?>  <!-- Alert Message will display here-->
			<div class="col s4" style="margin-top:50px;">
				<a href="student_profile.php" class="waves-effect waves-dark light-blue btn">
					Preview
				</a>
			</div>
		 </div>

		<?php include'../global/form2.php';?>
		
		<br>
	<div class="divider"></div>
	<br>
	<label><h5>Other Schools Attended</h5></label>
	<br>
	<div class="row">
		<div class="col s1 push-s11">
		<a href="user_add_school.php"  class="tooltipped" data-position="top" data-delay="50" data-tooltip="Add School">
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
			<a href="user_edit_student.php?edit=1&school_id=<?php echo $row["school_id"];?>"  class="tooltipped" data-position="top" data-delay="50" data-tooltip="Edit">
				<i class="fa fa-pencil-alt fa-2x icon-pad-5" style="color:#4caf50; margin-left:10px;"></i>
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
		
		</div><!-- end of card panel-->
	</form>

	<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="../assets/stepper/materialize-stepper.min.js"></script>
	<script>
	//Collabsible Items
	$(".button-collapse").sideNav();
	//tolltipped
	$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
     
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

	// script for the dropdown menu
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
	// Extension pour comptabilité avec materialize.css
	$.validator.setDefaults({
	highlight: function(element, errorClass, validClass) {
	if (element.tagName === 'SELECT')
	$(element).closest('.select-wrapper').addClass('invalid');
	else
	$(element).removeClass(validClass).addClass(errorClass);
	},
	unhighlight: function(element, errorClass, validClass) {
	if (element.tagName === 'SELECT')
	$(element).closest('.select-wrapper').removeClass('invalid');
	else
	$(element).removeClass(errorClass).addClass(validClass);
	},
	errorClass: 'invalid',
	validClass: "valid",
	errorPlacement: function(error, element) {
	if (element.prop('tagName')  === 'SELECT') {
	// alternate placement for select error
	error.appendTo( element.parent() );
	error.addClass('active');
	}
	else {
	$(element)
	.closest("form")
	.find("label[for='" + element.attr("id") + "']")
	.attr('data-error', error.text());
	}
	},
	submitHandler: function(form) {
	console.log('form ok');
	}
	});
	$("#form").validate({
	rules: {
	dateField: {
	date: true
	}
	}
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