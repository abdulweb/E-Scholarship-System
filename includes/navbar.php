	<!-- 
				ASIDE 
				Keep it outside of #wrapper (responsive purpose)
			-->
			<aside id="aside">
				<!--
					Always open:
					<li class="active alays-open">

					LABELS:
						<span class="label label-danger pull-right">1</span>
						<span class="label label-default pull-right">1</span>
						<span class="label label-warning pull-right">1</span>
						<span class="label label-success pull-right">1</span>
						<span class="label label-info pull-right">1</span>
				-->
				<nav id="sideNav"><!-- MAIN MENU -->
					<ul class="nav nav-list">
					<!-- Super-admin Navbar -->
					<?php if ($_SESSION['usertype'] == 'SuperAdmin') {
					 ?>
						<li><!-- dashboard -->
							<a class="dashboard" href=""><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-bar-chart-o"></i> <span>Manage Admin Staf</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-bar-chart-o"></i> <span>Student</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="">Shortlisted</a></li>
								<li><a href="">Unshortlisted</a></li>
							</ul>
						</li>


						<li><!-- dashboard -->
							<a class="dashboard" href="logout.php">
								<i class="main-icon fa fa-dashboard"></i> <span>Logout</span>
							</a>
						</li>
						<?php 
						} 
						elseif (S_SESSION['usertype'] == 'staff') {
						?>


						<li><!-- dashboard -->
							<a class="dashboard" href=""><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-bar-chart-o"></i> <span>Applicant</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="">Shortlisted</a></li>
								<li><a href="">Unshortlisted</a></li>
							</ul>
						</li>


						<li><!-- dashboard -->
							<a class="dashboard" href="logout.php">
								<i class="main-icon fa fa-dashboard"></i> <span>Logout</span>
							</a>
						</li>


						<?php } ?>
					</ul>
					<!-- Ends of Super-admin Navbar -->

				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->