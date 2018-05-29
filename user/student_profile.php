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

$student_id = $_SESSION['student_id'];

$student_info = mysqli_query($con, "SELECT * FROM std_prf WHERE student_id = '$student_id'");

$result = mysqli_fetch_array($student_info);

$result['dob'];
//calculate age
$dateOfBirth = $result['dob'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));

//set the lrn in session
$_SESSION['lrn'] = $result['lrn'];

?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
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
		</ul><!-- end of nav -->
		<div class="card-panel s-content z-depth-3">
			<?php include'../global/user_tab_profile.php';?>
		</div><!-- end of card panel-->
			<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>

			<script>
				//Collabsible Items
				$(".button-collapse").sideNav();
				//tab script 
			 	$(document).ready(function(){
	    		$('ul.tabs').tabs();
	  			});
			</script>
	<?php
		}else{
			header ("location:../login_admin.php");
			}
		}else{
			header ("location:../login_admin.php");
		}
			?>
		</body>
		</html><!-- END of body html here-->
