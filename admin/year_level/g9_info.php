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

// echo $_SESSION['grd7_id'];
//find the section
$grd9_section = mysqli_query($con,"SELECT * FROM grd9 WHERE `grd9_id` = '".$_SESSION['grd9_id']."'");
$g9_result = mysqli_fetch_array($grd9_section);
//section
$section = $g9_result['section'];
// get all advisers in secction
$find_adviser = mysqli_query($con, "SELECT * FROM g9_advisers WHERE `section` = '$section' ORDER BY date_added DESC");

if (isset($_GET['delete'])) {
	# code...
$g9_adviser_id= $_GET["g9_adviser_id"];

		$sql= mysqli_query($con,"DELETE  FROM g9_advisers WHERE g9_adviser_id = '$g9_adviser_id '");
		header("location:g9_info.php");

}
if (isset($_GET['edit'])) {
$_SESSION['g9_adviser_id'] = $_GET["g9_adviser_id"];

header("location:g9_edit_info.php");
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
		<?php echo $output;?>
			<!-- Side Nav End --> 
			<form method="POST" action="#">
				<div class="card-panel adviser-content z-depth-3">
					<div class="row">					
							<div class="col s4">
								<a href="grade9.php" class="btn grey lighten-2 black-text">GO BACK</a>
							</div>
						</div>
						<h4 class="center"><?php echo $section;?></h4>
			<table class="striped"> 			<!-- start of the table -->											<!-- HTML code here -->
			<tr>
				<thead>
					<td>Adviser</td>
					<td>Date Added</td>
					<td>Actions</td>
				</thead>
			</tr>
			<tbody>
				<?php
				while($row = mysqli_fetch_array($find_adviser)) 
				{ 

					?>
				<tr>
					<td><?php echo $row['adviser'];?></td>
					<td><?php echo $row['date_added'];?>	</td>
					<td>
						<a href="g9_info.php?delete=1&g9_adviser_id=<?php echo $row["g9_adviser_id"];?>" onclick="return confirm('Do you want to delete this?')" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Delete">
							<i class="fa fa-trash fa-2x icon-pad-5" style="color:#f44336; margin-left:10px;"></i>
						</a>
						<a href="g9_info.php?edit=1&g9_adviser_id=<?php echo $row["g9_adviser_id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Edit">
							<i class="fa fa-pencil-alt fa-2x icon-pad-5" style="color:#2196f3; margin-left:10px;"></i>
						</a>
					</td>
				</tr>
				<?php
				} ?>
			</tbody>
			</table>
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