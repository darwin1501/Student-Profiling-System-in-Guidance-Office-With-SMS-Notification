<?php
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 2){
$query1= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_SESSION['username']."' AND `user_type`= 2 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);
if($num1==1){

// echo $_SESSION['school_id']; view student lrn

	 $other_sch_query = mysqli_query($con," SELECT * FROM other_sch where `school_id` = '".$_SESSION['school_id']."' ");
	 $result = mysqli_fetch_array($other_sch_query);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$other_sch_name	 = trim(mysqli_real_escape_string($con, $_POST['other_sch_name']));
$other_sy		 = trim(mysqli_real_escape_string($con, $_POST['other_sy']));
$other_grd			 = trim(mysqli_real_escape_string($con, $_POST['other_grd']));
$other_sec		 = trim(mysqli_real_escape_string($con, $_POST['other_sec']));
$other_cls_ad			 = mysqli_real_escape_string($con, $_POST['other_cls_ad']);

$sql1 = mysqli_query($con, "UPDATE other_sch set other_sch_name = '$other_sch_name', other_sy = '$other_sy', other_grd = '$other_grd', other_sec = '$other_sec', other_cls_ad = '$other_cls_ad' WHERE `school_id` = '".$_SESSION['school_id']."' ");

header ("location:user_edit_school.php"); 

}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Edit School</title>
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

			<!-- nav bar top-->
			<?php include 'nav_top.php';?>

	<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3"> <!-- Side Nav-->
		<li>
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
			<div class="card-panel school-content z-depth-3"><!--  card panel start-->
			<form method="POST">
	<!--  card panel start-->

		<div class="row">
			<div class="input-field col s9">
				<input name="other_sch_name" type="text" value="<?php echo $result['other_sch_name'];?>">
				<label for="first_name">
					School
				</label>
			</div>
			<div class="input-field col s3">
				<input name="other_sy" type="text" value="<?php echo $result['other_sy'];?>">
				<label for="first_name">
					School Year
				</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s3">
				<select name="other_grd" required>
					<option value="<?php echo $result['other_grd'];?>"><?php echo $result['other_grd'];?></option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
				<label>Grade Level</label>
			</div>
			<div class="input-field col s3">
				<input name="other_sec" type="text" value="<?php echo $result['other_sec'];?>">
				<label for="first_name">
					Section
				</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s7">
				<input name="other_cls_ad" type="text" value="<?php echo $result['other_cls_ad'];?>">
				<label for="first_name">
					Class Adviser
				</label>
			</div>
		</div>
		<div class="group-button" style="margin-left:40%;">
			<a href="user_edit_student.php" class="waves-effect waves-dark blue-grey lighten-4 black-text btn btn">
				Go Back
			</a>
			<button class="waves-effect waves-dark blue btn" type="submit" style="margin-left:20px;">
				Update
			</button>
		</div>
</form>
			</div><!-- end of card panel-->
			<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
			<script src="../assets/stepper/materialize-stepper.min.js"></script>
			<script>
			//Collabsible Items
			$(".button-collapse").sideNav();
			function anyThing() {
			  setTimeout(function(){ $('.stepper').nextStep(); }, 1500);
			}

			$(function(){
			   $('.stepper').activateStepper();
			});

			$('select').material_select();  // This script will show the error warning in drop down SELECT USER TYPE
			$('select[required]').css({
			display: 'inline',
			position: 'absolute',
			float: 'left',
			padding: 0,
			margin: 0,
			border: '1px solid rgba(255,255,255,0)',
			height: 0,
			width: 0,
			top: '2em',
			left: '3em',
			opacity: 0,
			pointerEvents: 'none'
			});
			// Extension pour comptabilité avec materialize.css
			$.validator.setDefaults({
			highlight: function(element, errorClass, validClass) {
			if (element.tagName === 'SELECT')
			$(element).closest('.select-wrapper').addClass('invalid');
			else
			$(element).removeClass(validClass).addClass(errorClass);
			},
			unhighlight: function(element, errorClass, validClass) {
			if (element.tagName === 'SELECT')
			$(element).closest('.select-wrapper').removeClass('invalid');
			else
			$(element).removeClass(errorClass).addClass(validClass);
			},
			errorClass: 'invalid',
			validClass: "valid",
			errorPlacement: function(error, element) {
			if (element.prop('tagName')  === 'SELECT') {
			// alternate placement for select error
			error.appendTo( element.parent() );
			error.addClass('active');
			}
			else {
			$(element)
			.closest("form")
			.find("label[for='" + element.attr("id") + "']")
			.attr('data-error', error.text());
			}
			},
			submitHandler: function(form) {
			console.log('form ok');
			}
			});
			$("#form").validate({
			rules: {
			dateField: {
			date: true
			}
			}
			});
			
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