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

 $find_account = mysqli_query($con," SELECT * FROM accounts where `id` = '".$_SESSION['id']."' ");
 $result = mysqli_fetch_array($find_account);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$fullname = trim(mysqli_real_escape_string($con, $_POST['fullname']));
$gender = trim(mysqli_real_escape_string($con, $_POST['gender']));
$dob = trim(mysqli_real_escape_string($con, $_POST['dob']));
$address = trim(mysqli_real_escape_string($con, $_POST['address']));
$cp_no = trim(mysqli_real_escape_string($con, $_POST['cp_no']));
$user_role = mysqli_real_escape_string($con, $_POST['user']);


$update = mysqli_query($con, "UPDATE accounts set fullname = '$fullname', gender = '$gender', dob = '$dob', address = '$address', cp_no = '$cp_no', user_type = '$user_role' WHERE `id` = '".$_SESSION['id']."' ");

header('location:admin_edit_user.php');
}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Edit User Profile</title>
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
		<!-- body here -->
		<!-- Form here-->
		<form method="POST" action="#">
			
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
		<li class="blue-grey darken-4">
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
		</ul><!-- End of Side nav-->
			<div class="card-panel adduser-content z-depth-3"> 
			<div class="row"><!--  card panel start-->
				<?php echo $output; ?> 
				<a href="view_accounts.php"> <!-- Alert Message will display here-->
					<div class="btn waves-dark blue-grey lighten-4">
						<span class="black-text">Back</span>
					</div>
				</a>
			</div>
			<br>
			<span><b>Date Created:</b> <?php echo  $result['date_created'];?></span>
			<br>
			<div class="divider" style="margin-top:10px;"></div>
			<h5 class="center">Edit Profile</h5>
			<div class="row">
				<div class="input-field col s8 push-s2">
					<input type="text" name="fullname" value="<?php echo $result['fullname'];?>" 
					class="validate" required>
					<label>Fullname</label>
				</div>
			</div> <!-- end of row -->
			<div class="row">
				<div class="input-field col s2 push-s2">
					<select name="gender">
						<option value="<?php echo $result['gender'];?>"><?php echo $result['gender'];?>
						</option>
						<option value="male">male</option>
						<option value="female">female</option>
					</select>
					<label>Gender</label>
				</div>
				<div class="input-field col s3 push-s2">
					<input type="text" name="dob" 
					class="datepicker" value="<?php echo $result['dob'];?>" required>
					<label>Date of Birth</label>
				</div>
			</div><!-- end of orw -->
			<div class="row">
				<div class="input-field col s8 push-s2">
					<input type="text" name="address" 
					class="validate" value="<?php echo $result['address'];?>" required>
					<label>Address</label>
				</div>
			</div><!-- end of orw -->
			<div class="row">
				<div class="input-field col s4 push-s2">
					<input type="text" name="cp_no" 
					class="validate" value="<?php echo $result['cp_no'];?>" required>
					<label>Cellphone No.</label>
				</div>
			</div><!-- end of orw -->
			<div class="row">
				<div class="input-field col s2 push-s2">
					<?php if ($result['user_type'] == 2 ){
						$account = 'User';
					 }elseif ($result['user_type'] == 3 ) {
					  	$account = 'Guest';
					  } ?>
					<select name="user">
						<option value="<?php echo $result['user_type'];?>"><?php echo $account;?>
						</option>
						<option value="2">User</option>
						<option value="3">Guest</option>
					</select>
					<label>Account Type</label>
				</div>	
				<div class=" col s4 push-s4" style="margin-top:40px;">
					<button class="btn waves-effect waves-light blue darken-4">Update
					</button>
				</div>
			</div><!-- end of row -->
			</form>
			</div><!-- end of card panel-->
			<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
			<script src="../assets/stepper/materialize-stepper.min.js"></script>
			<script>
			//Collasible side nave
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

			$('select').material_select();  

			// This script will show the error warning in drop down SELECT USER TYPE
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