</nav>

	<div class="row">
		<div class="col-lg-6 col-lg-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $this->lang->line('order')?></h3>
				</div>
				<div class="panel-body">
				  <a href="<?php echo base_url()?>profile/<?php echo $acc_id?>" class="btn btn-default"><?php echo $this->lang->line('back')?></a>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Product name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Discount</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
				                $total = 0;
				                foreach ($product as $key => $value) {
				                  $total = $total + ($value->price * $value->qty);
			                ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value->p_name ?></td>
								<td><?php echo $value->qty ?></td>
								<td><?php echo "$".$value->price ?></td>
								<td><?php echo $value->discount ?></td>
								<td><?php echo "$".$value->total; ?></td>
								<td>n/a</td>
							</tr>
							<?php } ?>
				            <tr>
				               	<td></td>
				               	<td></td>
				               	<td></td>
				               	<td></td>
				               	<th style="color: red">Grand Total</th>
				               	<th style="color: #2d6aa0"><?php echo "$".$total?></th>
				               	<td></td>
				            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->lang->line('customer')?></h3>
			  </div>
				<div class="panel-body">
					<div class="form-group">
						<label for="">Name</label>
						<?php echo form_input("txtName",$member->mem_name,"class='form-control' readonly"); ?>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<?php echo form_input("txtEmail",$member->mem_email,"class='form-control' readonly"); ?>
					</div>
					<div class="form-group">
						<label for="">Phone Number</label>
						<?php echo form_input("txtPhone",$member->mem_phone,"class='form-control' readonly"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
