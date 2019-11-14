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
					<?php if ($_SESSION['usertype'] == 'superAdmin') {
					 ?>
						<li><!-- dashboard -->
							<a class="dashboard" href="home.php"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="manageAdmin.php">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-bar-chart-o"></i> <span>Manage Admin Staff</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-bar-chart-o"></i> <span>Applicant</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="all_applicant.php">All Applicant</a></li>
								<li><a href="shortlisted.php">Shortlisted Applicant</a></li>
								<li><a href="unshortlist.php">Unshortlisted Applicant</a></li>
							</ul>
						</li>


						<li><!-- dashboard -->
							<a class="dashboard" href="logout.php">
								<i class="main-icon fa fa-dashboard"></i> <span>Logout</span>
							</a>
						</li>
						<?php 
						} 
						elseif ($_SESSION['usertype'] == 'staff') {
						?>


						<li><!-- dashboard -->
							<a class="dashboard" href="home.php"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-user"></i> <span>Applicant</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="all_applicant.php">All Applicant</a></li>
								<li><a href="shortlisted.php">Shortlisted</a></li>
								<li><a href="unshortlist.php">Unshortlisted</a></li>
							</ul>
						</li>

						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-book"></i> <span>Screening Test</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="manageTest.php">Test</a></li>
								<li><a href="testQuestion.php">Question</a></li>
							</ul>
						</li>

						<li>
							<a href="manageLga.php">
								<i class=""></i>
								<i class="main-icon fa fa-home"></i> <span>Local Goverment</span>
							</a>
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