	<div class="col-xs-12 col-md-9" style="margin-top: 7px;"> 
		<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
		  	<div class="cbp-vm-options">
		  		<a style="text-decoration: none; color: #5d5b5b; font-size: 18px;">View:</a>
				<a href="#" class="cbp-vm-selected" data-view="cbp-vm-view-grid"><i class="fa fa-th" aria-hidden="true"></i></a>
				<a href="#"  data-view="cbp-vm-view-list"><i class="fa fa-th-list" aria-hidden="true"></i></a>	
			</div>
			<?php foreach ($brand as  $value) 
			{
				$cat_id1=$value->cat_id;
			?>
			<div class="panel-heading" style="clear: both; background: whitesmoke; margin-bottom: 7px;"><span class="glyphicon glyphicon-th" style="font-size: 14px;"></span> <?php echo $value->cat_name?></div>
			<ul>
				<?php
				 	foreach ($products as  $value) 
				 	{
				 		$cat_id2=$value->cat_id;
				 	    if ($cat_id1==$cat_id2) 
				 	    {	
				 	?>
						<li >
							<a class="cbp-vm-image" href="<?php echo base_url('product_c/product_page_detail/'.$value->p_id)?>">
							<img title="<?php echo $value->p_name;?>" src="<?php echo base_url('assets/uploads/'.$value->path);?>"></a>
							<h5 class="cbp-vm-title"><?php echo $value->p_name?></h5>
							<div class="cbp-vm-price"><?php echo "$".$value->price?></div>
							<div class="cbp-vm-details">Silver beet shallot </div>
							<button class="btn btn-warning" ng-click="addTocart(<?php echo $value->p_id;?>,<?php echo $value->p_name;?>,<?php echo $value->price;?>)">Add to cart</button>
						</li>
				 	<?php 
				 		}
				 	} 
				}
				?>
			</ul>
		</div>
	</div>
</div>
<script>
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){

    	var arr = [];
	    var i=0,j=0,total =0;
	    $scope.addTocart = function(pro_id,pro_name,price)
	    {
		    	arr[i] = [];
	            $scope.Qty;
		    	if($scope.Qty===undefined)
		    	{
		    		var Qty= $scope.Qty = 1;
		    	}
		    	arr[i][0] = pro_id;
		    	arr[i][1] = pro_name;
		    	arr[i][2] = price;
		    	arr[i][3] = $scope.Qty;
	            arr[i][4] = (price*Qty);
	           
		    	arr[i][5] = "";
	            total = total + ((price*Qty)); 
	            $scope.Total = total;   
	            i = i+1;
		    	$scope.Qty=undefined;
		    	$scope.addMy_Cart= arr;
	    }
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
	    		}else
	    		{
	    			var xmlhttp = new XMLHttpRequest();
			        xmlhttp.open("GET", "../../../ng/cancelOrdered.php?id=" + val, true);
			        xmlhttp.send();
	    			$scope.ordered.splice(index,1);	
	    		}
	    	}
	    }
});
</script>