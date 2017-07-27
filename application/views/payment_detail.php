</nav>
<?php error_reporting(0);?>
<?php  echo form_open("product/payment_detail/".$pmID)?>
<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Payment Detail</h3>
			</div>
			<div class="panel-body">
				<?php
					if(isset($insuff))
					{
				?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					<i class="glyphicon glyphicon-exclamation-sign"></i> <strong>Warning!</strong> 
					<p>Your balance is insufficent! Please top up your balance and try again!</p>
				</div>
				<?php
					}
				?>
				<table class="table table-bordered">
				<input type="hidden" name="txt_mem_id" value="<?php echo $mem_id?>">
					<thead>
						<tr>
							<th>No.</th>
							<th>Product Name</th>
							<th>Unit Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>						
					</thead>
					<tbody>
						<?php $total=0;
						$i=0;foreach($item as $key=>$value){
							$total = $total + ($value['price']*$value['qty']);
							?>
							<tr>
								<td style="display: none;"><?php echo $value['id']?></td>
								<td style="display: none;"><?php echo $value['str']?></td>
								<td><?php echo $key+1?></td>
								<td><?php echo $value['name']?></td>
								<td><?php echo "$".$value['price']?></td>
								<td><?php echo $value['qty']?></td>
								<td><?php echo "$".($value['price']*$value['qty'])?></td>
							</tr>
						<?php
						}
						?>
							<tr>
								<td colspan="3"></td>
								<td><strong>Grand Total</strong></td>
								<td><strong><?php echo "$".$total?></strong></td>
							</tr>
							
							<tr>
								<td colspan="3"></td>
								<td><strong>Current E-Wallet Balance</strong></td>

								<td><strong><?php echo "$".$ballance?></strong></td>
							</tr>
					</tbody>
				</table>
				<div class="row">
					<div class="col-lg-12">
						<div class="pull-right">
							<div class="form-group">
								<button class="btn btn-success" type="submit" id="btnProcess" name="btnProcess">Process Payment</button>
								
								<a class="btn btn-default" href="<?php echo base_url('product')?>">Cancel</a>
							</div>	
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($insuff))
	{
?>
	<script type="text/javascript">
		$("#btnProcess").attr("disabled","");
	</script>
<?php
}
?>

