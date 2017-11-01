<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<style>
  img{cursor:pointer;}
</style>
  <div class="row" ng-app="myApp" ng-controller="myCtrl">
    <div class="col-lg-10 col-lg-offset-2">
      <h1 class="page-header">Form Edit Selected Supplier Product</h1>

      <div class="row">
        <div class="col-lg-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Supplied Product</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                  <div class="col-lg-3" ng-repeat="item in product" ng-click="addItem($index,item['P_name'])">
                    <label for="">{{item["P_name"]}}</label>
                    <img class="img-thumbnail" src="<?php echo base_url('assets/uploads')?>/{{item['Path']}}" alt="">
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Selected Product</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-3" ng-repeat="item in Shopproduct track by $index" ng-click="removeItem($index)">
                  <label for="">{{item["P_name"]}}</label>
                  <img class="img-thumbnail" src="<?php echo base_url('assets/uploads')?>/{{item['Path']}}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row pull-right">
        <div class="col-lg-12">
          <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">Update</button>
          <button type="button" name="btnCancel" id="btnCancel" class="btn btn-default">Cancel</button>
        </div>
      </div>

      <div class="row" ng-show="val">
        <div class="col-lg-3">
          <div class="alert alert-warning">
             <p><i class="glyphicon glyphicon-alert"></i> This product has been added already!</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    var app = angular.module("myApp",[]);
    app.controller('myCtrl',function($scope,$http){
      var com_id = "<?php echo $id?>";
      var selectedProduct = [];
      var selectedPName = [];
      $scope.val = 0;
      // SELECT product from active supplier
      $http.get("<?php echo base_url()?>ng/get_product.php?id="+com_id)
      .then(function (response) {
        $scope.product =response.data.records;
      })

      // SELECT selected product for shop
      $http.get("<?php echo base_url()?>ng/get_selected_product.php?id="+com_id)
      .then(function (response) {
        $scope.Shopproduct =response.data.records;
        selectedProduct = response.data.records;

        for(var i = 0;i<=selectedProduct.length-1;i++)
        {
          selectedPName[i] = selectedProduct[i]["P_name"];
        }
      })


      $scope.addItem = function(id,name){
        $scope.val="0";
        var found = selectedPName.indexOf(name);
        if(found!="-1")
        {
          $scope.val=1;
        }else
        {
            $scope.val=0;
            selectedProduct[selectedProduct.length] = $scope.product[id];
            selectedPName[selectedPName.length] = name;
        }
      }

      $scope.removeItem = function(id){
        $scope.val = 0;
        selectedProduct.splice(id,1);
        selectedPName.splice(id,1);
      }

    });
  </script>

  <script type="text/javascript">
    $("#btnCancel").click(function(){
      window.location.assign("<?php echo base_url('admin/combind_product')?>");
    });
  </script>
