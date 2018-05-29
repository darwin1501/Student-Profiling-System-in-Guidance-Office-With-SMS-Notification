<?php 
$output = null;
ob_start();
session_start();

require_once("../database/db.php");

$query1= mysqli_query($con,"SELECT * FROM admin WHERE `username`='".$_SESSION['username']."'");
$arr1 = mysqli_fetch_array($query1);


 if ($_SERVER["REQUEST_METHOD"] == "POST"){

$new_pass=trim(mysqli_real_escape_string($con, $_POST['pwd1']));
$re_pass=trim(mysqli_real_escape_string($con, $_POST['pwd2']));
$encrypted = password_hash($new_pass, PASSWORD_DEFAULT);


if($new_pass==$re_pass){ // verification in input field check if the two are desame
$update_pwd=mysqli_query($con, "UPDATE admin set password='$encrypted' where  username ='".$_SESSION['username']."'");
$output ="<script>alert('Changed Password Sucessfully! You will be logged out from this page');
window.location='../auth/logout_process.php'</script>";
}else{
	$output = "<script>swal(
				'Oops...',
				'Incorrect Password',
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
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<!--Import Google Icon Font-->
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
				<div class="card-panel card-opacity custom-card-recover3 col s3 z-depth-5">
					<?php echo $output;?>
					<div class="white-text text-darken-4 center-align">
						<h5>Set New Password</h5>
					</div>
					<br>
					<div class="row">
						<div class="col s1 push-s1" style="margin-top:5%;">
							<!-- -font awesome -->
							<i class="fab fa-expeditedssl fa-2x" style="color:white;"></i>
						</div>
						<div class="input-field col s8 push-s1" style="margin-left:10px;">
							<input  type="password"  name="pwd1" required style="color:#f5f5f5;">
							<label class="active" for="first_name2" >Password</label>
						</div>
					</div>
					<div class="row">
						<div class="col s1 push-s1" style="margin-top:5%;">
							<!-- -font awesome -->
							<i class="fab fa-expeditedssl fa-2x" style="color:white;"></i>
						</div>
						<div class="input-field col s8 push-s1" style="margin-left:10px;">
							<input  type="password"  name="pwd2" required style="color:#f5f5f5;">
							<label class="active" for="first_name2" >Re-type Password</label>
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