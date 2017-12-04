<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

</nav>

<?php echo form_open_multipart("admin/memberLogin/addstaf/".$acc_id)?>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('add')?> Staff</h3>
			</div>
			<div class="panel-body">
				<?php
					if(!empty(validation_errors()) OR $error!="")
					{
				?>
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<strong></strong> <?php echo validation_errors(); echo $error; ?>
						</div>
					</div>
				</div>
				<?php }?>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Staff Code</label>
							<input type="text" name="txtCode" value="<?php $str="ST" ; $st_code=$stafCode->st_id+1; echo $st_code==""?"ST001":$str.$st_code;?>" class="form-control input-sm" readonly>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Staff Name</label>
							<select name="ddlStaf" id="ddlStaf" class="form-control input-sm">
								<option value="">Choose One</option>
								<?php if(isset($acc_info)){  foreach ($acc_info AS $value){
									if($value->acc_id!=$this->session->acc_id){
									?>
								<option value="<?php echo $value->acc_id; ?>"><?php echo  $value->mem_name;?></option>
							<?php }}} ?>
							</select>
							<div id="errorName" style="display:none;">
								<h5 style="color:red;"><i class="glyphicon glyphicon-remove"></i> <strong>Warning!</strong> This field cannot be empty.</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" placeholder="password..." class="form-control input-sm" name="txtPassword" id="txtPassword">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Confirm password</label>
							<input type="password" placeholder="confirm password..." class="form-control input-sm" name="txtConfirmPassword" id="txtConfirmPassword">
						</div>
						<div class="form-group">
							<div id="errorMsg" style="display:none;">
								<label class="col-lg-6" style="color:red;"><i> Passwords don't matched!</i>
								</label>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="">Store</label>
							<?php echo form_dropdown('ddlStore', $option,'','class="form-control"'); ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Description</label>
							<textarea placeholder="description..." name="terDescr"><?php echo set_value('txtInvDesc','')?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<button class="btn btn-success btn-sm" type="submit"> <?php echo $this->lang->line('save')?></button>
						<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>"  ><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel')?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->

</form>
<script type="text/javascript">
	$("#ddlStaf").focusout(function(){
		var name = $("#ddlStaf").val();
		if(name=="")
		{
			$("#errorName").attr("style","display:block");
			$("#ddlStaf").focus();
		}else
		{
			$("#errorName").attr("style","display:none");
		}
	});
	$("#btnCancel").click(function(){
		window.location.assign("<?php echo base_url()?>profile/<?php echo $acc_id?>");
	});
	$("#txtConfirmPassword").focusout(function(){
		var pass = $("#txtPassword").val();
		var con = $("#txtConfirmPassword").val();
		if(pass!=con)
		{
			$("#errorMsg").attr("style","display:block");
		}else
		{
			$("#btnSave").removeAttr("disabled");
			$("#errorMsg").attr("style","display:none;");
		}
	});
</script>
