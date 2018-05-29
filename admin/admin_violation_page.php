<?php
error_reporting(0);
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 1){ 
$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."' AND `user_type`= 1 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);

if($num1==1){ 
// echo $_SESSION['lrn'];
$lrn = $_SESSION['lrn'];
//select lrn form std_violation oredered by date
 $violation_query = mysqli_query($con," SELECT * FROM std_violation where `lrn` = '$lrn' ORDER BY v_date DESC");
 // count all records in std_violation table
$violation_total = mysqli_num_rows($violation_query);
//update query
$sql1 = mysqli_query($con, "UPDATE std_prf set num_of_violation = '$violation_total' WHERE `lrn`= '".$_SESSION['lrn']."' ");
// echo $violation_total;


//edit
if (isset($_GET['edit'])) {

$violation_id = $_GET["violation_id"];
$_SESSION['violation_id'] = $violation_id;
 header ("Location: admin_edit_violation.php");// this will reload the page 
}
//delete
 if (isset($_GET['delete'])) {
 // get violation id
$violation_id = $_GET["violation_id"];
//delete query
$delete = mysqli_query($con,"DELETE  FROM std_violation WHERE violation_id = $violation_id");
// this will reload the page to update content
 header ("Location: admin_violation_page.php"); 
}


// if the button "Send Now" was click
 if (isset($_GET['send'])) {
 // get violation id
$violation_id = $_GET["violation_id"];
// search query to find student violation
$find_student_violation = mysqli_query($con," SELECT * FROM std_violation where `violation_id` = $violation_id");
//search result
$find_student_violation_result = mysqli_fetch_array($find_student_violation);
//students lrn
$students_lrn = $find_student_violation_result['lrn'];
// search query to find student
$find_student = mysqli_query($con," SELECT * FROM std_prf where `lrn` = $students_lrn");
//search result
$find_student_result = mysqli_fetch_array($find_student);
//cellphone number
$telno = $find_student_result['tel'];
//violation
$violation = $find_student_violation_result['violation'];
//fullname
$name = $find_student_result['full_name'];


//############ Message ##############
//message
// name was call to the guidance office due violating the rules in school.
// Violation:
// Description:
 $body = "$name"."
 				  \nViolation: ".$violation."
 				  \nFrom: SJCNH
 				  \n";
// echo $body;
//########################


		if (empty($telno)){
			echo "number not given";
		}
##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
##########################################################################
function itexmo($number,$message,$apicode){
$url = 'https://www.itexmo.com/php_api/api.php';
$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
$param = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
    ),
);
$context  = stream_context_create($param);
return file_get_contents($url, false, $context);}
//##########################################################################

$num = $telno ; // 09218885329 //09154292610 //09353029006 //09395705328 jacob
$text = $body;
$api ="TR-USERG760889_JPI6N";


$result = itexmo($num,$text,$api);
if ($result == ""){
	//### NO INTERNET CONNECTION #####
	//alert
	$output = "<script>
			swal({
	type: 'error',
	title: 'Check Your Internet Connection',
	text: 'Parents did not notify',
	showConfirmButton: false,
	timer: 2500
	})
	</script>";

}else if ($result == 0){
	//#####SUCESS#####
	//this query will find the section in table all_violation
	//and find the violation type
	$status = 1;
	$update = mysqli_query($con, "UPDATE std_violation set status = '$status' WHERE `violation_id` = '$violation_id'");
	// //alert
	$output = "<script>
			swal({
	type: 'success',
	title: 'Sucessfully Notified',
	showConfirmButton: false,
	timer: 1500
	})
	</script>";
	header ("location:admin_violation_page.php");
	}
else{	
	//#### THE CODE EXPIRED ######	
	// alert
	$output = "<script>
			swal({
	type: 'error',
	title: 'SMS notification was expired',
	text: 'Please Contact Darwin C. Pablo for more information but for now please uncheck the notification. Thank you.',
	showConfirmButton: false,
	timer: 20000
	})
	</script>";

	//posible problem
	//code was expired
	//characters exeed at the limit 50 char.
}
 }
if ($_SERVER["REQUEST_METHOD"] == "POST"){

}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Violation</title>
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
	<form method="POST" action="admin_edit_student.php">
		
		<div class="card-panel student-content z-depth-3"><!--  card panel start-->
					<!-- card navigation here-->
			<nav>
				<div class="nav-wrapper green">
					<ul id="nav-mobile">
						<li><a href="admin_edit_student.php">Student Profile</a></li>
						<li class="active"><a href="admin_violation_page.php">Violation</a></li>
					</ul>
				</div>
			</nav> 
			<?php echo $output; ?>  <!-- Alert Message will display here-->
		<div class="row" style="margin-top:5%;">
			<div class="col s3">
				<a href="student_profile.php" class="btn blue">
					Preview
				</a>
			</div>
			<div class="col s1 push-s7">
				<a href="admin_add_violation.php" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Add Violation">
					<i class="fa fa-plus-circle fa-4x icon-pad-5" style="color:#2196f3;"></i>
				</a>
			</div>
		</div>
	 	<?php include'../global/admin_violation_page.php';?> <!-- This is the stepper for editing the student information-->
		</div> 
		<!-- end of card panel-->
	</form>

	<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="../assets/stepper/materialize-stepper.min.js"></script>
	<script>
	$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
	 });
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

	// script for the dropdown menu
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