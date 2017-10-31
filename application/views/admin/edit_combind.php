<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

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

            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Selected Product</h3>
            </div>
            <div class="panel-body">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    var app = angular.module("myApp",[]);
    app.controller('myCtrl',function($scope,$http){
      var p_id = "<?php echo $id?>";
      var acc_id = "<?php echo $acc_id?>";
      $http.get("<?php echo base_url()?>ng/get_product.php?id="+p_id+"&acc_id="+acc_id)
      .then(function (response) {
        var product =response.data.records;
      })
    });
  </script>
