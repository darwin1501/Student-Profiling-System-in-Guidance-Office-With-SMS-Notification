<?php
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();
include '../database/db.php';
if(isset($_SESSION['user_type'])== 1){
$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."' AND `user_type`= 1 ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1);

//current date
	$date = date('y-m-d');
	$date_create = date_create($date);
	$date_format = date_format($date_create,'Y-m-d');
// set the status to active
	$status = 1;

if($num1==1){
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$myusername1 = trim(mysqli_real_escape_string($con, $_POST['username']));
$mypassword1 = trim(mysqli_real_escape_string($con, $_POST['password']));
$mypassword2 = trim(mysqli_real_escape_string($con, $_POST['password2']));
$encrypted = password_hash($mypassword1, PASSWORD_DEFAULT);
$user_role = mysqli_real_escape_string($con, $_POST['user']);
$sec_question = trim(mysqli_real_escape_string($con, $_POST['sec_question']));
$sec_ans = trim(mysqli_real_escape_string($con, $_POST['sec_answer']));
$fullname = trim(mysqli_real_escape_string($con, $_POST['fullname']));
$gender = trim(mysqli_real_escape_string($con, $_POST['gender']));
$dob = trim(mysqli_real_escape_string($con, $_POST['dob']));
$address = trim(mysqli_real_escape_string($con, $_POST['address']));
$cp_no = trim(mysqli_real_escape_string($con, $_POST['cp_no']));

//check existing records
$query2= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_POST['username']."'");
if ($query2->num_rows != 0) {  //
$output = "<script>
			swal(
			'Oops...',
			'That Username Has Already Taken!',
			'error'
			)
</script>";
}elseif($mypassword2 != $mypassword1){
$output = "<script>
		swal(
'Oops...',
'Password Do not match!',
'error'
)
</script>";
}else{
	$output = "<script>
		swal({
  type: 'success',
  title: 'Sucessfully Added',
  showConfirmButton: false,
  timer: 1500
})
</script>";
//insert query
$sql = mysqli_query($con, "INSERT INTO accounts (username, password, user_type, sec_question, sec_ans, fullname, dob, gender, address, cp_no, date_created, status) VALUES ('$myusername1','$encrypted', '$user_role', '$sec_question', '$sec_ans', '$fullname', '$dob', '$gender', '$address', '$cp_no', '$date_format', '$status')");

}
}
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
	<head>
		<title>Add User</title>
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
		<form method="POST" action="#">
			
		<!-- nav bar top-->
		<?php include 'nav_top.php';?>
		<!-- Side Nav-->
	<ul id="slide-out" class="side-nav z-depth-3 blue-grey darken-3">
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
		<li class="blue-grey darken-4"><a href="admin_add_user.php" class="white-text">
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
		</ul><!-- End of Side nav-->
			<div class="card-panel adduser-content z-depth-3"> 
				<div class="row"><!--  card panel start-->
			<?php echo $output; ?>  <!-- Alert Message will display here-->
				<span class="card-title center col s4"><h5>Add User</h5></span>
			</div>
			<div class="divider"></div>
			<h5 class="center">Login Information</h5>
			<div class="row card-top">
				<div class="col s1 push-s1" style="margin-top:5%;">
						<!-- -font awesome -->
						<i class="fa fa-user-circle fa-2x"></i>
				</div>
				<div class="input-field col s8 push-s1">
					<input  id="first_name2" type="text" class="validate" name="username" required="">
					<label class="active" for="first_name2">Username</label>
				</div>
			</div> <!-- end of row -->
			<div class="row">
				<div class="col s1 push-s1" style="margin-top:5%;">
						<!-- -font awesome -->
						<i class="fab fa-expeditedssl fa-2x"></i>
				</div>
				<div class="input-field col s8 push-s1">
					
					<input  id="first_name2" type="password" class="validate" name="password" required="" minlength="8">
					<label class="active" for="first_name2">Password</label>
				</div>
			</div> <!-- end of row -->
			<div class="row">
				<div class="col s1 push-s1" style="margin-top:5%;">
						<!-- -font awesome -->
						<i class="fab fa-expeditedssl fa-2x"></i>
				</div>
				<div class="input-field col s8 push-s1">
					
					<input  id="first_name2" type="password" class="validate" name="password2" required="" minlength="8">
					<label class="active" for="first_name2">Confrim Password</label>
				</div>
			</div><!-- end of row -->
			<br>
			<div class="divider"></div>
				<h5 class="center">Security Question</h5>
					<div class="row card-top">
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
			<br>
			<div class="divider"></div>
			<h5 class="center">Profile</h5>
			<div class="row card-top">
				<div class="input-field col s8 push-s2">
					<input type="text" name="fullname" 
					class="validate" required>
					<label>Fullname</label>
				</div>
			</div> <!-- end of row -->
			<div class="row">
				<div class="input-field col s2 push-s2">
					<select name="gender"  class="validate" required>
						<option value="" disabled selected>Gender</option>	
						<option value="male">male</option>
						<option value="female">female</option>
		    		</select>
				</div>
				<div class="input-field col s3 push-s2">
					<input type="text" name="dob" 
					class="datepicker" required>
					<label>Date of Birth</label>
				</div>
			</div><!-- end of orw -->
			<div class="row">
				<div class="input-field col s8 push-s2">
					<input type="text" name="address" 
					class="validate" required>
					<label>Address</label>
				</div>
			</div><!-- end of orw -->
			<div class="row">
				<div class="input-field col s4 push-s2">
					<input type="text" name="cp_no" 
					class="validate" required>
					<label>Cellphone No.</label>
				</div>
			</div><!-- end of orw -->
			<div class="row">
				<select class="col s4 push-s2" name="user" required=""> <!-- drop down structure-->
						<option value="" disabled selected>Select Account type</option>
						<option value="2">User</option>
						<option value="3">Guest</option>
				</select>
			</div>
			<div class="row">	
				<div class=" col s4 push-s7">
					<button class="btn waves-effect waves-light blue">Create User
					</button>
				</div>
			</div><!-- end of row -->
			</form>
			</div><!-- end of card panel-->
			<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
			<script src="../assets/stepper/materialize-stepper.min.js"></script>
			<script>
			
			// script for the datepicker
			$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15, // Creates a dropdown of 15 years to control year,
			today: 'Today',
			clear: 'Clear',
			close: 'Ok',
			format: 'yyyy-mm-dd', 
			closeOnSelect: false // Close upon selecting a date,
			});
			
			//Collapsible sidenav
			$(".button-collapse").sideNav();

			$('select').material_select();  

			// This script will show the error warning in drop down SELECT USER TYPE
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