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
	$user_id = $arr1['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$sec_question = trim(mysqli_real_escape_string($con, $_POST['sec_question']));
$sec_answer = trim(mysqli_real_escape_string($con, $_POST['sec_answer']));

$sql1 = mysqli_query($con, "UPDATE admin set sec_question = '$sec_question', sec_ans = '$sec_answer' WHERE `id` = '$user_id' ");
}
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
		<form method="POST">
			
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
		<div class="card-panel set-sec-content z-depth-3"> <!--  card panel start-->
		<?php echo $output; ?>
		<span class="card-title center"><h5>Set Security</h5></span>
		<div class="row card-top">
			<!-- first row -->
			<div class="input-field col s12">
				<select name="sec_question" required>
					<option value="" disabled selected>Choose your question</option>
					<option value="What is the first name of the person you first kissed?">What is the first name of the person you first kissed?</option>
					<option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
					<option value="What is your favorite movie?">What is your favorite movie?</option>
					<option value="Who is your favorite actor, musician, or artist?">Who is your favorite actor, musician, or artist?</option>
				</select>
				<label>Security Questions</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input name="sec_answer" type="text" class="validate" required>
				<label for="last_name">Answer</label>
			</div>
		</div>
		<div class="row">
			<!-- buttons-->
			<div class=" col s4 m3 push-s4 push-m2  custom-button-top">
				<a class="btn waves-effect waves-light red darken-4" href="change_ps_admin.php">
					Cancel
				</a>
			</div>
			<div class=" col s3 m4 push-s3 push-m3 custom-button-top">
				<button class="btn waves-effect waves-light blue darken-4" type="submit" value="submit">Submit
				</button>
			</div>
			<!-- end of row -->
		</div>
		<!-- end of card panel--></div>
	</form>
	<?php
	}
	else
	{
	header ("location:../login_admin.php");
	}
	}
	else
	header ("location:../login_admin.php");
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
<?php