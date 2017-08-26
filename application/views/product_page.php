<style type="text/css">
	.glyphicon { margin-right:5px; }
	.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: rgba(245, 87, 87, 0);
    margin-bottom: 10px;
}
.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
{
    //background: #428bca;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    //padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    //background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}


.item.list-group-item img
{
    float: left;
}
.thumbnail{
	box-shadow: 0px 4px 10px 1px #a7a6a6;
}
.list-group-item {
	border: none;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0 0 11px;
}
.product_name
{
	white-space: nowrap;
    width: 11em;
    overflow: hidden;
    text-overflow: ellipsis;
}



    .item1 {
      position: relative;
      //margin: 2%;
      overflow: hidden;

    }
    .item1 img {
      max-width: 100%;

      -moz-transition: all 0.3s;
      -webkit-transition: all 0.3s;
      transition: all 0.3s;
    }
    .item1:hover img {
      -moz-transform: scale(1.5);
      -webkit-transform: scale(1.5);
      transform: scale(1.5);
    }
</style>

<div class="container" ng-cloak>
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

	    <div class="shrink pic">
			<div class="col-md-8" id="products" style=" padding: 10px; background: white;">
				<div class="col-xs-2 col-md-3" style="padding: 0px;">
				 	<li class="dropdown" style="border: #bbbbbb 1px solid; padding: 6px;">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort By Category <b class="caret"></b></a>
					    <ul class="dropdown-menu">
					       	<a href="<?php echo base_url('Product');?>" class="list-group-item">All Category</a>
					        <a href="" class="list-group-item" ng-click="loadProduct_by_Cat(x.Id)" ng-repeat="x in categories">{{x.Name}}</a>
					    </ul>
					</li>
				</div>

				<div class="col-md-9">
					<div class="row navbar-right">
				 	<strong>Display</strong>
			        <div class="btn-group">
			            <a href="#" id="list" class="btn btn-default btn-sm">
			            	<span class="glyphicon glyphicon-th-list"></span>List
			            </a>
			            <a href="#" id="grid" class="btn btn-default btn-sm">
			            	<span class="glyphicon glyphicon-th"></span>Grid
			            </a>
			        </div>
			    </div>
			    </div>

			 	<div class="row">
					<div class="col-lg-12"><h4 style="padding:5px;background: #ff9800;color:white; height: 40px; line-height: 2"> Product Listing</h4></div>
				</div>
			    <div id="products" class="row list-group" style="box-shadow: none;">
			        <div class="item  col-xs-12 col-md-6 col-lg-3" ng-repeat="x in get_product | filter:searchBox ">
			        	<a class="" href="<?php echo base_url('product/product_page_detail/'.'{{x.P_id}}')?>">
				            <div class="thumbnail">

				            	<div class="item1">
				                <img class="" style="height: 160px;" class="group list-group-image" title="{{x.P_name}}" src="<?php echo base_url('assets/uploads/{{x.Path}}');?>"/>
				                </div>
				                <div class="caption" style="border-top: 1px solid #f1f1f1;">
				                	<p class="group inner list-group-item-heading product_name" style=" color: #006190;">{{x.P_name}}</p>
				                    <div class="row">
				                        <div class="col-xs-12 col-md-6">
				                            <p class="lead">${{x.Price}}</p>
				                        </div>
				                         <div class="col-xs-12 col-md-6">
				                         	<del><p class="lead" style="color: red">{{x.Dis}}</p></del>
				                         	<p></p>
				                         	<p>{{x.Date_to}}</p>
				                         </div>
				                    </div><!-- class row -->
				                </div><!-- class caption -->
				            </div>
			            </a>
			        </div>
		    	</div>
		    	<!-- <div class="row">
			    	<div class="mix cats col-sm-12">
			    			<a href="<?php echo base_url('Product');?>"><h5  class="well well-sm" style="text-align: center;">View all</h5></a>
			    	</div>
			    </div> -->
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
<script type="text/javascript">
	$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>s
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
