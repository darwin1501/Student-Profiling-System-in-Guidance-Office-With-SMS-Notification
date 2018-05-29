<?php
$output = NULL;
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 1)
{
$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."' AND `user_type`= 1 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1)
{
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$old_pass=trim(mysqli_real_escape_string($con, $_POST['c_password']));
$new_pass=trim(mysqli_real_escape_string($con, $_POST['n_password']));
$re_pass=trim(mysqli_real_escape_string($con, $_POST['r_password']));
$encrypted = password_hash($new_pass, PASSWORD_DEFAULT);
$chg_pwd=mysqli_query($con, "SELECT * FROM admin WHERE username ='".$_SESSION['username']."'");
$chg_pwd1=mysqli_fetch_array($chg_pwd);
$data_pwd=$chg_pwd1['password'];
if(password_verify($old_pass, $data_pwd)){// database
if($new_pass==$re_pass){ // verification in input field check if the two are desame
$update_pwd=mysqli_query($con, "UPDATE admin set password='$encrypted' where  username ='".$_SESSION['username']."'");
$output ="<script>alert('Changed Password Sucessfully! You will be logged out from this page');
window.location='../auth/logout_process.php'</script>";
}
else{
$output = "<script>swal(
'Oops...',
'Your New password does not match the password confirmation',
'error'
)</script>";
}
}
else
{
$output = "<script>swal(
'Oops...',
'Your current password is incorrect',
'error'
)</script>";
}}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
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
		<div class="card-panel change-ps-content z-depth-3"> <!--  card panel start-->
		<?php echo $output; ?>
		<span class="card-title center"><h5>Change Password</h5></span>
		<div class="row card-top">
			<div class="col s1 push-s2" style="margin-top:4%;">
				<!-- -font awesome -->
				<i class="fab fa-expeditedssl fa-2x"></i>
			</div>
			<div class="input-field col s8 push-s2">
				<input  id="first_name2" type="password" class="validate" name="c_password" required="">
				<label class="active" for="first_name2">Current Password</label>
			</div>
		</div>
		<div class="row">
			<div class="col s1 push-s2" style="margin-top:4%;">
				<!-- -font awesome -->
				<i class="fab fa-expeditedssl fa-2x"></i>
			</div>
			<div class="input-field col s8 push-s2">
				<input  id="first_name2" type="password" class="validate" name="n_password" required="">
				<label class="active" for="first_name2">New Password</label>
			</div>
		</div>
		<div class="row">
			<div class="col s1 push-s2" style="margin-top:4%;">
				<!-- -font awesome -->
				<i class="fab fa-expeditedssl fa-2x"></i>
			</div>
			<div class="input-field col s8 push-s2">
				<input  id="first_name2" type="password" class="validate" name="r_password" required="">
				<label class="active" for="first_name2">Re-Type Password</label>
			</div>
		</div>
		<div class="row">
			<div class="col s2 push-s6 m3 push-m3 custom-button-top btn waves-effect waves-light red darken-4">
				<a href="admin_dashboard.php">
					<span class="white-text">Cancel
					</span>
				</a>
			</div>
			<div class=" col s2 push-s6 m3 push-m3 custom-button-top">
				<button class="btn waves-effect waves-light blue darken-4" type="submit" value="submit">Change
				</button>
			</div>
			<!-- end of row -->
			</div> 
			      <!-- end of card panel-->
			 <div class="row">
			 	<div class="col s2 push-s10 m2 push-m8">
			 		<a class="btn tooltipped green" data-position="bottom" data-delay="50" data-tooltip="Set security question for password recovery" href="sec_ps_admin.php">
			 			<i class="fa fa-key fa-2x icon-white icon-pad-20"></i>
			 		</a>	
			 	</div>
			 </div>	
		</form>
		<?php
		}
		else
		{
		header ("location:../index.php");
		}
		}
		else
		header ("location:../index.php");
		?>
	</body>
		<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
		<script>
			//Collapsible sidenav
			$(".button-collapse").sideNav();	
			//select	
			$(document).ready(function() {
			$('select').material_select();
			});
		</script>
</html><!-- END of body html here-->
