<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> <?php echo $this->lang->line('add')?>  <?php echo $this->lang->line('member')?></h3>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					 <?php if(form_error('txt_mem_code')){?>
	                    <div class="alert alert-danger alert-dismissible" role="alert">
	                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        <strong>Warning!</strong> <?php echo form_error('txt_mem_code');?>
	                    </div>
	                <?php }elseif(form_error('confirmPassword')){?>
	                		<div class="alert alert-danger alert-dismissible" role="alert">
	                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                            <strong>Warning!</strong> <?php echo form_error('confirmPassword');?>
	                        </div>
	               	 <?php }elseif(form_error('txt_mem_phone')){?>
	               	 		<div class="alert alert-danger alert-dismissible" role="alert">
		                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                        <strong>Warning!</strong> <?php echo form_error('txt_mem_phone');?>
	                    	</div>
	               	 <?php }elseif(form_error('txt_mem_email')){?>
	               	 		<div class="alert alert-danger alert-dismissible" role="alert">
		                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                        <strong>Warning!</strong> <?php echo form_error('txt_mem_email');?>
	                    	</div>
	               	 <?php }?>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Member Code</label>
								<input type="text" name="txt_mem_code"  class="form-control input-sm" placeholder="Member Code...">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Member Name</label>
								<input type="text" name="txt_mem_name"  class="form-control input-sm" placeholder="Member Name...">
							</div>
						</div>
					</div><!-- row -->
						<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Member Phone</label>
								<input type="text" name="txt_mem_phone"  class="form-control input-sm" placeholder="Member Phone...">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Member Email</label>
								<input type="text" name="txt_mem_email" id="txt_mem_email" maxlength="100"  class="form-control input-sm" placeholder="Member Email...">
							</div>
						</div>
					</div><!-- row -->
						<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Register date</label>
								<input type="date" name="txt_date"  class="form-control input-sm" placeholder="Select Date...">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Valid Code</label>
								<input type="text" name="txt_validcode"  class="form-control input-sm" placeholder="Valid Code...">
							</div>
						</div>
					</div><!-- row -->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Member Password</label>
								<input type="password" name="password"  class="form-control input-sm" placeholder="Member Password...">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
						 		<label>Confirm Password</label>
						 		<input type="Password" name="confirmPassword" class="form-control input-sm" ng-model="user.confirmPassword" placeholder="Confirm Your Password" ng-compare="password" >
							</div>
						</div>
					</div><!-- row -->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Status</label>
								<select name="txt_status" class="form-control input-sm">
									<option value="1">Enable</option>
									<option value="0">Disable</option>
								</select>
							</div>
						</div>
					</div><!-- row -->
					<div class="row">
					<div class="col-lg-12">
							<div class="form-group">
								<label>Address</label>
								<textarea name="txt_address" class="form-control"></textarea> 
							</div>
						</div>
					</div><!-- row-->
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
								<textarea name="txt_desc" class="form-control"></textarea>
							</div>
						</div>
					</div><!-- row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm" name="btn_Saveclose" ng-disabled="userForm.$invalid"><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save')?></button>
								<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>"  ><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel')?></a>
							</div>
						</div>
					</div><!-- row -->
				</form><!-- this form -->
			</div>
		</div>
	</div>
</div>