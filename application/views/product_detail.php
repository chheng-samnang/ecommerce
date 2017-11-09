
<link href="<?php echo base_url('assets/magiczoom/magiczoom.css');?>" rel="stylesheet" type="text/css" media="screen"/>
<link href="magiczoom/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="<?php echo base_url('assets/magiczoom/magiczoom.js');?>" type="text/javascript"></script>
<link href="<?php echo base_url('assets/magiczoom/style_zoom.css')?>" rel="stylesheet" type="text/css" media="screen"/>
<script src="<?php echo base_url('assets/magiczoom/jquery-1.12.3.min.js');?>"></script>
<link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet" type="text/css">
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

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
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

.box1:hover
	{
		-webkit-transform: scale(1);
    	transform: scale(1);
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
<body>
<div class="container">
<div class="col-lg-12" style="margin-bottom: 10px;">
	<div class="row">
		<?php
		    		foreach ($advertisement as $value)
		    		{
		    			if($value->position=="center" and $value->page=="page detail")
		    			{
		    	?>
		      				<a href="<?php echo $value->url?>" target="blnk" >
						      	<img class="img-responsive" style=" width: 100%; height: <?php echo $value->height;?>px" src="<?php echo base_url('assets/uploads/'.$value->img);?>" alt="...">
						    </a>
				<?php
						}
					}
			?>
	</div>
</div>
	<div class="col-xs-12 col-md-9" style="padding: 0px; background: #fff; ">
		<div class="col-xs-12">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('Home');?>"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="<?php echo base_url('Product');?>">All Category</a></li>
					<li><?php echo $de_value->cat_name?></li>
					<li class="active"><?php echo $de_value->p_name;?></li>
				</ol>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-lg-6">
					<div class="app-figure" id="zoom-fig">
						<a id="Zoom-1" class="MagicZoom" href="<?php echo base_url('assets/uploads/'.$de_value->path);?>">
							<img src="<?php echo base_url('assets/uploads/'.$de_value->path);?>" alt=""/>
						</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-12  border">
					   <h2 id="product_titel"><?php echo $de_value->p_name;?></h2>
					</div>
					<div class="col-lg-12 border">
						<div class="col-lg-4">Prices:</div>
						<div class="col-lg-8"><?php echo "$".$de_value->price; ?> <del style="color: red"><?php echo $de_value->dis_percent?></del></div>
					</div>
					<div class="col-lg-12 border">
						<div class="col-lg-4">Quantity : </div>
						<div class="col-lg-8">
							<input class="form-control input-sm" type="number" min="0" max="100" style="width:115px;" name="txtItemNum" ng-model="itemNum">
							</div>
					</div>
					<div class="col-lg-12 border">
						<div class="col-lg-4">Sizes</div>
						<div class="col-lg-5">
							<select class="form-control input-sm">
								<option><?php echo $de_value->size;?></option>
							</select>
						</div>
					</div>
					<div class="col-lg-12 border">
						<div class="col-lg-4">Colors</div>
						<div class="col-lg-5">
							<select class="form-control input-sm">
								<option><?php echo $de_value->color?></option>
							</select>
						</div>
					</div>
					<div class="col-lg-12" style="padding: 10px 90px 39px;">
						<?php
							$price=$de_value->price;
							$p_id=$de_value->p_id;
							$name=$de_value->p_name;
							$str = $de_value->str_id;
						?>
						<div style="margin-left:41px;">
							<?php
								if($type=="product" || $type=="inventory" && $store_exist!=false)
								{
							?>
								<button class="btn btn-warning" ng-click="btnAdd('<?php echo $name?>',<?php echo $p_id?>,itemNum,<?php echo $str?>,'<?php echo $type?>')">Add to Cart</button>
							<?php
								}
							?>
							<a href="<?php echo base_url('index.php/product_c'); ?>" class="btn btn-primary" type="button">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-lg-12">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Desciption</a></li>
				<li><a data-toggle="tab" href="#menu1">Detail</a></li>
			</ul>
			<div class="tab-content" style="border-left: 1px solid #ddd; margin-bottom: 20px; border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
				<div id="home" class="tab-pane fade in active" style="padding: 10px;">
					<p><?php echo $de_value->p_desc; ?></p>
				</div>
				<div id="menu1" class="tab-pane fade" style="padding: 10px;">
					<div class="tab-pane fade active in" id="home">
		                <h4>Product Information</h4>
		                <table class="table table-bordered">
			                <tbody>
			                    <tr class="techSpecRow">
			                      	<th colspan="2">Product Details</th>
			                    </tr>
			                    <tr class="techSpecRow">
			                      	<td class="techSpecTD1">Store Name:</td>
			                      	<td class="techSpecTD2"><?php echo $de_value->str_name; echo $de_value->str_code?></td>
			                    </tr>
			                    <tr class="techSpecRow">
			                      	<td class="techSpecTD1">Brand Name:</td>
			                      	<td class="techSpecTD2"><?php echo $de_value->brn_name?></td>
			                    </tr>
			                    <tr class="techSpecRow">
			                      	<td class="techSpecTD1">Model:</td>
			                      	<td class="techSpecTD2"><?php echo $de_value->model?></td>
			                    </tr>
			                    <tr class="techSpecRow">
			                      	<td class="techSpecTD1">Released on:</td>
			                      	<td class="techSpecTD2"><?php echo $de_value->date_release?></td>
			                    </tr>
			                    <tr class="techSpecRow">
			                      	<td class="techSpecTD1">Dimensions:</td>
			                      	<td class="techSpecTD2"><?php echo $de_value->dimension?></td>
			                    </tr>
			                    <tr class="techSpecRow">
			                      	<td class="techSpecTD1">Display size:</td>
			                      	<td class="techSpecTD2"><?php echo $de_value->size?></td>
			                    </tr>
			                </tbody>
		                </table>
	              	</div>
				</div>
			</div>
		</div>
		</div>

		<div class="col-lg-12">
			<div class="mix cats col-sm-12" id="products" style=" padding: 10px; background: white;">
				<div class="col-xs-2 col-md-3" style="padding: 0px;">
				 	<li class="dropdown" style="border: #bbbbbb 1px solid; padding: 6px;">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort By Category <b class="caret"></b></a>
					    <ul class="dropdown-menu">
					       	<a href="<?php echo base_url('Product');?>" class="list-group-item">All Category</a>
					        <a href="" class="list-group-item" ng-click="loadProduct_by_Cat(x.Id)" ng-repeat="x in categories">{{x.Name}}</a>
					    </ul>
					</li>
				</div>
	 			<div class="col-md-6"></div>
				<div class="col-md-3">
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

			 	<div class="row">
					<div class="col-lg-12"><h4 style="padding:5px;background: #ff9800;color:white; height: 40px; line-height: 2"> Product Listing</h4></div>
				</div>
				<div class="shrink pic">
				    <div id="products" class="row list-group" style="box-shadow: none;">
				        <div class="item  col-xs-12 col-md-6 col-lg-3" ng-repeat="x in get_product | filter:searchBox ">
				        	<a class="" href="<?php echo base_url('product/product_page_detail/{{x.P_id}}/{{x.P_name}}')?>">
					            <div class="thumbnail">
					            	<div class="item1">
					                	<img  style="height: 160px;" class="group list-group-image" title="{{x.P_name}}" src="<?php echo base_url('assets/uploads/{{x.Path}}');?>"/>
					                </div>
					                <div class="caption" style="border-top: 1px solid #f1f1f1;">
					                	<p class="group inner list-group-item-heading product_name" style=" color: #006190;">{{x.P_name}}</p>
					                    <div class="row">
					                        <div class="col-xs-12 col-md-6">
					                            <p class="lead">${{x.Price}}</p>
					                        </div>
					                         <div class="col-xs-12 col-md-6">
					                         	<del><p class="lead" style="color: red">{{x.Dis}}</p></del>
					                         </div>
					                    </div><!-- class row -->
					                </div><!-- class caption -->
					            </div>
				            </a>
				        </div>
			    	</div>
		    	</div>
		    	<!-- <div class="row">
			    	<div class="mix cats col-sm-12">
			    			<a href="<?php echo base_url('Product');?>"><h5  class="well well-sm" style="text-align: center;">View all</h5></a>
			    	</div>
			    </div> -->
			</div>
		</div>

		<!-- <h4 style="margin-left: 10px; margin-top: 10px;">Related Products</h4><hr /> -->

	</div>
	<div class="col-lg-3">
		<div class="row">
			<?php
		    	foreach ($advertisement as $value)
		    	{
		    		if($value->position=="right" and $value->page=="page detail")
		    		{
		    	?>
		      			<a href="<?php echo $value->url?>" target="blnk" >
						    <img class="img-responsive" style="width: 95.4%; margin-left: 12px; height: <?php echo $value->height;?>" src="<?php echo base_url('assets/uploads/'.$value->img);?>" alt="...">
						</a>
				<?php
						}
					}
				?>
			</div>
	</div>
</div>
    </div>
</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-shopping-cart"></i> Cart Items</h3>
      </div>
      <div class="modal-body">
        <div id="display_cart"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnCheckout" ng-click="checkout()" class="btn btn-primary">Check Out</button>

      </div>
    </div>
  </div>
</div>
</body>


<script src="/ecommerce/assets/bower_components/bootstrap/js/angular-route.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>
<script>
    var app = angular.module('myApp',[]);
    app.controller('myCtrl',function($scope,$http){

        var arr = [];
        var i=0,j=0,total = 0;
        var txt = "";
        $scope.itemNum = 1;

	    $http.get("/ecommerce/ng/get_all_products.php")
		.then(function (response) {$scope.get_product = response.data.records;});

	    $http.get("/ecommerce/ng/get_category.php")
		.then(function (response) {$scope.categories = response.data.records;});

		$scope.loadProduct_by_Cat = function(values)
		{
		$http.get("/ecommerce/ng/loadProduct_by_Cat.php?cat_id="+values)
		.then(function (response) {$scope.get_product = response.data.records;});
		}

		$scope.btnAdd = function(name,id,qty,str,type)
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

	    	xmlhttp.open("GET", "<?php echo base_url()?>product/add_to_cart/"+ name + "/" + id+"/"+qty+"/"+str+"/"+type, true);
			xmlhttp.send();

		}
		$scope.checkout = function()
		{
			window.location.assign("<?php echo base_url()?>product/checkout");
		}

		$scope.displayCart = function()
		{
			var xmlhttp2 = new XMLHttpRequest();
			 xmlhttp2.onreadystatechange = function()
	        {
	        	if (this.readyState == 4 && this.status == 200)
	        	{
	       			document.getElementById("display_cart").innerHTML = this.responseText;
			    }
	    	}
	        xmlhttp2.open("GET", "<?php echo base_url()?>product/display_cart", true);
	       	xmlhttp2.send();
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


	    xmlhttp.open("GET", "<?php echo base_url()?>product_c/remove_item/"+ id, true);
	    xmlhttp.send();

	     xmlhttp2.onreadystatechange = function()
	        {
	        	if (this.readyState == 4 && this.status == 200) {
	       				document.getElementById("display_cart").innerHTML = this.responseText;
	       		}
	        };

	    xmlhttp2.open("GET", "<?php echo base_url()?>product_c/display_cart", true);
	    xmlhttp2.send();
	}
</script>
<script type="text/javascript">
	$("#btnCheckout").click(function(){$()});
</script>
