<?php
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 3){
$query1= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_SESSION['username']."' AND `user_type`= 3 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1){




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
		<!-- body here -->
		<!-- Form here-->
		
			
			<?php include'nav_top.php';?>
			
			<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> <!-- Side Nav-->
				<li>
					<a href="guest_dashboard.php" class="white-text">
					<i class="fa fa-tachometer-alt  fa-2x icon-white icon-pad-5"></i>
						<span style="margin-left:20px;">
							Dashboard
						</span>
					</a>
				</li>
				<li class="blue-grey darken-4">
					<a href="guest_search_student.php" class="white-text">
						<i class="fa fa-search fa-2x icon-white icon-pad-5"></i>
						<span style="margin-left:20px;">
							Search Students
						</span>
					</a>
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
      <div id="result">
      	
      </div>		
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
				//Collabsible Items
				$(".button-collapse").sideNav();
			</script>
	</html><!-- END of body html here-->

		<script> // this script will perform ajax request from server
		$(document).ready(function(){
		$('#search_text').keyup(function(){
		var txt = $(this).val();
		if (txt != '') {
		$('#result').html('');
		$.ajax({
		url:"fetch.php",
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