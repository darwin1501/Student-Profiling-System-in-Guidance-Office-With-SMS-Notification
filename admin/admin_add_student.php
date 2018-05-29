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

if ($_SERVER["REQUEST_METHOD"] == "POST"){


$lrn		 	 = mysqli_real_escape_string($con, $_POST['lrn']);
$fullname		 = trim(mysqli_real_escape_string($con, $_POST['fullname']));
$gender			 = trim(mysqli_real_escape_string($con, $_POST['gender']));
$dob 			 = mysqli_real_escape_string($con, $_POST['dob']);
$nationality	 = trim(mysqli_real_escape_string($con, $_POST['nationality']));
$religion 		 = trim(mysqli_real_escape_string($con, $_POST['religion']));
$address 		 = trim(mysqli_real_escape_string($con, $_POST['address']));
$telno 			 = mysqli_real_escape_string($con, $_POST['telno']);
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


// insert query
$sql1 = mysqli_query($con, "INSERT INTO std_prf (lrn, full_name, gen, dob, nat, rel, addr, tel, fathers_name, fathers_age, fathers_occu, mothers_name, mothers_age, mothers_occu, no_of_child, no_of_boys, no_of_girls, sib_pos, lvg_whom, elem_school, elem_sy) VALUES ('$lrn','$fullname','$gender', '$dob', '$nationality', '$religion', '$address', '$telno', '$father', '$f_age', '$f_occu', '$mother', '$m_age', '$m_occu', '$no_child', '$no_boys', '$no_girls', '$siblings', '$living', '$elem_grd', '$sy' )");
//alert
$output = "<script>
		swal({
  type: 'success',
  title: 'Sucessfully Added',
  showConfirmButton: false,
  timer: 1500
})
</script>";
}

?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Add Student</title>
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
	<!-- nav bar top-->
		<?php include 'nav_top.php';?>

	<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> <!-- Side Nav-->
		<li>
			<a href="admin_dashboard.php" class="white-text">
			<i class="fa fa-tachometer-alt fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Dashboard
				</span>
			</a>
		</li>
		<li class="blue-grey darken-4">
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
		<form method="POST" id="myform">
			<?php echo $output;?>
			<!--  card panel start-->
			<div class="card-panel student-content-fill-form z-depth-3"> 
				<div class="row">
					<!-- Alert Message will display here-->
					<?php echo $output; ?> 
				</div>
				<!-- this form is for adding student "form.php" -->
		 		<?php include'../global/form.php';?>
			</div><!-- end of card panel-->
		</form>
	<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.validate.1.15.0.min.js"></script>
	<script type="text/javascript" src="../assets/stepper/materialize-stepper.min.js"></script>

	<script>
		//select
	 $(document).ready(function() {
		$('select').material_select();
		});
	 //Collasible side nave
	 $(".button-collapse").sideNav();

	// jquery validation plugin
	jQuery.validator.messages.required = "";


	$("#myform").validate({

	submitHandler: function(form) {

	form.submit();
	}
	});

	$(document).ready(function(){
	$('.tooltipped').tooltip({delay: 50});
	});
     
	
	$(function(){
	$('.stepper').activateStepper();
	}); //

	// script for the datepicker
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