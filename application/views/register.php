</nav>

<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Member Registration</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<?php
							if(!empty(validation_errors())){
						?>

							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
								<strong>Warning!</strong> <?php echo validation_errors();?>
							</div>
						<?php
							}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="<?php echo base_url()?>product/registerMember" method="post">
							<div class="form-group">
								<label class="col-lg-3 control-label">Member Name</label>
								<div class="col-lg-9">
									<input type="text" name="txtName" value="<?php echo set_value('txtName')?>" id="txtName" placeholder="Member Name" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Phone Number</label>
								<div class="col-lg-9">
									<input type="text" name="txtPhone" value="<?php echo set_value('txtPhone')?>" id="txtPhone" placeholder="Phone Number" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Email</label>
								<div class="col-lg-9">
									<input type="email" name="txtEmail" id="txtEmail" value="<?php echo set_value('txtEmail')?>" placeholder="Email" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Password</label>
								<div class="col-lg-9">
									<input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Confirm Password</label>
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
								<label class="col-lg-3 control-label">Address</label>
								<div class="col-lg-9">
									<input type="text" value="<?php echo set_value('txtAddr')?>" name="txtAddr" id="txtAddr" class="form-control" placeholder="Address">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<div class="pull-right">
										<button class="btn btn-success" type="submit" disabled id="btnSave">Submit</button>
										<button class="btn btn-default" id="btnCancel">Cancel</button>		
									</div>
								</div>
								
							</div>
						</form>		
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#btnCancel").click(function(){
		window.location.assign("<?php echo base_url()?>home");
	});
</script>
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
