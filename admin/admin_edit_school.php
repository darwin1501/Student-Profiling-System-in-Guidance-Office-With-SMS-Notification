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

// echo $_SESSION['school_id']; view student lrn
	 $other_sch_query = mysqli_query($con," SELECT * FROM other_sch where `school_id` = '".$_SESSION['school_id']."' ");
	 $result = mysqli_fetch_array($other_sch_query);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$other_sch_name	 = trim(mysqli_real_escape_string($con, $_POST['other_sch_name']));
$other_sy		 = trim(mysqli_real_escape_string($con, $_POST['other_sy']));
$other_grd			 = trim(mysqli_real_escape_string($con, $_POST['other_grd']));
$other_sec		 = trim(mysqli_real_escape_string($con, $_POST['other_sec']));
$other_cls_ad			 = mysqli_real_escape_string($con, $_POST['other_cls_ad']);

$sql1 = mysqli_query($con, "UPDATE other_sch set other_sch_name = '$other_sch_name', other_sy = '$other_sy', other_grd = '$other_grd', other_sec = '$other_sec', other_cls_ad = '$other_cls_ad' WHERE `school_id` = '".$_SESSION['school_id']."' ");
//reload the page
header ("location:admin_edit_school.php"); 

}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Edit School</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../assets/stepper/materialize-stepper.min.css">
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		
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
	<!--  card panel start-->
	<div class="card-panel school-content z-depth-3">
	<form method="POST">
		<div class="row">
			<div class="input-field col s9">
				<input name="other_sch_name" type="text" value="<?php echo $result['other_sch_name'];?>">
				<label for="first_name">
					School
				</label>
			</div>
			<div class="input-field col s3">
				<input name="other_sy" type="text" value="<?php echo $result['other_sy'];?>">
				<label for="first_name">
					School Year
				</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s3">
				<select name="other_grd" required>
					<option value="<?php echo $result['other_grd'];?>"><?php echo $result['other_grd'];?></option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
				<label>Grade Level</label>
			</div>
			<div class="input-field col s3">
				<input name="other_sec" type="text" value="<?php echo $result['other_sec'];?>">
				<label for="first_name">
					Section
				</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s7">
				<input name="other_cls_ad" type="text" value="<?php echo $result['other_cls_ad'];?>">
				<label for="first_name">
					Class Adviser
				</label>
			</div>
		</div>
		<div class="group-button" style="margin-left:40%;">
			<a href="admin_edit_student.php" class="waves-effect waves-dark blue-grey lighten-4 black-text btn btn">
				Go Back
			</a>
			<button class="waves-effect waves-dark blue btn" type="submit" style="margin-left:20px;">
				Update
			</button>
		</div>
	</form>
	</div><!-- end of card panel-->
			<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
			<script src="../assets/stepper/materialize-stepper.min.js"></script>
			<script>
			//Collasible side nave
	 		$(".button-collapse").sideNav();
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