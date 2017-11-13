
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
	 .none{
		display: none;
	}

</style>
<?php
    if(!isset($this->session->memLogin))
    {
        redirect("admin/memberLogin/Logout");
    }
?>
<?php

	// $acc->acc_type=="Bussiness";
	// $acc->acc_type=="Agent";
	// $acc->acc_type=="Shop-owner";
	// $acc->acc_type=="General";
	// $acc->acc_type=="Association";

		if($this->input->post("ddlAccType")=="Staf"){
				$service   = "display";
				$staf      = "display";
				$products1 = "display";
				$fund      = "display";
				$Inventory = "display";
				$promotion = "display";
				$order2    = "display";
				$members   = "none";
				$products = "none";
				$account   = "none";
		}else{
			switch ($acc->acc_type){
			case "Bussiness":
			{
				$products1  = "none";
				$fund      = "display";
				$promotion = "display";
				$order2    = "none";
				$products  = "display";
				$service   = "none";
				$Inventory = "none";
				$members   = "none";
				$account   = "none";
			}
			break;

			case "Agent":
			{
				$service   = "display";
				$products  = "none";
				$products1  = "none";
				$fund      = "none";
				$Inventory = "none";
				$promotion = "none";
				$members   = "none";
				$account   = "none";
				$order2    = "none";
			}

			break;

			case "Shop-owner":
			{
				$service   = "display";
				$staf   = "display";
				$products1 = "display";
				$fund      = "display";
				$Inventory = "display";
				$promotion = "display";
				$order2    = "display";
				$members   = "none";
				$products = "none";
				$account   = "none";
			}
			break;
			case "Shop":
			{
				$service   = "display";
				$staf   = "display";
				$products1 = "display";
				$fund      = "display";
				$Inventory = "display";
				$promotion = "display";
				$order2    = "display";
				$members   = "none";
				$products = "none";
				$account   = "none";
			}
			break;

			case "General":
			{
				$account   = "display";
				$service   = "display";
				$Inventory = "display";
				$fund      = "display";

				$products1  = "none";

				$products  = "none";
				$promotion = "none";
				$members   = "none";
				$order2    = "none";
			}
			break;

			case "Association":
			{
				$Inventory = "display";
				$promotion = "display";
				$members   = "display";
				$service   = "none";
				$products  = "none";
				$products1  = "none";
				$fund      = "none";
				$account   = "none";
				$order2    = "none";
			}
			break;
			default:

			break;
			}
		}
?>

</nav>
	<div class="row" style="margin-top:30px;" ng-app="myApp" ng-controller="myCtrl">
		<div class="col-lg-10 col-lg-offset-1">
			  <!-- Nav tabs -->
			    <div class="row">
					<div class="col-lg-12">
					<?php
						if(!empty($error) OR validation_errors())
						{
					?>
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
						</div>
					<?php }?>
					</div>
				</div>
			<ul class="nav nav-tabs" role="tablist" style="margin-bottom:10px">
			    <li role="presentation" class="active"><a href="#myAccount" aria-controls="home" role="tab" data-toggle="tab"><?php echo $this->lang->line('manage');?> <?php echo $this->lang->line('account');?></a></li>
			    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $this->lang->line('profile')?></a></li>
			    <li role="presentation"><a href="#trash" aria-controls="trash" role="tab" data-toggle="tab"><?php echo $this->lang->line('trash')?></a></li>
			    <li role="presentation"><a href="#setting" aria-controls="setting" role="tab" data-toggle="tab"><?php echo $this->lang->line('setting')?></a></li>
			    <!-- <li class="dropdown tasks-menu">
			    	<?php
			    		if(isset($new_order)){
			    			foreach ($new_order as $value) {
			    				$qty+= $value->qty;
			    			}
			    		}
			    	?>
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		              <?php echo $this->lang->line("order");?> <i class="fa fa-flag-o"></i>
		              <span class="label label-danger"><?php echo $qty; ?></span>
		            </a>
		            <ul class="dropdown-menu">
		              <li class="panel-heading panel-default">You have 9 tasks</li>
		              <?php if(isset($new_order)){ foreach ($new_order as $value){?>
		              <li class="footer">
		                <a href="#"><?php echo $value->p_name; ?></a>
		              </li>
		              <?php }}?>
		            </ul>
	          	</li> -->
			    <li role="presentation" class="navbar-right" style="margin-right: 0px;">
			    	<i class="fa fa-users" aria-hidden="true" style="color: #026aa7;"></i>
						<?php foreach ($member as $row) {
							echo $row->mem_name;
						}?>
			    </li>
			</ul>
		  	<div class="tab-content" style="background:#fff;padding:10px;">
					<div role="tabpanel" class="tab-pane active" id="myAccount">
						<div class="<?php echo $account?>">
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 style="cursor: pointer;" class="panel-title" id="account"><?php echo  $this->lang->line('account');?> <?php echo  $this->lang->line('info');?></h3>
										</div>
										<div class="panel-body" id="account_body" style="display:none;">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No.</th>
														<th>Acc.Code</th>
														<th>Acc.Type</th>
														<th>Image</th>
														<th>Company</th>
														<th>Position</th>
														<th>Location</th>
														<th>Date Add</th>
														<th>Date Update</th>
														<th style="text-align: center;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $i=0; foreach($active_account as $row){?>
														<?php
															$acc_img = $row->acc_img;
															if(empty($acc_img)) $acc_img = "default.png";
														?>
														<tr>
															<td><?php echo $i+1?></td>
															<td><?php echo $row->acc_code?></td>
															<td><?php echo $row->acc_type?></td>
															<td><img src="<?php echo base_url('assets/uploads/'.$acc_img)?>" style="width:45px;"></td>
															<td><?php echo $row->company?></td>
															<td><?php echo $row->position?></td>
															<td><?php echo $row->loc_name?></td>
															<td><?php echo $row->date_crea?></td>
															<td><?php echo $row->date_updt?></td>
															<td style="float: right;">
																<a href="<?php echo base_url('admin/memberLogin/chage_password/'.$row->acc_id);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Chage Password Account"><i class="fa fa-key" aria-hidden="true"></i> <?php echo $this->lang->line('changa_password')?></a>
																<a href="<?php echo base_url('admin/memberLogin/editAccount/'.$row->acc_id);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit Account"><span class=" glyphicon glyphicon-pencil"></span></a>
															</td>
														</tr>
													<?php $i=$i+1;}?>
												</tbody>
											</table>
											<button class="btn btn-success btn-sm" id="btnAddAccount"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo $this->lang->line('add')?> <?php echo $this->lang->line('account')?></button>
										</div>
									</div>
								</div>
							</div><!-- row Account -->
						</div><!-- Class Account-->

					<div class="<?php echo $service?>">
						<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 style="cursor: pointer;" class="panel-title" id="service"><?php echo  $this->lang->line('info');?> <?php echo  $this->lang->line('service');?></h3>
										</div>
										<div class="panel-body" id="service_body" style="display:none;">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No.</th>
														<th>Status</th>
														<th>Service Name</th>
														<th>Price</th>
														<th>Image</th>
														<th>Shop</th>
														<th>Category</th>
														<th>Description</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $i=0 ; foreach ($services as  $row) {?>
													<?php $service_img = $row->path ;if(empty($service_img)) $service_img = "default.png";?>
													<tr>
														<td><?php echo $i+1;?></td>
														<td>
															<?php
																if($row->p_status==1)
																{
																	echo "<span class='glyphicon glyphicon-ok-circle' style='color:#5cb85c' data-toggle='tooltip' title='Enable'></span>";
																}
																else
																echo "<span class='glyphicon glyphicon-remove-circle' style='color:red' data-toggle='tooltip' title='Disable'></span>";
															?>
														</td>
														<td><?php echo $row->p_name?></td>
														<td><?php echo "$".$row->price?>
														<th><img style="width: 45px;" src="<?php echo base_url('assets/uploads/'.$service_img)?>"></th>
														<td><?php if($row->str_name){echo $row->str_name;}else echo "<p style='color:red'>"."No Shop !"."</p>";?></td>
														<td><?php echo $row->cat_name?></td>
														<td><?php echo substr($row->p_desc, 0,40)?></td>
														<td>
															<a href="<?php echo base_url('admin/memberLogin/editService/'.$row->p_id);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit Service"><span class=" glyphicon glyphicon-pencil"></span></a>
														</td>
													</tr>
													<?php $i=$i+1; }?>
												</tbody>
											</table>
												<button class="btn btn-success btn-sm" id="btnAddSercices"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo $this->lang->line('add')?> <?php echo $this->lang->line('service')?></button>
										</div>
									</div>
								</div><!-- col-lg-12-->
						</div><!-- row Service-->
					</div><!-- class Service-->
					<div class="<?php echo $staf?>">
						<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 style="cursor: pointer;" class="panel-title" id="staf"><?php echo  $this->lang->line('info');?> <?php echo  $this->lang->line('staf');?></h3>
										</div>
										<div class="panel-body" id="staf_body" style="display:none;">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No.</th>
														<th>Staff Id</th>
														<th>Staff Name</th>
														<th>Status</th>
														<th>Account Image</th>
														<th>Store Name</th>
														<th>Description</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $i=0 ; foreach ($staf_info as  $row) {?>
													<?php $acc_img = $row->acc_img ;if(empty($acc_img)) $acc_img = "default.png";?>
													<tr>
														<td><?php echo $i+1;?></td>
														<td><?php echo $row->st_code; ?></td>
														<td><?php echo $row->mem_name?></td>
														<td>
															<?php

																if($row->stf_status==1)
																{
																	echo "<span class='glyphicon glyphicon-ok-circle' style='color:#5cb85c' data-toggle='tooltip' title='Enable'></span>";
																}
																else
																echo "<span class='glyphicon glyphicon-remove-circle' style='color:red' data-toggle='tooltip' title='Disable'></span>";
															?>

														</td>
														<th><img style="width: 45px;" src="<?php echo base_url('assets/uploads/'.$acc_img)?>"></th>
														<td><?php if($row->str_name){echo $row->str_name;}else echo "<p style='color:red'>"."No Shop !"."</p>";?></td>
														<td><?php echo $row->descr?></td>
														<td>
															<a href="<?php echo base_url('admin/memberLogin/editStaf/'.$row->st_id);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit Staff"><span class=" glyphicon glyphicon-pencil"></span></a>
															<a href="<?php echo base_url('admin/memberLogin/change_password_staf/'.$row->st_id);?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="change password"><span class="glyphicon fa fa-lock"></span></a>
														</td>
														<td>

														</td>
													</tr>
													<?php $i=$i+1; }?>
												</tbody>
											</table>
												<?php $AccType= $this->input->post("ddlAccType"); if($AccType!='Staf'){?>
												<button class="btn btn-success btn-sm" id="btnAddStaf"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo $this->lang->line('add')?> <?php echo $this->lang->line('staf')?></button>
												<?php }else{  }?>
										</div>
									</div>
								</div><!-- col-lg-12-->
						</div><!-- row Service-->
					</div><!-- class Service-->
					<div class="<?php echo $products;?>">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 style="cursor: pointer;" class="panel-title" id="product"><?php echo  $this->lang->line('info');?> <?php echo  $this->lang->line('product');?></h3>
									</div>
									<div class="panel-body" id="product_body" style="display:none;">
										<table class="table table-striped" id="datatable">
											<thead>
												<tr>
													<th>No.</th>
													<th>Status</th>
													<th>Porduct Code</th>
													<th>Shop Owner</th>
													<th>Product Name</th>
													<th>Price</th>
													<th>Stock Qty</th>
													<th>Image</th>
													<th>Shop Name</th>
													<th>Category</th>
													<th>Brand</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=0 ; foreach ($product as  $row) {?>
												<?php $product_img = $row->path; if(empty($product_img)) $product_img = "default.png";?>
												<tr>
													<td><?php echo $i+1;?></td>
													<td>
														<?php
														if($row->p_status=="1"){
															echo "<span class='glyphicon glyphicon-ok-circle' style='color:#5cb85c' data-toggle='tooltip' title='Enable'></span>";
														}
														else
															echo "<span class='glyphicon glyphicon-remove-circle' style='color:red' data-toggle='tooltip' title='Disable'></span>";
													?>
													</td>
													<td><?php echo $row->p_code?></td>
													<td><?php echo $row->mem_name; ?></td>
													<td><?php echo $row->p_name?></td>
													<td><?php echo "$".$row->price?>
													<td><?php echo $row->qty?></td>
													<th><img style="width: 45px;" src="<?php echo base_url('assets/uploads/'.$product_img)?>"></th>
													<td><?php if($row->str_name){echo $row->str_name;}else echo "<p style='color:red'>"."No Shop !"."</p>";?></td>
													<td><?php echo $row->cat_name?></td>
													<td><?php echo $row->brn_name?></td>
													<td>
														<a href="<?php echo base_url('admin/memberLogin/editProduct/'.$row->p_id);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit Product"><span class=" glyphicon glyphicon-pencil"></span></a>
													</td>
												</tr>
												<?php $i=$i+1; }?>
											</tbody>
										</table>
										<button class="btn btn-success btn-sm" id="btnAddProduct"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo  $this->lang->line('add');?> <?php echo  $this->lang->line('product');?></button>
									</div>
								</div>
							</div><!-- col-lg-12-->
						</div><!-- row product-->
					</div><!-- class product-->
					<div class="<?php echo $products1;?>">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 style="cursor: pointer;" class="panel-title" id="product1"><?php echo  $this->lang->line('info');?> <?php echo  $this->lang->line('product');?></h3>
									</div>
									<div class="panel-body" id="product_body1" style="display:none;">
										<table class="table table-striped" id="datatable">
											<thead>
												<tr>
													<th>No.</th>
													<th>Status</th>
													<th>Porduct Code</th>
													<th>Supplyer Name</th>
													<th>Product Name</th>
													<th>Price</th>
													<th>Image</th>
													<th>Stor Name</th>
													<th>Category</th>
													<th>Brand</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=0 ; foreach ($shop_product as  $row) {?>
												<?php $product_img = $row->path; if(empty($product_img)) $product_img = "default.png";?>
												<tr>
													<td><?php echo $i+1;?></td>
													<td>
														<?php
														if($row->p_status==1){
															echo "<span class='glyphicon glyphicon-ok-circle' style='color:#5cb85c' data-toggle='tooltip' title='Enable'></span>";
														}
														else
															echo "<span class='glyphicon glyphicon-remove-circle' style='color:red' data-toggle='tooltip' title='Disable'></span>";
													?>
													</td>
													<td><?php echo $row->p_code?></td>
													<td><?php echo $row->mem_name?></td>
													<td><?php echo $row->p_name?></td>
													<td><?php echo "$".$row->price?>
													<th><img style="width: 45px;" src="<?php echo base_url('assets/uploads/'.$product_img)?>"></th>
													<td><?php if($row->str_name){echo $row->str_name;}else echo "<p style='color:red'>"."No Shop !"."</p>";?></td>
													<td><?php echo $row->cat_name?></td>
													<td><?php echo $row->brn_name?></td>
													<!-- <td>
														<a href="<?php echo base_url('admin/memberLogin/editProduct/'.$row->p_id);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit Product"><span class=" glyphicon glyphicon-pencil"></span></a>
													</td> -->
												</tr>
												<?php $i=$i+1; }?>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- col-lg-12-->
						</div><!-- row product-->
					</div><!-- class product-->
					<div class="<?php echo $members?>">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 style="cursor: pointer;" class="panel-title" id="member"><?php echo $this->lang->line('member')?></h3>
									</div>
									<div class="panel-body" id="member_body" style="display:none;">
										<table class="table table-striped" id="datatable">
											<thead>
												<tr>
													<th>No.</th>
													<th>Status</th>
													<th>Member Code</th>
													<th>Name</th>
													<th>Address</th>
													<th>Phone</th>
													<th>Email</th>
													<th>Date</th>
													<th>Valid Code</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=0 ; foreach ($member as  $row) {?>
												<tr>
													<td><?php echo $i+1;?></td>
													<td>
														<?php
														if($row->mem_status==1){
															echo "<span class='glyphicon glyphicon-ok-circle' style='color:#5cb85c' data-toggle='tooltip' title='Enable'></span>";
														}
														else
															echo "<span class='glyphicon glyphicon-remove-circle' style='color:red' data-toggle='tooltip' title='Disable'></span>";
													?>
													</td>
													<td><?php echo $row->mem_code?></td>
													<td><?php echo $row->mem_name?></td>
													<td><?php echo $row->mem_addr?></td>
													<td><?php echo $row->mem_phone?></td>
													<th><?php echo $row->mem_email?></th>
													<td><?php echo $row->reg_date?></td>
													<td><?php echo $row->valid_code?></td>
													<td style="float: right;">
														<a href="<?php echo base_url('admin/memberLogin/chage_password_member/'.$row->mem_id);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Chage Password Member"><i class="fa fa-key" aria-hidden="true"></i><?php echo $this->lang->line('change_password')?></a>
														<a href="<?php echo base_url('admin/memberLogin/editMember/'.$row->mem_id);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit Member"><span class=" glyphicon glyphicon-pencil"></span></a>
													</td>
												</tr>
												<?php $i=$i+1; }?>
											</tbody>
										</table>
											<button class="btn btn-success btn-sm" id="btnAddMember"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo  $this->lang->line('add');?> <?php echo  $this->lang->line('member');?></button>
									</div>
								</div>
							</div><!-- col-lg-12-->
						</div><!-- row member-->
					</div><!-- class member-->

					<div class="<?php echo $fund?>">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title" style="cursor: pointer;" id="fund"><?php echo  $this->lang->line('info');?> <?php echo  $this->lang->line('fund');?></h3>
									</div>
									<div class="panel-body" id="fund_body" style="display:none;">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>No.</th>
													<th>Amount</th>
													<th>Transanction Type</th>
													<th>Date</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php  $i=0; foreach ($wallet_transaction as $row) {?>
												<tr>
													<td><?php echo $i+1;?></td>
													<td><?php echo "$".$row->tran_amt?></td>
													<td><?php echo $row->tran_type?></td>
													<td><?php echo $row->tran_date?></td>
													<td>
														<?php
														if($row->tran_status==1){
															echo "<span class='glyphicon glyphicon-ok-circle' style='color:#5cb85c' data-toggle='tooltip' title='Enable'></span>";
														}
														else
															echo "<span class='glyphicon glyphicon-remove-circle' style='color:red' data-toggle='tooltip' title='Disable'></span>";
													?>
													</td>
													<td><a href="<?php echo base_url('admin/memberlogin/remove_fund/'.$row->wal_tran_id)?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Remove Fund"><span class="glyphicon glyphicon-trash"></span></td>
												</tr>
												<?php $i=$i+1; }?>
											</tbody>
										</table>
										<button class="btn btn-success" id="AddFund"><?php echo  $this->lang->line('add');?> <?php echo  $this->lang->line('fund');?></button>
									</div>
								</div><!-- row Fund-->
							</div><!-- col-lg-12 -->
						</div><!-- row Fund-->
					</div><!-- class fund-->
					<div class="<?php echo $Inventory?>">
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 style="cursor: pointer;" class="panel-title" id="Inventory">Inventory <?php echo  $this->lang->line('info');?></h3>
										</div>
										<div class="panel-body" id="Inventory_body" style="display:none;">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No.</th>
														<th>Item Code</th>
														<th>Item Name</th>
														<th>Image</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($inventory as $key => $value) {?>
													<?php $poto = $value->path; if(empty($poto)) $poto = "default.png"; ?>
													<tr>
														<td><?php echo $key+1 ?></td>
														<td><?php echo $value->p_code?></td>
														<td><?php echo $value->p_name?></td>
														<td><img class="img-thumbnail" src="<?php echo base_url('assets/uploads/'.$poto)?>" style="width:50px;"></td>
														<td><?php echo $value->p_status?></td>
														<td>
															<a href="#" class="btn btn-primary btn-sm"><?php echo  $this->lang->line('update');?></a>
															<a href="#" class="btn btn-danger btn-sm"> <?php echo  $this->lang->line('remove');?></a>
														</td>
													</tr>
													<?php } ?>
												</tbody>
										</table>
												<button class="btn btn-success btn-sm" id="btnAddInventory"><i class="fa fa-plus"></i> <?php echo  $this->lang->line('add');?> Inventory</button>
										</div>
									</div>
								</div><!-- col-lg-12-->
						</div><!-- row Inventory -->
					</div><!-- class Inventory-->
					<div class="<?php echo $promotion?>">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title" style="cursor: pointer;" id="promotion" style="cursor:pointer;"><?php echo  $this->lang->line('info');?> <?php echo  $this->lang->line('promotion');?></h3>
									</div>
									<div class="panel-body" id="promotion_body" style="display:none;">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>No.</th>
													<th>Product Name</th>
													<th>Category</th>
													<th>Store Name</th>
													<th>Image</th>
													<th>Promotion Types</th>
													<th>Date From</th>
													<th>Date To</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=0; foreach($pro as  $value) {?>
												<?php $poto = $value->path; if(empty($poto)) $poto = "default.png"?>
												<tr>
													<td><?php echo $i+1;?></td>
													<td><a href="<?php echo base_url("admin/memberLogin/pro_detail/".$value->pro_det_id);?>" data-toggle="tooltip" title="Product Detail"><?php echo $value->p_name;?></a></td>
													<td><?php echo $value->cat_name?></td>
													<td><?php echo $value->str_name?></td>
													<td><img class="img-thumbnail" src="<?php echo base_url("assets/uploads/".$poto)?>" style="width: 50px;"></td>
													<td><?php echo $value->pro_type?></td>
													<td><?php echo $value->date_from?></td>
													<td><?php echo $value->date_to?></td>
													<td><a href="<?php echo base_url("admin/memberLogin/delete/".$value->pro_det_id)?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Remove"><?php echo $this->lang->line('remove')?></a></td>
												</tr>
												<?php $i=$i+1;}?>
											</tbody>
										</table>
										<button class="btn btn-success" id="AddPromotion"><?php echo  $this->lang->line('add');?> <?php echo  $this->lang->line('promotion');?></button>
									</div>
								</div>
							</div><!-- col-lg-12-->
						</div><!-- row Promotion-->
					</div><!-- Class Promotion -->
						<div class="<?php echo $order2?>">
							<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title"  id="order" style="cursor:pointer;"><?php echo $this->lang->line('menu12')?></h3>
											</div>
											<div class="panel-body" id="order_body" style="display: none;">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>No.</th>
															<th>Order Code</th>
															<th>Date Order</th>
															<th>Customer Name</th>
															<th>Status</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php
														 foreach ($order1 as $key => $value){
														 	if($value->ord_status!="trash"){
														?>
														<tr>
															<td><?php echo $key+1 ?></td>
															<td><?php echo $value->ord_code ?></td>
															<td><?php echo $value->ord_date ?></td>
															<td><?php echo $value->mem_name ?></td>
															<td><?php echo $value->ord_status ?></td>
															<td><a href="<?php echo base_url()?>profile/view/<?php echo $value->ord_code?>" class="btn btn-default btn-sm"><?php echo $this->lang->line('view')?> <?php echo $this->lang->line('detail')?></a>
																<a href="<?php echo base_url()?>admin/memberlogin/get_order_update/<?php echo $value->ord_id?>" class="btn btn-success btn-sm"><?php echo $this->lang->line('update')?></a>
																<a href="<?php echo base_url()?>admin/memberlogin/trash_order/<?php echo $value->ord_code?>" class="btn btn-danger btn-sm"><?php echo $this->lang->line('trash')?></a>
															</td>
														</tr>
														<?php }} ?>
													</tbody>
												</table>
											</div>
										</div>
									</div><!-- col-lg-12-->
							</div><!-- row Promotion-->
						</div><!-- Class Promotion -->
					</div>



				<div role="tabpanel" class="tab-pane" id="profile">
					<div class="row">
						<div class="col-lg-7">
							<div class="panel panel-default">
								<div class="panel-body">
									<form action="<?php echo base_url()?>admin/memberlogin/edit_profile" method="post">
										<?php
											$poto = $profile->acc_img;
											if(empty($poto)) $poto = "default.png";
										?>
										<div class="row">
											<div class="col-lg-6">
												<input type="hidden" value="<?php if(isset($profile->acc_img)){echo $profile->acc_img;}?>" name="oldImg">
												<img src="<?php echo base_url()?>assets/uploads/<?php echo $poto?>" class="img-thumbnail" width="110" alt=""><br>
												<h6>Name: <?php echo $profile->mem_name ?></h6>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
												<input type="hidden" value="<?php echo $profile->mem_id; ?>" name="mem_id">
												<input type="hidden" value="<?php echo $acc_id; ?>" name="acc_id" id="acc_id">
												<label for="">Username</label>
												<?php echo form_input("txtName",set_value('txtName',$profile->mem_name),"class='form-control input-sm'"); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Gender</label>
													<select class="form-control input-sm" name="ddlGender"  id=ddlGender>
														<option value="0" <?php echo $profile->sex==null||$profile->sex==""?"selected":""; ?>>Select One</option>
														<option value="M" <?php echo $profile->sex=="M"?"selected":""; ?>>Male</option>
														<option value="F" <?php echo $profile->sex=="F"?"selected":""; ?> >Female</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
										  <div class="col-lg-6">
										    <div class="form-group">
										      <label for="">First Name</label>
										      <input type="text" class="form-control" value="<?php echo set_value('txtFName',$profile->mem_fname)?>" id="txtFName" name="txtFName" placeholder="First name">
										    </div>
										  </div>
											<div class="col-lg-6">
										    <div class="form-group">
										      <label for="">Last Name</label>
										      <input type="text" class="form-control" value="<?php echo set_value('txtLName',$profile->mem_lname)?>" id="txtLName" name="txtLName" placeholder="Last name">
										    </div>
										  </div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Company Name</label>
													<?php echo form_input("txtCompanyName",$profile->company,"class='form-control input-sm' placeholder='Company name'"); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Date of Birth</label>
													 <div class="input-group">
													    <input id="txtDob" type="text" class="form-control datetimepicker input-sm" value="<?php echo $profile->dob!="0000-00-00"?$profile->dob:"1990-01-01"; ?>" name="txtDob" placeholder="Date of Birth">
													     <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													  </div>
												</div>
											</div>
										</div>
										<div class="form-group">
												<label for="">Place of Birth</label>
												<?php echo form_input("txtPob",$profile->pob,"class='form-control input-sm' placeholder='Place of birth'"); ?>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Position</label>
													<?php echo form_input("txtPosition",$profile->position,"class='form-control input-sm' placeholder='Position'"); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Location</label>
													<select class="form-control input-sm" name="ddlLocation" id="ddlLocation">
														<?php
															foreach ($location as $value){
														?>
														<option value="<?php echo $value->loc_id;?>" <?php echo $value->loc_id==$profile->loc_id?"selected":""; ?> > <?php echo $value->loc_name;?></option>
														<?php }?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<label for="">Marital Status</label>
												<?php echo form_dropdown("ddlMartialStatus",$option,$selected,"class='form-control'"); ?>
											</div>
											<div class="col-lg-6">
												<label for="">Account Type</label>
												<input type="text" class="form-control input-sm" value="<?php echo $profile->acc_type ?>" name="txtAccType" readonly="">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Contact Phone</label>
													<?php echo form_input("txtContact",$profile->mem_phone,"class='form-control input-sm' readonly"); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group"><label for="">Facebook</label>
												<input type="text" class="form-control" id="txtFb" placeholder="Facebook" value="<?php echo $profile->mem_fb?>">
												</div>
											</div>
										</div>
										<div class="row">
										  <div class="col-lg-6">
										    <div class="form-group">
										      <label for="">Nationality</label>
										      <input type="text" class="form-control" value="<?php echo set_value('txtNationality',$profile->mem_nationality)?>" id="txtNationality" placeholder="Nationality" name="txtNationality">
										    </div>
										  </div>
											<div class="col-lg-6">
										    <div class="form-group">
										      <label for="">Skill</label>
										      <input type="text" class="form-control" value="<?php echo set_value('txtSkill',$profile->mem_skill)?>" id="txtSkill" placeholder="Skill" name="txtSkill">
										    </div>
										  </div>
										</div>

										<div class="row">
										  <div class="col-lg-6">
										    <div class="form-group">
													<label for="">Profile image</label> <br>

													<a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-camera-retro"></i> Edit profile</a>
										    </div>
										  </div>
										</div>
										<div class="row">
										  <div class="col-lg-12">
										    <div class="form-group">
										      <label for="">Address</label>
										      <textarea name="txtAddr" rows="8" cols="80" class="form-control">
														<?php echo $profile->mem_addr ?>
													</textarea>
										    </div>
										  </div>
										</div>
										<div class="form-group">
											<div class="pull-right">
												<button id="btnSaveProfile" type="submit" class="btn btn-success btn-sm">Update</button>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
														   <div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Browse Image</h4>
														   </div>
														   <div class="modal-body">
																<input	type="file" name="txtUpload" />
																<input type="hidden" id="txtImgName" name="txtImgName" />
																<div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
														   </div>
														   <div class="modal-footer">
																<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary btn-sm" onclick="uploadFile()">Upload</button>
														   </div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="trash">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="panel-body" id="order_body">

											<table class="table table-striped">
												<thead>
													<tr>
														<th>No.</th>
														<th>Order Code</th>
														<th>Date Order</th>
														<th>Customer Name</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php

													 foreach ($order1 as $key => $value) {
													 	if($value->ord_status!="trash"){
													 	?>
													<tr>
														<td><?php echo $key+1 ?></td>
														<td><?php echo $value->ord_code ?></td>
														<td><?php echo $value->ord_date ?></td>
														<td><?php echo $value->mem_name ?></td>
														<td><?php echo $value->ord_status ?></td>
														<td><a href="<?php echo base_url()?>profile/view/<?php echo $value->ord_code?>" class="btn btn-default btn-sm"><?php echo $this->lang->line('view')?> <?php echo $this->lang->line('detail')?></a>
															<a href="<?php echo base_url()?>admin/memberlogin/get_order_update/<?php echo $value->ord_id?>" class="btn btn-success btn-sm"><?php echo $this->lang->line('update')?></a>
															<a href="<?php echo base_url()?>admin/memberlogin/trash_order/<?php echo $value->ord_code?>" class="btn btn-danger btn-sm"><?php echo $this->lang->line('trash')?></a>
														</td>

													</tr>
													<?php }} ?>
												</tbody>
											</table>
										</div>

									</div>
								</div><!-- col-lg-12-->
						</div><!-- row Promotion-->
						</div><!-- Class Promotion -->
					</div>


				<div role="tabpanel" class="tab-pane" id="profile">
					<div class="row">
						<div class="col-lg-7">
							<div class="panel panel-default">
								<div class="panel-body">
									<form action="<?php echo base_url()?>admin/memberlogin/edit_profile" method="post">
										<?php
											$poto = $profile->acc_img;
											if(empty($poto)) $poto = "default.png";
										?>
										<div class="row">
											<div class="col-lg-6">
												<input type="hidden" value="<?php if(isset($profile->acc_img)){echo $profile->acc_img;}?>" name="oldImg">
												<img src="<?php echo base_url()?>assets/uploads/<?php echo $poto?>" class="img-thumbnail" width="110" alt=""><br>
												<h6>Code: <?php echo $profile->acc_code ?></h6>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
												<input type="hidden" value="<?php echo $profile->mem_id; ?>" name="mem_id">
												<input type="hidden" value="<?php echo $acc_id; ?>" name="acc_id" id="acc_id">
												<label for="">Name</label>
												<?php echo form_input("txtName",$profile->mem_name,"class='form-control input-sm'"); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Gender</label>
													<select class="form-control input-sm" name="ddlGender"  id=ddlGender>
														<option value="M" <?php echo $value->loc_id=="M"?"selected":""; ?> >Male</option>
														<option value="F" <?php echo $value->loc_id=="F"?"selected":""; ?> >Female</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Company Name</label>
													<?php echo form_input("txtCompanyName",$profile->company,"class='form-control input-sm'"); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Date of Birth</label>
													 <div class="input-group">
													    <input id="txtDob" type="text" class="form-control datetimepicker input-sm" value="<?php echo $profile->dob; ?>" name="txtDob" placeholder="Email">
													     <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													  </div>
												</div>
											</div>
										</div>
										<div class="form-group">
												<label for="">Place of Birth</label>
												<?php echo form_input("txtPob",$profile->pob,"class='form-control input-sm'"); ?>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Position</label>
													<?php echo form_input("txtPosition",$profile->position,"class='form-control input-sm'"); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Location</label>
													<select class="form-control input-sm" name="ddlLocation" id="ddlLocation">
														<?php
															foreach ($location as $value){
														?>
														<option value="<?php echo $value->loc_id;?>" <?php echo $value->loc_id==$profile->loc_id?"selected":""; ?> > <?php echo $value->loc_name;?></option>
														<?php }?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<label for="">Status</label>
												<input type="text" name="txtStatus" class="form-control input-sm" value="<?php echo $profile->status=="1"?"Enable":"Disable";?>" readonly="">
											</div>
											<div class="col-lg-6">
												<label for="">Account Type</label>
												<input type="text" class="form-control input-sm" value="<?php echo $profile->acc_type ?>" name="txtAccType" readonly="">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Contact Phone</label>
													<?php echo form_input("txtContact",$profile->contact_phone,"class='form-control input-sm'"); ?>
												</div>
											</div>

										</div>

										<div class="form-group">
											<div class="pull-right">
												<button id="btnSaveProfile" type="submit" class="btn btn-success btn-sm">Update</button>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
														   <div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Browse Image</h4>
														   </div>
														   <div class="modal-body">
																<input	type="file" name="txtUpload" />
																<input type="hidden" id="txtImgName" name="txtImgName" />
																<div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
														   </div>
														   <div class="modal-footer">
																<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary btn-sm" onclick="uploadFile()">Upload</button>
														   </div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="trash">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="panel-body" id="order_body">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No.</th>
														<th>Order Code</th>
														<th>Date Order</th>
														<th>Customer Name</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php

															 foreach ($order1 as $key => $value) {
															 	if($value->ord_status=="trash" && $acc->acc_type!="Agent" ){
															 	?>
															<tr>
																<td><?php echo $key+1 ?></td>
																<td><?php echo $value->ord_code ;?></td>
																<td><?php echo $value->ord_date ?></td>
																<td><?php echo $value->mem_name ?></td>
																<td><?php echo $value->ord_status ?></td>
																<td>
																	<a href="<?php echo base_url()?>admin/memberlogin/untrash_order/<?php echo $value->ord_code?>" class="btn btn-danger btn-sm"><?php echo $this->lang->line('untrash')?></a>
																</td>
													</tr>
													<?php }} ?>
												</tbody>
											</table>
										</div>

									</div><!-- row Promotion-->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- setting -->
				<div role="tabpanel" class="tab-pane" id="setting">
					<div class="row">
						<div class="col-lg-7">
							<div class="panel panel-default">
								<div class="panel-body">
									<form action="<?php echo base_url()?>memberLogin/change_password" method="post">
									<?php
											$poto = $profile->acc_img;
												if(empty($poto)) $poto = "default.png";
											?>
									<img src="<?php echo base_url()?>assets/uploads/<?php echo $poto?>" class="img-thumbnail" width="110" alt=""><br>
									<h6>Code: <?php echo $profile->acc_code ?></h6>
									<div class="form-group">
										<label for="">Name</label>
										<?php echo form_input("txtName",$profile->mem_name,"class='form-control' readonly"); ?>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<input type="hidden" value="<?php echo $profile->mem_code ?>" name="mem_code" id="mem_code">
											<input type="hidden" value="<?php echo $acc_id; ?>" name="acc_id" id="acc_id">
											<label for="Newpassword">New Password</label>
											<input type="text" placeholder="new passowrd" class="form-control input-sm" name="Newpassword" id="Newpassword">
										</div>
										<div class="col-lg-6">
											<label for="ConPassword">Confirm Password</label>
											<input placeholder="confrim password" class="form-control input-sm" type="text" name="ConPassword" id="ConPassword">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="pull-right" style="margin-top:10px">
												<input type="submit" class="btn btn-success btn-sm" value="Save" name="">
											</div>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div><!-- end setting -->
		    </div><!-- tab-content -->
		</div><!-- col-lg-10 col-lg-offset-1-->
<script>
	function uploadFile() {
		var formData = new FormData();
		formData.append('image', $('input[type=file]')[0].files[0]);
		$.ajax({
			url: '<?php echo base_url()?>ng/upload.php',
			data: formData,
			type: 'POST',
			// THIS MUST BE DONE FOR FILE UPLOADING
			contentType: false,
			processData: false,
			// ... Other options like success and etc

			success: function(data) {
				document.getElementById("response").innerText = "Upload Complete!";
				document.getElementById("txtImgName").value = data;
			}
		});

	}
</script>
<script>
	$(document).ready(function(){

	    $("#account").click(function(){
	        $("#account_body").slideToggle("slow");
	    });

	    $("#product").click(function(){
	        $("#product_body").slideToggle("slow");
	    });

		$("#product1").click(function(){
		        $("#product_body1").slideToggle("slow");
		});

	     $("#shop").click(function(){
	        $("#shop_body").slideToggle("slow");
	    });

	     $("#service").click(function(){
	        $("#service_body").slideToggle("slow");
	    });

	    $("#member").click(function(){
	       $("#member_body").slideToggle("slow");
	    });
	    $("#Inventory").click(function(){
	       $("#Inventory_body").slideToggle("slow");

	    });

	     $("#staf").click(function(){
		 $("#staf_body").slideToggle("slow");});

	     $("#fund").click(function(){

	       $("#fund_body").slideToggle("slow");

	    });
	    $("#promotion").click(function(){

	       $("#promotion_body").slideToggle("slow");

	    });
	    $("#order").click(function(){

	       $("#order_body").slideToggle("slow");

	    });

	});
	/*tooltip*/
	$(document).ready(function(){

	    $('[data-toggle="tooltip"]').tooltip();

	});
</script>
<script type="text/javascript">

	$("#btnAddAccount").click(function(){

		window.location.assign("<?php echo base_url()?>memberLogin/addAccount");

	});
	$("#btnSavePasswd").click(function(){

		window.location.assign("<?php echo base_url()?>memberLogin/change_password");

	});
	$("#get_order").click(function(){


		window.location.assign("<?php echo base_url()?>admin/memberLogin/get_order_update/$");

	});

	$("#btnAddProduct").click(function(){


		window.location.assign("<?php echo base_url()?>admin/memberLogin/get_order_update/$");

	});

	$("#btnAddProduct").click(function(){
		window.location.assign("<?php if($profile->acc_type=="Shop-owner" || $profile->acc_type=="Shop"){echo base_url('memberLogin/addProduct1');}else{echo base_url('memberLogin/addProduct');}?>");
	}); /*add product form Bussiness*/

	$("#AddPromotion").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberlogin/add_promotion")
	});

	$("#btnAddShop").click(function(){

		window.location.assign("<?php echo base_url()?>admin/memberLogin/addMember");

	});
	$("#btnAddSercices").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberLogin/addservice");
	});
	$("#btnAddStaf").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberLogin/addstaf");
	});
	$("#AddFund").click(function(){

		window.location.assign("<?php echo base_url()?>admin/memberLogin/AddFund");

	});

	$("#btnAddInventory").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberLogin/addInventory");
	});
	$("#btnLogout").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberLogin/Logout");
	});
	$("#btnAddMember").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberLogin/addMember");
	});
/*	$("#btnSaveProfile").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberlogin/edit_profile")
	});*/

</script>

<script type="text/javascript">
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
		$scope.get_order_id = function(id){
			alert($scope.ord_id = id);
		}

		$scope.get_ddl = function(status){
			$scope.ord_status = status;
		}
		$scope.updateStatus = function(id,status){
			$http.get("<?php echo base_url()?>profile/updateOrderStatus/"+id+"/"+status)
    .then(function (response) {$scope.names = response.data.records;})
		window.location.assign("<?php echo base_url()?>profile/<?php echo $acc_id?>");
		}
	});
</script>
