 <div class="container">
<div class="col-xs-12 col-md-3 sidebar" style="z-index: 999">
	<div class="side-menu animate-dropdown outer-bottom-xs">
		<div class="head navbar-default"><i class="glyphicon glyphicon-th-list"></i> Categories</div>
			<nav class="yamm megamenu-horizontal" role="navigation">
				<ul class="nav">
						<li class="dropdown menu-item">
							<?php foreach ($category as $v) {?>
								<a href="#" class="dropdown-toggle btn-default"><i class="icon fa fa-desktop fa-fw"></i><?php echo $v->cat_name;?></a>
							<?php }?>
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
		
	            <h4 style="background: #ff6a00; padding: 8px;">BESTSELLER</h4>
	        <div class="container">    
	            <div id="myCarousel" class="vertical-slider carousel vertical slide col-md-3" data-ride="carousel">
	            
	            <br />
	            <!-- Carousel items -->
					<div class="carousel-inner">
						<div class="item active">
							<div class="row">
								<div class="col-xs-6 col-sm-5 col-md-12">
									<a  href="#"> <img style="width: 200px;" src="http://placehold.it/150x150" class="thumbnail"
										alt="Image" />
										<p> 2 Medium pizza + 2 soda only $15.99.</p>
									</a>
								</div>  
							</div><!--/row-fluid-->
						</div><!--/item-->
						<div class="item ">
							<div class="row">
								<div class="col-xs-6 col-sm-5 col-md-12">
									<a href="#"> <img style="width: 200px;" src="http://placehold.it/150x150" class="thumbnail"
										alt="Image" />
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
											euismod tincidunt ut laoreet..</p>
									</a>
								</div>	
							</div><!--/row-fluid-->
						</div><!--/item-->
						<div class="item ">
							<div class="row">
								<div class="col-xs-6 col-sm-5 col-md-12">
									<a href="#"> <img style="width: 200px;" src="http://placehold.it/150x150" class="thumbnail"
										alt="Image" />
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
										euismod tincidunt ut laoreet..</p>
										</a>
								</div>
							</div><!--/row-fluid-->
						</div><!--/item-->
					</div>
	            </div>
	        </div>
	</div>

	<?php #================================================= Category ====================?>

	<div class="col-xs-12 col-md-9" style="padding: 0px; margin-bottom: 35px;">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="<?php echo base_url('assets/uploads/new-year-2018.jpg')?>" style="width: 855; height: 371px;">
					<div class="carousel-caption"></div>
				</div>
				<?php foreach ($record as $value) {?>
					<div class="item">
						<img src="<?php echo base_url('assets/uploads/'.$value->slide_path);?>" style="width: 855; height: 371px;">
						<div class="carousel-caption">
							<h3><?php echo $value->slide_name;?></h3>
							<p><?php echo $value->slide_desc?></p>
						</div>
					</div>
				<?php }?>
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		
		<?php #=============================== Slideshow  =================== ?>

		<?php
			foreach ($product as $key => $value) {
		?>
		<div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 1px;">
			<a href="#" class="thumbnail" style="" title="More Detail...">
				<!-- <img src="img/1-051.png" style="height: 180px;"> -->
				<img src="<?php echo base_url()?>assets/uploads/<?php echo $value->path?>" style="height: 180px;">
				<p style="margin-top: 8px; border-top: solid 1px #c6c6c6;"><?php echo $value->p_name?></p>
				<p style="color: red">Price: <?php echo "$".$value->price?></p>
			</a>
		</div>
		<?php
	}
		?>
		             
	</div>

	<?php #=============================== Slideshow and Products =================== ?>

</div>
	<?php //include('content_v.php');?>
	<?php //include('slde_v.php');?>


