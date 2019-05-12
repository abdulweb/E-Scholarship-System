<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
   ?>
<?php 

	include('..\admin/includes/headlink.php');
 ?>
 <style type="text/css">
 .save_btn{
 	display: none;
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
								<strong class="text-black"> <i class="fa fa-gear"> </i> MANAGED LGA</strong> <!-- panel title -->
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
									if (isset($_POST['addLgaBtn'])) {
										$lgaName = strtoupper($_POST['lgaName']);
										$object->insertLga($lgaName);
										//echo $_SESSION['message'];
									}
								?>
							</div>
							<div class="col-md-9">
								
							</div>
							<div class="col-md-3 ">
								<button type="button" class="btn btn-3d btn-reveal btn-green pull right" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-home"></i>
									<span>Add New Local Govertnment</span></button>
							</div>
						</div>

							<table class="table table-striped table-bordered table-hover" id="datatable_sample">
								<thead>
									<tr>
										<th>S/No</th>
										<th>LGA Name</th>
										<th>Date Create</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									 <?php $object->getLga(); ?>
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
											<h4 class="modal-title" id="myModalLabel">LGA Registration</h4>
										</div>

										<!-- Modal Body -->
										<div class="modal-body">
											<form action="" method="post" class="sky-form boxed">
												<fieldset>	
												
													<section>
														<label class="label">Local Gov't Name</label>
														<label class="input">
															<i class="icon-append fa fa-home"></i>
															<input type="text" name="lgaName" required>
															<span class="tooltip tooltip-top-right">LGA Name</span>
														</label>
													</section>

												</fieldset>
											
										</div>

										<!-- Modal Footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"> </i> Close</button>
												<button type="submit" name="addLgaBtn" class="btn btn-success"><i class="fa fa-home"> </i> Add</button>
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
		
		<?php include('..\admin/includes/js.php'); ?>
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

					if (jQuery().dataTable) {

						var table = jQuery('#datatable_sample');
						table.dataTable({
							"columns": [{
								"orderable": false
							}, {
								"orderable": true
							}, {
								"orderable": false
							}, {
								"orderable": false
							}],
							"lengthMenu": [
								[5, 15, 20, -1],
								[5, 15, 20, "All"] // change per page values here
							],
							// set the initial value
							"pageLength": 5,            
							"pagingType": "bootstrap_full_number",
							"language": {
								"lengthMenu": "  _MENU_ records",
								"paginate": {
									"previous":"Prev",
									"next": "Next",
									"last": "Last",
									"first": "First"
								}
							},
							"columnDefs": [{  // set default column settings
								'orderable': false,
								'targets': [0]
							}, {
								"searchable": false,
								"targets": [0]
							}],
							"order": [
								[1, "asc"]
							] // set first column as a default sort by asc
						});

						var tableWrapper = jQuery('#datatable_sample_wrapper');

						table.find('.group-checkable').change(function () {
							var set = jQuery(this).attr("data-set");
							var checked = jQuery(this).is(":checked");
							jQuery(set).each(function () {
								if (checked) {
									jQuery(this).attr("checked", true);
									jQuery(this).parents('tr').addClass("active");
								} else {
									jQuery(this).attr("checked", false);
									jQuery(this).parents('tr').removeClass("active");
								}
							});
							jQuery.uniform.update(set);
						});

						table.on('change', 'tbody tr .checkboxes', function () {
							jQuery(this).parents('tr').toggleClass("active");
						});

						tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown

					}

				});
			});
		</script>
		<script type="text/javascript">
			 function edit_row(id)
				{
				    //alert('hey');
					 var name=document.getElementById("name"+id).innerHTML;

					 document.getElementById("name"+id).innerHTML="<input type='text' class='form-control' autofocus id='name_text"+id+"' value='"+name+"'>";
					    
					 document.getElementById("edit_btn"+id).style.display="none";
					 document.getElementById("save_btn"+id).style.display="block";
				}
				// save function using ajax
				function save_row(id)
					{

					  //alert('hey');
					 var name=document.getElementById("name_text"+id).value;
					    
					 $.ajax
					 ({
					  type:'post',
					  url:'modify_records.php',
					  data:{
					   edit_row:'edit_row',
					   row_id:id,
					   name:name
					  },
					  success:function(response) {
					   if(response=="success")
					   {
					    document.getElementById("name"+id).innerHTML=name;
					    document.getElementById("edit_btn"+id).style.display="block";
					    document.getElementById("save_btn"+id).style.display="none";
					   	alert('Record Updated Successfully');
					   }
					   else{
					    //alert(response);
					   }
					  }

					 });
					}
		</script>

	</body>
</html>