<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
			<div class="row">
				<div class="col-lg-12">				
					<h1 class="page-header">Form Promotion Detail</h1>				
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Promotion detail Information</h3>
						</div>
						<div class="panel-body" style="line-height: 1.8">
								<div class="col-lg-3">
	                                <img class="img-responsive img-thumbnail" src="<?php echo base_url('assets/uploads/'.$detail->path);?>"/>
	                            </div>
								<div class="col-lg-9">								
	                                <div class="col-lg-3"><b>Promotion name: </b></div>
	                                <div class="col-lg-9"><?php echo $detail->pro_name!=NULL? $detail->pro_name : $detail->occ_name;?></div>
	                                <div class="col-lg-3"><b>Promotion type: </b></div>
	                                <div class="col-lg-9"><?php echo $detail->pro_type=='d' ? 'Discount' : ($detail->pro_type=='a' ? 'Add product' : 'kupun');?></div>
	                                <div class="col-lg-3"><b>Category name: </b></div>
	                                <div class="col-lg-9"><?php echo $detail->cat_name;?></div>     
	                                <div class="col-lg-3"><b>Product name: </b></div>
	                                <div class="col-lg-9"><?php echo $detail->p_name;?></div>

	                                <?php if($detail->discount_percent!=0){ ?>
	                                	<div class="col-lg-3"><b>Discount percent: </b></div>
	                                	<div class="col-lg-9"><?php echo $detail->discount_percent."%";?></div>
	                                <?php }else{?>                                                             		                                
		                                <div class="col-lg-3"><b>Quantity buy: </b></div>
		                                <div class="col-lg-9"><?php echo $detail->qty_buy;?></div>                                       
		                                <div class="col-lg-3"><b>Item free: </b></div>
		                                <div class="col-lg-9"><?php echo $detail->item_free;?></div>
		                                <div class="col-lg-3"><b>Quantity free: </b></div>
		                                <div class="col-lg-9"><?php echo $detail->qty_free;?></div>
		                            <?php }?>

	                                <div class="col-lg-3"><b>Date from: </b></div>
	                                <div class="col-lg-9"><?php echo date("d/m/Y",strtotime($detail->date_from));?></div>
	                                <div class="col-lg-3"><b>Date to: </b></div>
	                                <div class="col-lg-9"><?php echo date("d/m/Y",strtotime($detail->date_to));?></div>                                
	                                <div class="col-lg-12" style="border-top: 1px solid #dedcdc">
	                                	<a href="<?php echo site_url($cancel);?>" style="margin-top: 20px;" class="btn btn-default fa fa-close"> <?php echo $this->lang->line('close');?></a>
	                                </div>
	                            </div>										
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
<script>
	$("#btnCancel").click(function(){
    	window.location.assign("<?php if(isset($cancel)){echo base_url($cancel);}?>");
	});
</script> 
