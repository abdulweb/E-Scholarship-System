<?php include '..\includes/dbh.php'; ?>
<?php include '..\includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
    $_SESSION['message'] ='';
   ?>
<?php 

	include('includes/headlink.php');
 ?>
	<!--
		.boxed = boxed version
	-->
	<body>


		<!-- WRAPPER -->
		<div id="wrapper">

		
            <?php include('includes/navbar.php'); ?>

			<?php include('includes/header.php');?>


			<!-- MIDDLE -->
			<section id="middle">

				<div id="content" class="padding-20">

				<div id="panel-1" class="panel panel-info">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong class="text-black"> <i class="fa fa-gear"> </i> MANAGED DATATABLE</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<?php
									if (isset($_POST['addStaffBtn'])) {
										$email = $_POST['staffEmail'];
										$phoneNo = $_POST['phoneNo'];
										$object->insertAdminStaff($email,$phoneNo);
										echo $_SESSION['message'];
									}
								?>
							</div>
							<div class="col-md-10">
								
							</div>
							<div class="col-md-2 ">
								<button type="button" class="btn btn-3d btn-reveal btn-green pull right" data-toggle="modal" data-target="#myModal">
									<i class="et-megaphone"></i>
									<span>Add Staff</span></button>
							</div>
						</div>

							<table class="table table-striped table-bordered table-hover" id="datatable_sample">
								<thead>
									<tr>
										<th>S/No</th>
										<th>Email</th>
										<th>phone Number</th>
										<th>Date Create</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									 <?php $object->getAdminStaff(); ?>
								</tbody>
							</table>

						</div>
						<!-- /panel content -->

						<!-- panel footer -->
						<div class="panel-footer">



						</div>
						<!-- /panel footer -->

					</div>
					<!-- /PANEL -->

					<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header bg-primary">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Staff Registration</h4>
										</div>

										<!-- Modal Body -->
										<div class="modal-body">
											<form action="" method="post" class="sky-form boxed">
												<fieldset>	
												
													<section>
														<label class="label">E-mail Address</label>
														<label class="input">
															<i class="icon-append fa fa-envelope"></i>
															<input type="email" name="staffEmail" required>
															<span class="tooltip tooltip-top-right">Email Address</span>
														</label>
													</section>
													
													<section>
														<label class="label">Phone Number</label>
														<label class="input">
															<i class="icon-append fa fa-mobile"></i>
															<input type="number" name="phoneNo" required>
															<b class="tooltip tooltip-top-right">Enter Staff Phone Number</b>
														</label>
													</section>

												</fieldset>
											
										</div>

										<!-- Modal Footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												<button type="submit" name="addStaffBtn" class="btn btn-success">Add Staff</button>
											</div>
										</form>

									</div>
								</div>
							</div>
							<!-- sample modal content -->

				</div>
			</section>
			<!-- /MIDDLE -->

		</div>



	
		<!-- JAVASCRIPT FILES -->
		<?php include('includes/js.php');
		unset($_SESSION['message']); ?>

	</body>
</html>