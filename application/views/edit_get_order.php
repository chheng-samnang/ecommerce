</nav>
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('customer')?></h3>
			  </div>
				<div class="panel-body">
					<form action="<?php echo base_url("admin/MemberLogin/order_update"); ?>" method="POST">
						<div class="row">
							<div class="col-lg-3">
								<label>Order Code</label>
								<input type="hidden" value="<?php echo $order_info1->ord_id; ?>" name="ord_id">
								<input type="text" readonly="" value="<?php echo $order_info1->ord_code; ?>" class="form-control input-sm" name="">
							</div>
							<div class="col-lg-3">
								<label>Order Date</label>
								<input type="text" readonly="" value="<?php echo $order_info1->ord_date; ?>" class="form-control input-sm" name="">
							</div>
							<div class="col-lg-3">
								<label>Order Status</label>
								<select name="ddlOrdStatus" class="form-control input-sm">
									<option value="deliver">Deliver</option>
									<option value="pending">Pending</option>
									<option value="complate">Complate</option>
								</select>
							</div>
							<div class="col-lg-3">
								<div style="margin-top:25px">
									<button name="btnUpdateStatus" id="btnUpdateStatus" class="btn btn-success btn-sm"><?php echo $this->lang->line('update')?></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
