<!DOCTYPE html>
<html>
<head>
	<title>blog</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/uploads/mobile-cart-icon.png');?>">
</head>
<body>
<div class="container">
	<div class="row">
		
	</div>
	<div class="row">
		<nav id="" class="navbar navbar-default" style="margin-bottom: 11px !important;">
	        <div class="container-fluid" style="max-width: 87%;">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>                        
	                </button>
	            </div>
		        <div class="collapse navbar-collapse" id="myNavbar">
		            <ul class="nav navbar-nav">
		                <li class="active"><a href="<?php echo base_url('blog');?>">Home</a></li> 
		            </ul>
	                <ul class="nav navbar-nav navbar-right"> 
	                	<form action="<?php echo base_url('blog');?>" method = "post">
	                    	<input style="margin-top: 8px; width: 140%;" type="text" name="keyword" id="keyword" class="form-control input-sm" placeholder="Search...." />
	                	</form>
	                </ul>
		        </div>
	    	</div><!-- /.container-fluid -->
		</nav>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-9" style="background: #fff;">
			<?php foreach ($blog as  $value) {?>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-12">
						<a href="<?php echo base_url('blog/blog_detail/'.$value->bl_id.'/'.$value->title);?>"><h4><?php echo $value->title;?></h4></a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 10px;">
						<a href="#" style="font-size: 12px;color: #a7a1a1;"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $value->date_crea?></a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<a href="<?php echo base_url('blog/blog_detail/'.$value->bl_id.'/'.$value->title);?>">
							<img style="height: 170px;" src="<?php echo base_url('assets/uploads/'.$value->img);?>">
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-8">
						<p style="text-align: justify;"><?php echo substr($value->bl_desc, 0, 700)."........";?></p>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-12" style="margin-top: 20px;">
						<div class="col-xs-12 col-sm-6 col-md-10" style="padding: 0px;"><a href="<?php echo base_url('blog/blog_detail/'.$value->bl_id);?>"><i class="fa fa-comment" aria-hidden="true"></i> Comments</a></div>
						<div class="col-xs-12 col-sm-6 col-md-2">
							<a  href="<?php echo base_url('blog/blog_detail/'.$value->bl_id);?>" class="btn btn-primary"> Read More..</a>
						</div>
					</div>
				</div><hr style="margin-bottom: 0px;">
				
			<?php } ?>
			<div align="center"><?php echo $page_link;?></div>
		</div><!-- this col-xs-12 col-sm-6 col-md-9 -->

	  	<div class="col-xs-12 col-md-3" style="background: #e2e0e0;">
	  		<h4>Popular Posts</h4><hr />
	  		<?php foreach ($popular_blog as $value) {?>
		  		<div class="item-content">
					<div class="item-thumbnail" style="float: left;">
						<a href="<?php echo base_url('blog/blog_detail/'.$value->bl_id.'/'.$value->title);?>">
							<img style="margin-right: 10px; width: 90px;"border="0" src="<?php echo base_url('assets/uploads/'.$value->img);?>">
						</a>
					</div>
					<div class="item-title">
						<a href="<?php echo base_url('blog/blog_detail/'.$value->bl_id.'/'.$value->title);?>"><?php echo $value->title;?></a>
					</div>
					<div class="item-snippet" style="text-align: justify;">
						<?php echo substr($value->bl_desc, 0, 100)."......";?>
					</div>
				</div><hr />
			<?php } ?>
	  	</div><!-- this col-xs-12 col-md-3-->
	</div>
</div>
</body>
</html>
