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

//delete
if (isset($_GET['delete'])) {
		$student_id = $_GET["student_id"];
		//get student lrn
		$students_lrn = mysqli_query($con,"SELECT * FROM std_prf WHERE student_id = '$student_id'");
		//result
		$lrn_result = mysqli_fetch_array($students_lrn);
		//delete students violation records
		$sql= mysqli_query($con,"DELETE  FROM std_violation WHERE lrn = '".$lrn_result['lrn']."'");
		//delete students other school in records
		$sql= mysqli_query($con,"DELETE  FROM other_sch WHERE lrn = '".$lrn_result['lrn']."'");
		//delete students information
		$sql= mysqli_query($con,"DELETE  FROM std_prf WHERE student_id = $student_id");
//alert
$output = "<script>
			swal({
  			type: 'success',
  			title: 'Sucessfully Deleted',
  			showConfirmButton: false,
  			timer: 1500
			})
		</script>";
}
//edit
if (isset($_GET['edit'])) {
	# code...
	$student_id = $_GET["student_id"];
// the std_prf "id" was set in $_SESSION[]
// it will pass the id from this page
// to another page(admin_edit_student.php, stepper2.php)
	$_SESSION['student_id'] = $student_id;
	//redirect to
	 header ("location:admin_edit_student.php");
}
//add
if (isset($_GET['add'])) {
		# code...
		# // get student_id
	$student_id = $_GET["student_id"];
	echo $student_id;
	// set student id in session
	$_SESSION['student_id'] = $student_id;
	//redirect to
	 header ("location:admin_add_violation2.php");
}
//view
if (isset($_GET['view'])) {
		# code...
		# // get student_id
	$student_id = $_GET["student_id"];
	echo $student_id;
	// set student id in session
	$_SESSION['student_id'] = $student_id;
	//redirect to
	 header ("location:student_profile.php");
}

?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
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
		<li class="blue-grey darken-4">
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
		<div class="card-panel s-content z-depth-3"> <!--  card panel start-->
		<!-- Content here-->
		<?php echo $output; ?>
		<div class="row">
			<div class="col s3" style="margin-top:.5%; margin-left:3%;">
				<h5>Search Name or LRN</h5>
			</div>
			<div class="col s8 pull-s1" style="margin-left:5%;">
				<nav>
					<div class="nav-wrapper light-blue">
						<div class="input-field">
							<input name="search_text" id="search_text" type="search" required>
							<label class="label-icon" for="search"></label>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<br>
		<div class="divider"></div>
		<div id="result"></div>
		</div><!-- end of card panel-->
			<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
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

		<script> 
		//Collapsible sidenav
		$(".button-collapse").sideNav();


		// this script will perform ajax request from server
		$(document).ready(function(){
		$('#search_text').keyup(function(){
		var txt = $(this).val();
		if (txt != '') {
		$('#result').html('');
		$.ajax({
		url:"fetch_student.php",
		method:"post",
		data:{search:txt},
		dataType:"text",
		success:function(data)
		{
		$('#result').html(data);
		}
		})
		}else{
		}
		});
		})
		</script>