<style type="text/css">
	.box1{
		box-shadow: 1px 4px 5px #888888; 
	}
	.box1:hover .cbp-vm-image, #img1
	{
		-webkit-transform: scale(0.9);
    	transform: scale(0.9); 
	}
</style>

 <div class="container">
	<div class="row">
	    <div class="col-sm-2">
	    	<?php 
	    		foreach ($advertisement as $value) 
	    		{
	    			if($value->position=="left" and $value->page=="Products")
	    			{
	    	?>
	      				<a href="<?php echo $value->url?>" target="blnk" >
					      	<img class="img-responsive" style="width: 195px; margin-bottom: 10px; height: <?php echo $value->height;?>px" src="<?php echo base_url('assets/uploads/'.$value->img);?>" alt="..."> 
					    </a>
			<?php 
					}
				}
			?>
	    </div>
	    
	    <div class="col-sm-8" style="padding: 0px;">
	      <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
				<div class="col-md-3" style="padding: 1px;">
			        <li class="dropdown" style="padding: 6px; border: #bbbbbb 1px solid;">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Short By Category <b class="caret"></b></a>
			            <ul class="dropdown-menu" style="margin-left: 0px; overflow-x: hidden; overflow: scroll; height: 400px;">
			                <a href="<?php echo base_url('Product');?>" class="list-group-item">All Category</a>
			                <a href="" class="list-group-item" ng-click="loadProduct_by_Cat(x.Id)" ng-repeat="x in categories">{{x.Name}}</a> 
			            </ul>
			        </li>
			    </div>
			    <div class="cbp-vm-options">
					<a style="text-decoration: none; color: #5d5b5b; font-size: 18px;">View:</a>
					<a href="#" class="cbp-vm-selected" data-view="cbp-vm-view-grid"><i class="fa fa-th" aria-hidden="true"></i></a>
					<a href="#"  data-view="cbp-vm-view-list"><i class="fa fa-th-list" aria-hidden="true"></i></a>
				</div>
				<div class="head navbar-default" style="border-radius:0px;height:41px;padding:12px;color:white;">{{x.Cat_name}}</div>
				<ul>
					<li class="box1" style="box-shadow: 1px 4px 5px #888888;  margin-left:18px;" ng-repeat="x in get_product | filter:searchBox " >
						<a class="cbp-vm-image" href="<?php echo base_url('product/product_page_detail/{{x.P_id}}/{{x.P_name}}')?>">
							<img id="img1" title="{{x.P_name}}" src="<?php echo base_url('assets/uploads/{{x.Path}}');?>">
						</a>
						<h5 class="cbp-vm-title">{{x.P_name}}</h5>
						<div class="cbp-vm-price">{{x.Price}}</div>
						<div class="cbp-vm-details"></div>
						<input type="number" style="width:50px;" name="txtItemNum" ng-model="itemNum">
							
						<button class="btn btn-warning" ng-click="btnAdd(x.P_name,x.P_id,itemNum,x.Store)">Add to Cart</button>	
					</li>
				</ul>
		   </div>
	    </div>
	    <div class="col-sm-2">
	    	<?php
	    	 	foreach($advertisement as  $value) 
	    	 	{
	    		 	if($value->position=="right" and $value->page=="Products")
	    		 	{
	    	?>
				    	<a href="<?php echo $value->url?>" target="blnk" >
					      	<img class="img-responsive" style="width: 195px; margin-bottom: 10px; height: <?php echo $value->height;?>px" src="<?php echo base_url('assets/uploads/'.$value->img);?>" alt="..."> 
					    </a>
	    	<?php 
	    			}
	    		}
	    	?> 
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
	        	<div id="display_cart"></div>
	      	</div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" ng-click="checkout()">Check Out</button>
	      	</div>
	    </div>
	</div>
</div>
<script>
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){

	    $http.get("/ecommerce/ng/get_all_products.php")
		.then(function (response) {$scope.get_product = response.data.records;});

	    $http.get("/ecommerce/ng/get_category.php")
		.then(function (response) {$scope.categories = response.data.records;});

		$scope.loadProduct_by_Cat = function(values)
		{
		$http.get("/ecommerce/ng/loadProduct_by_Cat.php?cat_id="+values)
		.then(function (response) {$scope.get_product = response.data.records;}); 
		}

		$scope.btnAdd = function(name,id,qty,str)
		{
			var xmlhttp = new XMLHttpRequest();
			var xmlhttp2 = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() 
			 {
	            if (this.readyState == 4 && this.status == 200) 
	            {
	                document.getElementById("itemNum").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp2.onreadystatechange = function()
	        {
	        	if (this.readyState == 4 && this.status == 200) 
	        	{
	       			document.getElementById("display_cart").innerHTML = this.responseText;
			    }
	    	}

	    	xmlhttp.open("GET", "<?php echo base_url()?>product_c/add_to_cart/"+ name + "/" + id+"/"+qty+"/"+str, true);
			xmlhttp.send(); 

	        xmlhttp2.open("GET", "<?php echo base_url()?>product_c/display_cart", true);
	       	xmlhttp2.send();
		}
		$scope.removeItem = function(id)
		{
			alert(id);
		}

		$scope.checkout = function()
		{
			window.location.assign("product_c/checkout");
		}
		$scope.itemNum = 1;
});
</script>
<script type="text/javascript">
	   
	function itemRemove(id)
	{
		var xmlhttp = new XMLHttpRequest();
		var xmlhttp2 = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("itemNum").innerHTML = this.responseText;
	            }
	        };
	    xmlhttp2.onreadystatechange = function()
	        {
	        	if (this.readyState == 4 && this.status == 200) {
	       				document.getElementById("display_cart").innerHTML = this.responseText;
	       		}
	        };

	    xmlhttp.open("GET", "<?php echo base_url()?>product_c/remove_item/"+ id, true);
	    xmlhttp.send();

	    xmlhttp2.open("GET", "<?php echo base_url()?>product_c/display_cart", true);
	    xmlhttp2.send();
	}
</script>