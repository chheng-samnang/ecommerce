<style>
	 .none{
		display: none;
	}
	/*.box1 {
		display: none;
	}*/
</style>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('add');?> <?php echo $this->lang->line('account');?></h3>
			</div>
			<div class="panel-body">
			<?php echo form_open("admin/memberLogin/acc_setup", "name='userForm', id='userForm' novalidate")?>
				<div class="row">
					<div class="col-lg-12">
						<?php
							if(!empty($error) OR validation_errors())
							{
						?>
							<div class="alert alert-warning" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
								<strong><?php echo $this->lang->line("attention"); ?>!</strong><?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>

							</div>
						<?php }?>
						<span ng-show="msg_error">
			           		<div class="alert alert-warning" role="alert">
				                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				                </button>
				                <strong></strong>{{msg}}
			            	</div>
			          	</span>
					</div>
				</div>
                <?php $acc_code = date('s');?>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group"> <!-- ng-class="{ 'has-error' : userForm.txtaccCode.$invalid}"-->
							<input type="hidden" value="<?php echo $member->mem_id?>" name="txt_mem_id" id="txt_mem_id" value="">
							<label>Account Code</label>
							<input type="text" name="txtaccCode" readonly="readonly" value="<?php echo "acc00".$acc_code?>" class="form-control input-sm"><!-- ng-model="user.txtaccCode" placeholder="Enter Account Code here..." ng-required="true"-->
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Gender</label>
							<select class="form-control input-sm" name="txt_gender">
								<option value="" >Choose One</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Date of Birth</label>
							<input type="date" name="txt_dob" class="form-control input-sm">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Company</label>
							<input type="text" name="txt_company" class="form-control input-sm" placeholder="Your Company...">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Position</label>
							<input type="text" name="txt_position" class="form-control input-sm" placeholder="Your Position...">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Image</label><br>
							<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Upload Image
							</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group" ng-class="{ 'has-error' : userForm.password.$invalid}">
						 	<label>Account Password</label>
						 	<input type="Password" name="password" id="password" class="form-control input-sm" ng-model="user.password" placeholder="Your Password" ng-required="true">
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
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Account Type</label>
							<select class="form-control input-sm" name="txt_acc_type" ng-model="txt_acc_type" id="txt_acc_type" ng-change="AccountType(txt_acc_type)">
								<option value="">Choose One</option>
								<option value="Shop-owner">Shop-owner</option>
								<option value="Bussiness">Business</option>
								<option value="Association">Association</option>
								<option value="Agent">Agent</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Location</label>
							<select class="form-control input-sm" name="ddlLocation">
								<option value="">Choose One</option>
								<?php foreach($location as $row){?>
								<option value="<?php echo $row->loc_id?>"><?php echo $row->loc_name?></option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>
				<div class="Shop-owner box1">
					<div class="row">
						<div class="col-lg-6">
							<label>Store Name</label>
							<input type="" class="form-control" placeholder="store name" id="txtStor_name" name="txtStor_name">
						</div><!-- col-lg-6-->
						<div class="col-lg-6">
							<label>Store Type</label>
							<input type="" class="form-control" placeholder="store type..." id="txtStor_Type" name="txtStor_Type">
						</div><!-- col-lg-12-->
					</div><!-- row product-->
				</div><!-- class product-->
				<div class="row">
					<div class="col-lg-12">
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Browse Image</h4>
								  </div>
								  <div class="modal-body">
									<input	type="file" name="txtUpload" />
									<input type="hidden" id="txtImgName" name="txtImgName" />
									<div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr />
				<button type="button" class="btn btn-success btn-sm" ng-click="btnSave()" name="btn_Saveclose" ng-disabled="userForm.$invalid"><?php echo $this->lang->line('save');?></button>
				<!-- <button class="btn btn-success" type="submit" name="btn_Saveclose">Save</button> -->
				<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>"  ><?php echo $this->lang->line('cancel');?></a>
				</form>
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
	  $scope.btnSave = function(){
	  		if($scope.txt_acc_type=="Shop-owner"){
	  			if(($scope.txtStor_name==undefined || $scope.txtStor_name=="")||
                  ($scope.txtStor_Type==undefined || $scope.txtStor_Type=="")){
	  				$scope.msg_error=true; $scope.msg="input store name , store type.......!";
	  			}else{document.getElementById("userForm").submit();}
	  		}else{

	  			document.getElementById("userForm").submit();
	  		}

	  }

	 });
	 </script>
<script type="text/javascript">
	$("#btnCancel").click(function(){
		window.location.assign("<?php echo base_url()?>memberLogin");
	});
</script>

<script>
	$(".box1").hide();
	 $("#txt_acc_type").change(function(){
	        $(this).find("option:selected").each(function(){
	            var optionValue = $(this).attr("value");
	            if(optionValue=="Shop-owner"){
	            	 $(".box1").show();
	            }else{$(".box1").hide();
	        	}
	        });
	    })
</script>
