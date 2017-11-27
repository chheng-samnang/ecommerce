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
				<h3 class="panel-title"><?php echo $this->lang->line('switchAccount');?></h3>
			</div>
			<div class="panel-body">
			<?php echo form_open("admin/memberLogin/switchAccount")?>
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

				<?php
					if(isset($msg_error))
					{
				 ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<p><i class="glyphicon glyphicon-remove-sign"></i> <?php echo $msg_error ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label>Account Type</label>
							<select class="form-control" name="ddlAccountType" id="ddlAccountType">
								<option value="none">Choose One</option>
								<?php foreach ($acc as $key => $value) {
                  if($this->session->acc_type!=$value->acc_type){
                  ?>
								  <option value="<?php echo $value->acc_type?>"><?php echo $value->acc_type?></option>
								<?php }} ?>
							</select>
						</div>
					</div>
          <div class="col-lg-4">
						<div class="form-group" ng-class="{ 'has-error' : userForm.password.$invalid}">
						 	<label>Account Password</label>
						 	<input type="Password" name="password" id="password" class="form-control input-sm" ng-model="user.password" placeholder="Your Password" ng-required="true">
						 </div>
					</div>
        </div>

				<hr />
				<button type="submit" class="btn btn-success btn-sm" ><?php echo $this->lang->line('save');?></button>
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
	  		if($scope.txt_acc_type=="Shop-owner"||$scope.txt_acc_type=="Shop"){
	  			// if(($scope.txtStor_name==undefined || $scope.txtStor_name=="")||
          //         ($scope.txtStor_Type==undefined || $scope.txtStor_Type=="")){
	  			// 	$scope.msg_error=true; $scope.msg="input store name , store type.......!";
	  			// }else{}
					document.getElementById("userForm").submit();
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
	            if(optionValue=="Shop-owner"||optionValue=="Shop"){
	            	 $(".box1").show();
	            }else{$(".box1").hide();
	        	}
	        });
	    })
</script>
