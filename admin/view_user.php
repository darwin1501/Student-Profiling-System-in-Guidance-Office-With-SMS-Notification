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

 $find_accounts = mysqli_query($con," SELECT * FROM accounts where `id` = '".$_SESSION['id']."' ");
 $result = mysqli_fetch_array($find_accounts );

if (isset($_GET['view'])) {
	$_SESSION['id'] = $_GET["id"];
	header("location:admin_edit_user.php");
}

?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Add User</title>
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
					<div class="btn blue">
						<span class="white-text">Back</span>
					</div>
				</a>
			</div>
			<br>
			<span><b>Date Created:</b> <?php echo  $result['date_created'];?></span>
			<br>
			<div class="divider" style="margin-top:10px;"></div>
			<h5 class="center">Profile</h5>
			<div class="row">
					<h6 class="col s8 push-s2"><b>Fullname:</b> <?php echo $result['fullname'];?></h6>
			</div> <!-- end of row -->
			<div class="row">
				<h6 class="col s4 push-s2"><b>Gender:</b> <?php echo $result['gender'];?></h6>
				<h6 class="col s6 push-s2"><b>Date of Birth:</b> <?php echo $result['dob'];?></h6>
			</div><!-- end of orw -->
			<div class="row">
				<h6 class="col s8 push-s2"><b>Address:</b> <?php echo $result['address'];?></h6>
			</div><!-- end of orw -->
			<div class="row">
				<h6 class="col s8 push-s2"><b>Contact #:</b> <?php echo $result['cp_no'];?></h6>
			</div><!-- end of orw -->
			<div class="row">
					<?php 
						if ($result['user_type'] == 2 ){
							$account = 'Guidance Officer';
						 }elseif ($result['user_type'] == 3 ) {
						  	$account = 'Guest';
						  } 
					  ?>
					<h6 class="col s8 push-s2"><b>Account Type:</b> <?php echo $account;?></h6>
			</div>
			<div class="row">
			<div class=" col s4 push-s4" style="margin-top:20px;">
				<a href="view_user.php?view=1&id=<?php echo $result["id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="view">
							<div class="btn waves-effect waves-light blue darken-4">Edit Profile
					</div>
				</a>
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