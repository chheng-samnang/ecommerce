
<div class="row" >
<div class="col-lg-8 col-lg-offset-2">
	<div class="col-lg-12" style="margin-top:50px">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('changa_password')?> <?php echo $this->lang->line('account')?></h3>
			</div>
			<div class="panel-body">
			<form method="post" action="<?php echo base_url("admin/AccountController/save_chage_password");?>" name="userForm" novalidate>
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
						<div class="form-group" ng-class="{ 'has-error' : userForm.newpassword.$invalid}">
						 	<label>New Password</label>
						 	<input type="Password" name="newpassword" id="newpassword" class="form-control input-sm" ng-model="user.password" placeholder="Your Password" ng-required="true">
						 </div>
					</div>	
					<div class="col-lg-6">
						<input type="hidden" name="acc_id" value="<?php echo $acc_id; ?>" id="acc_id">
						<div class="form-group" ng-class="{ 'has-error' : userForm.confirmPassword.$invalid}">
						 	<label>Confirm Password</label>
						 	<input type="Password" name="confirmPassword" class="form-control input-sm" ng-model="user.confirmPassword" placeholder="Confirm Your Password" ng-compare="password" ng-required="true">
						</div>
					</div>	
				</div>
						<hr />
						<button type="submit" class="btn btn-success btn-sm" name="btn_Saveclose"><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save')?></button>
						<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/AccountController/index')?>" ><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel')?></a>
				</form>
			</div>
		</div>
	</div>
</div>
</div>				
<script>
	$("#btnCancel").click(function(){
    	window.location.assign('<?php echo base_url('admin/AccountController')?>');
	});
</script>
 <script>
 //defining module
 var myapp = angular.module('myApp', []);
 
 //creating custom directive
 myapp.directive('ngCompare', [function () {
}]);

 // create angular controller
 myapp.controller('myCtrl', function ($scope){
	 // function to submit the form
	 $scope.submitForm = function () {
		 // check to make sure the form is completely valid
		 if ($scope.userForm.$valid) {
		 alert('form is submitted');
		 }
	 };
 });
 </script>