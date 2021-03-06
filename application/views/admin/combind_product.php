</nav>
<div class="container-fluid" style="margin-top:15px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Form Add Supplier product to Shop</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
          <span ng-show="msg_error">
            <div class="alert alert-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <strong>Warning!</strong>{{msg}}
            </div>
          </span>
        </div><!--====End error msg ===-->
    </div>
    <form action="<?php echo base_url("admin/Combind_product/add_value")?>" name="form" id="form" method="post">
    <div class="row">
        <div class="col-lg-12">
            <div class="row" >
                <div class="col-lg-3">
                    <div class="row">
                         <div class="col-lg-12">
                            <div class="panel panel-primary">
                                 <div class="panel-heading">
                                    <h3 class="panel-title">Step 1: Match Supplier & Shop</h3>
                                </div>
                                <div class="panel-body">
                                   <div class="row">
                                       <div class="col-lg-12" style="margin-bottom:15px;">
                                           <label>Select Supplier</label>
                                           <select  class="form-control input-sm" name="ddlSupllyer" id="ddlSupllyer" ng-model="ddlSupllyer" ng-change="load_products(ddlSupllyer)">
                                               <option value="">Choose one</option>
                                                <?php if($acc_info!=""){ foreach ($acc_info as $value){ if($value->acc_type=="Bussiness"){ ?>
                                               <option value="<?php echo $value->acc_id;?>"><?php echo $value->mem_name; ?></option>
                                               <?php } } } ?>
                                           </select>
                                       </div>
                                       <div class="col-lg-12">
                                           <label>Select Shop</label>
                                           <select class="form-control input-sm" name="ddlShop_Owner" id="ddlShop_Owner" ng-model="ddlShop_Owner" ng-inet="ddlShop_Owner">
                                                <option value="">Choose One</option>
                                                <?php if($acc_info!=""){ foreach($acc_info as $value1){ if($value1->acc_type=="Shop-owner"){ ?>
                                               <option value="<?php echo  $value1->acc_id ?>"><?php echo $value1->mem_name;?></option>
                                               <?php }}} ?>
                                           </select>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- col-lg-2 -->
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Step 2: Select product to supply to Shop</h3>
                                </div>
                                <div class="panel-body" style="height:465px">
                                    <div class="row">
                                        <div class="col-lg-4" ng-repeat="x in product" ng-click="combind(x.P_id,x.P_name,x.Price,x.Path,x.Location)">
                                            <a href="">
                                                  {{x.P_name}}<i style="color:#d67e02"></i>
                                                  <img  class="img-responsive img-thumbnail" src="<?php echo base_url()?>assets/uploads/{{x.Path}}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div ng-repeat="x in product1">
                                <input type="text" value="{{x.Bussenis}}" name="">
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Selected Product</h3>
                                </div>
                                <div class="panel-body" style="height:465px">
                                    <div class="row">
                                        <div class="col-lg-4" ng-repeat="x in product_selected">
                                            <div>
                                                <a href="" ng-click="remove($index,x[1],x[2])">
                                                        <span>{{x[2]}}</span>
                                                        <img class="img-responsive img-thumbnail" src="<?php echo base_url()?>assets/uploads/{{x[4]}}">
                                                </a>
                                                <input type="hidden" name="txtP_id" id="txtP_id" value="{{x[1]}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <input type="hidden" id="str" name="str" value="">
                        <input type="button" value="Submit" class="btn btn-success btn-sm" ng-click="Save()" name="btnCheck-In">
                        <a href="<?php echo base_url("admin/Combind_product")?>" class="btn btn-default btn-sm">Cancel</a>
                    </div>
                </div> <!-- col-lg-10 -->
            </div> <!-- row -->
        </div> <!-- col-lg-12 -->
    </div> <!-- row -->
    </form>
</div> <!-- container-fluid -->
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script type="text/javascript">
    var app = angular.module('myApp',[]);
    app.controller('myCtrl',function($scope,$http){
        var arr = [];
        var arr1 =[];
        var i=0,j=0,total = 0,discountRate = 0;
        var txt = "";
        $scope.combind = function(P_id,P_name,Price,Path,Location)
        {
          $scope.shop_id=$scope.ddlShop_Owner;
            /*$http.get("<?php echo base_url()?>ng/check_shop_location.php?p_id="+P_id+"&shop_id="+$scope.shop_id+"loc_id="+Location)
                    .then(function (response) {var shop_location =response.data.records;
                        if(shop_location==false){alert("jiiii");}else{alert("no");}
                    });*/
                $http.get("<?php echo base_url()?>ng/check_product.php?id="+P_id+"&shop_id="+$scope.shop_id)
                .then(function (response) {var product1 =response.data.records;
                    if(product1==undefined){
                        var result = arr1.indexOf(P_id);
                             arr1[i] = P_id;
                            if(result==-1)
                            {
                                arr[i] = [];
                                arr[i][0] = $scope.ddlShop_Owner;
                                arr[i][1] = P_id;
                                arr[i][2] = P_name;
                                arr[i][3] = Price;
                                arr[i][4] = Path;
                                i = i+1;
                                $scope.product_selected = arr;
                                console.log(arr);
                                // arr[i][1] = P_id;
                            }else{$scope.msg_error=true; $scope.msg=" This product select aldready"}
                    }else{ $scope.msg_error=true; $scope.msg=" This product have aldready"}
                });
        }

        $scope.remove=function(index){
            if(index!==undefined)
            {
                $scope.product_selected.splice(index,1);
                i = i-1;
            }
        }

        $scope.load_products = function(){
            $http.get("<?php echo base_url()?>ng/product_combind.php?acc_id="+$scope.ddlSupllyer)
            .then(function (response) {$scope.product=response.data.records;});
        }

        $scope.check_location = function (){

        }
        $scope.validation =function(){
            if(
                ($scope.ddlSupllyer==undefined || $scope.ddlSupllyer=="")||
                ($scope.ddlShop_Owner==undefined || $scope.ddlShop_Owner=="")||
                ($scope.txtP_id==undefined || $scope.txtP_id=="")
                ){return false;}
        }
        $scope.Save = function()
        {
          if($scope.validation()===false){
            $('#str').val(JSON.stringify(arr));
            document.getElementById("form").submit();
          }else{$scope.msg_error=true; $scope.msg=" This product select aldready"}
        }
    });
</script>
