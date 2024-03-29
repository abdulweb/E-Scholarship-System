<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
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
								<strong>Test Questions</strong> <!-- panel title -->
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
						<?php
							if (isset($_POST['addQuestion'])) {
								$question = $_POST['question'];
								$option1 = $_POST['option1'];
								$option2 = $_POST['option2'];
								$option3 = $_POST['option3'];
								$option4 = $_POST['option4'];
								$correctAns = $_POST['correctAns'];
								$lgaID = $_POST['lgaID'];
								$object->storeQuestion($question,$option1,$option2,$option3,$option4,$correctAns,$lgaID);
							}
						?>

						<a href="" class="btn btn-success pull right pull-right m-r-15" data-toggle="modal" data-target="#myModal">Add Question</a>
						
							<?php
							$results = $object->lga();
							foreach ($results as $result) {?>
								<div class="toggle primary">
									<div class="toggle">
										<label><?=$result['name'];?></label>
										<div class="toggle-content"> 
										<a href="" class="btn btn-success btn-sm pull right pull-right m-r-15 m-b-15" data-toggle="modal" data-target="#myModal">Add Question</a>
										
											<table class="table table-bordered">
													<tr>
														<th>S/No</th>
														<th>Question</th>
														<th>Option 1</th>
														<th>Option 2</th>
														<th>Option 3</th>
														<th>Option 4</th>
														<th>Correct Answer</th>
														<th></th>
													</tr>
													<?php $questions = $object->lgaQuestion($result['lga_id']);
															$counter=1;
															foreach ($questions as $question) {?>
														<tr>
										                    <td><?=$counter?></td>
										                    <td ><?=$question['question']?></td>
										                    <td><?=$question['option1']?></td>
										                    <td><?=$question['option2']?></td>
										                    <td><?=$question['option3']?></td>
										                    <td><?=$question['option4']?></td>
										                    <td><?=$question['correctAnswer']?></td>
										                    <td>
										                   		<a href=""><i class="fa fa-trash" tooltip="Delete"></i></a>
										                    </td>
										                </tr>
											<?php
											$counter++;}
											?>
											</table>

										</div>
									</div>
								</div>
							<?php
							}
							?>
							
							

						</div>
						<!-- /panel content -->

						<!-- simple Modal -->
						<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header bg-primary">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">LGA Question</h4>
										</div>

										<!-- Modal Body -->
										<div class="modal-body">
											<form action="" method="post" class="sky-form boxed">
												<fieldset>	
												
													<section>
														<label class="label">Question</label>
														<label class="input">
															<i class="icon-append fa fa-book"></i>
															<textarea class="form-control" required="" name="question"></textarea>
															<span class="tooltip tooltip-top-right">Question</span>
														</label>
													</section>
													<section>
														<label class="label">Option 1</label>
														<label class="input">
															<i class="icon-append fa fa-book"></i>
															<input type="text" name="option1" class="form-control" required="">
															<span class="tooltip tooltip-top-right">Option 1</span>
														</label>
													</section>
													<section>
														<label class="label">Option 2</label>
														<label class="input">
															<i class="icon-append fa fa-book"></i>
															<input type="text" name="option2" class="form-control" required="">
															<span class="tooltip tooltip-top-right">Option 2</span>
														</label>
													</section>
													<section>
														<label class="label">Option 3</label>
														<label class="input">
															<i class="icon-append fa fa-book"></i>
															<input type="text" name="option3" class="form-control" required="">
															<span class="tooltip tooltip-top-right">Option 3</span>
														</label>
													</section>
													<section>
														<label class="label">Option 4</label>
														<label class="input">
															<i class="icon-append fa fa-book"></i>
															<input type="text" name="option4" class="form-control" required="">
															<span class="tooltip tooltip-top-right">Option 4</span>
														</label>
													</section>
													<section>
														<label class="label">Correct Answer</label>
														<label class="input">
															<select name="correctAns" class="form-control" required="">
																<option value=""></option>
																<option value="A">A</option>
																<option value="B">B</option>
																<option value="C">C</option>
																<option value="D">D</option>
															</select>
															<span class="tooltip tooltip-top-right">Correct Answer</span>
														</label>
													</section>
													<section>
														<label class="label">Local Government</label>
															<?php $object->allLga()?>
													</section>

												</fieldset>
											
										</div>

										<!-- Modal Footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"> </i> Cancel</button>
												<button type="submit" name="addQuestion" class="btn btn-success"><i class="fa fa-home"> </i> Submit Question</button>
											</div>
										</form>

									</div>
								</div>
					</div>
							<!-- sample modal content -->


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