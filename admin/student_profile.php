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
//pass the value of session
$student_id = $_SESSION['student_id'];
//find student
$student_info = mysqli_query($con, "SELECT * FROM std_prf WHERE student_id = '$student_id'");
//result
$result = mysqli_fetch_array($student_info);
$result['dob'];
//calculate age
$dateOfBirth = $result['dob'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
//set the 'lrn' in session
$_SESSION['lrn'] =  $result['lrn'];

?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../assets/stepper/materialize-stepper.min.css">
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<style type="text/css">
	/* ===== tab color =======*/
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
		<li class="blue-grey darken-4">
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
		<!--  card panel start-->
		<div class="card-panel s-content z-depth-3">
			<!-- back button-->
			<div class="row">
				<div class="col s2 push-s10">
					<a href="export_to_word.php" class="tooltipped" data-position="right" data-delay="50" 		data-tooltip="Export to Word">
					<button><i class="fas fa-file-word fa-3x"></i></button>
				</a>
				</div>
			</div>
			<?php include'../global/admin_tab_profile.php';?>

		</div><!-- end of card panel-->
	<?php
		}else{
			header ("location:../index.php");
			}
		}else{
			header ("location:../index.php");
		}
			?>
		</body>
			<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
			<script>
				$(document).ready(function(){
	    		$('ul.tabs').tabs();
	  			});

	  			//Collapsible sidenav
				$(".button-collapse").sideNav();
			</script>
		</html><!-- END of body html here-->
