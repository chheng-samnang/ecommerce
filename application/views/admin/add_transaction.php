</nav>

<?php echo form_open("admin/wallet_c/add_transaction/$wal_id")?>
<div class="" style="margin-top:75px;">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Form Add Transaction</h3>
			</div>
			<div class="panel-body">
				<?php
					if(!empty(validation_errors()))
					{
				?>
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<strong><i class="glyphicon glyphicon-exclamation-sign"></i> Warning!</strong>
							<p><?php echo validation_errors();?></p>
						</div>
					</div>
				</div>
				<?php
					}
				?>
				<div class="form-group">
					<label>Transaction Type</label>
					<select class="form-control" name="ddlType">
						<option value="none">Choose One</option>
						<option value="cash_in">Cash In</option>
						<option value="cash_out">Cash Out</option>
					</select>
				</div>
				<div class="form-group">
					<label>Amount</label>
					<input type="text" name="txtAmt" class="form-control" placeholder="Enter amount here...">
				</div>
				<div class="form-group">
					<label>Transaction Date</label>
					<input type="text" name="txtTranDate" class="form-control datetimepicker" placeholder="Click here to pick a date">
				</div>
				<hr>
				<div class="form-group">
					<div class="pull-right">
						<button class="btn btn-success" type="Submit"><?php echo $this->lang->line('add')?></button>
						<button class="btn btn-default" type="button" id="btnCancel"><?php echo $this->lang->line('cancel')?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</form>

<script type="text/javascript">
	$("#btnCancel").click(function(){
		window.location.assign("<?php echo base_url()?>admin/wallet_c/transaction/<?php echo $wal_id?>");
	});
</script>