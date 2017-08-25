<?php error_reporting(0);?>
<script type="text/javascript">
var app = angular.module('myApp', []);
app.controller('myCtrl', function ($scope) {
$scope.sendForm = function () {
$scope.msg = "Form Validated";
};
});
</script>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('update')?> <?php echo $this->lang->line('service')?></h3>
			</div>
			<div class="panel-body">
				 <form method="post" action="" name="personForm" novalidate ng-submit="personForm.$valid &&sendForm()">
					<?php if(form_error('txt_service')){?>
	                    	<div class="alert alert-danger alert-dismissible" role="alert">
	                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        	<strong>Warning!</strong> <?php echo form_error('txt_service');?>
	                    	</div>
	                <?php }elseif (form_error('txt_price')) {?>

	                		<div class="alert alert-danger alert-dismissible" role="alert">
	                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        	<strong>Warning!</strong> <?php echo form_error('txt_price');?>
	                    	</div>
	                <?php }?>
					
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="hidden" name="txt_acc_id" value="<?php echo $account->acc_id;?>">
								<input type="hidden" name="txt_str_id" value="<?php if($services->str_id){echo $services->str_id;}else echo $services->str_id;?>">
								<label>Service Name</label>
								<input type="text" name="txt_service" value="<?php echo $services->p_name;?>"  class="form-control input-sm" placeholder="Service Name">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Store Name</label>
								<input type="" readonly="readonly" class="form-control input-sm" value="<?php if($store->str_name){echo $store->str_name;}else echo "No Shop!";?>">
							</div>
						</div>
					</div><!-- class Row-->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Category</label>
								<select name="txt_category" class="form-control input-sm">
									<?php foreach ($category as  $value) {?>
										<option value="<?php echo $value->cat_id?>"
											<?php if($value->cat_id==$services->cat_id) echo  "selected"?>><?php echo $value->cat_name?>
										</option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Price</label>
								 <input type="text" name="txt_price" value="<?php echo $services->price?>" class="form-control input-sm" placeholder="Price"  ng-pattern="/^[0-9]{1,10}$/"  />
							</div>
						</div>
					</div><!-- class row-->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Service Status</label>
								<select  name="txt_status" class="form-control input-sm">
									<?php
			                        if($services->p_status==1){
			                            echo "<option value='1' selected=''> Enable </option>";
			                            echo "<option value='0' > Disable </option>";
			                        }else
			                            echo "<option value='0' selected=''>Disable </option>";
			                             echo "<option value='1'> Enable </option>";
			                    ?>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group datetimepicker">
								<label>Date Release</label>
								<input type="date" name="txt_release" value="<?php echo $services->date_release?>" class="form-control input-sm datetimepicker" placeholder="Date Release">
							</div>
						</div>
					</div><!-- row -->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Image</label>
								<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Upload Image
								</button>
							</div>
						</div>
							
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
								<textarea name="txt_Desc" class="form-control" cols="40" rows="6" ><?php echo $services->p_desc?></textarea>
							</div>
						</div>
					</div>		
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm" name="btn_Saveclose" ng-disabled="userForm.$invalid"><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save')?></button>
								<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>"  ><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel')?></a>
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
