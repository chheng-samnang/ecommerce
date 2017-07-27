<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Choose Your Account</h3>
				<div style="float: right; margin-top: -19px;">
					<i class="fa fa-users" aria-hidden="true" style="color: #026aa7;"></i>
						<?php foreach ($member as $row) 
							{
								echo $row->mem_name;
							}
						?>
				</div>
			</div>
			<div class="panel-body">
				<?php foreach($account as $row){?>
					<a href="<?php echo base_url()?>profile/<?php echo $row->acc_id?>">
						<div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-body" style="background:#e0dcdc;border:1px solid #d0cccc;">
									<div class="row">
										<div class="col-lg-3">
											<?php 
												$poto = $row->acc_img;
												if(empty($poto)) $poto = "default.png";
											?>
											<img style="height: 71px;" class="img-circle" src="<?php echo base_url('assets/uploads/'.$poto)?>">
										</div>
										<div class="col-lg-8 col-lg-offset-1">
											<?php echo "Account: ".$row->acc_code?><br />
											<?php echo "Type: ".$row->acc_type?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				<?php }?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#btnLogout").click(function(){
		window.location.assign("<?php echo base_url()?>admin/memberLogin/Logout");
	});
</script>