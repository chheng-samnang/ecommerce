<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Add Shop Info</h3>
			</div>
			<div class="panel-body">
				<form method="post" action="">
				<?php if(form_error('txt_shop_code')){?>
	                    	<div class="alert alert-danger alert-dismissible" role="alert">
	                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        	<strong>Warning!</strong> <?php echo form_error('txt_shop_code');?>
	                    	</div>
	                <?php }elseif (form_error('txt_shop_name')) {?>
	                		<div class="alert alert-danger alert-dismissible" role="alert">
	                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        	<strong>Warning!</strong> <?php echo form_error('txt_shop_name');?>
	                    	</div>
	                <?php }elseif (form_error('txt_shop_type')) {?>

	                		<div class="alert alert-danger alert-dismissible" role="alert">
	                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        	<strong>Warning!</strong> <?php echo form_error('txt_shop_type');?>
	                    	</div>
	                <?php }?>
					
					<div class="row">
						<div class="col-lg-6">
							<label>Shop Code</label>
							<input type="hidden" value="<?php echo $account->acc_id?>" name="txt_acc_id">
							<div class="form-group">
								<input type="text" name="txt_shop_code"  class="form-control input-sm" placeholder="Input Your Shop Code">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Shop Name</label>
							<div class="form-group">
								<input type="text" name="txt_shop_name"  class="form-control input-sm" placeholder="Input Your Shop Code">
							</div>
						</div>
					</div><!-- row -->

					<div class="row">
						<div class="col-lg-6">
							<label>Shop Type</label>
							<div class="form-group">
								<input type="text" name="txt_shop_type"  class="form-control input-sm" placeholder="Input Your Shop Code">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Logo Shop</label>
							<div class="form-group">
								<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Upload Image
								</button>
							</div>
						</div>
					</div><!-- row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Browse Image</h4>
										</div>
										<div class="modal-body">
											<input	type="file" name="txtUpload" />
											<input type="hidden" id="txtImgName" name="txtImgName" />
											<div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
								<textarea name="txt_Desc" class="form-control" cols="40" rows="6" ></textarea>
							</div>
						</div>
					</div>		

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm" name="btn_Saveclose" ng-disabled="userForm.$invalid"><i class="fa fa-floppy-o"></i> Save</button>
								<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>"  ><i class="fa fa-times"></i> Cancel</a>
							</div>
						</div>
					</div>
				</form>
			</div><!--panel-body-->
		</div>
	</div>
</div><!-- row -->

<script>
	function uploadFile() {
		var formData = new FormData();
		formData.append('image', $('input[type=file]')[0].files[0]); 
		$.ajax({
			url: '<?php echo base_url()?>ng/upload.php',
			data: formData,
			type: 'POST',
			// THIS MUST BE DONE FOR FILE UPLOADING
			contentType: false,
			processData: false,
			// ... Other options like success and etc
			
			success: function(data) {
				document.getElementById("response").innerText = "Upload Complete!"; 
				document.getElementById("txtImgName").value = data;
			}			
		});
		
	}
</script>