<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

</nav>

<?php echo form_open_multipart("admin/memberLogin/editInventory/".$acc_id)?>
<div class="row">
	<div class="col-lg-5 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Inventory</h3>
			</div>
			<div class="panel-body">
				<?php
					if(!empty(validation_errors()))
					{
				?>
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<strong>Warning!</strong> <?php echo validation_errors()?>
						</div>
					</div>
				</div>
				<?php }?>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Item Code</label>
							<input type="text" name="txtCode" value="<?php echo $itemCode?>" class="form-control input-sm" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Item Name</label>
							<input type="text" name="txtName" id="txtName" class="form-control input-sm" value="<?php echo set_value('txtName','')?>" placeholder="Enter item name here...." required>
							<div id="errorName" style="display:none;">
								<h5 style="color:red;"><i class="glyphicon glyphicon-remove"></i> <strong>Warning!</strong> This field cannot be empty.</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Category</label>
							<select name="ddlCat" class="form-control" id="ddlCat">
								<option value="0">Choose One</option>
								<?php
									foreach($category as $row){
								?>
									<option value="<?php echo $row->cat_id?>"><?php echo $row->cat_name?></option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Brand</label>
							<select name="ddlBrand" class="form-control">
								<option value="0">Choose One</option>
								<?php
									foreach($brand as $row){
								?>
								<option value="<?php echo $row->brn_id?>"><?php echo $row->brn_name?></option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Description</label>
							<textarea name="txtInvDesc"><?php echo set_value('txtInvDesc','')?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Price</label>
							
							<input type="text" id="txtPrice" name="txtPrice" value="<?php echo set_value('txtPrice','0')?>" class="form-control" placeholder="Enter price here..." required>

							<div id="errorPrice" style="display:none;">
								<h5 style="color:red;"><i class="glyphicon glyphicon-remove"></i> Only number are allowed</h5>	
							</div>
							
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Color</label>
							<input type="text" name="txtColor" class="form-control" value="<?php echo set_value('txtColor','')?>" placeholder="Enter Color here...">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Size</label>
							<input type="text" name="txtSize" value="<?php echo set_value('txtSize','')?>" class="form-control" placeholder="Enter Size here...">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Model</label>
							<input type="text" name="txtModel" class="form-control" value="<?php echo set_value('txtModel','')?>" placeholder="Enter Model here...">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Date Release</label>
							<input type="date" name="txtDateRelease" class="form-control" value="<?php echo set_value('txtDateRelease','')?>" required>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Dimension</label>
							<input type="text" name="txtDimension" value="<?php echo set_value('txtDimension','')?>" class="form-control" placeholder="Enter Dimension here...">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Status</label>
							<select name="ddlStatus" class="form-control">
								<option value="1" selected>Enable</option>
								<option value="0">Disable</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Image</label> <br />
							<button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#myModal">Browse Image</button>
						</div>
					</div>
				</div>				

				<div class="row">
					<div class="col-lg-12">
						<button class="btn btn-success btn-sm" type="submit">Save</button>
						<button class="btn btn-default btn-sm" type="button" id="btnCancel">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Browse Image</strong></h4>
      </div>
      <div class="modal-body">
        <input	type="file" name="txtUpload" />
		<input type="hidden" id="txtImgName" name="txtImgName" />
		<div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="uploadImage()">Upload</button>
      </div>
    </div>
  </div>
</div>


</form>

<script type="text/javascript">
	$("#txtPrice").focusout(function(){
		var price = $("#txtPrice").val();
		if(!$.isNumeric(price))
		{
			$("#errorPrice").attr("style", "display:block");
			$("#txtPrice").focus();
		}else
		{
			$("#errorPrice").attr("style", "display:none");
		}
	});
	$("#txtName").focusout(function(){
		var name = $("#txtName").val();
		if(name=="")
		{
			$("#errorName").attr("style","display:block");
			$("#txtName").focus();
		}else
		{
			$("#errorName").attr("style","display:none");
		}
	});
	$("#btnCancel").click(function(){
		window.location.assign("<?php echo base_url()?>profile/<?php echo $acc_id?>");
	});
	function uploadImage()
	{
		var formData = new FormData();
		formData.append('image', $('input[type=file]')[0].files[0]); 

		$.ajax({
		       url : '<?php echo base_url()?>ng/upload.php',
		       type : 'POST',
		       data : formData,
		       processData: false,  // tell jQuery not to process the data
		       contentType: false,  // tell jQuery not to set contentType
		       success : function(data) {
		           document.getElementById("response").innerText = "Upload Complete!"; 
				   document.getElementById("txtImgName").value = data;
		       }
		});
	}

</script>