
<?php include('includes/headlink.php'); ?>
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

								<div class="col-md-4">
									<h4>Disable display input</h4>
									<input class="knob" data-width="100" data-displayinput="false" value="35">
								</div>

								<div class="col-md-4">
									<h4>Cursor Mode</h4>
									<input class="knob" data-width="150" data-cursor="true" data-fgcolor="#222222" data-thickness=".3" value="29">
								</div>

								<div class="col-md-4">
									<h4>Display previous value</h4>
									<input class="knob"  value="44">
								</div>

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
		<?php include('includes/js.php'); ?>

	</body>
</html>