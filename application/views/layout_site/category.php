<div class="row">

<div class="container" id="category1">

<div class="col-lg-2">
	Vsdss
</div>
<div class="col-xs-12 col-md-3 sidebar" style="z-index: 999; padding: 7px;">
	<div class="side-menu animate-dropdown outer-bottom-xs">
		<div class="head navbar-default"><i class="glyphicon glyphicon-th-list"></i> Categories</div>
			<nav class="yamm megamenu-horizontal" role="navigation">
				<ul class="nav">
						<li class="dropdown menu-item" ng-repeat="x in categories">
								<a href="" class="dropdown-toggle btn-default" ng-click="loadProduct_by_Cat(x.Id)"><i class="icon fa fa-desktop fa-fw"></i>{{x.Name}}</a>
						</li><!-- /.menu-item -->
						<li class="dropdown menu-item">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-gamepad fa-fw"></i>Game &amp; Video</a>
						<ul class="dropdown-menu mega-menu">
							<li class="yamm-content">
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<ul class="links list-unstyled">
											<li><a href="index.php?page=category">Lenovo</a></li>
											<li><a href="index.php?page=category">Microsoft</a></li>
											<li><a href="index.php?page=category">Fuhlen</a></li>
											<li><a href="index.php?page=category">Longsleeves</a></li>
										</ul>
									</div><!-- /.col -->
									<div class="col-sm-12 col-md-3">
										<ul class="links list-unstyled">
											<li><a href="index.php?page=category">Microsoft</a></li>
											<li><a href="index.php?page=category">Apple</a></li>
											<li><a href="index.php?page=category">Tees &amp; Tanks</a></li>
											<li><a href="index.php?page=category">Graphic Tees</a></li>
										</ul>
									</div><!-- /.col -->
									<div class="col-sm-12 col-md-3">
										<ul class="links list-unstyled">
											<li><a href="index.php?page=category">Polos</a></li>
											<li><a href="index.php?page=category">Sweaters</a></li>
											<li><a href="index.php?page=category">Shirts</a></li>
											<li><a href="index.php?page=category">Hoodies</a></li>
										</ul>
									</div><!-- /.col -->
									<div class="col-sm-12 col-md-3">
										<ul class="links list-unstyled">
											<li><a href="index.php?page=category">Microsoft</a></li>
											<li><a href="index.php?page=category">Apple</a></li>
											<li><a href="index.php?page=category">Tees &amp; Tanks</a></li>
											<li><a href="index.php?page=category">Graphic Tees</a></li>
										</ul>
									</div><!-- /.col -->
								</div><!-- /.row -->
							</li><!-- /.yamm-content -->
						</ul><!-- /.dropdown-menu --> 
					</li><!-- /.menu-item -->
					

				</ul><!-- /.nav -->
			</nav><!-- /.megamenu-horizontal -->
		</div><!-- /.side-menu -->
		
	            <div class="head navbar-default" style="border-radius:0px;height:41px;padding:12px;color:white;">Bestseller</div>
	           
	            <div id="myCarousel" class="vertical-slider carousel vertical slide col-md-12" data-ride="carousel">
	            
	            <br />
	            <!-- Carousel items -->
					<div class="carousel-inner" style="margin-top: -17px;">
						<div class="item active">
						<?php foreach ($bastseller as $value){ ?>
							<div class="col-xs-6 col-sm-5 col-md-12" style="padding: 1px;">
								<a  href="<?php echo base_url('product_c/product_page_detail/'.$value->p_id)?>"> <img style="width: 225px;" src="<?php echo base_url('assets/uploads/'.$value->path);?>" class="thumbnail" alt="Image" />
									<p><?php echo $value->p_name?> Price: <?php echo $value->price;?></p> 
								</a>
							</div>
						<?php } ?>  
						</div><!--/item-->
						
							<div class="item ">
								<div class="col-xs-6 col-sm-5 col-md-12" style="padding: 1px">
								<?php foreach ($bastseller as  $value) {?>
									<a href="<?php echo base_url('product_c/product_page_detail/'.$value->p_id)?>"> <img style="width: 225px;" src="<?php echo base_url('assets/uploads/'.$value->path);?>" class="thumbnail"
										alt="Image" />
										<p><?php echo $value->p_name?> Price: <?php echo $value->price;?></p>
									</a>
									<?php } ?>
								</div>	
							</div><!--/item-->
						
						
					</div>
	            </div>
	</div>

<?php #================================================= Category ====================?>
