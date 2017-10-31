
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('add');?> <?php echo $this->lang->line('product');?></h3>
			</div>
			<div class="panel-body">
				 <form method="post" action="<?php echo base_url('memberLogin/addProduct')?>" enctype="multipart/form-data">
					<div class="row">
					<div class="col-lg-12">
					<?php
						if(!empty($error) OR validation_errors())
						{
					?>
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<strong>Attention!</strong><?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
						</div>
					<?php }?>
					</div>
				</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Product Code</label>
							      <input  type="text" name="type_pro_code" id="type_pro_code" class="form-control input-sm" value="<?php echo $pro_code?>" placeholder="Product Code" >
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Store Name</label>
								<input type="" readonly="readonly"  class="form-control input-sm" value="<?php if($store->str_name){echo $store->str_name;}else echo "No Shop!";?>">
							</div>
						</div>
					</div><!-- class Row-->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="hidden" name="txt_acc_id" value="<?php echo $account->acc_id;?>">
								<input type="hidden" name="txt_str_id" value="<?php if($store->str_id){echo $store->str_id;}else echo "0"; ?>">
								<label>Product Name</label>
								<input type="text" autofocus="autofocus" name="txt_product"  class="form-control input-sm" placeholder="Product Name">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Category</label>
								<select name="txt_category" class="form-control input-sm">
									<option value="">Choose Category</option>
									<?php foreach ($category as  $value) {?>
										<option value="<?php echo $value->cat_id?>"><?php echo $value->cat_name?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div><!-- class row-->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Brand</label>
								<select name="txt_brand" class="form-control input-sm">
									<option value="">Choose Brand</option>
									<?php foreach ($brand as  $value) {?>
										<option value="<?php echo $value->brn_id?>"><?php echo $value->brn_name?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Price</label>
								 <input type="text" name="txt_price" class="form-control input-sm" placeholder="Price" ng-model="txt_price" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" required />
        						<span style="color:Red" ng-show="personForm.txt_price.$dirty&&personForm.txt_price.$error.pattern">Only Numbers Allowed, Maximum 10 Characters</span>
							</div>
						</div>
					</div><!-- class Row-->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Stock Qty</label>
								<input type="text" name="txtStockQty" class="form-control input-sm" placeholder="Stock Qty">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Color</label>
								<input type="text" name="txt_color" class="form-control input-sm" placeholder="Color">
							</div>
						</div>
					</div><!-- row -->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Size</label>
								<input type="text" name="txt_size" class="form-control input-sm" placeholder="Size">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group datetimepicker">
								<label>Date Release</label>
								<input type="date" name="txt_release" class="form-control input-sm datetimepicker" placeholder="Date Release">
							</div>
						</div>
					</div><!-- row -->

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Dimension</label>
								<input type="text" name="txt_dimension" class="form-control input-sm" placeholder="Dimension">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Model</label>
								<input type="text" name="txt_model" class="form-control input-sm" placeholder="Model">
							</div>
						</div>

					</div><!-- row -->

					<div class="row">
						<div class="col-lg-6"><br />
							<div class="form-group">
								<label>Image</label>
								<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Upload Image
								</button>
							</div>
						</div>
							<div class="col-lg-6"><br />
							<div class="form-group">
								<label>Product Status</label>
								<select  name="txt_status" class="form-control input-sm">
									<option value="1">Enable</option>
									<option value="0">Disable</option>
								</select>
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
					</div><hr />
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm" name="btnSubmit"><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save');?></button>
								<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>"  ><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel');?></a>
							</div>
						</div>
					</div>
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
					</div><!-- row -->
    			</form>
			</div>
		</div>
	</div>
</div><script type="text/javascript">
	$("#btnCancel").click(function(){

		window.location.assign("<?php echo base_url()?>admin/memberLogin/Cancel");

	});
</script>
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
