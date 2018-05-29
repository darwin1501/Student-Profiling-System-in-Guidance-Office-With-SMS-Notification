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
// echo $_SESSION['student_id'];
$student_info = mysqli_query($con, "SELECT * FROM std_prf  WHERE student_id = '".$_SESSION['student_id']."'");
$student_info_result = mysqli_fetch_array($student_info);
$lrn =  $student_info_result['lrn'];
$name =  $student_info_result['full_name'];
$telno =  $student_info_result['tel'];

// this search query was used in selection box for onchange event.
 $grade7 = mysqli_query($con, "SELECT * FROM grd7");
 $grade8 = mysqli_query($con, "SELECT * FROM grd8");
 $grade9 = mysqli_query($con, "SELECT * FROM grd9");
 $grade10 = mysqli_query($con, "SELECT * FROM grd10");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$violation	 	 = trim(mysqli_real_escape_string($con, $_POST['violation']));
// $v_type			 = trim(mysqli_real_escape_string($con, $_POST['v_type']));
$v_grd			 = trim(mysqli_real_escape_string($con, $_POST['v_grd']));
$v_sec		 	 = trim(mysqli_real_escape_string($con, $_POST['v_sec']));
$v_date			 = mysqli_real_escape_string($con, $_POST['v_date']);
$rfc_bk			 = mysqli_real_escape_string($con, $_POST['rfc_bk']);


//############ Message ##############
//message
// name was call to the guidance office due violating the rules in school.
// Violation:
// Description:
 $body = "$name"." 
 				  \nViolation: ".$violation."
 				  \nFrom: SJCNH
 				  \n";
//########################
if (isset($_POST['notify'])) { // if the checkbox was check to notify thr parents.

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
$text =  $body; //this is the message
$api ="TR-USERG760889_JPI6N";

$result = itexmo($num,$text,$api);
if ($result == ""){
	// ##### NO INTERNET CONECTION #######	
	// echo "iTexMo: No response from server!!!
	// Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
	// Please CONTACT US for help. ";	
	// 

	//this query will find the section in table all_violation
	//and find the violation type
	$find_violation_type = mysqli_query($con,"SELECT * FROM all_violation WHERE violation = '$violation'");
	// check result
	$result = mysqli_fetch_array($find_violation_type);

	//the status was set to 0 it means that this notification was NOT sent
	$status = 0;
	//the violation type will insert in v_type field in std_violation
	$sql2 = mysqli_query($con, "INSERT INTO std_violation (lrn, violation, v_grd, v_sec, v_type, v_date, rfc_bk, status) VALUES ('$lrn', '$violation', '$v_grd', '$v_sec', '".$result['violation_type']."', '$v_date', '$rfc_bk', '$status')");
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
	$find_violation_type = mysqli_query($con,"SELECT * FROM all_violation WHERE violation = '$violation'");
	// check result
	$result = mysqli_fetch_array($find_violation_type);
	//the status was set to 1 it means that this notification was sent
	$status = 1;
	//the violation type will insert in v_type field in std_violation
	$sql2 = mysqli_query($con, "INSERT INTO std_violation (lrn, violation, v_grd, v_sec, v_type, v_date, rfc_bk, status) VALUES ('$lrn', '$violation', '$v_grd', '$v_sec', '".$result['violation_type']."', '$v_date', '$rfc_bk', '$status')");
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
else{	
	//#### THE CODE EXPIRED ######	
	// echo "Error Num ". $result . " was encountered!";
	$find_violation_type = mysqli_query($con,"SELECT * FROM all_violation WHERE violation = '$violation'");
	// check result
	$result = mysqli_fetch_array($find_violation_type);
	//the status was set to 1 it means that this notification was NOT sent
	$status = 0;
	//the violation type will insert in v_type field in std_violation
	$sql2 = mysqli_query($con, "INSERT INTO std_violation (lrn, violation, v_grd, v_sec, v_type, v_date, rfc_bk, status) VALUES ('$lrn', '$violation', '$v_grd', '$v_sec', '".$result['violation_type']."', '$v_date', '$rfc_bk','$status')");
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
}
		
}else{
	//###### NOTIFICATION WAS UNCHECKED
	//this query will find the section in table all_violation
	//and find the violation type
	$find_violation_type = mysqli_query($con,"SELECT * FROM all_violation WHERE violation = '$violation'");
	// check result
	$result = mysqli_fetch_array($find_violation_type);
	//the status was set to 0 it means that this notification was NOT sent
	$status = 0;
	//the violation type will insert in v_type field in std_violation
	$sql2 = mysqli_query($con, "INSERT INTO std_violation (lrn, violation, v_grd, v_sec, v_type, v_date, rfc_bk, status) VALUES ('$lrn', '$violation', '$v_grd', '$v_sec', '".$result['violation_type']."', '$v_date', '$rfc_bk', '$status')");
	//alert
	 $output = "<script>
			swal({
	  type: 'success',
	  title: 'Sucessfully Added',
	  text: 'Parents did not notify',
	  showConfirmButton: false,
	  timer: 2000

	})
	</script>";
	}
}
// after the form submit this code will count all related violation 
 $violation_query = mysqli_query($con," SELECT * FROM std_violation where `lrn` = '$lrn'");
 // count all records in std_violation table
$violation_total = mysqli_num_rows($violation_query);
$sql1 = mysqli_query($con, "UPDATE std_prf set num_of_violation = '$violation_total' WHERE `lrn`= '$lrn'");
// echo $violation_total;//test if number of violation was updating everytime the form was submitted.
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Add Violation</title>
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
	<div class="card-panel add-violation-content z-depth-3"><!--  card panel start-->
	<form method="POST" id="form">
		<?php echo $output ?>
		<!-- violation form -->
		<?php echo "<h5>Students Name:  <b>".$name."</b></h5>"; ?>
		<div class="divider"></div>
		<!-- VIOLATION FORM -->
		<?php include "violation_form_inlcudes/violation_form.php";?>
		<!-- button-->	
		<div class="row">
			<div class=" col m4 l6 push-l3  push-m3 ">
				<a href="admin_search_student.php" class="waves-effect waves-dark blue-grey lighten-4 black-text btn btn">
					Cancel
				</a>
			</div>
			<div class="row">
				<div class="col m4 l4 push-l1 push-m3  ">
					<button class="waves-effect waves-dark blue btn " type="submit">
					Add
					</button>
				</div>
			</div>
		</div>
	</form>
	</div><!-- end of card panel-->
</body>
</html><!-- END of body html here-->
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
			<script>
			//Collapsible sidenav
			$(".button-collapse").sideNav();

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
			</script>
	<?php
		}else{
			header ("location:../index.php");
			}
		}else{
			header ("location:../index.php");
		}
			?>
