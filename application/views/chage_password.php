
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('changa_password')?> <?php echo $this->lang->line('account')?></h3>
			</div>
			<div class="panel-body">
			<form method="post" action="<?php echo base_url("admin/memberLogin/chage_password/".$account->acc_id);?>" name="userForm" novalidate>
			 	<?php if(form_error('newpassword')){?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> <?php echo form_error('newpassword');?>
                                  </div>
                		<?php }elseif(form_error('confirmPassword')){?>
                		<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Warning!</strong> <?php echo form_error('confirmPassword');?>
                        </div>
                <?php }?>
		
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group" ng-class="{ 'has-error' : userForm.newpassword.$invalid}">
						 	<label>New Password</label>
						 	<input type="Password" name="newpassword" id="newpassword" class="form-control input-sm" ng-model="user.password" placeholder="Your Password" ng-required="true">
						 	
						 </div>
					</div>	
					<div class="col-lg-6">
						<div class="form-group" ng-class="{ 'has-error' : userForm.confirmPassword.$invalid}">
						 	<label>Confirm Password</label>
						 	<input type="Password" name="confirmPassword" class="form-control input-sm" ng-model="user.confirmPassword" placeholder="Confirm Your Password" ng-compare="password" ng-required="true">
							<p  style="color: red; margin-top: 31px;" ng-show="userForm.confirmPassword.$error.valueMatch && !userForm.confirmPassword.$error.required" class="help-block">Confirm password doesnot match.</p>
						</div>
					</div>	
								
				</div>
				
						<hr />
						<button type="submit" class="btn btn-success btn-sm" name="btn_Saveclose"><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save')?></button>
						
						<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>" ><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel')?></a>
				</form>
			</div>
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
<script>
	$("#btnCancel").click(function(){
    	window.location.assign('<?php echo base_url('admin/MemberLogin/product')?>');
	});
</script>
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