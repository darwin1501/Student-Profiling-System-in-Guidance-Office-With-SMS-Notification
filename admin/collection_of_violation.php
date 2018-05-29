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

$total_minor = mysqli_query($con, "SELECT * FROM all_violation WHERE violation_type = 'minor'");
$count_minor = mysqli_num_rows($total_minor);

$total_major = mysqli_query($con, "SELECT * FROM all_violation WHERE violation_type = 'major'");
$count_major = mysqli_num_rows($total_major);

$total_violation = mysqli_query($con, "SELECT * FROM all_violation");
$count_total_violation = mysqli_num_rows($total_violation);
//delete
if (isset($_GET['delete'])) {
	# code...
$violation_id = $_GET["violation_id"];
//delete query
$sql= mysqli_query($con,"DELETE  FROM all_violation WHERE violation_id = $violation_id");
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
	
$_SESSION['violation_id'] = $_GET["violation_id"];

// find the section here, and set it to session.
echo $_SESSION['violation_id'];
header("location:edit_violation_collection.php");
}


?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Collection of Violation</title>
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
		<li class="blue-grey darken-4">
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
			<div class="card-panel collection-of-violation-content z-depth-3"> 			<!--  card panel start-->
			<?php echo $output;?>
			<span class=" center card-title"><h5>Violations</h5></span>
			<div class="divider"></div>
			<br>
			<div class="row">
				<a href="add_violation_collection.php" class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Add Violation"><i class="fa fa-plus-circle fa-4x icon-pad-5" style="color:#2196f3; margin-left:10px;"></i>
				</a>
			</div>
			<div class="row"><!-- add margin from top-->
			<div class=" col s1 card green " style="width:25%; height: 100px;">
				<div class="white-text" style="padding-left:15px;">
					<ul>
						<li><h4><?php echo $count_minor; ?></h4></li>
						<li><p>Minor</p></li>
					</ul>
				</div>
			</div>
			<div class=" col s1 card yellow darken-3" style="width:25%; height: 100px; margin-left:2%;">
				<div class="white-text" style="padding-left:15px; ">
					<ul>
						<li><h4><?php echo $count_major; ?></h4></li>
						<li><p>Major</p></li>
					</ul>
				</div>
			</div>
			<div class=" col s1 card blue " style="width:25%; height: 100px; margin-left:5%;">
				<div class="white-text" style="padding-left:15px;">
					<ul>
						<li><h4><?php echo $count_total_violation; ?></h4></li>
						<li><p>Total Violation</p></li>
					</ul>
				</div>
			</div>
		</div>
			<?php  							// code to display all users in table
			$result= mysqli_query($con,"SELECT * FROM all_violation ORDER BY violation ASC");
			
			if ($result) {
			?>
			<div class="row">
			<table class="striped"> 			<!-- start of the table -->
												<!-- HTML code here -->
			<tr>
				<thead>
					<td><b>Violation</b></td>
					<td><b>Violation Type</b></td>
					<td><b>Actions</b></td>
				</thead>
			</tr>
			<tbody>
				<?php
				while($row = mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row['violation'];?></td>
					<td><?php echo $row['violation_type'];?></td>
					<td>
						<a href="collection_of_violation.php?delete=1&violation_id=<?php echo $row["violation_id"];?>" onclick="return confirm('Do you want to delete this?')" class= "tooltipped" data-position="top" data-delay="50" data-tooltip="Delete">
							<i class="fa fa-trash fa-2x icon-pad-5" style="color:#f44336;"></i>
						</a>
						<a href="collection_of_violation.php?edit=1&violation_id=<?php echo $row["violation_id"];?>" class= "tooltipped" data-position="top" data-delay="50" data-tooltip="Edit">
							<i class="fa fa-pencil-alt fa-2x icon-pad-5" style="color:#2196f3; margin-left:10px;"></i></i>
						</a>
					</td>
				</tr>
				<?php
				} ?>
			</tbody>
			</table> 							<!-- end table-->
				</div>								<!-- HTML code here-->
			
			<?php
				}else {
				echo mysql_error();
				}
			?>
																<!-- end of row -->
		</form>
													<!-- end of card panel-->
		<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
		<script>
		//Collapsible sidenav
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