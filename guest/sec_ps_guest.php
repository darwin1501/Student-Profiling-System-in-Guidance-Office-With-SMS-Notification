<?php
$output = NULL;
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 3)
{
$query1= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_SESSION['username']."' AND `user_type`= 3 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1)
{
	$user_id = $arr1['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$sec_question = trim(mysqli_real_escape_string($con, $_POST['sec_question']));
$sec_answer = trim(mysqli_real_escape_string($con, $_POST['sec_answer']));

$sql1 = mysqli_query($con, "UPDATE accounts set sec_question = '$sec_question', sec_ans = '$sec_answer' WHERE `id` = '$user_id' ");
$output = "<script>
		swal({
  type: 'success',
  title: 'Security Question Successfully Set',
  showConfirmButton: false,
  timer: 2000
})
</script>";
}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title></title>
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
				<li>
					<a href="guest_search_student.php" class="white-text">
						<i class="fa fa-search fa-2x icon-white icon-pad-5"></i>
						<span style="margin-left:20px;">
							Search Students
						</span>
					</a>
				</li>
			</ul>
		</ul>
		<div class="card-panel set-sec-content z-depth-3"> <!--  card panel start-->
		<?php echo $output; ?>
		<span class="card-title center"><h5>Set Security</h5></span>
		<div class="row card-top">
			<!-- first row -->
			<div class="input-field col s12">
				<select name="sec_question" required>
					<option value="" disabled selected>Choose your question</option>
					<option value="What is the first name of the person you first kissed?">What is the first name of the person you first kissed?</option>
					<option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
					<option value="What is your favorite movie?">What is your favorite movie?</option>
					<option value="Who is your favorite actor, musician, or artist?">Who is your favorite actor, musician, or artist?</option>
				</select>
				<label>Security Questions</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input name="sec_answer" type="text" class="validate" required>
				<label for="last_name">Answer</label>
			</div>
		</div>
		<div class="row">
			<!-- buttons-->
			<div class=" col s4 push-s4 custom-button-top">
				<a class="btn waves-effect waves-light red darken-4" href="change_ps_guest.php">
					Cancel
				</a>
			</div>
			<div class=" col s3 push-s3 custom-button-top">
				<button class="btn waves-effect waves-light blue darken-4" type="submit" value="submit">Submit
				</button>
			</div>
			<!-- end of row -->
		</div>
		<!-- end of card panel--></div>
	</form>
	<?php
	}
	else
	{
	header ("location:../index.php");
	}
	}
	else
	header ("location:../index.php");
	?>
	</body>
	<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
	<script>
	//Collabsible Items
	$(".button-collapse").sideNav();
	//select	
	$(document).ready(function() {
	$('select').material_select();
	});
	</script>
</html><!-- END of body html here-->
<?php