<div class="navbar-fixed">
	<nav class=" light-blue white-text darken-2">
		<div class="nav-wrapper">
			<a href="#!" class="brand-logo">
				<div class="row">
					<h6 class="text-header col s12">
					Student Profiling Information System in Guidance Office
					</h6>
				</div>
			</a>
			<ul class="right">
				<li><?php echo $_SESSION['fullname'];?></li>
				<li>
					<a class='dropdown-button' data-beloworigin="true" data-constrainWidth= "false" data-gutter= "-5"  href='#' data-activates='dropdown1'>
						<div>
							<!-- font awesome icon -->
							<i class="fa fa-chevron-down fa-2x icon-pad-30"></i>
						</div>
					</a>
					<!-- Dropdown Structure -->
					<ul id='dropdown1' class='dropdown-content'>
						<li><a href="guest_profile.php">Profile</a></li>
						<li><a href="change_ps_guest.php">Change Password</a></li>
						<li><a href="../auth/logout_process.php">Log out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</div>
<a href="#" data-activates="slide-out" class="button-collapse" style="float:left; padding:20px; position:fixed; clear:left;"><i class="fas fa-bars fa-3x"></i></a>