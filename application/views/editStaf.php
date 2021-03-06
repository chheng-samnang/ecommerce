<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

</nav>

<?php echo form_open_multipart("admin/memberLogin/editstaf/".$acc_id)?>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('edit')?> Staf</h3>
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
					<div class="col-lg-6">
						<div class="form-group">
							<label>Staf Code</label>
							<input type="hidden" name="acc_id" value="<?php if(isset($edit->acc_id)){ echo $edit->acc_id;}?>">
							<input type="hidden" name="st_id" value="<?php if(isset($edit->st_id)){ echo $edit->st_id;}?>">
							<input type="text" name="txtCode" value="<?php if(isset($edit->st_code)){echo $edit->st_code;}?>" class="form-control input-sm" readonly>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Staf Name</label>
							<select name="ddlStaf" id="ddlStaf" class="form-control input-sm">
								<option value="">Choose One</option>
								<?php if(isset($acc_info)){  foreach ($acc_info AS $value){  ?>
								<option <?php if($value->acc_id==$edit->acc_id){echo "selected"; } ?> value="<?php echo $value->acc_id; ?>"><?php echo  $value->mem_name;?></option>
								<?php }} ?>
							</select>
							<div id="errorName" style="display:none;">
								<h5 style="color:red;"><i class="glyphicon glyphicon-remove"></i> <strong>Warning!</strong> This field cannot be empty.</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Description</label>
							<textarea name="terDescr"><?php echo set_value('txtInvDesc',$edit->descr)?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Status</label>
							<select name="ddlStatus" class="form-control">
								<option <?php if($edit->stf_status=='1'){ echo "selected"; } ?> value="1">Enable</option>
								<option <?php if($edit->stf_status=='0'){ echo "selected"; } ?> value="0">Disable</option>
							</select>
						</div>
					</div>
				</div><hr />
				<div class="row">
					<div class="col-lg-12">
						<button class="btn btn-success btn-sm" name="btnEdit" type="submit"> <?php echo $this->lang->line('update')?></button>
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
</script>