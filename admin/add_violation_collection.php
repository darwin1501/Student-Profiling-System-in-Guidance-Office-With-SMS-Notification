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

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$violation= trim(mysqli_real_escape_string($con, $_POST['violation']));
$v_type = trim(mysqli_real_escape_string($con, $_POST['v_type']));

$sql = mysqli_query($con, "INSERT INTO all_violation (violation,violation_type) VALUES ('$violation','$v_type')");
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
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Add Violation</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<form method="POST">
			<!-- nav bar top-->
				<?php include 'nav_top.php';?>
	<!-- Side Nav-->
	<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> 
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
		<div class="card-panel add-violation-collection-content z-depth-3"> 			<!--  card panel start-->
					<?php echo $output;?>
					<span class=" center card-title"><h5>Add</h5></span>
					<div class="row card-top"><!-- add margin from top-->
						<div class="input-field col s12">
							<input  type="text" name="violation" required="">
							<label class="active" for="first_name2">Violation</label>
						</div>
					</div>
					<div class="row">
					<select class="col s4 m6" name="v_type" required=""> 
							<option value="" disabled selected>Violation Type</option>
							<option value="minor">Minor</option>
							<option value="major">Major</option>
					</select>
					</div>
					<button type="submit" class="btn blue right" style="margin-left:3%;">Create</button>
					<a href="collection_of_violation.php" class="btn grey lighten-2 black-text right">
					Go Back</a>
			</div>
			<!-- end of card panel-->
		</form>
								
		<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
		<script>
		//select
		$('select').material_select();
		//Collasible side nave
		 $(".button-collapse").sideNav();
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
	</html>															<!-- END of body html here-->