
<link href="<?php echo base_url('assets/magiczoom/magiczoom.css');?>" rel="stylesheet" type="text/css" media="screen"/>
<link href="magiczoom/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="<?php echo base_url('assets/magiczoom/magiczoom.js');?>" type="text/javascript"></script>
<link href="<?php echo base_url('assets/magiczoom/style_zoom.css')?>" rel="stylesheet" type="text/css" media="screen"/>
<script src="<?php echo base_url('assets/magiczoom/jquery-1.12.3.min.js');?>"></script>
<link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet" type="text/css">
<body>
	<div class="col-xs-12 col-md-9"> 
		<div class="col-lg-6">
			<div class="app-figure" id="zoom-fig">
				<a id="Zoom-1" class="MagicZoom" href="<?php echo base_url('assets/uploads/Roasted_Chicken.png');?>">
					<img src="<?php echo base_url('assets/uploads/Roasted_Chicken.png');?>" alt=""/>
				</a>
				<div class="selectors">
					<a data-zoom-id="Zoom-1" href="<?php echo base_url('assets/uploads/dd.jpg');?>" data-image="<?php echo base_url('assets/uploads/dd.jpg');?>?scale.height=400">
						<img srcset="<?php echo base_url('assets/uploads/dd.jpg');?>?scale.width=112 2x" src="<?php echo base_url('assets/uploads/dd.jpg');?>"/>
					</a>
					<a data-zoom-id="Zoom-1" href="<?php echo base_url('assets/uploads/Beef_Steak.jpg');?>" data-image="<?php echo base_url('assets/uploads/Beef_Steak.jpg');?>?scale.height=400">
						<img srcset="<?php echo base_url('assets/uploads/Beef_Steak.jpg');?>?scale.width=112 2x" src="<?php echo base_url('assets/uploads/Beef_Steak.jpg');?>"/>
					</a>
					<a data-zoom-id="Zoom-1" href="<?php echo base_url('assets/uploads/Roasted_Chicken.png');?>" data-image="<?php echo base_url('assets/uploads/Roasted_Chicken.png');?>?scale.height=400">
						<img srcset="<?php echo base_url('assets/uploads/Roasted_Chicken.png');?>?scale.width=112 2x" src="<?php echo base_url('assets/uploads/Roasted_Chicken.png');?>"/>
					</a>
					<a data-zoom-id="Zoom-1" href="<?php echo base_url('assets/uploads/dd.jpg');?>" data-image="<?php echo base_url('assets/uploads/dd.jpg');?>?scale.height=400">
						<img srcset="<?php echo base_url('assets/uploads/dd.jpg');?>?scale.width=112 2x" src="<?php echo base_url('assets/uploads/dd.jpg');?>"/>
					</a>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="row">
			   <h2>New Product <?php echo $de_value->p_name;?></h2>
			</div>
			<div class="col-lg-12" style=" padding: 13px; border-bottom:#e4e4e4 solid 1px; border-top:#e4e4e4 solid 1px">
				<div class="col-lg-4">Prices:</div>
				<div class="col-lg-4"><?php echo $de_value->price; ?></div>
			</div>
			<div class="col-lg-12" style=" padding: 13px; border-bottom:#e4e4e4 solid 1px;">
				<div class="col-lg-4">Quantity : </div>
				<div class="col-lg-4"> <input class="form-control" type="number" style="width:91px;" name="txtItemNum" ng-model="itemNum"></div>
			</div>
			<div class="col-lg-12" style=" padding: 13px; border-bottom:#e4e4e4 solid 1px;">
				<div class="col-lg-4">Sizes</div>
				<div class="col-lg-4">
					<select class="form-control">
						<option></option>
					</select>
				</div>
			</div>
			<div class="col-lg-12" style=" padding: 13px; border-bottom:#e4e4e4 solid 1px;">
				<div class="col-lg-4">Colors</div>
				<div class="col-lg-4">
					<select class="form-control">
						<option></option>
					</select>
				</div>
			</div>
			<div class="col-lg-12" style="padding: 10px 90px 39px;">
				<?php
					$price=$de_value->price;
					$p_id=$de_value->p_id;
					$name=$de_value->p_name;
				?>
				<button class="btn btn-warning" ng-click="addTocart(itemNum,0)">Add to cart</button>
				<a href="<?php echo base_url('index.php/product_c'); ?>" class="btn btn-primary" type="button">Back</a>
			</div>
		</div>
		<div class="col-lg-12">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Desciption</a></li>
				<li><a data-toggle="tab" href="#menu1">Detail</a></li>
			</ul>
			<div class="tab-content" style="border-left: 1px solid #ddd;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
				<div id="home" class="tab-pane fade in active" style="padding: 10px;">
					<p>
						<?php echo $de_value->p_desc; ?>Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibe ndum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus.

Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibe ndum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus.
					</p>
				</div>
				<div id="menu1" class="tab-pane fade" style="padding: 10px;">
					<p>
						<b>Product Name:<?php echo $de_value->p_name;?></b>
						<h5>Price:<?php echo $de_value->price;?></h5>
					</p>
				</div>
				<div id="menu2" class="tab-pane fade">
					<h3>Menu 2</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
				<div id="menu3" class="tab-pane fade">
					<h3>Menu 3</h3>
					<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				</div>
			</div>
			<fieldset class="form-group">
				<label>Group Select</label>
				<div class="select2-container form-control" id="s2id_select2-3"><a href="javascript:void(0)" class="select2-choice select2-default" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-3">Your Favorite Football Team</span><abbr class="select2-search-choice-close"></abbr><span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen3" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-3" id="s2id_autogen3"></div>
				<select class="form-control" data-placeholder="Your Favorite Football Team" id="select2-3" tabindex="-1" title="" style="display: none;">
					<option value=""></option>
					<option>San Diego Chargers</option>
				</select>
			</fieldset>
		</div>

		<h3>Related Products</h3><hr />
		<div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 1px;">
			<div class="panel panel-body">
			    <a href="product_c/product_page_detail/" class="thumbnail" style="" title="More Detail...">
			        <img src="<?php echo base_url('assets/uploads/Burger2.png');?>" style="height:180" class="img img-hover">
			    </a>
			    <p>
			        <h4>dffsf</h4>
			        <h6 style="color: red">Price:csdff</h6>
			    </p>
			        <h3 ng-repeat="x in addMy_Cart"></h3>
			        <button class="btn btn-warning" ng-click="addTocart()"><i class="fa fa-shopping-cart"></i>Add To Cart</button>
			</div>
		</div>
		<div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 1px;">
			<div class="panel panel-body">
			    <a href="product_c/product_page_detail/" class="thumbnail" style="" title="More Detail...">
			        <img src="<?php echo base_url('assets/uploads/1.jpg');?>" style="height:180" class="img img-hover">
			    </a>
			    <p>
			        <h4>dffsf</h4>
			        <h6 style="color: red">Price:csdff</h6>
			    </p>
			        <h3 ng-repeat="x in addMy_Cart"></h3>
			        <button class="btn btn-warning" ng-click="addTocart()"><i class="fa fa-shopping-cart"></i>Add To Cart</button>
			</div>
		</div>
		<div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 1px;">
			<div class="panel panel-body">
			    <a href="product_c/product_page_detail/" class="thumbnail" style="" title="More Detail...">
			        <img src="<?php echo base_url('assets/uploads/Beef_Steak.jpg');?>" style="height:180" class="img img-hover">
			    </a>
			    <p>
			        <h4>dffsf</h4>
			        <h6 style="color: red">Price:csdff</h6>
			    </p>
			        <h3 ng-repeat="x in addMy_Cart"></h3>
			        <button class="btn btn-warning" ng-click="addTocart()"><i class="fa fa-shopping-cart"></i>Add To Cart</button>
			</div>
		</div>
		<div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 1px;">
			<div class="panel panel-body">
			    <a href="product_c/product_page_detail/" class="thumbnail" style="" title="More Detail...">
			        <img src="<?php echo base_url('assets/uploads/dd.jpg');?>" style="height:180" class="img img-hover">
			    </a>
			    <p>
			        <h4>dffsf</h4>
			        <h6 style="color: red">Price:csdff</h6>
			    </p>
			        <h3 ng-repeat="x in addMy_Cart"></h3>
			        <button class="btn btn-warning" ng-click="addTocart()"><i class="fa fa-shopping-cart"></i>Add To Cart</button>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
	<div class="row">
        <div class="row" style="margin-right: 0px; margin-left: 0px; border-bottom: 1px solid #f1f1f1;">
            <div class="col-md-9">
                <h3>OUR BRANDS</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="padding: 20px;">
                <div class="item active">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="<?php echo base_url('assets/uploads/brand2.png')?>" class="img-responsive" alt="a" />
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="<?php echo base_url('assets/uploads/brand3.png')?>" class="img-responsive" alt="a" />
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="<?php echo base_url('assets/uploads/brand2.png')?>" class="img-responsive" alt="a" />
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="<?php echo base_url('assets/uploads/brand2.png')?>" class="img-responsive" alt="a" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="<?php echo base_url('assets/uploads/brand4.png')?>" class="img-responsive" alt="a" />
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="<?php echo base_url('assets/uploads/brand2.png')?>" class="img-responsive" alt="a" />
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="<?php echo base_url('assets/uploads/brand6.png')?>" class="img-responsive" alt="a" />
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="<?php echo base_url('assets/uploads/brand2.png')?>" class="img-responsive" alt="a" />
                                </div>
                                
                            </div>
                        </div>
                    </div>
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
        <button type="button" id="btnCheckout" class="btn btn-primary">Check Out</button>
        
      </div>
    </div>
  </div>
</div>
</body>


<script src="/ecommerce/assets/bower_components/bootstrap/js/angular-route.js"></script>
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
<script type="text/javascript">
	$("#btnCheckout").click(function(){$()});
</script>  