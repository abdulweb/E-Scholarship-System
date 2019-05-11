<?php include '..\includes/dbh.php'; ?>
<?php include '..\includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
   ?>
<?php 

	include('..\admin/includes/headlink.php');
 ?>
	<!--
		.boxed = boxed version
	-->
	<body>


		<!-- WRAPPER -->
		<div id="wrapper">

		
            <?php include('..\admin/includes/navbar.php'); ?>

			<?php include('..\admin/includes/header.php');?>


			<!-- MIDDLE -->
			<section id="middle">

				<div id="content" class="padding-20">

					<!-- jQuery Knob -->
					<div id="ui-knob" class="panel panel-default">

						<div class="panel-heading">

							<span class="title elipsis">
								<strong><?=date('Y'); ?> Summary</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<div class="row text-center">

								<!-- <div class="col-md-4">
									<h4>No of Applicant</h4>
									<input class="knob"  value="44">
								</div>

								<div class="col-md-4">
									<h4>No of Admin Staff</h4>
									<input class="knob"  value="44">
								</div>

								<div class="col-md-4">
									<h4>No of</h4>
									<input class="knob"  value="44">
								</div> -->

							</div>

							<br />
							<br />

						</div>
						<!-- /panel content -->

						<div class="panel-footer">


	
						</div>

					</div>
					<!-- /jQuery Knob -->


				</div>
			</section>
			<!-- /MIDDLE -->

		</div>



	
		<!-- JAVASCRIPT FILES -->
		<?php include('..\admin/includes/js.php'); ?>

	</body>
</html>