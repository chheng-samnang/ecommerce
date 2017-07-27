<h4 style="background: #ff6a00; padding: 8px;">BESTSELLER</h4>
	           
	            <div id="myCarousel" class="vertical-slider carousel vertical slide col-md-12" data-ride="carousel">
	            
	            <br />
	            <!-- Carousel items -->
					<div class="carousel-inner" style="margin-top: -17px;">
						<div class="item active">
						<?php foreach ($bastseller as $v){ ?>
							<div class="col-xs-6 col-sm-5 col-md-12" style="padding: 1px;">
								<a  href="#"> <img style="width: 225px;" src="http://placehold.it/150x150" class="thumbnail" alt="Image" />
									<p><?php echo $v->p_name?> Price: <?php echo $v->price;?></p> 
								</a>
							</div>
							<?php } ?>  
						</div><!--/item-->
						
							<div class="item ">
								<div class="col-xs-6 col-sm-5 col-md-12" style="padding: 1px">
								<?php foreach ($bastseller as  $b) {?>
									<a href="#"> <img style="width: 225px;" src="http://placehold.it/150x150" class="thumbnail"
										alt="Image" />
										<p><?php echo $v->p_name?> Price: <?php echo $b->price;?></p>
									</a>
									<?php } ?>
								</div>	
							</div><!--/item-->
						
						
					</div>
	            </div>
	    
	