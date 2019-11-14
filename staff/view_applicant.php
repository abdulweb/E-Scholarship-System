<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
    echo $_SESSION['message'] = '';
   ?>
<?php 

	include('..\admin/includes/headlink.php');
	$getID = $_GET['id'];
	if (empty($getID)) {
		header('location:all_applicant.php');
	}
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
								<strong class="text-black"> <i class="fa fa-gear"> </i> Applicant Info</strong> <!-- panel title -->
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
									if (isset($_POST['shortlistBtn'])) {
										$status = 1;
										$object->shortAplicant($getID,$status);
									}
									if (isset($_POST['reject'])) {
										$status = 2;
										$object->rejectApplicant($getID,$status);
									}
									
									$results = $object->applicantDetails($getID);
									foreach ($results as $value) {
								?>
							</div>
							<div class="col-md-9">
								
							</div>
						</div>

								<div class="row">
                                    <div class="col-md-9">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" >
	                                            <tr>
	                                                <th>Name</th>
	                                                <td><?=$value['firstname']. " ". $value['middlename']. $value['lastname']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Email</th>
	                                                <td><?=$object->userEmail($value['user_id'])?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Admission No</th>
	                                                <td><?=$value['admissionNo']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Local Gov't</th>
	                                                <td><?=$object->getLgaName($value['user_id'])?></td>
	                                            </tr>

	                                            <tr>
	                                                <th>Phone Number</th>
	                                                <td><?=$value['phoneNo']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Institution</th>
	                                                <td><?=$value['institute']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Level</th>
	                                                <td><?=$value['level']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Faculty</th>
	                                                <td><?=$value['faculty']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Bank Name</th>
	                                                <td><?=$value['bankName']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Account Name</th>
	                                                <td><?=$value['accountName']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Account No</th>
	                                                <td><?=$value['accountNumber']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Account Type</th>
	                                                <td><?=$value['accountType']?></td>
	                                            </tr>
	                                            <tr>
	                                                <th>Status</th>
	                                                <td>
	                                                	<?php
													 		if ($object->applicantStatus($getID) == 0) {
													 			echo '<span class="btn  btn-xs btn-warning">pending</span>';
													 		}
													 		elseif ($object->applicantStatus($getID) == 1) {
													 			echo '<span class="btn  btn-xs btn-success">shortlisted</span>';
													 		}
													 		else
													 		{
													 			echo '<span class="btn  btn-xs btn-danger">Rejected</span>';
													 		}
													 	?>
	                                                </td>
	                                               
	                                            </tr>
	                                        </table>
	                                        	<div class="col-md-4">
	                                        		<form method="post" action="">
	                                        		<input type="hidden" name="userId" value="<?=$getID?>">
	                                        		<button type="submit" name="shortlistBtn" class="btn btn-success btn-block" onclick="return confirm('Ready to go?')">Shortlist</button>
	                                        	</div>
	                                        	<div class="col-md-4">
	                                        		<button type="submit" name="reject" class="btn btn-danger btn-block" onclick="return confirm('Ready to go?')">Reject</button>
	                                        		</form>
	                                        	</div>
                                        </div>
                                    </div>
                                            <!-- passport section -->
                                    <div class="col-md-3">
                                     <a href=""><img src="<?='..\student/'.$value['picture']?>" class="img img-thumbnail" height="100" style="margin-bottom: 10px;"></a>
                                     <a href=""><img src="<?='..\student/'.$value['indigne_letter']?>" class="img img-thumbnail" height="70"></a>

                                    <?php
		                                }
                                     ?>
                                    </div>
                                </div>
                                        <!-- end -->

						</div>
						<!-- /panel content -->

						<!-- panel footer -->
						<div class="panel-footer">



						</div>
						<!-- /panel footer -->

					</div>
					<!-- /PANEL -->



				</div>
			</section>
			<!-- /MIDDLE -->

		</div>



	
		<!-- JAVASCRIPT FILES -->
		
		<?php include('..\admin/includes/js.php'); unset($_SESSION['message']) ?>
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