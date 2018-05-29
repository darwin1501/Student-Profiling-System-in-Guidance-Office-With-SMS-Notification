<?php
$output = null;
error_reporting(0);
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 2){
$query1= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_SESSION['username']."' AND `user_type`= 2 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1){

// // check internet connection
//  $connected = fopen("http://www.google.com:80/","r");
//   if($connected)
//   {
//       $status = "<div class='card-panel col s4 push-s3 green accent-4' style='width:220px; height:100px;'>
//   <div class='card-content white-text' style='padding:10%;'>
//  <span>Network Status:</span><br>
//   <h6>
//   Connected. You can now send SMS</h6></div>
//   	</div>";
//   } else {
//   $status = "<div class='card-panel col s4 push-s3 red lighten-1' style='width:220px; height:120px;'>
//   <div class='card-content white-text' style='padding:10%;'>
//  <span>Network Status:</span><br>
//   <h6>
//   Not Connected to internet. You Cant Send SMS</h6></div>
//   	</div>";
//   }

// get the total number of students
$total_students = mysqli_query($con,"SELECT * FROM std_prf");
//count result
$count_students = mysqli_num_rows($total_students);

// get the total number of students with violation
$total_violation = mysqli_query($con,"SELECT * FROM std_prf join std_violation on std_prf.lrn = std_violation.lrn ");
//count result
$count_violation = mysqli_num_rows($total_violation);


include "data_chart.php";
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
		<!-- body here -->
		<!-- Form here-->
		
			
			<!-- nav bar top-->
			<?php include 'nav_top.php';?>

			
			<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> <!-- Side Nav-->
		<li class="blue-grey darken-4">
			<a href="user_dashboard.php" class="white-text">
			<i class="fa fa-tachometer-alt  fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Dashboard
				</span>
			</a>
		</li>
		<li>
			<a href="user_add_student.php" class="white-text">
			<i class="fa fa-user-plus fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Add Students
				</span>
			</a>
		</li>
		<li>
			<a href="user_search_student.php" class="white-text">
				<i class="fa fa-search fa-2x icon-white icon-pad-5"></i>
				<span style="margin-left:20px;">
					Search Students
				</span>
			</a>
		</li>
		</ul>
		<form method="POST">
			<div class="card-panel dashboard-content z-depth-3"> 			<!--  card panel start-->
			<?php echo $output;?>

			<div style="width:900px; height:auto; margin-left:7%;">
				<h4 class="center" style="color:#616161;"><?php echo $year;?></h4>
				<canvas id="myChart"></canvas>
			</div>
			<div class="divider" style="margin-top:5%;"></div>
			<div class="row" style="margin-top:5%;">
			<div class=" col s1 card green " style="width:25%; height: 100px;">
				<div class="white-text" style="padding-left:15px;">
					<ul>
						<li><h4 style="margin-left:50px;"><?php echo $count_students; ?></h4></li>
						<li><p>Total No. of Students</p></li>
					</ul>
				</div>
			</div>
			<div class=" col s1 card yellow darken-3" style="width:25%; height: 100px; margin-left:20px;">
				<div class="white-text" style="padding-left:15px;">
					<ul>
						<li><h4 style="margin-left:50px;"><?php echo $count_violation; ?></h4></li>
						<li><p>Total No. of Violation</p></li>
					</ul>
				</div>
			</div>
	
			</div>
			
<script>
	//Collapsible sidenav	
// remove the data label at the top of the bar chart
	Chart.defaults.global.legend.display = false;
	
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"],
        datasets: [{
            label: '# of violation',
            data: [<?php echo $count_january;?>, 
            	   <?php echo $count_february;?>, 
            	   <?php echo $count_march;?>, 
            	   <?php echo $count_april;?>, 
            	   <?php echo $count_may;?>, 
            	   <?php echo $count_june;?>, 
            	   <?php echo $count_july;?>, 
            	   <?php echo $count_august;?>, 
            	   <?php echo $count_september;?>, 
            	   <?php echo $count_october;?>, 
            	   <?php echo $count_november;?>, 
            	   <?php echo $count_december;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 100, 65, 0.2)',
                'rgba(255, 139, 200, 0.2)',
                'rgba(54, 190, 235, 0.2)',
                'rgba(175, 112, 192, 0.2)',
                'rgba(255, 159, 164, 0.2)',
                'rgba(94, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 100, 65, 1)',
                'rgba(255, 139, 200, 1)',
                'rgba(54, 190, 235, 1)',
                'rgba(175, 112, 192, 1)',
                'rgba(255, 159, 164, 1)',
                'rgba(94, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
			</div>														<!-- end of row -->
		</form>
															<!-- end of card panel-->
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
			//Collabsible Items
			$(".button-collapse").sideNav();
		</script>
</html>															<!-- END of body html here-->