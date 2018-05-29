<?php
$output = null;
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 1){
$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."' AND `user_type`= 1 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// $date_from	 = mysqli_real_escape_string($con, $_POST['date_from']);
		// $date_to	 = mysqli_real_escape_string($con, $_POST['date_to']);

		// $new_year = '2020'; // this variable gives the year

		// $date = date_create($date_from);
		// $date2 = date_create($date_to);

		//  echo date_format($date, ''.$new_year.'-m-d ');
		//  echo date_format($date2, ''.$new_year.'-m-d');
		
		$from	 = mysqli_real_escape_string($con, $_POST['from']);
		$to	 = mysqli_real_escape_string($con, $_POST['to']);
		
		echo $from;
		echo $to;

		$_SESSION['from'] = $from;
		$_SESSION['to'] = $to;
		//this will redirect to reports.php
		header("location:records/content/reports/reports.php");
	}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Records</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>

		<!-- for bootstrap year picker -->

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
		<li class="blue-grey darken-4">
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
			<div class="card-panel student-records-content z-depth-3"><!--  card panel start-->
				<form method="POST" id="myform">
					<h5 class="center">Set Date to Find Records</h5>
					<div class="divider"></div>
					<br>
					<br>
					<div class="row">
						<div class="input-field col s6">
         					 <input name="from" type="text" class="datepicker" class="validate" required="">
         					 <label>From</label>
         					 
        				</div>
        				<div class="input-field col s6">
         					 <input name="to" type="text" class="datepicker" class="validate" required="">
         					<label>To</label>
        				</div>
					</div>

					<button type="submit" value="submit" class="btn blue right">Submit</button>
				</form>
			</div>														<!-- end of card panel-->
		<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="../assets/js/jquery.validate.1.15.0.min.js">
		</script>
		<script type="text/javascript" src="../assets/stepper/materialize-stepper.min.js"></script>
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

	<script>

			// disable the validator message
			jQuery.validator.messages.required = "";
			$("#myform").validate({
			submitHandler: function(form) {
			form.submit();
			}
			});

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