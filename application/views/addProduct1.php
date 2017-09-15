
<div ng-app="myApp" ng-controller="myCtrl">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $this->lang->line('add');?> <?php echo $this->lang->line('product');?></h3>
				</div>
				<div class="panel-body">
					<form method="post" action="<?php echo base_url("Owner_product/add_product"); ?>" id="personForm" name="personForm" novalidate ng-submit="personForm.$valid &&sendForm()">
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
	                        <div class="col-lg-12 ">                      
	                          <span ng-show="error_p_dublicate"> 
	                            <div class="alert alert-warning" role="alert">
	                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">&times;</span>
	                              </button>
	                              <strong>Warning!</strong>{{msg}}                                                               
	                            </div>
	                          </span>                        
	                        </div>              
                    	</div>       
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Product Code</label>
									<?php $rest = substr($pro_code->p_code, -6); ?>
								      <input  type="text" name="type_pro_code" id="type_pro_code" class="form-control input-sm" value="<?php if($pro_code->p_code!="" && $pro_code->p_id!=""){ echo "P".str_pad($rest+$pro_code->p_id, 6, "0", STR_PAD_LEFT);}else{ echo "P00000".$pro_code->p_id; }?>" placeholder="Product Code" >
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Store Name</label>
									<input type="" readonly="readonly"  class="form-control input-sm" value="<?php if($store->str_name){echo $store->str_name;}else echo "No Shop!";?>">
								</div>
							</div>
						</div><!-- class Row-->
						<div class="row">
							<div class="col-lg-3">
								<div class="input-group">
									<label>Supplyer</label>
									 <select class="form-control input-sm"  name="ddlProduct" id="ddlProduct" ng-model="ddlProduct" ng-change="load_product(ddlProduct)">
									 <option value="" style="display: none;">Choose one</option>
									 <?php if($supplyer!=""){
										foreach ($supplyer as $value) {
									 ?>
									 	<option value="<?php echo $value->acc_id;?>"><?php echo $value->mem_name;?></option>
									 	<?php }} ?>
									 </select>
							    </div>
							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<label>Product Status</label>
									<select  name="txt_status" ing-init="txt_status" id="txt_status" model="txt_status" class="form-control input-sm">
										<option value="1">Enable</option>
										<option value="0">Disable</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<label for="ddlProduct">Price</label>
									<input type="hidden" value="<?php echo $account->acc_id;?>" name="acc_id" id="acc_id">
									<input class="form-control input-sm" placeholder="product price.." type="number" ng-model="txtPrice" name="txtPrice" id="txtPrice">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<label>Store Quanitity</label>
									<input type="number" name="txtQty" id="" ng-model="txtQty" placeholder="store quanitity" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label>Products lists</label>
								<div class="panel panel-primary">
									<div class="table-responsive">
										<table class="table">
											<tr>
												<th>Product Name</th>
												<th>Photo</th>
												<th>Category</th>
												<th>Brand</th>
												<th>Action</th>
											</tr>
											<tr ng-repeat="x in supplyer">
												<td>{{x.P_name}}</a></td>
												<td><img src="http://localhost:8888/ecommerce/assets/{{x.Path}}"></td>
												<td>{{x.Category}}</td>
												<td>{{x.Brn_name}}</td>
												<td><a href="" ng-click="add_product(x.P_id,x.P_name,x.Category,x.Brn_name)" class="btn btn-sm btn-success" >Add</a></td>
											</tr>
										</table>
										<input type="text" name="str" ng-model="str" id="str" value="" style="visibility: hidden;">
									</div>
								</div>
							</div>
						</div><hr>
						<div class="row">
							<div class="col-lg-12">
								<label>Products list selected</label>
								<div class="panel panel-primary">
									<div class="table-responsive">
										<table class="table">
											<tr>
												<th>Product Name</th>
												<th>Photo</th>
												<th>Category</th>
												<th>Brand</th>
												<th>Price</th>
												<th>Action</th>
											</tr>
											<tr ng-repeat="x in product_selected">
												<td>{{x[1]}}</a></td>
												<td><img src="http://localhost:8888/ecommerce/assets/{{x[2]}}"></td>
												<td>{{x[3]}}</td>
												<td>{{x[4]}}</td>
												<td>{{x[5]}}</td>
												<td><a href="" ng-click="remove($index)" class="btn btn-sm btn-danger" >Remove</a></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="pull-right">
								<div class="col-lg-12">
									<div class="form-group">
										<button type="button" class="btn btn-success btn-sm" name="btn_Saveclose" ng-click="add_product1()" ><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save');?></button>
										<a class="btn btn-default btn-sm" href="<?php echo base_url('admin/MemberLogin/Cancel')?>"  ><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel');?></a>
									</div>
								</div>
							</div>
						</div>
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
						</div><!-- row -->
	    			</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#btnCancel").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberLogin/Cancel");
	});
</script>
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

<script type="text/javascript">
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
		$scope.load_product=function(acc_id){
				$http.get("<?php echo base_url()?>ng/get_product_by_supplier.php?acc_id="+acc_id)        
		     	.then(function (response) {$scope.supplyer=response.data.records;});	
		}
		var arr = [];
		var arr1 =[];
		var i = 0;    
		$scope.add_product=function(p_id,p_name,category,brand,path){
			var status = document.getElementById("txt_status").value;
			if($scope.txtPrice!="" && $scope.txtPrice!=undefined){
			  $scope.error=false;
	          $scope.error_p_dublicate=false;
	          var result = arr1.indexOf(p_id);
	          arr1[i] = p_id;          
	          if(result==-1)
	          {                    
	            arr[i] = [];
	            arr[i][0] = p_id;
	            arr[i][1] = p_name;
	            arr[i][2] = path;
	            arr[i][3] = category;
	            arr[i][4] = brand;
	            arr[i][5] = $scope.txtPrice;
	            arr[i][6] = status;
	            arr[i][7] = $scope.txtQty;
	            $scope.product_selected = arr;
	            i = i+1;
	            $scope.str=JSON.stringify($scope.product_selected);
	          }else
	          {	
	            $scope.error_p_dublicate=true;$scope.msg=" This Promotion is already.";
	          }
			}else{$scope.error_p_dublicate=true;$scope.msg=" Input product price.";}
		}
		$scope.remove=function(index)
	    {
	        if(index!==undefined)
	        {
	          $scope.product_selected.splice(index,1);  
	          arr1.splice(index,1);            
	          i = i-1;
	          $scope.str=JSON.stringify($scope.promotion_selected);
	        }
	    }
	     $scope.add_product1=function()
      {
        if($scope.str==undefined || $scope.str=="[]"){$scope.error_p_dublicate=true;$scope.msg=" Please select promotion.";}        
        else{document.getElementById("personForm").submit();}
      }     
		$scope.sendForm = function () {
		$scope.msg = "Form Validated";
	};
});
</script>