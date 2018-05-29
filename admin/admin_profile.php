<?php
$output = null;
error_reporting(0);
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 1){
$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."' AND `user_type`= 1 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);

//calculate the age
$dateOfBirth = $arr1['dob'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));

if($num1==1){

if (isset($_GET['edit'])) {
	$_SESSION['id'] = $_GET["id"];
	header("location:admin_edit_profile.php");
}


?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script type="text/javascript" src="../assets/js/Chart.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<!-- navigation at top-->		
		<?php include'nav_top.php';?>
		<!-- Side Nav-->
	<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3">
		<li class="blue-grey darken-4">
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
		<!--  card panel start-->
		<div class="card-panel profile-content z-depth-3">

		<div class="row"><!--  card panel start-->
			<?php echo $output; ?> 
			<a href="admin_dashboard.php"> <!-- Alert Message will display here-->
				<div class="btn blue">
					<span class="white-text">Back</span>
				</div>
			</a>
		</div>
			<br>
			<br>
			<div class="divider" style="margin-top:10px;"></div>
			<h5 class="center">Profile</h5>
			<div class="row">
				<h6 class="col s8 push-s2"><b>Fullname:</b> <?php echo $arr1['fullname'];?></h6>
				<h6 class="col s3 pull-s2"><b>Age:</b><?php echo $diff->format('%y');?></h6>
			</div> <!-- end of row -->
			<div class="row">
				<h6 class="col s4 push-s2"><b>Gender:</b> <?php echo $arr1['gender'];?></h6>
				<h6 class="col s6 push-s2"><b>Date of Birth:</b> <?php echo $arr1['dob'];?></h6>
			</div><!-- end of orw -->
			<div class="row">
				<h6 class="col s8 push-s2"><b>Address:</b> <?php echo $arr1['address'];?></h6>
			</div><!-- end of orw -->
			<div class="row">
				<h6 class="col s8 push-s2"><b>Contact #:</b> <?php echo $arr1['cp_no'];?></h6>
			</div><!-- end of orw -->
			<div class="row">
					<?php 
						if ($arr1['user_type'] == 1 ){
							$account = 'Admin';
						 }else{
						  	$account = 'Error';
						  } 
					  ?>
					<h6 class="col s8 push-s2"><b>Account Type:</b> <?php echo $account;?></h6>
			</div>
			<div class="row">
			<div class=" col s4 push-s4" style="margin-top:20px;">
				<a href="admin_edit_profile.php?edit=1&id=<?php echo $arr1["id"];?>">
							<div class="btn waves-effect waves-light blue">Edit Profile
					</div>
				</a>
			</div>
			</div><!-- end of row -->	
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
		//Collapsible sidenav
			$(".button-collapse").sideNav();
	</script>
</html>															<!-- END of body html here-->