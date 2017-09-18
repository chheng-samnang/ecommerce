</nav>

<div class="row">
	<div class="col-lg-5 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Set New Password</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="<?php echo base_url('product/register_member_account/'.$select_member->men_id)?>" method="post">
					<div class="form-group">
						<label class="col-lg-3">Password</label>
						<div class="col-lg-9">
							<input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3">Confirm Password</label>
						<div class="col-lg-9">
							<input type="password" name="txtConfirm" id="txtConfirm" class="form-control" placeholder="Confirm Password" required>
						</div>
					</div>
					<div class="form-group">
						<div id="errorMsg" style="display:none;">
							<label class="col-lg-5" style="color:red;"><i class="glyphicon glyphicon-remove-sign"></i> Passwords don't matched!</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<div class="pull-right">
								<button class="btn btn-success" type="submit" disabled id="btnSave">Save</button>
								<button class="btn btn-default" id="btnCancel">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#btnCancel").click(function(){
		window.location.assign("<?php echo base_url()?>product");
	});
	$("#txtConfirm").focusout(function(){
		var pass = $("#txtPassword").val();
		var con = $("#txtConfirm").val();
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