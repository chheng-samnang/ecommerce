</nav>

<?php echo form_open("admin/wallet_c/edit_transaction/$wal_tran_id")?>
<div class="row" style="margin-top:75px;">
	<div class="col-lg-4 col-lg-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Form Edit Transaction</h3>
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
					<?php echo form_dropdown("ddlType",$type,$transaction->tran_type,"class='form-control'")?>
					
				</div>
				<div class="form-group">
					<label>Amount</label>
					<input type="text" name="txtAmt" class="form-control" value="<?php echo set_value('txtAmt',$transaction->tran_amt)?>" placeholder="Enter amount here...">
				</div>
				<div class="form-group">
					<label>Transaction Date</label>
					<input type="text" name="txtTranDate" class="form-control datetimepicker" value="<?php echo set_value('txtTranDate',$transaction->tran_date)?>" placeholder="Click here to pick a date">
				</div>
				<hr>
				<div class="form-group">
					<div class="pull-right">
						<button class="btn btn-success" type="Submit">Update</button>
						<button class="btn btn-default" type="button" id="btnCancel">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</form>

<script type="text/javascript">
	$("#btnCancel").click(function(){
		window.location.assign("<?php echo base_url()?>admin/wallet_c");
	});
</script>