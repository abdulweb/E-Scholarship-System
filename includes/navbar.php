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
						<li><!-- dashboard -->
							<a class="dashboard" href=""><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-bar-chart-o"></i> <span>Graphs</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="">Flot Charts</a></li>
								<li><a href="">Morris Charts</a></li>
								<li><a href="">Inline Charts</a></li>
								<li><a href="">Chart.js</a></li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-table"></i> <span>Tables</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="">Bootstrap Tables</a></li>
								<li><a href="">jQuery Grid</a></li>
								<li><a href="">jQuery Footable</a></li>
								<li>
									<a href="#">
										<i class="fa fa-menu-arrow pull-right"></i>
										Datatables
									</a>
									<ul>
										<li><a href="">Managed Datatables</a></li>
										<li><a href="">Editable Datatables</a></li>
										<li><a href="">Advanced Datatables</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-pencil-square-o"></i> <span>Forms</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="">Smarty Elements</a></li>
								<li><a href="">Masked Inputs</a></li>
								<li><a href="">Pickers</a></li>
								<li><a href="">UI Sliders</a></li>
								<li><a href="">Validation Form</a></li>
								<li><a href="">Html Editors</a></li>
								<li><a href="">Autosuggest</a></li>
								<li><a href="">Form X-Editable</a></li>
								<li><a href="">Dropzone File Upload</a></li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-gears"></i> <span>UI Features</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="">Portlets</a></li>
								<li><a href="">Buttons</a></li>
								<li>
									<a href="#">
										<i class="fa fa-menu-arrow pull-right"></i>
										Icons
									</a>
									<ul>
										<li><a href="">Fontawsome</a></li>
										<li><a href="">Et-Line Icons</a></li>
										<li><a href="">Glyph Icons</a></li>
										<li><a href="">Flags</a></li>
									</ul>
								</li>
								<li><a href="">Alerts &amp; Dialogs</a></li>
								<li><a href="">Tabs, Acordion &amp; Navs</a></li>
								<li><a href="">Knob Circles</a></li>
								<li><a href="">Nestable List</a></li>
								<li><a href="">Toastr Notifications</a></li>
								<li><a href="">Modals</a></li>
								<li><a href="">Grid</a></li>
								<li><a href="">Google Maps</a></li>
								<li><a href="">Vector Maps</a></li>
								<li><a href="">Essentials</a></li>
								<li>
									<a href="#">
										<i class="fa fa-menu-arrow pull-right"></i>
										<i class="fa fa-folder-open"></i>
										Deep Navigation
									</a>
									<!-- 3rd Level -->
									<ul>
										<li>
											<a href="#">
												3rd Level
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-menu-arrow pull-right"></i>
												<i class="fa fa-folder-open"></i>
												4rd Level
											</a>
											<!-- 4th Level -->
											<ul>
												<li>
													<a href="#">
														4th Level
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-menu-arrow pull-right"></i>
														<i class="fa fa-folder-open"></i>
														5th Level
													</a>
													<!-- 5th Level -->
													<ul>
														<li>
															<a href="#">
																5th level
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-menu-arrow pull-right"></i>
																<i class="fa fa-folder-open"></i>
																6th level
															</a>
															<!-- 6th Level -->
															<ul>
																<li>
																	<a href="#">
																		6th level
																	</a>
																</li>
																<li>
																	<a href="#">
																		6th level
																	</a>
																</li>
															</ul><!-- /6th Level -->
														</li>
													</ul><!-- /5th Level -->
												</li>
											</ul><!-- /4th Level -->
										</li>
									</ul><!-- /3rd Level -->
								</li>
							</ul>
						</li>
						<li class="active">
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-book"></i> <span>Pages</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="">Invoice</a></li>
								<li><a href="">Login</a></li>
								<li><a href="">Register</a></li>
								<li><a href="">Lock Screen</a></li>
								<li><a href="">Forum</a></li>
								<li><a href="">Error 404</a></li>
								<li><a href="">Error 500</a></li>
								<li><a href="">Pricing Table</a></li>
								<li><a href="">Search Result</a></li>
								<li><a href="">Sidebar Page</a></li>
								<li><a href="">User Profile</a></li>
								<li class="active"><a href="">Blank Page</a></li>
							</ul>
						</li>
						<li>
							<a href="">
								<i class="main-icon fa fa-calendar"></i>
								<span class="label label-warning pull-right">2</span> <span>Calendar</span>
							</a>
						</li>
					</ul>

					<!-- SECOND MAIN LIST -->
					<h3>MORE</h3>
					<ul class="nav nav-list">
						<li>
							<a href="">
								<i class="main-icon fa fa-calendar"></i>
								<span class="label label-warning pull-right">2</span> <span>Calendar</span>
							</a>
						</li>
					</ul>

				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->