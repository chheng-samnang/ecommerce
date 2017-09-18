

	<div class="col-xs-12 col-md-9" style="margin-top: 7px;" > 
	<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
	    <div class="cbp-vm-options">
			<a style="text-decoration: none; color: #5d5b5b; font-size: 18px;">View:</a>
			<a href="#" class="cbp-vm-selected" data-view="cbp-vm-view-grid"><i class="fa fa-th" aria-hidden="true"></i></a>
			<a href="#"  data-view="cbp-vm-view-list"><i class="fa fa-th-list" aria-hidden="true"></i></a>
		</div>
		<div class="head navbar-default" style="border-radius:0px;height:41px;padding:12px;color:white;">Product Listing</div>

		<div >
			
			<ul >
				<li style="box-shadow: 1px 4px 5px #888888; margin-left:20px;" ng-repeat="x in get_product | filter:searchBox " >
					<a class="cbp-vm-image" href="<?php echo base_url('product_c/product_page_detail/{{x.P_id}}')?>"><img title="{{x.P_name}}" src="<?php echo base_url('assets/uploads/600.png');?>">
					</a>
					<h5 class="cbp-vm-title">{{x.P_name}}</h5>
					<div class="cbp-vm-price">{{x.Price}}</div>
					<div class="cbp-vm-details">
					Silver beet shallot 
					</div>
					<input type="number" style="width:50px;" name="txtItemNum" ng-model="itemNum">
					<button class="btn btn-warning" ng-click="addTocart(itemNum,$index)">Add to cart</button>
					
				</li>
			</ul>
		</div>
   </div> 
  </div>


  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cart Items</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
        	<thead>
        		<tr>
        			<th>No.</th>
        			<th>Name</th>
        			<th>Quantity</th>
        			<th>Price</th>
        			<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>
        		<tr ng-repeat="(key, value) in items">
        			<td>{{$index+1}}</td>
        			<td>{{value[1]}}</td>
        			<td>{{value[3]}}</td>
        			<td>{{value[3]*value[2]|currency}}</td>
        			<td><a href="#" ng-click="removeItem($index)">Remove</a></td>
        		</tr>
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Check Out</button>
      </div>
    </div>
  </div>
</div>




<script>
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){

    	

	    var i=0,j=0,total =0;
	    var arr = [];
	    	
	    	
	    $scope.itemNum = 1;
	    $scope.removeItem = function(index,val,type)
	    {  
	    	if(index!==undefined)
	    	{
	    		if(type=="remove")
	    		{
	    			$scope.addMy_Cart.splice(index,1);
	    			i = i-1;
	    			total = total - val;
	    			$scope.Total = total;
	    		}
	    	}
	    }
	    $http.get("/ecommerce/ng/get_all_products.php")
		.then(function (response) {$scope.get_product = response.data.records;});

	    $http.get("/ecommerce/ng/get_category.php")
		.then(function (response) {$scope.categories = response.data.records;});

		$scope.loadProduct_by_Cat = function(values)
		{
		$http.get("/ecommerce/ng/loadProduct_by_Cat.php?cat_id="+values)
		.then(function (response) {$scope.get_product = response.data.records;}); 
		}

		$scope.addTocart = function(num,index)
		{
			arr[i] = [];
			$scope.cartItem = $scope.cartItem+1;
			arr[i][0]= $scope.get_product[index]['P_id'];
			arr[i][1]= $scope.get_product[index]['P_name'];
			arr[i][2]= $scope.get_product[index]['Price'];
			arr[i][3]= num;
			
			$scope.items = arr;
			i = i+1;

		}

		$scope.removeItem = function(index)
		{
			$scope.items.splice(index,1);
			$scope.cartItem = $scope.cartItem-1;
			i = i - 1;
		}
		if($scope.cartItem===undefined)
		{
			$scope.cartStat=false;

		}else
		{
			$scope.cartStat=true;
		}
});
</script>