<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$choose=$this->lang->line("choose_one");
?>
</nav>
<div ng-app="myApp" ng-controller="myCtrl" ng-cloak>
	<div class="row" style="margin-top:80px;">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $this->lang->line("order_lish"); ?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-3">
							  <label class="control-label"><?php echo $this->lang->line("member_name"); ?></label>
							<select class="form-control" id="mem_id" ng-model="mem_id">
								<option value=""><?php echo $choose; ?></option>
								<?php foreach($member as $mem){?>
									<option value="<?php echo $mem->mem_id;?>"><?php echo $mem->mem_name;?></option>
								<?php }?>
							</select>
						</div>
						<div class="col-lg-3">
							<label class="control-label"><?php echo $this->lang->line("order_status");?></label>
							<select class="form-control" id="ord_status" ng-model="order_status">
								<option value="0"><?php echo $choose; ?></option>
								<option value="all"><?php echo $this->lang->line("all");?></option>
								<option value="pending">Pending</option>
								<option value="deliver">Delivering</option>
								<option value="complete">Complete</option>
							</select>
						</div>
						<div class="col-lg-3">
						    <label class="control-label"><?php echo $this->lang->line("date_from");?></label>
							<div class='input-group datetimepicker'>
								<input type='text' class="form-control" name="txtFrom" required="required" id="d_from" ng-model="d_from" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="col-lg-2">
						  	<label class="control-label"><?php echo $this->lang->line("date_to"); ?></label>
							<div class='input-group datetimepicker'>
								<input type='text' class="form-control" required="required" id="d_to"/>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
							<button class="btn btn-default btn-sm" style="margin-top:25px;"  ng-click="filterOrder()"><?php echo $this->lang->line('go');?></button>
							<button class="btn btn-default btn-sm" style="margin-top:25px;" ng-click="back()"><?php echo $this->lang->line('back');?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" >
		<div class="col-lg-6 col-lg-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $this->lang->line("order_lish"); ?></h3>
				</div>
				<div class="panel-body">
					<button type="button" name="btnRefresh" id="btnRefresh" ng-click="filterOrder()" class="btn btn-primary btn-sm"><?php echo $this->lang->line('refresh')?></button>
					<table class="table table-striped">
						<thead>
							<tr>
								<th><?php echo $this->lang->line("no"); ?>.</th>
								<th><?php echo $this->lang->line("order_code"); ?></th>
								<th><?php echo $this->lang->line("order_dates"); ?></th>
								<th><?php echo $this->lang->line("member_name"); ?></th>
								<th><?php echo $this->lang->line("order_status"); ?></th>
								<th><?php echo $this->lang->line("action"); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="ord in order_hdr" ng-click="loadOrderDet(ord.Code,ord.MemCode)" style="cursor:pointer;">
								<td>{{$index+1}}</td>
								<td>{{ord.Code}}</td>
								<td>{{ord.Date}}</td>
								<td>{{ord.Name}}</td>
								<td>{{ord.Status}}</td>
								<td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><?php echo $this->lang->line("update_status"); ?></button></td>
								<td>
									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" id="btnClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line("update_status");?></h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label><?php $this->lang->line("status"); ?></label>
														<select class="form-control" ng-model="ddlStatus">
															<option value="pending">Pending</option>
															<option value="deliver">Delivering</option>
															<option value="complete">Complete</option>
															<option value="cancel">Cancel</option>
														</select>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line("close");?></button>
													<button type="button" class="btn btn-primary" ng-click="updateStatus(ord.ID,ddlStatus)"><?php echo $this->lang->line("save_change");?></button>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="demo"> </div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
							  <h3 class="panel-title"><?php echo $this->lang->line("order_detail"); ?></h3>
							</div>
							<div class="panel-body" style=" overflow: scroll; height: 230px;  overflow-x: hidden;">
								<div class="row">
									<div class="col-lg-12">
										<table class="table table-hover">
											<thead>
												<tr>
													<th><?php echo $this->lang->line("no"); ?></th>
													<th><?php echo $this->lang->line("product"); ?></th>
													<th><?php echo $this->lang->line("qty");?></th>
													<th><?php echo $this->lang->line("price");?></th>
													<!-- <th>Discount</th> -->
													<th><?php echo $this->lang->line("total");?></th>
													<th><?php echo $this->lang->line("action");?></th>
												</tr>
											</thead>
											<tbody>
												<tr ng-repeat="ord in order_det">
													<td>{{$index+1}}</td>
													<td>{{ord.Name}}</td>
													<td>{{ord.Qty}}</td>
													<td>{{ord.Price|currency}}</td>
													<!-- <td>{{ord.Discount}}</td> -->
													<td>{{ord.Total|currency}}</td>
													<td><button class="btn btn-danger btn-sm confirmModal del" ng-click="removeItem(ord.ID)"> <i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title"><?php echo $this->lang->line("contact_info"); ?></h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label><?php echo $this->lang->line("phone"); ?></label>
									<input type="text" class="form-control" name="txtPhone" ng-model="phone" readonly>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line("email"); ?></label>
									<input type="text" class="form-control" name="txtEmail" ng-model="email" readonly>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line("address"); ?></label>
									<input type="text" class="form-control" name="txtAddr" ng-model="addr" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

<script>
  var app = angular.module("myApp",[]);
  app.controller("myCtrl",function($scope,$http){
    var str_id = "1";
    $scope.filterOrder = function(){
      var mem_id = $scope.mem_id;
      var ord_status = $scope.ord_status;
      var d_from = document.getElementById("d_from").value;
      var d_to = document.getElementById("d_to").value;

      $scope.loadOrderDet('','');// clear 

      $http.get("ng/get_order_hdr.php?id="+mem_id+"&stat="+ord_status+"&from="+d_from+"&to="+d_to+"&str="+str_id)
    .then(function (response) {$scope.order_hdr = response.data.records;});
    }


    $scope.loadOrderDet = function(id,m_id){
      $http.get("ng/get_order_det.php?id="+id)
    .then(function (response) {$scope.order_det = response.data.records;});

      if(m_id!="")
      {
        $http.get("ng/get_contact.php?id="+m_id)
    .then(function (response)
          {$scope.contact = response.data.records;
              $scope.phone = response.data.records[0].Phone;
              $scope.email = response.data.records[0].Email;
              $scope.addr = response.data.records[0].Address;
          });

      }

    }
    $scope.mem_id = "choose one";
    $scope.updateStatus = function(ord_id,status){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                $("#btnClose").click();
            }
        };
      xmlhttp.open("GET", "ng/updateStatus.php?id=" + ord_id+"&status="+status+"&str_id="+str_id, true);
      xmlhttp.send();
    }

    $scope.removeItem = function(ord_id)
    {
      var x = confirm("Are you sure you want to delete this item?");
      if(x==true)
      {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ng/deleteOrderDet.php?id=" + ord_id+"&str_id="+str_id, true);
        xmlhttp.send();

      }else
      {

      }
    }

    $scope.back = function()
    {
      window.location.assign("<?php echo base_url()?>main");
    }
  });
</script>
