<?php

$output = NULL; // set null value for the variable '$output'
ob_start();
session_start();

if(isset($_POST['submit']))
{
$myusername1=mysqli_real_escape_string($con,$_POST['username']); 
$mypassword1=mysqli_real_escape_string($con,$_POST['password']); 

	$sql = "select * from admin where username = '".$myusername1."'";
	$rs = mysqli_query($con,$sql);
	$row=mysqli_fetch_array($rs);
	$_SESSION['id']=$row['id'];
$_SESSION['username']=$row['username'];
$_SESSION['user_type']=$row['user_type']; // set your session here. . .
 
$count=mysqli_num_rows($rs);


// set your session here. . .


	//$numRows = mysqli_num_rows($rs);
	

		// $row = mysqli_fetch_assoc($rs);
		// if(password_verify($password,$row['password'])){
		// 	echo "Password verified";

if($count==1) // )
{

	if ($row['user_type']== 1 && password_verify($mypassword1,$row['password'])){ 
			$_SESSION['user_type']=$row['user_type'];
            header ("location:../guidance/admin/admin_dashboard.php"); 
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



// if($count==1) // )
// {

			
		


// 			if ($row['user_type']== 1)
// 			{ 
//                                header ("location:../thesis_v2/admin/admin.php"); 

// 			}
// 			else if ($row['user_type']== 2)
// 			{ 
//                                $_SESSION['user_type']=$row['user_type'];
//                                header ("location:../thesis_v2/user/user.php"); 
// 			}
// 			else if ($row['user_type']== 3)
// 			{ 
//                                $_SESSION['user_type']=$row['user_type'];
//                                header ("location:../thesis_v2/guest/guest.php");                           
// 			}





// }
// else 
// {
// echo "Your Login Name or Password is invalid";
// }



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
?>