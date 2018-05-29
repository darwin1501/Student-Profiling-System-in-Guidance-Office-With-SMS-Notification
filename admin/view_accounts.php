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
//edit
if (isset($_GET['edit'])) {
	$_SESSION['id'] = $_GET["id"];
	header("location:admin_edit_user.php");
}
//block the user
if (isset($_GET['block'])) {
	$status = 0;
	$id = $_GET["id"];
	$update = mysqli_query($con, "UPDATE accounts set status = '$status' WHERE `id` = '$id' ");
}
//unblock the user
if (isset($_GET['unblock'])) {
	$status = 1;
	$id = $_GET["id"];
	$update = mysqli_query($con, "UPDATE accounts set status = '$status' WHERE `id` = '$id' ");
//view student info
}

if (isset($_GET['view'])) {
	$_SESSION['id'] = $_GET["id"];
	header("location:view_user.php");
}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Manage Acccount</title>
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
		</ul><!-- End of Side nav -->
			<div class="card-panel accounts-content z-depth-3"> 			<!--  card panel start-->
			<?php echo $output;?>
			<div class="row"  style="margin-top:5%;">
				<div class="col s4">
					<h5>Search Username or Fullname</h5>
				</div>
				<div class="col s7 pull-s1" style="margin-left:7%;">
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

			<div class="divider"></div>
			<div class="row card-top">		<!-- add margin from top-->
			<?php  							// code to display all users in table
			$result= mysqli_query($con,"SELECT * FROM accounts");
			// find  all user types
			if ($result) {
			?>
			<h4 class="center">All Accounts</h4>
			<table class="striped" style="margin-top:5%;"> <!-- start of the table -->
												<!-- HTML code here -->
			<tr>
				<thead>
					<td>Username</td>
					<td>Fullname</td>
					<td>Cellphone #</td>
					<td>Date Created</td>
					<td>Account Type</td>
					<td>Status</td>
					<td>Actions</td>
				</thead>
			</tr>
			<tbody>
				<?php
				while($row = mysqli_fetch_array($result)) { ?>
				<tr>

					<td><?php echo $row['username'];?></td>
					<td><?php echo $row['fullname'];?></td>
					<td><?php echo $row['cp_no'];?></td>
					<td><?php echo $row['date_created'];?></td>
					<td><?php $row['user_type'];
						// Identify User Type.
						if ($row['user_type'] == 2) {
							echo "user";
						}else{
							echo "guest";
						}
						?>	
					</td>
					<td><?php $row['status'];
						// Identify User Type.
						if ($row['status'] == 1) {
							echo "<div class='green' 
								 	 style='width:48px;
								 	 height:auto;
								 	 border-radius: 2px;'>
								  		<span class='white-text' 
								  			style='padding:5px;'>
								  			active
								  		</span>
								  	</div>";
						}else{
							echo "<div class='red' 
								 	 style='width:54px;
								 	 height:auto;
								 	 border-radius: 2px;'>
								  		<span class='white-text' 
								  			style='padding:5px;'>
								  			inactive
								  		</span>
								  	</div>";
						}
						?>	
					</td>
					<td>
						<a href="view_accounts.php?edit=1&id=<?php echo $row["id"];?>" class="tooltipped" data-position="top" data-delay="50" 		data-tooltip="Edit">
							<i class="fa fa-pencil-alt fa-3x icon-pad-5" style="color:#2196f3;"></i>
						</a>
						<a href="view_accounts.php?block=1&id=<?php echo $row["id"];?>" onclick="return confirm('Do you want to block this?')" class="tooltipped" data-position="top" data-delay="50" data-tooltip="block">
							<i class="fa fa-hand-paper  fa-3x icon-pad-5" style="color:#f44336; margin-left:10px"></i>
						</a>
						<a href="view_accounts.php?unblock=1&id=<?php echo $row["id"];?>" onclick="return confirm('Do you want to unblock this?')" class="tooltipped" data-position="top" data-delay="50" data-tooltip="unblock">
							<i class="fa fa-handshake  fa-3x icon-pad-5" style="color:#4CAF50; margin-left:10px"></i>
						</a>
						<a href="view_accounts.php?view=1&id=<?php echo $row["id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="view">
							<i class="fa fa-eye fa-3x icon-pad-5" style="color:#6200ea; margin-left:10px;"></i>
						</a>
					</td>

				</tr>
				<?php
				} ?>
			</tbody>
			</table> 							<!-- end table-->
												<!-- HTML code here-->
			
			<?php
				}else {
				echo mysql_error();
				}
			?>
			</div><!-- end of row -->
		</form>
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
		url:"fetch_account.php",
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