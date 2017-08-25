
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('update');?> <?php echo $this->lang->line('product');?></h3>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					<?php if(form_error('txt_product')){?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Warning!</strong> <?php echo form_error('txt_product');?>
                            </div>
                        <?php }elseif (form_error('txt_price')){?>
                		<div class="alert alert-danger alert-dismissible" role="alert">
                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        	<strong>Warning!</strong> <?php echo form_error('txt_price');?>
                    	</div>
                <?php }elseif (form_error('txtStockQty')){?>
                		<div class="alert alert-danger alert-dismissible" role="alert">
                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        	<strong>Warning!</strong> <?php echo form_error('txtStockQty');?>
                    	</div>
                <?php }?>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="hidden" name="txt_p_id" value="<?php echo $product->p_id?>">
								<input type="hidden" name="txt_acc_id" value="<?php echo $product->acc_id;?>">
								<input type="hidden" name="txt_str_id" value="<?php echo $product->str_id;?>">
								<input type="hidden" name="txt_stk_id" value="<?php echo $product->stk_id;?>">
								<label>Product Code</label>
								<input type="text" value="<?php echo $product->p_code?>" name="txt_product_code" class="form-control input-sm" placeholder="Product Code">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Store Name</label>
								<input type="" readonly="readonly" class="form-control input-sm" value="<?php echo $product->str_name?>">
							</div>
						</div>
					</div><!-- class Row-->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								
								<label>Product Name</label>
								<input type="text" value="<?php echo $product->p_name?>" name="txt_product" class="form-control input-sm" placeholder="Product Name">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Category</label>
								<select name="txt_category" class="form-control input-sm">

									<?php foreach ($category as  $value) {?>
										<option value="<?php echo $value->cat_id?>"
											<?php if($value->cat_id==$product->cat_id) echo  "selected"?>><?php echo $value->cat_name?>
										</option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Brand</label>
								<select name="txt_brand" class="form-control input-sm">
									<?php foreach ($brand as  $value) {?>
										<option value="<?php echo $value->brn_id?>"
											<?php if($value->brn_id==$product->brn_id) echo "selected"?>><?php echo $value->brn_name?>
										</option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Price</label>
								<input type="text" value="<?php echo $product->price?>" name="txt_price" class="form-control input-sm" placeholder="Product Name">
							</div>
						</div>
					</div><!-- class Row-->

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Stock Qty</label>
								<input type="text" value="<?php echo $product->qty?>" name="txtStockQty" class="form-control input-sm">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Color</label>
								<input type="text" value="<?php echo $product->color?>" name="txt_color" class="form-control input-sm" placeholder="Color">
							</div>
						</div>
					</div><!-- row -->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Size</label>
								<input type="text" value="<?php echo $product->size?>" name="txt_size" class="form-control input-sm" placeholder="Size">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Date Release</label>
								<input type="date" value="<?php echo $product->date_release?>" name="txt_release" class="form-control input-sm" placeholder="Date Release">
							</div>
						</div>
					</div><!-- row -->

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Dimension</label>
								<input type="text" value="<?php echo $product->dimension?>" name="txt_dimension" class="form-control input-sm" placeholder="Dimension">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Model</label>
								<input type="text" value="<?php echo $product->model?>" name="txt_model" class="form-control input-sm" placeholder="Model">
							</div>
						</div>
					</div><!-- row -->

					<div class="row">
						
						<div class="col-lg-3">
							<div class="form-group"><br />
								<label>Image</label>
								<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Upload Image
								</button>
							</div>
						</div>
						<div class="col-lg-3">
							<a href="" class="thumbnail" style="width: 60px;">
									<img src="<?php echo base_url('assets/uploads/'.$product->path)?>">
								</a>
							</div>
						<div class="col-lg-6"><br />
							<div class="form-group">
								<label>Product Status</label>

								<select  name="txt_status" class="form-control input-sm">
									<?php
			                        if($product->p_status==1){
			                            echo "<option value='1' selected=''> Enable </option>";
			                            echo "<option value='0' > Disable </option>";
			                        }else
			                            echo "<option value='0' selected=''>Disable </option>";
			                            echo "<option value='1'> Enable </option>";
			                    ?>

								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
								<textarea name="txt_Desc" class="form-control" cols="40" rows="6" ><?php echo $product->p_desc?></textarea>
							</div>
						</div>
					</div><hr />		
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm" name="btn_Saveclose" ng-disabled="userForm.$invalid"><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save');?></button>
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
							</div>
				</form>
			</div>
		</div>
	</div>
</div>
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