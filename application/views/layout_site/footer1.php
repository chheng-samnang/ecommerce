<style>
	@charset "utf-8";
/* CSS Document */
#elevator_item {
width: 60px;
height: 100px;
position: fixed;
right: 15px;
bottom: 10px;
-webkit-transition: opacity .4s ease-in-out;
-moz-transition: opacity .4s ease-in-out;
-o-transition: opacity .4s ease-in-out;
opacity: 1;
z-index: 100020;
display: none;
}

#elevator {
display: block;
width: 60px;
height: 50px;
background: url(<?php echo base_url('assets/uploads/icon_top.png');?>) center center no-repeat;
background-color: #444;
background-color: rgb(255, 152, 0);
border-radius: 2px;
box-shadow: 0 1px 3px rgba(0,0,0,.2);
cursor: pointer;
margin-bottom: 10px
}
#elevator:hover {
background-color: rgba(255, 152, 0, 0.37);
}
#elevator:active {
background-color: #C6C
}

</style>
<footer id="footer">
	<div class="footer">
		<div class="container">
			<div class="social-icon">
				<div id="bottom2" class="col-md-4 col-sm-6 yt-bottom">
					<div class="module  ">
					    <h3 class="modtitle">Buy and Sell</h3>
					    <div class="modcontent clearfix">
							<ul class="menu ">
								<li class="item-0">
									<p>Registration</p>
								</li>
								<li class="item-1">
									<p>Stores</p>
								</li>
								<li class="item-2">
									<p>Start selling</p>
								</li>
								<li class="item-3">
									<p>Business sellers</p>
								</li>
								<li class="item-4">
									<p>Learn to sell</p>
								</li>
							</ul>
					    </div>
					</div> 
				</div>
				<div id="bottom2" class="col-md-4 col-sm-6 yt-bottom">
					<div class="module  ">
					    <h3 class="modtitle">Location and Contacts</h3>
					    <div class="modcontent clearfix">
							<ul class="menu ">
								<li class="item-0">
									<p><i class="fa fa-map-marker" aria-hidden="true"></i> About Us</p>
								</li>
								<li class="item-1">
									<p><i class="fa fa-phone" aria-hidden="true"> Phone: </i> 093 334 455 / 097 342 234</p>
								</li>
								<li class="item-2">
									<p><i class="fa fa-envelope-o" aria-hidden="true"> Email: </i> ecommerce@gmail.com</p>
								</li>
								<li class="item-3">
									<p><i class="fa fa-globe" aria-hidden="true"> Website: </i> www.ecommerce.com</p>
								</li>
								
							</ul>
					    </div>
					</div> 
				</div>

				<div id="bottom2" class="col-md-4 col-sm-6 yt-bottom">
					<div class="module  ">
					    <h3 class="modtitle">Payment Options</h3>
					    <div class="modcontent clearfix">
							<ul class="menu ">
								<li class="item-4">
									<img src="<?php echo base_url('assets/uploads/make_a_website_donation.gif')?>">
								</li>
							</ul>
					    </div>
					</div> 
				</div>
			</div><!-- this social  -->	
		</div><!-- this container -->
		<div class="col-lg-12 btn-default" style="border-top:1px solid #d4d4d4">	
			<div class="container">
				<div class="col-lg-5"><h5>© Copyright 2017. E-Commerce in Cambodia</h5></div>
				<div class="pull-right">
					<a href="#home" class="scrollup"><h4>Develop By WebTech Solution</h4></a>
				</div>
			</div>
		</div>				
	</div>
</footer>
	<div id="elevator_item"> 
		<a id="elevator" onclick="return false;" title="Back To Top"></a> 
	</div>
</div>

<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>grid and list/js/classie.js"></script>
<script src="<?php echo base_url()?>grid and list/js/cbpViewModeSwitch.js"></script>
<script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
 <script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>grid and list/js/classie.js"></script>
<script src="<?php echo base_url()?>grid and list/js/cbpViewModeSwitch.js"></script>
 <script src="<?php echo base_url()?>assets/drowdown/jquery-select7.js"></script>
<script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
    <script>
	    $(function() {
			$(window).scroll(function(){
				var scrolltop=$(this).scrollTop();		
				if(scrolltop>=90){		
					$("#elevator_item").show();
				}else{
					$("#elevator_item").hide();
				}
			});		
			$("#elevator").click(function(){
				$("html,body").animate({scrollTop: 1}, 1200);	
			});	
		});//function Scroll to Top
        
        // tinymce.init({
        //   selector: 'textarea',
        //   imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
        //   content_css: [
        //     '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
        //     '//www.tinymce.com/css/codepen.min.css'
        //   ]
        // });
         $(".select7").select7()
    </script>