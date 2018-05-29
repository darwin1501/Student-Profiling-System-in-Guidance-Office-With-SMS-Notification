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

if (isset($_GET['edit'])) {
	# code...
$_SESSION['grd8_id'] = $_GET["grd8_id"];
header("location:edit_section_grd8.php");
} 

if (isset($_GET['delete'])) {
	# code...	
$grd8_id = $_GET["grd8_id"];
// find section
$select_section = mysqli_query($con, "SELECT * FROM grd8 WHERE grd8_id =  $grd8_id");
// fetch result
$result = mysqli_fetch_array($select_section);
//delete section from table grd8
$sql= mysqli_query($con,"DELETE  FROM grd8 WHERE grd8_id = $grd8_id ");
//delete section from table all_sec
$all_sec = mysqli_query($con,"DELETE  FROM all_sec WHERE section = '".$result['section']."' ");
$output = "<script>
swal({
  type: 'success',
  title: 'Sucessfully Deleted',
  showConfirmButton: false,
  timer: 1500
})
</script>";
}

if (isset($_GET['add'])) {
	# code...
$_SESSION['grd8_id'] = $_GET["grd8_id"];

header("location:grd8_add_new_adviser.php");
}

if (isset($_GET['view'])) {
	# code...
$_SESSION['grd8_id'] = $_GET["grd8_id"];

header("location:g8_info.php");
}


?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Grade 8</title>
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
		<form method="POST" action="#">
			
			<?php include'nav_top.php';?>
			
			<!-- Side Nav--> 
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
							<li><a href="grade7.php" class="white-text">Grade 7</a></li>
							<li class="blue-grey darken-4"><a href="grade8.php" class="white-text">Grade 8</a></li>
							<li><a href="grade9.php" class="white-text">Grade 9</a></li>
							<li><a href="grade10.php" class="white-text">Grade 10</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</li>
		</ul>
			<div class="card-panel year-level-content z-depth-3"> 
				<div class="row"><!--  card panel start-->
			<?php echo $output; ?>  <!-- Alert Message will display here-->
				<div class="card-panel green lighten-1 center" 
						  style="width:170px; 
						         height:100px;">
					<h5 class="green-text text-darken-4">
						Grade 8
					</h5>
				</div>
			</div>
			<div class="divider"></div>
			<br>
				<div class="row">
					<div class=" col s1 push-s10 custom-button-top">
						<a href="add_section_grd8.php" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Add Section">
							<i class="fa fa-plus-circle fa-4x icon-pad-5" style="color:#2196f3; margin-left:10px;"></i>
						</a>
					</div>
				</div>
				<table class="striped">
					<thead>
						<tr>
							<th>Section</th>
							<th>Adviser</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Actions</th>
						</tr>
					</thead>	
					<tbody>
						<?php 
						$grd8_query = mysqli_query($con, "SELECT * FROM grd8 ORDER BY section ASC");
						if (mysqli_num_rows($grd8_query ) > 0) {
							while($row = mysqli_fetch_array($grd8_query )) {
						?>
						<tr>
								<td><?php echo $row['section'];?></td>
								<td><?php echo $row['adviser'];?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
							<a href="grade8.php?delete=1&grd8_id=<?php echo $row["grd8_id"];?>" onclick="return confirm('Do you want to delete this?')" 	class="tooltipped" data-position="top" data-delay="50" data-tooltip="Delete">
								<i class="fa fa-trash fa-4x icon-pad-5" style="color:#f44336;"></i>
							</a>
							<a href="grade8.php?edit=1&grd8_id=<?php echo $row["grd8_id"];?>" class="tooltipped" data-position="top" data-delay="50" 		data-tooltip="Edit">
								<i class="fa fa-pencil-alt fa-4x icon-pad-5" style="color:#2196f3; margin-left:10px;"></i>
							</a>
							<a href="grade8.php?add=1&grd8_id=<?php echo $row["grd8_id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Add New Adviser">
								<i class="fa fa-plus-circle fa-4x icon-pad-5 " style="color:#4caf50; margin-left:10px;"></i>
							</a>
							<a href="grade8.php?view=1&grd8_id=<?php echo $row["grd8_id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="view">
							<i class="fa fa-eye fa-4x icon-pad-5 " style="color:#6200ea; margin-left:10px;"></i>
							</a>	
							</td>
						</tr>

						<?php 
					}

					}
						?>
					</tbody>
				</table>
			</form>
			</div><!-- end of card panel-->
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
		<script>
			//Collapsible sidenav
			$(".button-collapse").sideNav();
		</script>
		</html><!-- END of body html here-->