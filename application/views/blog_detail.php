
 	<title>blog detail</title>
 	<link rel="shortcut icon" href="<?php echo base_url('assets/uploads/mobile-cart-icon.png');?>">
 	<style>
 		/* Style the Image Used to Trigger the Modal */
			#myImg {
			    //border-radius: 5px;
			    cursor: pointer;
			    transition: 0.3s;
			    margin-right: 12px;
			}

			#myImg:hover {opacity: 0.7;}

			/* The Modal (background) */
			.modal {
			    display: none; /* Hidden by default */
			    position: fixed; /* Stay in place */
			    z-index: 1; /* Sit on top */
			    padding-top: 100px; /* Location of the box */
			    left: 0;
			    top: 0;
			    width: 100%; /* Full width */
			    height: 100%; /* Full height */
			    overflow: auto; /* Enable scroll if needed */
			    background-color: rgb(0,0,0); /* Fallback color */
			    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
			    z-index: 9999;
			}

			/* Modal Content (Image) */
			.modal-content {
			    margin: auto;
			    display: block;
			    width: 80%;
			    max-width: 700px;
			}

			/* Caption of Modal Image (Image Text) - Same Width as the Image */
			#caption {
			    margin: auto;
			    display: block;
			    width: 80%;
			    max-width: 700px;
			    text-align: center;
			    color: #ccc;
			    padding: 10px 0;
			    height: 150px;
			}

			/* Add Animation - Zoom in the Modal */
			.modal-content, #caption { 
			    -webkit-animation-name: zoom;
			    -webkit-animation-duration: 0.6s;
			    animation-name: zoom;
			    animation-duration: 0.6s;
			}

			@-webkit-keyframes zoom {
			    from {-webkit-transform:scale(0)} 
			    to {-webkit-transform:scale(1)}
			}

			@keyframes zoom {
			    from {transform:scale(0)} 
			    to {transform:scale(1)}
			}

			/* The Close Button */
			.close {
			    position: absolute;
			    top: 15px;
			    right: 35px;
			    color: #f1f1f1;
			    font-size: 40px;
			    font-weight: bold;
			    transition: 0.3s;
			}

			.close:hover,
			.close:focus {
			    color: #bbb;
			    text-decoration: none;
			    cursor: pointer;
			}

			/* 100% Image Width on Smaller Screens */
			@media only screen and (max-width: 700px){
			    .modal-content {
			        width: 100%;
			    }
			}
 	</style>
 </head>
 <body>
<!-- 	 <?php
	 	include("ng/db.php");
		if (isset($_POST["btn"])) 
		{
			$sql=$db->query("INSERT INTO tbl_comment(comment,cm_crea, bl_id) VALUES('".$_POST["txt"]."','".date('Y-m-d')."','".$_POST["txt_bl_id"]."')");
		}
	?> -->
	<div class="container">
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
			                <div ng-app="myapp" ng-controller="empcontroller">
			                    <form action="<?php echo base_url('blog');?>" method = "post">
				                    <input style="margin-top: 8px; width: 140%" type="text" name="keyword" id="keyword" class="form-control input-sm" placeholder="Search...." />
				                </form>
				            </div>
		                </ul>
			        </div>
		    	</div><!-- /.container-fluid -->
			</nav><!-- class navbar navbar-default-->
		</div><!-- class row -->
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-9" style="background: #fff;">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-12">
						<div class="item-content">
							<div class="item-thumbnail" style="float: left;">
								<!-- Trigger the Modal -->
								<img id="myImg" src="<?php echo base_url('assets/uploads/'.$de_blog->img);?>" alt="Trolltunga, Norway" style="width: 464px;">
								<!-- The Modal -->
								<div id="myModal" class="modal">
									<!-- The Close Button -->
									<span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
									<!-- Modal Content (The Image) -->
									<img class="modal-content" id="img01">
									<!-- Modal Caption (Image Text) -->
									<div id="caption"></div>
								</div>
							</div>
							<div class="item-title">
								<h3 style="color: #337ab7;"><?php echo $de_blog->title?></h3>
								<a href="" style="font-size: 12px;color: #a7a1a1;"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $de_blog->date_crea?></a><b style="margin-left: 78px"> Comment</b><hr />
							</div>
							<div class="item-snippet" style="text-align: justify;"><?php echo $de_blog->bl_desc?></div>
						</div>
					</div>
				</div><!-- row blog detail -->
				<div class="row" style="margin-top: 20px;">
					<div class="col-xs-12 col-sm-6 col-md-12">
						<?php foreach ($blog_comment as $value) {?>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-1">
									<i class="fa fa-user" aria-hidden="true" style="font-size: 37px; color: rgba(51, 122, 183, 0.62);"></i>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-10">
									<div class="item-snippet">
										<?php echo $value->comment?>
									</div>
								</div>
							</div><hr />
						<?php }?>
					
						<form method="post">
						<?php if(form_error('title')){?>
		                    <div class="alert alert-danger alert-dismissible" role="alert">
		                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                        <strong>Warning!</strong> <?php echo form_error('title');?>
		                    </div>
		                <?php }?>
							<textarea id="title" required="" class="form-control"  name="title" placeholder="add a comment..."></textarea>
							<input type="hidden" value="<?php echo $de_blog->bl_id;?>" name="txt_bl_id" id="txt_bl_id"  class="form-control">
							<input style="margin:12px 0px;" type="submit" name="post"  class="btn btn-primary navbar-right" value="POST">
						</form>
					</div>
				</div><!-- class row comment -->
			</div><!--col-xs-12 col-sm-6 col-md-9-->

		  	<div class="col-xs-12 col-md-3" style="background: #e2e0e0;">
		  		<h4>Popular Posts</h4><hr/>
	 	  		<?php foreach ($popular_blog as  $value) { ?>
			  		<div class="item-content">
						<div class="item-thumbnail" style="float:left;">
							<a href="<?php echo base_url('blog/blog_detail/'.$value->bl_id.'/'.$value->title);?>">
								<img style=" margin-right: 10px; width: 90px;" src="<?php echo base_url('assets/uploads/'.$value->img);?>">
							</a>
						</div>
						<div class="item-title">
							<a href="<?php echo base_url('blog/blog_detail/'.$value->bl_id.'/'.$value->title);?>">
								<?php echo $value->title;?>
							</a>
						</div>
						<div >
							<a href="<?php echo base_url('blog/blog_detail/'.$value->bl_id.'/'.$value->title);?>">
							</a>
							<?php echo substr($value->bl_desc, 0, 0)."......";?>
						</div>
					</div><hr />
				<?php } ?>
		  	</div><!-- col-xs-12 col-md-3 for Popular Posts -->
		</div><!-- class row -->
	</div><!-- class container -->