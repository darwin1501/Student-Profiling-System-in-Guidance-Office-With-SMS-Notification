<?php
$output = NULL;
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 2)
{
$query1= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_SESSION['username']."' AND `user_type`= 2 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1)
{
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$old_pass=trim(mysqli_real_escape_string($con, $_POST['c_password']));
$new_pass=trim(mysqli_real_escape_string($con, $_POST['n_password']));
$re_pass=trim(mysqli_real_escape_string($con, $_POST['r_password']));
$encrypted = password_hash($new_pass, PASSWORD_DEFAULT);
$chg_pwd=mysqli_query($con, "SELECT * FROM accounts WHERE username ='".$_SESSION['username']."'");
$chg_pwd1=mysqli_fetch_array($chg_pwd);
$data_pwd=$chg_pwd1['password'];
if(password_verify($old_pass, $data_pwd)){// database
if($new_pass==$re_pass){ // verification in input field check if the two are desame
$update_pwd=mysqli_query($con, "UPDATE accounts set password='$encrypted' where  username ='".$_SESSION['username']."'");
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
			<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> <!-- Side bar-->
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
				<li>
					<a href="user_search_student.php" class="white-text">
						<i class="fa fa-search fa-2x icon-white icon-pad-5"></i>
						<span style="margin-left:20px;">
							Search Students
						</span>
					</a>
				</li>
			</ul>
		<div class="card-panel adduser-content z-depth-3"> <!--  card panel start-->
		<h4>
		<?php echo $output; ?>
		</h4>
		<div class="row card-top">
			<div class="col s1 push-s1" style="margin-top:5%;">
				<!-- -font awesome -->
				<i class="fab fa-expeditedssl fa-2x"></i>
			</div>
			<div class="input-field col s8 push-s1">
				<input  id="first_name2" type="password" class="validate" name="c_password" required="">
				<label class="active" for="first_name2">Current Password</label>
			</div>
		</div>
		<div class="row">
			<div class="col s1 push-s1" style="margin-top:5%;">
				<!-- -font awesome -->
				<i class="fab fa-expeditedssl fa-2x"></i>
			</div>
			<div class="input-field col s8 push-s1">
				<input  id="first_name2" type="password" class="validate" name="n_password" required="">
				<label class="active" for="first_name2">New Password</label>
			</div>
		</div>
		<div class="row">
			<div class="col s1 push-s1" style="margin-top:5%;">
				<!-- -font awesome -->
				<i class="fab fa-expeditedssl fa-2x"></i>
			</div>
			<div class="input-field col s8 push-s1">
		
				<input  id="first_name2" type="password" class="validate" name="r_password" required="">
				<label class="active" for="first_name2">Re-Type Password</label>
			</div>
		</div>
		<div class="row">
			<div class=" col s2 push-s6 custom-button-top btn waves-effect waves-light red darken-4">
				<a href="user_dashboard.php">
					<span class="white-text">Cancel</span>
				</a>
			</div>
			<div class=" col s2 push-s6 custom-button-top">
				<button class="btn waves-effect waves-light blue darken-4" type="submit" value="submit">Change
				</button>
			</div>
			<!-- end of row -->
			</div>
			<div class="row">
				<div class="col s2 push-s9">
			 		<a class="btn tooltipped green" data-position="bottom" data-delay="50" data-tooltip="Set security question for password recovery" href="sec_ps_user.php">
			 			<i class="fa fa-key fa-2x icon-white icon-pad-20"></i>
			 		</a>	
			 	</div>
			</div>       <!-- end of card panel-->
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