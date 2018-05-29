<?php 
$output = NULL;
ob_start();
session_start();

require_once("../database/db.php");

$query1= mysqli_query($con,"SELECT * FROM accounts WHERE `username`='".$_SESSION['username']."'");
$arr1 = mysqli_fetch_array($query1);

 $question = $arr1['sec_question'];
 $answer1 = $arr1['sec_ans'];

 if ($question == null) {
 	$question = "You must login first and set the security question";
 }


 if ($_SERVER["REQUEST_METHOD"] == "POST"){

$answer2 = mysqli_real_escape_string($con,$_POST['answer']); 

	
	if ($answer1 == $answer2) {
		
		header ("location:user_set_ps.php");
	}else{
		$output = "<script>swal(
'Oops...',
'Incorrect Answer',
'error'
)</script>";
	}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="./assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/front.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body class="light-blue">
		<form method="POST">

			<div class="container">
				<?php echo $output;?>
				<div class="card-panel card-opacity custom-card-recover2 col s3 z-depth-5">
					<div class="white-text text-darken-4 center-align"><h5>Security Question</h5></div>
					<div class="row">
						<div class="col s10 push-s1 white-text text-darken-4">
 							<h6><?php echo $question; ?></h6>
 						</div>
					</div>
					<div class="row">
						<div class="input-field col s8 push-s1">
								<input  type="text"  name="answer" required  style="color:#f5f5f5;">
								<label class="active" for="first_name2" >Answer</label>
							</div>
					</div>
					<div class="row">
						<div class="col s3 push-s3">
							<a class="btn-flat button-opacity white-text" href="../index.php">Cancel</a>
						</div>
						<div class="col s3 push-s4">
							<div class="button">
								<button class="btn-flat button-opacity white-text" type="submit" value="submit" name="submit">Submit
								<i class="material-icons right"></i>
								</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</form>
		<script type="text/javascript" src="assets/jquery/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>

	</body>
</html>