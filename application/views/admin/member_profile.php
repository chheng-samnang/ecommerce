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

	$acc->acc_type=="Bussiness";
	$acc->acc_type=="Agent";
	$acc->acc_type=="Shop-owner";
	$acc->acc_type=="General";
	$acc->acc_type=="Association";

		switch ($acc->acc_type)
		{
			case "Bussiness":
			{
					$products  = "display";
					$fund      = "display";
					$promotion = "display";
					$order = "display";

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
					$fund      = "none";
					$Inventory = "none";
					$promotion = "none";
					$members   = "none";
					$account   = "none";
			}
				break;

			case "Shop-owner":
			{
					$service   = "display";
					$products  = "display";
					$fund      = "display";
					$Inventory = "display";
					$promotion = "display";
					$order = "display";

					$members   = "none";
					$account   = "none";

			}
				break;

			case "General":
			{
					$account   = "display";
					$service   = "display";
					$Inventory = "display";
					$fund      = "display";

					$products  = "none";
					$promotion = "none";
					$members   = "none";

			}
				break;

			case "Association":
			{
					$Inventory = "display";
					$promotion = "display";
					$members   = "display";

					$service   = "none";
					$products  = "none";
					$fund      = "none";
					$account   = "none";
			}
				break;

			default:

				break;

		}
?>
</nav>
	<div class="row" style="margin-top:30px;" ng-app="myApp" ng-controller="myCtrl">
		<div class="col-lg-10 col-lg-offset-1">
			  <!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#myAccount" aria-controls="home" role="tab" data-toggle="tab"><?php echo $this->lang->line('manage');?> <?php echo $this->lang->line('account');?></a></li>
			    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $this->lang->line('profile')?></a></li>
			    <li role="presentation" class="navbar-right" style="margin-right: 0px;">

			    	<i class="fa fa-users" aria-hidden="true" style="color: #026aa7;"></i>
						<?php foreach ($member as $row) {
							echo $row->mem_name;
						}
						?>
						
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

						<div class="<?php echo $products?>">
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
														<th>Product Name</th>
														<th>Price</th>
														<th>Store Qty</th>
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
														if($row->p_status==1){
															echo "<span class='glyphicon glyphicon-ok-circle' style='color:#5cb85c' data-toggle='tooltip' title='Enable'></span>";
														}
														else
															echo "<span class='glyphicon glyphicon-remove-circle' style='color:red' data-toggle='tooltip' title='Disable'></span>";
														?>
														</td>
														<td><?php echo $row->p_code?></td>
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


						<div class="<?php echo $order?>">
						<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title"  id="order" style="cursor:pointer;"><?php echo $this->lang->line('menu12')?></h3>
										</div>
										<div class="panel-body" id="order_body" style="display:none;">
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
													<?php foreach ($order as $key => $value) {?>
													<tr>
														<td><?php echo $key+1 ?></td>
														<td><?php echo $value->ord_code ?></td>
														<td><?php echo $value->ord_date ?></td>
														<td><?php echo $value->mem_name ?></td>
														<td><?php echo $value->ord_status ?></td>
														<td>
																<button class="btn btn-success" data-toggle="modal" data-target="#myModal" ng-click="get_order_id('<?php echo $value->ord_id?>')"><?php echo $this->lang->line('update')?> <?php echo $this->lang->line('status')?></button>
																<a href="<?php echo base_url()?>profile/view/<?php echo $value->ord_code?>" class="btn btn-default"><?php echo $this->lang->line('view')?> <?php echo $this->lang->line('detail')?></a>
														</td>
													</tr>
													<?php } ?>
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
									<div class="form-group">
											<label for="">Gender</label>
											<?php echo form_input("txtGender",$profile->sex,"class='form-control' readonly"); ?>
									</div>
									<div class="form-group">
											<label for="">Date of Birth</label>
											<?php echo form_input("txtDob",$profile->dob,"class='form-control' readonly"); ?>
									</div>

									<div class="form-group">
											<label for="">Place of Birth</label>
											<?php echo form_input("txtPob",$profile->pob,"class='form-control' readonly"); ?>
									</div>
									<div class="form-group">
											<label for="">Company Name</label>
											<?php echo form_input("txtCompanyName",$profile->company,"class='form-control' readonly"); ?>
									</div>
									<div class="form-group">
											<label for="">Position</label>
											<?php echo form_input("txtPosition",$profile->position,"class='form-control' readonly"); ?>
									</div>
									<div class="form-group">
											<label for="">Contact Phone</label>
											<?php echo form_input("txtContact",$profile->contact_phone,"class='form-control' readonly"); ?>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
		    </div><!-- tab-content -->
		</div><!-- col-lg-10 col-lg-offset-1-->
<!-- Modal -->
		<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('update')?> <?php echo $this->lang->line('status')?></h4>
		      </div>
		      <div class="modal-body">
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" ng-model="ddlStatus" ng-change="get_ddl(ddlStatus)">
								<option value="pending">Pending</option>
								<option value="delivering">Delivering</option>
								<option value="complete">Complete</option>
							</select>
						</div>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" ng-click="updateStatus(ord_id,ord_status)"><?php echo $this->lang->line('update')?></button>
		      </div>
		    </div>
		  </div>
		</div> -->

	</div><!-- row-->




<script>
	$(document).ready(function(){

	    $("#account").click(function(){

	        $("#account_body").slideToggle("slow");

	    });

	    $("#product").click(function(){

	        $("#product_body").slideToggle("slow");

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

	$("#btnAddProduct").click(function(){

		window.location.assign("<?php echo base_url()?>memberLogin/addProduct");

	});

	$("#AddPromotion").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberlogin/add_promotion")
	});

	$("#btnAddShop").click(function(){

		window.location.assign("<?php echo base_url()?>admin/memberLogin/addMember");

	});
	$("#btnAddSercices").click(function(){

		window.location.assign("<?php echo base_url()?>admin/memberLogin/addservice");

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
</script>

<script type="text/javascript">
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
		$scope.get_order_id = function(id){
			$scope.ord_id = id;
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