<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('add')?> <?php echo $this->lang->line('fund')?></h3>
			</div>
			<div class="panel-body">
				<form method="post" action="" name="personForm" novalidate ng-submit="personForm.$valid &&sendForm()">
					<?php if(form_error('txt_amount')){?>
	                    	<div class="alert alert-danger alert-dismissible" role="alert">
	                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        	<strong>Warning!</strong> <?php echo form_error('txt_amount');?>
	                    	</div>
	                <?php }?>
					<div class="row">
					<input type="hidden" name="txt_wal_id" value="<?php echo $wallet->wal_id?>">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Amount</label>
								<input type="text" name="txt_amount"   class="form-control input-sm" placeholder="Enter Amount here...">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Transaction Date</label>
								<input type="text" name="txt_transaction_date"   class="form-control datetimepicker input-sm" placeholder="Transaction Date...">
							</div>
						</div>
					</div><!-- class Row-->
					
						<div class="col-lg-1">
							<button type="submit" class="btn btn-success btn-sm" name="btn_Saveclose" ng-disabled="userForm.$invalid"><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save')?></button>	
					</form>
						</div>
						<div class="col-lg-2">
							<button style="margin-left: 10px;" class="btn btn-default btn-sm" id="btnCancel" ><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel')?></a>
						</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
        $(function () {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD'
             });
        });
    </script>
<script type="text/javascript">
	$("#btnCancel").click(function(){

		window.location.assign("<?php echo base_url()?>admin/memberLogin/Cancel");

	});
</script>