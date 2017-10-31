	<style type="text/css">
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
    }</style>
	<div class="container" style="width: 1322px;" ng-cloak>
      	<div class="mix dogs col-sm-2">
		    <?php
		    	foreach ($advertisement as $value)
		    	{
		    		if($value->position=="left" and $value->page=="Home")
		    		{
		    ?>
				    	<a href="<?php echo $value->url?>" target="blnk" >
				    		<img class="img-responsive" style="width: 195px; height: <?php echo $value->height;?>px" src="<?php echo base_url('assets/uploads/'.$value->img);?>" alt="...">
				    	</a>
			<?php
					}
				}
			?>
      	</div><!-- this Adverti home page left-->

	    <div class="mix cats col-sm-8" style="padding: 0px; background: #fff;">
	      	<div class="col-sm-12" style="height: 30px; padding-top: 5px; background: linear-gradient(#4c4a4a, #9e9a9a); color: #fff; border:1px solid #7d7979;">
	      		<marquee style="cursor: pointer;" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5"><i class="glyphicon glyphicon-bullhorn" style="float:left;"></i> <?php if(!empty($marquee->key_data1)){echo $marquee->key_data1;}?></marquee>
	      	</div><!-- this marquee text-->

	      	<div id="carousel-example-generic" style="margin-top: 20px" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<?php foreach ($slide_once as $value) {?>
							<img class="img-responsive" src="<?php echo base_url('assets/uploads/'.$value->slide_path);?>" style="//width: 855; height: 371px;">
							<div class="carousel-caption"></div>
						<?php }?>
					</div>
					<?php foreach ($slide_multi as $value) {?>
						<div class="item">
							<img class="img-responsive" src="<?php echo base_url('assets/uploads/'.$value->slide_path);?>" style="width: 877px; height: 371px;">
							<div class="carousel-caption">
								<h3><?php echo $value->slide_name;?></h3>
								<p><?php echo $value->slide_desc?></p>
							</div>
						</div>
					<?php }?>
				</div>
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div><!-- this Slideshow-->

			<div class="row" style="background: #f1f1f1; padding: 5px"></div>
			<div class="mix cats col-sm-12" id="products" style=" padding: 10px; background: white;">
				<div class="col-xs-2 col-md-3" style="padding: 0px;">
				 	<li class="dropdown" style="border: #bbbbbb 1px solid; padding: 6px;">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort By Category <b class="caret"></b></a>
					    <ul class="dropdown-menu">
					       	<a href="<?php echo base_url('Product');?>" class="list-group-item">All Category</a>
					        <a href="" class="list-group-item" ng-click="loadProduct_by_Cat(x.Id)" ng-repeat="x in categories">{{x.Name}}</a>
					    </ul>
					</li>
				</div><!-- this sort category -->

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
			    </div><!-- this List and Grid -->

			 	<div class="row">
					<div class="col-lg-12"><h4 style="padding:5px;background: #ff9800;color:white; height: 40px; line-height: 2"> Product Listing</h4></div>
				</div>
				<div class="shrink pic">
			    <div id="products" class="row list-group" style="box-shadow: none;">
			        <div class="item  col-xs-4 col-md-4 col-lg-3" ng-repeat="x in get_product | filter:searchBox ">
			        	<a href="<?php echo base_url('product/product_page_detail/{{x.P_id}}/{{x.P_name}}')?>">
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
				                         </div>
				                    </div><!-- class row -->
				                </div><!-- class caption -->
				            </div><!-- this thumbnail -->
			            </a>
			        </div><!-- this item -->
		    	</div><!-- this products -->
		    	</div>

		    	<!-- <div class="row">
			    	<div class="mix cats col-sm-12">
			    			<a href="<?php echo base_url('Product');?>"><h5  class="well well-sm" style="text-align: center;">View all</h5></a>
			    	</div>
			    </div> --><!-- this veiw all-->
			</div><!-- mix cats col-sm-12 -->
	    </div><!-- #this mix cats col-sm-8 -->
	    <div class="mix dogs cats col-sm-2">
		   	<?php
		   		foreach ($advertisement as $value)
		   		{
		   			if($value->position=="right" and $value->page=="Home")
		   			{
		   	?>
				    	<a href="<?php echo $value->url?>" target="blnk" >
				      		<img class="img-responsive" style="width: 195px; height: <?php echo $value->height;?>px" src="<?php echo base_url('assets/uploads/'.$value->img);?>" alt="...">
				    	</a>
		    <?php
		    		}
		    	}
		    ?>
		</div><!-- this adverti home page reight-->
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
	    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
	    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
	});
	</script>
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

			$scope.checkout = function()
			{
				window.location.assign("product/checkout");
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
