<?php
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();
include '../../database/db.php';
if(isset($_SESSION['user_type'])== 1){
$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."' AND `user_type`= 1 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1){
//find the section
$find_adviser = mysqli_query($con,"SELECT * FROM g7_advisers WHERE `g7_adviser_id` = '".$_SESSION['g7_adviser_id']."'");
$adviser_result = mysqli_fetch_array($find_adviser);
//section


if ($_SERVER["REQUEST_METHOD"] == "POST"){

$adviser = trim(mysqli_real_escape_string($con, $_POST['adviser']));
//check existing records
$check_adviser = mysqli_query($con,"SELECT * FROM g7_advisers WHERE `adviser`='".$_POST['adviser']."'");

if ($check_adviser->num_rows != 0) {  //
$output = "<script>
swal({
  type: 'error',
  title: 'Adviser Already Exists',
  showConfirmButton: false,
  timer: 2500
})
</script>";
}else{
// $query_grd7 = mysqli_query($con, "INSERT INTO g7_advisers (section, adviser, date_added) VALUES ('$section', '$adviser','$date_format')");

$update = mysqli_query($con, "UPDATE g7_advisers set adviser = '$adviser' WHERE `g7_adviser_id` = '".$_SESSION['g7_adviser_id']."' ");
header("locaion:g7_edit_info.php");
$output = "<script>
		swal({
  type: 'success',
  title: 'Sucessfully Added',
  showConfirmButton: false,
  timer: 1500
})
</script>";

header("location:g7_edit_info.php");
 }
}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Add Section</title>
		<script type="text/javascript" src="../../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../../assets/css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../../assets/stepper/materialize-stepper.min.css">
		<link type="text/css" rel="stylesheet" href="../../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../../assets/css/custom2.css"  media="screen,projection"/>
		
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<!-- body here -->
		<!-- Form here-->

			
			<?php include'nav_top.php';?>
			
			<!-- Side Nav  Start--> 
			<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> <!-- Side Nav-->
		<li>
			<a href="../admin_dashboard.php" class="white-text">
			<i class="fa fa-tachometer-alt  fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Dashboard
				</span>
			</a>
		</li>
		<li>
			<a href="../admin_add_student.php" class="white-text">
			<i class="fa fa-user-plus fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Add Students
				</span>
			</a>
		</li>
		<li><a href="../admin_add_user.php" class="white-text">
			<i class="fa fa-user-plus fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Add User
				</span>
			</a>
		</li>
		<li>
			<a href="../admin_search_student.php" class="white-text">
				<i class="fa fa-search fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Search Students
				</span>
			</a>
		</li>
		<li>
			<a href="../view_accounts.php" class="white-text">
				<i class="fa fa-users fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Manage Accounts
				</span>
			</a>
		</li>
		<li>
			<a href="../admin_students_record.php" class="white-text">
				<i class="fa fa-address-card fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Students Record
				</span>
			</a>
		</li>
		<li>
			<a href="../collection_of_violation.php" class="white-text">
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
							<li class="blue-grey darken-4"><a href="grade7.php" class="white-text">Grade 7</a></li>
							<li><a href="grade8.php" class="white-text">Grade 8</a></li>
							<li><a href="grade9.php" class="white-text">Grade 9</a></li>
							<li><a href="grade10.php" class="white-text">Grade 10</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</li>
		</ul>
			<!-- Side Nav End --> 
			<form method="POST" action="#">
				<div class="card-panel add-adviser-content z-depth-3">
				<div class="row"><!--  card panel start-->
					<!-- Alert Message will display here-->
					<?php echo $output; ?> 
					<h6 class="blue-text">Grade 7</h6>
					<span class="card-title center col s6 push-s3"><h5>Add Section</h5></span>
				</div>
				<div class="row card-top">
					<div class="input-field col s12">
						<input name="adviser" type="text" value="<?php echo $adviser_result['adviser'];?>" required>
						<label>
							Adviser
						</label>
					</div>
				</div>
				<div class="row">
					
					<div class="col s4 push-s3 m5 push-m3">
						<a href="g7_info.php" class="btn grey lighten-2 black-text">GO BACK</a>
					</div>
					<div class="col s3 push-s4 m3 push-m3">
						<button type="submit" value="submit" class="btn blue white-text">UPDATE</button>
					</div>
			
				</div>
				</div>
			</div>
				</form>
	<?php
		}else{
			header ("location:../../index.php");
			}
		}else{
			header ("location:../../index.php");
		}
			?>
		</body>
			<script type="text/javascript" src="../../assets/jquery/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../../assets/js/materialize.min.js"></script>
			<script src="../../assets/stepper/materialize-stepper.min.js"></script>
			<script>
				//Collasible side nave
				 $(".button-collapse").sideNav();
			</script>
	</html><!-- END of body html here-->