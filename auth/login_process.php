<?php
error_reporting(0);
$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();

if(isset($_POST['submit']))
{
$myusername1=mysqli_real_escape_string($con,$_POST['username']); 
$mypassword1=mysqli_real_escape_string($con,$_POST['password']); 

	$sql = "SELECT * FROM accounts WHERE username = '".$myusername1."'";
	$rs = mysqli_query($con,$sql);
	$row=mysqli_fetch_array($rs);

	

	$_SESSION['id']=		$row['id'];
	$_SESSION['username']=	$row['username'];
	$_SESSION['fullname']=	$row['fullname'];
	$_SESSION['user_type']=	$row['user_type']; // set your session here. . .

	$count=mysqli_num_rows($rs);



 
	


// set your session here. . .


	//$numRows = mysqli_num_rows($rs);
	

		// $row = mysqli_fetch_assoc($rs);
		// if(password_verify($password,$row['password'])){
		// 	echo "Password verified";

if($count==1) // )
{
	//check if the user has been blocked
	if ($row['status'] == 1) {
		# code...
		if ($row['user_type'] == 1 && password_verify($mypassword1,$row['password']))
			{ 
				
					 			$_SESSION['user_type']=$row['user_type'];
                               header ("location:../guidance/admin/admin_dashboard.php"); 
			
                              
			}
			else if ($row['user_type'] == 2 && password_verify($mypassword1,$row['password']))
			{ 
				
					 			$_SESSION['user_type']=$row['user_type'];
                               header ("location:../guidance/user/user_dashboard.php"); 
			
                              
			}
			else if ($row['user_type']== 3 && password_verify($mypassword1,$row['password']))
			{ 
                               $_SESSION['user_type']=$row['user_type'];
                               header ("location:../guidance/guest/guest_dashboard.php");                           
			}else{
				$output = '
							<div class="card " style="width:95%; height:22px; 
								background-color: rgba(244, 67, 54, 0.2);
								border-style:solid;
								border-color:red;
								border-width: thin;">

							<span class="red-text text-ligthen-1 card-content" style="letter-spacing:1px; padding-buttom:10%;>
								<b style="">
									Your Username or Password is invalid
								</b>
							</span>
							</div>';
		}





 }else{
				$output = '
					<div class="card " style="width:95%; height:22px; 
						background-color: rgba(244, 67, 54, 0.2);
						border-style:solid;
						border-color:red;
						border-width: thin;">

					<span class="red-text text-ligthen-1 card-content" style="letter-spacing:1px; padding-buttom:10%;>
						<b style="">
							Your Username or Password is invalid
						</b>
					</span>
					</div>';
		}


}
else{
	// $output = '<div class="card " style="width:95%; height:22px; 
	// 					background-color: rgba(244, 67, 54, 0.2);
	// 					border-style:solid;
	// 					border-color:red;
	// 					border-width: thin;">

	// 				<span class="red-text text-ligthen-1 card-content" style="letter-spacing:1px; padding-buttom:10%;>
	// 					<b style="">
	// 						Your Username or Password is invalid
	// 					</b>
	// 				</span>
	// 				</div>';
	// 				
	// 				
	$sql2 = "SELECT * FROM admin WHERE username = '".$myusername1."'";
	$rs2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($rs2);

	//admin
	$_SESSION['id']=		$row2['id'];
	$_SESSION['username']=	$row2['username'];
	$_SESSION['user_type']=	$row2['user_type'];
	$_SESSION['fullname']=	$row2['fullname'];

	$count2=mysqli_num_rows($rs2);
}

if ($count2 == 1) {


	if ($row2['user_type']== 1 && password_verify($mypassword1,$row2['password'])){ 
			$_SESSION['user_type']=$row2['user_type'];
            header ("location:../guidance/admin/admin_dashboard.php"); 
			}else{
				$output = '<div class="card " style="width:95%; height:22px; 
						background-color: rgba(244, 67, 54, 0.2);
						border-style:solid;
						border-color:red;
						border-width: thin;">

					<span class="red-text text-ligthen-1 card-content" style="letter-spacing:1px; padding-buttom:10%;>
						<b style="">
							Your Username or Password is invalid
						</b>
					</span>
					</div>';
					
			}
	# code...
}else{
		$output = '<div class="card " style="width:95%; height:22px; 
						background-color: rgba(244, 67, 54, 0.2);
						border-style:solid;
						border-color:red;
						border-width: thin;">

					<span class="red-text text-ligthen-1 card-content" style="letter-spacing:1px; padding-buttom:10%;>
						<b style="">
							Your Username or Password is invalid
						</b>
					</span>
					</div>';
					
	
}

	}
?>