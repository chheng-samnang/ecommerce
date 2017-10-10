<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

</nav>

<?php echo form_open_multipart("admin/memberLogin/save_staf_password/".$acc_id)?>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('add')?> Staf</h3>
			</div>
			<div class="panel-body">
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
							<strong><?php echo $this->lang->line("attention"); ?>!</strong><?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
						</div>
					<?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<input type="hidden" id="txtSt_id" name="txtSt_id" value="<?php if(isset($change->st_id)){ echo $change->st_id;}?>">
							<input type="hidden" value="<?php if(isset($change)){ echo $change->staf_password;} ?>" name="Password" id="Password">
							<label>Password</label>
							<input type="password" placeholder="old password..." class="form-control input-sm" name="txtOldPassword" id="txtOldPassword">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>New Password</label>
							<input type="password" placeholder="new password..." class="form-control input-sm" name="txtPassword" id="txtPassword">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Confirm password</label>
							<input type="password" placeholder="confirm password..." class="form-control input-sm" name="txtConfirmPassword" id="txtConfirmPassword">
						</div>
						<div class="form-group">
							<div id="errorMsg" style="display:none;">
								<label class="col-lg-12" style="color:red;"><i> Passwords don't matched!</i>
								</label>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<button class="btn btn-success btn-sm" name="btnSave" type="submit"> <?php echo $this->lang->line('save')?></button>
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