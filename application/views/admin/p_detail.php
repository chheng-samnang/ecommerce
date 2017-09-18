<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
		<div class="row">
			<div class="col-lg-12">				
				<h1 class="page-header">Form Product Detail</h1>				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Product detail Information</h3>
					</div>
					<div class="panel-body" style=" line-height: 1.8;">
							 <div class="col-lg-3">
                                <img class="img-responsive img-thumbnail" style="width: 221.5px;" src="<?php echo base_url('assets/uploads/'.$media->path);?>"/>

                                <a href="<?php echo base_url('admin/Product_c');?>" class="btn btn-default fa fa-close" style="margin-top: 20px;"> Close</a>
                            </div>
							<div class="col-lg-9">
                                <div class="col-lg-3"><b>Store name: </b></div>
                                <div class="col-lg-9"><?php echo $detail->str_name;?></div>
                                <div class="col-lg-3"><b>Category name: </b></div>
                                <div class="col-lg-9"><?php echo $detail->cat_name;?></div>
                                <div class="col-lg-3"><b>Brand name: </b></div>
                                <div class="col-lg-9"><?php echo $detail->brn_name;?></div>
                                <div class="col-lg-3"><b>Product name: </b></div>
                                <div class="col-lg-9"><?php echo $detail->p_name;?></div>                                        
                                <div class="col-lg-3"><b>Price: </b></div>
                                <div class="col-lg-9"><?php echo $detail->price."$";?></div>
                                <div​ class="col-lg-3"><b>Quantity: </b></div​>
                                <div class="col-lg-9"><?php if($detail->qty){echo $detail->qty;}else echo "<p style='color: red'>N/A</p>";?></div>                                        
                                <div class="col-lg-3"><b>Color: </b></div>
                                <div class="col-lg-9"><?php echo $detail->color;?></div>                                        
                                <div class="col-lg-3"><b>Size: </b></div>
                                <div class="col-lg-9"><?php echo $detail->size;?></div>
                                <div class="col-lg-3"><b>Model: </b></div>
                                <div class="col-lg-9"><?php if($detail->model){echo $detail->model;}else echo "<p style='color: red;'>N/A</p>";?></div>                                        
                                <div class="col-lg-3"><b>Date release: </b></div>
                                <div class="col-lg-9"><?php echo date("d/m/Y",strtotime($detail->date_release));?></div>
                                <div class="col-lg-3"><b>Dimension: </b></div>
                                <div class="col-lg-9"><?php echo $detail->dimension;?></div>
                                <div class="col-lg-3"><b>Short Description: </b></div>
                                <div class="col-lg-9"><?php echo $detail->short_desc;?></div>
                                <div class="col-lg-12"  style="border-bottom: solid #e3e3e3 1px"><b>Product Description: </b></div>
                                <div class="col-lg-12"><p><?php echo $detail->p_desc;?></p></div>                                
                            </div>   
                                                                                                           
                                
                                
                            </div>											
					</div>
				</div>
				<?php echo form_close()?>
			</div>
		</div>
	</div>
</div>

<script>
	$("#btnCancel").click(function(){
    	window.location.assign("<?php if(isset($cancel)){echo base_url($cancel);}?>");
	});
</script> 
