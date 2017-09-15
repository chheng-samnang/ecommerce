</nav>
<div ng-app="myApp" ng-controller="myCtrl" id="page-wrapper">
<div class="container-fluid">
	<div class="row" style="margin-top:75px;">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $this->lang->line("transaction_summary");?></h3>
				</div>
				<div class="panel-body">
					<form class="form-inline" method="post">
						<div class="form-group">
							<label><?php echo $this->lang->line("wallet_code");?></label>
							<input type="text" name="txtWalCode" class="form-control" value="<?php echo $wallCode?>" readonly>
						</div>
						<div class="form-group">
							<label><?php echo $this->lang->line("current_balance");?></label>
							<input type="text" name="txtCurrentBalance" class="form-control" value="<?php echo "$".$balance->tran_amt?>" readonly>
						</div>
						<div class="form-group">
							<div class="pull-right">
								<label><?php echo $this->lang->line("transaction_status");?></label>
								<select class="form-control" name="ddlStatus" id="ddlStatus">
									<option value="all"><?php echo $this->lang->line("all"); ?></option>
									<option value="cash_in"><?php echo $this->lang->line("cash_in"); ?></option>
									<option value="cash_out"><?php echo $this->lang->line("cash_out"); ?></option>
								</select>
								<button class="btn btn-default" id="btnSearch"><i class="fa fa-search" aria-hidden="true"></i> <?php echo $this->lang->line('search');?></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row" >
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Transaction Detail</h3>
				</div>
				<div class="panel-body">
				<div class="form-group">
					<button class="btn btn-success" id="btnAdd"><?php echo $this->lang->line('add_transaction');?></button>
				</div>
					<table class="table table-hover">
						<thead>
							<tr>
								<th><?php echo $this->lang->line("no"); ?>.</th>
								<th><?php echo $this->lang->line("amount"); ?></th>
								<th><?php echo $this->lang->line("transaction_type"); ?></th>
								<th><?php echo $this->lang->line("transaction_date"); ?></th>
								<th><?php echo $this->lang->line("status"); ?></th>	
								<th><?php echo $this->lang->line("action"); ?></th>						
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($wallet_tran as $key => $value) {
							?>
							<tr>
								<td><?php echo $key+1?></td>
								<td><?php echo "$".$value->tran_amt?></td>
								<td><?php echo $value->tran_type=="cash_in"?$this->lang->line("cash_in"):$this->lang->line("cash_out")?></td>
								<td><?php echo $value->tran_date?></td>
								<td><?php echo $value->tran_status=="1"?$this->lang->line("enable"):$this->lang->line("disable")?></td>
								<td><a href="<?php echo base_url()?>admin/wallet_c/edit_transaction/<?php echo $value->wal_tran_id?>" class="btn btn-primary"><?php echo $this->lang->line('update');?></a> <a href="<?php echo base_url()?>admin/wallet_c/delete_transaction/<?php echo $value->wal_tran_id?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Remove this ?"><?php echo $this->lang->line('remove');?></a></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){
		$http.get("<?php echo base_url()?>/ng/get_wallet_transaction.php")
    .then(function (response) {$scope.names = response.data.records;});
	});
</script>
<script type="text/javascript">
	$("#btnAdd").click(function(){
		window.location.assign("<?php echo base_url()?>admin/wallet_c/add_transaction/<?php echo $wal_id?>");
	});
</script>
<script>
    $(document).ready(function(){
        
        //comfirm delete
        $('.del').confirmModal(); 
    });
    $("#btnSearch").click(function(){
    	var type = $("#ddlStatus").val();
    	window.location.assign("<?php echo base_url()?>admin/wallet_c/transaction/<?php echo $wal_id?>/"+type);
    });
</script>  
