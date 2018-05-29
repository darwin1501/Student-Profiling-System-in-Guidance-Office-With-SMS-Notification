<?php
$output = NULL; // set null value for the variable '$output'
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

// PHP code here
?>
<!-- start HTML here-->
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <!-- body here -->
    <!-- Form here-->
    
    
    <div class="navbar-fixed">
      <nav class=" light-blue white-text darken-2">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">
            <h6 class="text-header">
            Student Profiling Information System in Guidance Office
            </h6>
          </a>
          <div class="row">
            <ul class="right col s2">
              <li class="col s4"><?php echo $_SESSION['username'];?></li>
              <li>
                <a class='dropdown-button' data-beloworigin="true" data-constrainWidth= "false" data-gutter= "-30"  href='#' data-activates='dropdown1'>
                  <i class="material-icons">arrow_drop_down_circle</i>
                </a>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                  <li><a href="../guest/change_ps_guest.php">Change Password</a></li>
                  <li><a href="../auth/logout_process.php">Log out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <ul id="slide-out" class="side-nav fixed z-depth-3">
      <li class="blue-grey lighten-5"><a href="#"><i class="material-icons">search</i>Search Students</a></li>
    </ul>
    <div class="card-panel adduser-content z-depth-3">
      <form method="POST" action="#"> <!--  card panel start-->
      <h4>
      <?php echo $output; ?>  <!-- Alert Message will display here-->
      </h4>
    </form>
    </div><!-- end of card panel-->
    <script type="text/javascript" src="../assets/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
    <script>
    
    </script>
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
  </html><!-- END of body html here-->