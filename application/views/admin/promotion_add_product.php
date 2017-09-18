<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
#get session cat_id and store id
  $cat_id=$this->session->userdata["promotion"][2];
  $str_id=$this->session->userdata["promotion"][6];
?>
</nav>
  <div class="container_fluid" style="margin:40px 25px 0px 25px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
      <div class="row">                                           
          <div class="col-lg-12">
              <?php if(isset($action)) echo form_open($action,"id='form' name='form'")?>
              <h1 class="page-header">Form Add <?php echo $pageHeader?></h1>
        <!--==== start error =====-->
              <div class="row">
                  <div class="col-lg-6 ">                      
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
        <!--==== end msg error =====-->                    
              <div class="row">
        <!--==== product list =====-->                    
                <div class="col-lg-6">
                   <div class="row">
                     <div class="col-lg-12">
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                              <h3 class="panel-title">Prmotion List</h3>
                          </div>
                          <div class="panel-body" style="overflow:scroll; height:360px">
                            <div class="row">                                   
                              <div class="col-lg-4" ng-repeat="x in product" ng-click="validation(x.P_id,x.P_name,x.Path)">
                                <div class="panel panel-default">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <img src="<?php echo base_url('assets/uploads/{{x.Path}}"');?>" style="width:100px; height:80px;">
                                    </div>
                                    <div class="col-lg-6">
                                      <small style="font-size:10.5px">Name:{{x.P_name}}</small>
                                    </div>
                                  </div>
                                </div>
                              </div>                                   
                            </div>
                          </div>
                      </div>
                     </div>
                   </div>
                   <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                           <!--== form == -->
                            <div class="col-lg-4">
                              <span class="pull-right" style="color:red; margin-top:30px;" ng-show="error">Please Enter form just number!</span>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                <label>Buy Quantity</label>                                
                                <?php echo form_input("txtBuyQty","",array("class"=>"form-control input-sm","placeholder"=>"Enter Quantity","ng-model"=>"txtBuyQty","id"=>"set_focus"));?>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                <label>Free Product</label>
                                  <select class="form-control input-sm" name="ddlFree" id="txtFree" ng-model="ddlFree" ng-change="free_product(ddlFree)">
                                    <option value="">Chose One</option>
                                    <option value="{{x.P_id}}" ng-repeat="x in product_free">{{x.P_name}}</option>                                    
                                  </select>
                              </div>
                            </div>  
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Quantity Free</label>
                                <?php echo form_input("txtQtyFree","",array("class"=>"form-control input-sm","placeholder"=>"Enter Quantity","ng-model"=>"txtQtyFree"));?>
                              </div>
                            </div>
                           <!--==end form ==--> 
                        </div>
                      </div>                        
                   </div>  
                </div>
        <!--=== end product list ==== -->

        <!--==== product selected promotion =====-->                    
                  <div class="col-lg-6">
                      <div class="row">
                          <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Promotion Selected Lists</h3>
                                </div>
                                <div class="panel-body" style="overflow:scroll; height:360px">
                                  <div class="row">                                        
                                    <div class="col-lg-6" ng-repeat="x in promotion_selected" ng-click="remove($index)">
                                         <input type="hidden" ng-value="{{x[0]}}" ng-model="txtP_id" name="txtP_id">
                                          <input type="hidden" ng-value="{{x[3]}}" ng-model="buyQty">
                                          <input type="hidden" ng-value="{{x[6]}}" ng-model="free">
                                          <input type="hidden" ng-value="{{x[5]}}" ng-model="qtyFree">                                                                                                                                                                                    
                                        <div class="panel-default">
                                          <div class="row">
                                            <div class="col-lg-6">
                                              <img src="<?php echo base_url('assets/uploads/{{x[2]}}"');?>" style=" width:100px; height:80px;">
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="row">
                                                <div class="col-lg-6">
                                                  <b>Buy:</b>{{x[1]}}<span style="color:red;">:{{x[3]}}</span>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-lg-6">
                                                  <b>Add:</b>{{x[4]}}<span style="color:red;">:{{x[5]}}</span>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>                                                                                    
                                    <input type="text" name="str" ng-model="str" id="str" value="" style="visibility: hidden;">
                                  </div>
                                </div>
                            </div>  
                          </div>
                      </div>
                      <div class="row">                             
                        <div class="col-lg-12">
                            <?php echo form_button("btnCancel","Cancel",array("class"=>"btn btn-defaul pull-right","style"=>"margin-left:10px","id"=>"btnCancel"))?>
                            <?php echo form_button("btnAdd","Add",array("class"=>"btn btn-success pull-right","ng-click"=>"add_promotion()","id"=>"btnAdd"))?>
                        </div>
                      </div>                          
                  </div>
      <!--=== end product selected promotion ==== -->  
                </div>                  
              <?php echo form_close()?>
          </div>
      </div>
  </div>    
<script>
    $("#btnCancel").click(function(){
        window.location.assign("<?php echo base_url('admin/promotion_c/add')?>");
    });
</script>

<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {
    $scope.free_product=function(x1)
    {
      $http.get("<?php echo base_url();?>/ng/get_promotion_free.php?str_id="+"<?php echo $str_id;?>"+"").then(function (response)
                  {
                    var a = response.data.records;
                    for(x in a){if(a[x]['P_id']==x1){free_id=a[x]['P_id'];free_name=a[x]['P_name']}};
                  });
    }
  //get product to free      
      $http.get("<?php echo base_url();?>/ng/get_promotion_free.php?str_id="+"<?php echo $str_id;?>"+"")        
      .then(function (response) {$scope.product_free = response.data.records;});
  //get all product      
      $http.get("<?php echo base_url();?>/ng/get_promotion_category.php?cat_id="+"<?php echo $cat_id;?>"+"&str_id="+"<?php echo $str_id;?>"+"")    
      .then(function (response) {$scope.product = response.data.records;});         
  //validation form
      var arr = [];
      var arr1 =[];
      var i = 0;       
      $scope.validation=function(p_id,p_name,path)
      {
        if(($scope.txtBuyQty==undefined) || (!(Number.isInteger(Number($scope.txtBuyQty))||$scope.txtBuyQty=="")) || ($scope.ddlFree==undefined || $scope.ddlFree=="") || (($scope.txtQtyFree==undefined) || (!(Number.isInteger(Number($scope.txtQtyFree)))||$scope.txtQtyFree=="")))
          {$scope.error=true;document.getElementById("set_focus").focus();}
        else
        {
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
                arr[i][3] = $scope.txtBuyQty;                                                                                
                arr[i][4] = free_name;                                                
                arr[i][5] = $scope.txtQtyFree;
                arr[i][6] = free_id; 
                $scope.promotion_selected = arr;
                i = i+1;
            $scope.str=JSON.stringify($scope.promotion_selected);
          }else
          {
             $scope.error_p_dublicate=true;$scope.msg=" This Promotion is already.";
          }

        }
      }                         
    
 //remove product promotion from product discout list       
      $scope.remove=function(index)
      {
          if(index!==undefined)
          {
              $scope.promotion_selected.splice(index,1);  
              arr1.splice(index,1);            
              i = i-1;
              $scope.str=JSON.stringify($scope.promotion_selected);
          }
      }
//add discount
      
      $scope.add_promotion=function()
      {
        if($scope.str==undefined || $scope.str=="[]"){$scope.error_p_dublicate=true;$scope.msg=" Please select promotion.";}        
        else{document.getElementById("form").submit();}
      }                       
  });//-------- end angularJS
</script>