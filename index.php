<?php
require_once("database/db.php");
include("auth/login_process.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="assets/font_awesome/fontawesome-all.js"></script>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="assets/css/front.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<form method="POST">
			<div class="container">
				<div class="card-panel card-opacity hide-on-small-only custom-card z-depth-5">
					<?php echo $output;?>
					<div class="white-text text-darken-4 center-align">
						<h5>Login</h5>
					</div>
					<div class="row">
						<div class="col s1 push-s1 m1 push-m1 l1 push-l1" style="margin-top:5%;">
							<!-- -font awesome -->
							<i class="fa fa-user-circle fa-2x" style="color:white;"></i>
						</div>
						<div class="custom-field">
							<div class="input-field col s8" style="margin-left:10%;">
								<input  type="text"  name="username" required style="color:#f5f5f5;">
								<label class="active" for="first_name2" >Username</label>
							</div>
					</div>
				</div>
					<div class="row">
						<div class="col s1 push-s1" style="margin-top:5%;">
							<!-- -font awesome -->
							<i class="fab fa-expeditedssl fa-2x" style="color:white;"></i>
						</div>
							<div class="input-field col s8" style="margin-left:10%;">
								<input  type="password"  name="password" required style="color:#f5f5f5;">
								<label class="active" for="first_name2">Password</label>
							</div>
					</div>
	
					<div class="row">
						<div class="col s5 push-s2">
							<a href="ps_recover/user_recover.php" style="color:#f5f5f5"><h6>Forgot password?</h6></a>
						</div>
						<div class="col s3 push-s2">
								<button class="btn-flat button-opacity white-text" type="submit" value="submit" name="submit">Login
								<i class="material-icons right"></i>
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