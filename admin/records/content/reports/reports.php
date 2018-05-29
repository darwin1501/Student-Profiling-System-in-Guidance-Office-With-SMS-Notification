<?php
$output = null;
ob_start();
session_start();
include '../../../../database/db.php';
if(isset($_SESSION['user_type'])== 1){
$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."' AND `user_type`= 1 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1){
	
// this value was get from the admin_student_record page
$from = $_SESSION['from'];
$to = $_SESSION['to'];
//insert year
// $date_from = date_create(''.$year.'-01-01');
// $date_to = date_create(''.$year.'-01-31');

//create date format
$result_date_from = $from;
$result_date_to = $to;

//set the date in sessions
$_SESSION['date_from'] = $result_date_from;
$_SESSION['date_to'] = $result_date_to;


//########## OVERALL QUERIES OF THE MONTH  ###############
include'../dynamic_content/total_month_query.php';
//#######################################################

// //######## GRADE 7 ###########
include'../dynamic_content/total_month_query_grd7.php';

// //######## GRADE 8 ###########
include'../dynamic_content/total_month_query_grd8.php';

// //######## GRADE 9 ###########
include'../dynamic_content/total_month_query_grd9.php';

// //######## GRADE 10 ###########
include'../dynamic_content/total_month_query_grd10.php';
?>

<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Result</title>
		<!-- header-->
		<?php include'../../header.php';?>
	</head>
	<body>
		<div id="div1" style="display:none"></div>
		<!-- Form here-->
			<?php include '../../nav_top.php'; ?>
			<!-- sidenav -->
				<?php include'../../aside.php';?>
			<!--  card panel start-->
			<div class="card-panel student-records-results-content z-depth-3">
				<form method="POST">
					<!-- content here -->
						<div class="card light-blue white-text darken-2" style="width:100%;">
							<div class="card-content">
								<h5 class=" col s4 center"><b>OVERALL SUMMARY REPORT OF OFFENSES</b>
								</h5><br>
								<h5 class="center">from &nbsp;<?php echo $from;?>&nbsp;to&nbsp;<?php echo $to;?></h5>
							</div>
						</div>
						<br>
						<br>
					<!-- over all data from all grade level -->
					<?php include'../dynamic_content/over_all_data.php';?>
					<!-- just add another <li> to add more collapsible-->
					<ul class="collapsible collapsible-report" data-collapsible="expandable" style="margin-top:170px;">
						<li>
							<!-- GRADE 7-->
						 <?php include'../collapsible_content/grd7.php';?>
						</li>
						<li>
							<!-- GRADE 8-->
						 <?php include'../collapsible_content/grd8.php';?>
						</li>
						<li>
							<!-- GRADE 9-->
						 <?php include'../collapsible_content/grd9.php';?>
						</li>
						<li>
							<!-- GRADE 10-->
						 <?php include'../collapsible_content/grd10.php';?>
						</li>
					</ul>
				</form>
			</div> <!-- end of card panel-->
		<?php
			}else{
				header ("location:../../../../index.php");
				}
			}else{
				header ("location:../../../../index.php");
			}
		?>
		</body>
			<?php include'../../footer.php';?>
	</html><!-- END of body html here-->

	