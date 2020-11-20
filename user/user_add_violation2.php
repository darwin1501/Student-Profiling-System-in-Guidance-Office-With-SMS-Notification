<?php
error_reporting(0);
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 2){
$query1= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_SESSION['username']."' AND `user_type`= 2 ");
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

// echo $lrn;
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

// echo $body;
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
$api ="TR-DARWI612634_D9DDH";


$result = itexmo($num,$text,$api);
if ($result == ""){
	// ##### NO INTERNET CONECTION #######	
	// echo "iTexMo: No response from server!!!
	// Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
	// Please CONTACT US for help. ";	

	//this query will find the section in table all_violation
	//and find the violation type
	$find_violation_type = mysqli_query($con,"SELECT * FROM all_violation WHERE violation = '$violation'");
	// check result
	$result = mysqli_fetch_array($find_violation_type);
	//the status was set to 1 it means that this notification was NOT sent
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
	// echo "The notification was expired.";

	//this query will find the section in table all_violation
	//and find the violation type
	$find_violation_type = mysqli_query($con,"SELECT * FROM all_violation WHERE violation = '$violation'");
	// check result
	$result = mysqli_fetch_array($find_violation_type);
	//the status was set to 1 it means that this notification was NOT sent
	$status = 0;
	//the violation type will insert in v_type field in std_violation
	$sql2 = mysqli_query($con, "INSERT INTO std_violation (lrn, violation, v_grd, v_sec, v_type, v_date, rfc_bk, status) VALUES ('$lrn', '$violation', '$v_grd', '$v_sec', '".$result['violation_type']."', '$v_date', '$rfc_bk','$status')");
	//alert
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
		//the status was set to 1 it means that this notification was NOT sent
		$status = 0;
		//the violation type will insert in v_type field in std_violation
		$sql2 = mysqli_query($con, "INSERT INTO std_violation (lrn, violation, v_grd, v_sec, v_type, v_date, rfc_bk) VALUES ('$lrn', '$violation', '$v_grd', '$v_sec', '".$result['violation_type']."', '$v_date', '$rfc_bk')");


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
//update
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
		<?php include 'onchange.php';?>

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
		</li>
		<li class="blue-grey darken-4">
			<a href="user_search_student.php" class="white-text">
				<i class="fa fa-search fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Search Students
				</span>
			</a>
		</li>
		</ul>
	<div class="card-panel add-violation-content z-depth-3"><!--  card panel start-->
	<form method="POST">

		<?php echo $output ?>
		<?php echo "<h5>Students Name:  <b>".$name."</b></h5>"; ?>
		<div class="divider"></div>
		<!-- violation form -->
		<?php include "violation_form_inlcudes/violation_form.php";?>

	<!-- button-->	
		<div class="row">
			<div class="col s10 push-s3">
				<a href="user_search_student.php" class="waves-effect waves-dark blue-grey lighten-4 black-text btn btn">
					Go Back
				</a>
				<button class="waves-effect waves-dark blue btn" type="submit" style="margin-left:20px;">
				Add
				</button>
			</div>
		</div>

	</form>
	</div><!-- end of card panel-->
</body>
</html><!-- END of body html here-->
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
