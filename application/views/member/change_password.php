<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('change_password')?> <?php echo $this->lang->line('member')?></h3>
			</div>
			<div class="panel-body">
				<form method="post" action="" name="userForm" novalidate>
					<?php if(form_error('password')){?>
	                        <div class="alert alert-danger alert-dismissible" role="alert">
	                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                    <strong>Warning!</strong> <?php echo form_error('password');?>
	                                  </div>
	                <?php }elseif(form_error('confirmPassword')){?>
	                		<div class="alert alert-danger alert-dismissible" role="alert">
	                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                            <strong>Warning!</strong> <?php echo form_error('confirmPassword');?>
	                        </div>
	                <?php }?>
					<input type="hidden" value="<?php echo $member->mem_id?>"> 
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group" ng-class="{ 'has-error' : userForm.password.$invalid}">
								<label>New Password</label>
								<input type="password" name="password" id="password"  class="form-control input-sm" placeholder="New Password..." ng-model="user.password"  ng-required="true">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group" ng-class="{ 'has-error' : userForm.confirmPassword.$invalid}">
							 	<label>Confirm Password</label>
							 	<input type="Password" name="confirmPassword" class="form-control input-sm" ng-model="user.confirmPassword" placeholder="Confirm Your Password" ng-compare="password" ng-required="true">
								<p  style="color: red; margin-top: 31px;" ng-show="userForm.confirmPassword.$error.valueMatch && !userForm.confirmPassword.$error.required" class="help-block">Confirm password doesnot match.</p>
							</div>
							
						</div>
					</div><!-- row -->
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm" name="btn_Saveclose" ><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save')?></button>
								<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>"  ><i class="fa fa-times"></i>  <?php echo $this->lang->line('cancel')?></a>
							</div>
						</div>
					</div><!-- row -->
				</form><!-- form -->
			</div>
		</div>
	</div>
</div>
<script>
 //defining module
 var myapp = angular.module('myApp', []);
 
 //creating custom directive
 myapp.directive('ngCompare', [function () {
 return {
 require: 'ngModel',
 link: function (scope, elem, attrs, ctrl) {
 var firstfield = "#" + attrs.ngCompare;
 
 //second field key up
 elem.on('keyup', function () {
 scope.$apply(function () {
 var isMatch = elem.val() === $(firstfield).val();
 ctrl.$setValidity('valueMatch', isMatch);
 });
 });
 
 //first field key up
 $(firstfield).on('keyup', function () {
 scope.$apply(function () {
 var isMatch = elem.val() === $(firstfield).val();
 ctrl.$setValidity('valueMatch', isMatch);
 });
 });
 }
 }
 }]);
 
 // create angular controller
 myapp.controller('myCtrl', function ($scope) {
 
 // function to submit the form
 $scope.submitForm = function () {
 
 // check to make sure the form is completely valid
 if ($scope.userForm.$valid) {
 alert('form is submitted');
 }
 };
 });
 </script>