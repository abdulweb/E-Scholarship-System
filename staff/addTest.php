<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
    echo $_SESSION['message'] = '';
   ?>
<?php 

	include('..\admin/includes/headlink.php');
 ?>
 <style type="text/css">
 .required{
 	color: red;
 }
 </style>
	<!--
		.boxed = boxed version
	-->
	<body>


		<!-- WRAPPER -->
		<div id="wrapper">

		
            <?php include('..\admin/includes/navbar.php');?>

			<?php include('..\admin/includes/header.php');?>


			<!-- MIDDLE -->
			<section id="middle">

				<div id="content" class="padding-20">

					<div id="panel-1" class="panel panel-info">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong class="text-black"> <i class="fa fa-gear"> </i> Create TEST</strong> <!-- panel title -->
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
							<?php if (isset($_POST['createTest'])) {
										$testname = $_POST['test_name'];
										$start_date = $_POST['start_date'];
										$end_date = $_POST['end_date'];
										$release_result = $_POST['release_result'];
										$mark = $_POST['test_mark'];
										$object->storeTest($testname,$start_date,$end_date,$mark,$release_result);
							} ?>
								<p class="text-danger mt-l-10">All Field with asterik (<span class="required">*</span>) must be fill</p>
								
								<form action="" method="post">
									<fieldset>

										<div class="row">
											<div class="form-group">
												<div class="col-md-6 col-sm-6">
													<label>Test Name <span class="required">*</span></label>
													<input type="text" name="test_name" value="" class="form-control" required>
												</div>
												<div class="col-md-6 col-sm-6">
													<label>Start Date (DD/MM/YYYY H:M:S) <span class="required">*</span></label>
													<input type="text" name="start_date" class="form-control masked" data-format="99/99/9999 99:99:99" data-placeholder="_" placeholder="DD/MM/YYYY 00:00:00" required>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="form-group">
												<div class="col-md-6 col-sm-6">
													<label>End Date (DD/MM/YYYY H:M:S) <span class="required">*</span></label>
													<input type="text" name="end_date" class="form-control masked" data-format="99/99/9999 99:99:99" data-placeholder="_" placeholder="DD/MM/YYYY 00:00:00" required>
												</div>
												<div class="col-md-6 col-sm-6">
													<label>Mark <span class="required">*</span></label>
													<input type="number" name="test_mark" value="" class="form-control" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12 col-sm-12">
													<label>Show Test Result </label>
													<select name="release_result" class="form-control pointer"required>
														<option value="">--- Select ---</option>
														<option value="1">Yes</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
										</div>

									</fieldset>
									<div class="row">
									<div class="col-md-12">
										<button type="submit" name="createTest" class="btn btn-2d btn-teal btn-xlg btn-block margin-top-30">
											Create Test
										</button>
									</div>
								</div>

								</form>

							</div>
						</div>

						</div>
						<!-- /panel content -->

						<!-- panel footer -->
						<div class="panel-footer">



						</div>
						<!-- /panel footer -->

					</div>
							<!-- sample modal content -->


				</div>
			</section>
			<!-- /MIDDLE -->

		</div>



	
		<!-- JAVASCRIPT FILES -->
		
		<?php include('..\admin/includes/js.php'); ?>
		<script type="text/javascript">
			
		</script>

	</body>
</html>