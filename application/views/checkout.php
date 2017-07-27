<div class="row" >
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Checkout Form</h3>
			</div>
			<div class="panel-body">
				<div class="col-lg-12">
					<h3>Checkout</h3>
					<p>*Please <strong>Login</strong> or <strong>Register</strong> to checkout.</p>
					<div class="row" >
						<table class="table table-bordered" style="width:850px;">
							<thead>
								<tr>
									<th>No.</th>
									<th>Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$total = 0;
									foreach ($product as $key => $value) {
										$total = $total + ($value['price']*$value['qty']);
								?>
										<tr>
											<td><?php echo ($key+1)?></td>
											<td><?php echo $value['name']?></td>
											<td><?php echo "$".$value['price']?></td>
											<td><?php echo $value['qty']?></td>
											<td><?php echo "$".($value['price']*$value['qty'])?></td>
										</tr>

								<?php }?>
										<tr>
											<td colspan="3"></td>
											<td><strong>Total</strong></td>
											<td><strong><?php echo "$".$total?></strong></td>
										</tr>
							</tbody>
						</table>

						<div class="pull-left">
							<div class="form-group">

								<button class="btn btn-success"  type="button" ng-click="register()">Register</button>
<button class="btn btn-primary"  type="button" ng-click="login()">Login</button>

								OR 
								<button class="btn btn-default"  type="button" ng-click="back()">Continue Shopping</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){
		$scope.back = function()
		{
			window.location.assign("<?php echo base_url()?>product");
		}


		$scope.login = function()
		{
			window.location.assign("<?php echo base_url('product/login')?>");

		}
		$scope.register = function(){
			window.location.assign("<?php echo base_url()?>product/registerMember");

		}
	});
</script>
