<?php
require_once("../database/db.php");
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
{
$myusername1=mysqli_real_escape_string($con,$_POST['username']); 
	$sql = "select * from admin where username = '".$myusername1."'";
	$rs = mysqli_query($con,$sql);
	$row=mysqli_fetch_array($rs);
	$_SESSION['id']=$row['id'];
$_SESSION['username']=$row['username'];
$_SESSION['user_type']=$row['user_type']; // set your session here. . .
 
$count=mysqli_num_rows($rs);

if($count==1) // )
{
			if ($row['user_type']== 1)
			{ 
							$_SESSION['user_type']=$row['user_type'];
                               header ("location:../ps_recover/admin_sec.php"); 
				echo "success";
			}
			else{
				$output = "<script>swal(
							'Oops...',
							'Invalid Username',
							'error'
							)</script>";
		}

 			}else{
				$output = "<script>swal(
									'Oops...',
									'Invalid Username',
									'error'
									)</script>";
		}

	}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script type="text/javascript" src="../assets/sweet-alert/sweetalert2.all.min.js"></script>
		<script defer src="../assets/font_awesome/fontawesome-all.js"></script>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="./assets/css/custom.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/front.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom2.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/front.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	</head>
	<body class="light-blue">
		<form method="POST">
			<div class="container">
				<div class="card-panel card-opacity custom-card-revover col s3 z-depth-5">
					<?php echo $output ?>
					<div class="blue-text text-darken-2 center-align"><h5></h5></div>
					<div class="row">
						
							<div class="col s1" style="margin-top:5%;">
							<!-- -font awesome -->
							<i class="fa fa-user-circle fa-2x" style="color:white;"></i>
						</div>
							<div class="input-field col s10" style="margin-left:20px;">
								<input  type="text"  name="username" required style="color:#f5f5f5;">
								<label class="active" for="first_name2" >Username</label>
							</div>
						
					</div>
					<div class="row">
						<div class="col s3 push-s2">
							<a class="btn-flat button-opacity white-text " href="../login_admin.php">Cancel</a>
						</div>
						<div class="col s9 push-s4">
							<div class="button">
								<button class="btn-flat button-opacity white-text " onclick="Materialize.toast('I am a toast', 4000)  type="submit" value="submit" name="submit">Submit
								<i class="material-icons right"></i>
								</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</form>
		<script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="../assets/js/materialize.min.js"></script>

	</body>
</html>