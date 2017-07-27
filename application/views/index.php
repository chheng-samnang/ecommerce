<?php include("layout/header_top.php");?>
<?php include("layout/nav_top.php");?>
<div class="container">
    <?php include("layout/category.php");?>
    <div class="col-xs-6 col-md-9" style="padding: 0px; margin-bottom: 35px;">
        <!-- <img src="photo/ecommerce.jpg" style="width: 115%"> -->
        <?php include("slidshow.php");?>
    </div>
</div>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<style type="text/css">
	.thumbnail{
		border-radius: 0px;
	}
	li{
		list-style-type: none;
	}
    .box:hover .image {
        -webkit-transform:scale(1.3);
        transform:scale(1.3);
        cursor: pointer;
        }
        .box {
        overflow:hidden;
        width: 253px;
        //height: 227px;
        }
        .image {
        -webkit-transition: all 0.7s ease;
        transition: all 0.7s ease;
        max-width: 59%;
        }
        .navbar-default{
            background-image: linear-gradient(to bottom, #ff6a00 0%, #f59c5d 100%);
        }
</style>
<body>
	<div class="container">
        <div class="col-lg-3">
            <h4 style="background: #ff6a00; padding: 8px;">BESTSELLER</h4>
            <div class="container">    
                <div id="myCarousel" class="vertical-slider carousel vertical slide col-md-3" data-ride="carousel">
            <div class="row">
                <div class="col-md-4">
                      
                </div>
                <div class="col-md-8"> 
                </div>
            </div>
            <br />
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="col-xs-6 col-sm-5 col-md-5">
                            <a href="http://dotstrap.com/"> <img src="http://placehold.it/150x150" class="thumbnail"
                                alt="Image" /></a>
                                <p> 2 Medium pizza + 2 soda only $15.99.</p>
                        </div>
                       
                    </div>
                    <!--/row-fluid-->
                </div>
                <!--/item-->
                <div class="item ">
                    <div class="row">
                        <div class="col-xs-6 col-sm-5 col-md-5">
                            <a href="http://dotstrap.com/"> <img src="http://placehold.it/150x150" class="thumbnail"
                                alt="Image" /></a>
                                <p>
                                      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                            euismod tincidunt ut laoreet..
                                </p>
                        </div>
                        
                    </div>
                    <!--/row-fluid-->
                </div>
                <!--/item-->
                <div class="item ">
                    <div class="row">
                      <div class="col-xs-6 col-sm-5 col-md-5">
                            <a href="http://dotstrap.com/"> <img src="http://placehold.it/150x150" class="thumbnail"
                                alt="Image" /></a>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                            euismod tincidunt ut laoreet..
                                </p>
                        </div>
                        
                    </div>
                    <!--/row-fluid-->
                </div>
                <!--/item-->
            </div>
               
                <!--containt-->
            </div>
        </div>
    </div><!-- Bast Sall -->
        <div class="container">
            <div class="col-lg-9" style="padding:1px; margin-top: -180px;">
                <div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 10px;">
                    <a href="/ecommerce/product_page.php" class="thumbnail" style="" title="More Detail...">
                        <img src="/ecommerce/img/2-4.png" style="height: 180px;">
                        <p style="margin-top: 8px; border-top: solid 1px #c6c6c6;">Cake</p>
                        <p style="color: red">Price: $12</p>
                    </a>
                </div>
                <div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 10px;">
                    <a href="/ecommerce/product_page.php" class="thumbnail" style="" title="More Detail...">
                        <img src="/ecommerce/img/2-4.png" style="height: 180px;">
                        <p style="margin-top: 8px; border-top: solid 1px #c6c6c6;">Cake</p>
                        <p style="color: red">Price: $12</p>
                    </a>
                </div>
                <div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 10px;">
                    <a href="/ecommerce/product_page.php" class="thumbnail" style="" title="More Detail...">
                        <img src="/ecommerce/img/2-4.png" style="height: 180px;">
                        <p style="margin-top: 8px; border-top: solid 1px #c6c6c6;">Cake</p>
                        <p style="color: red">Price: $12</p>
                    </a>
                </div>
                <div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 10px;">
                    <a href="/ecommerce/product_page.php" class="thumbnail" style="" title="More Detail...">
                        <img src="/ecommerce/img/2-4.png" style="height: 180px;">
                        <p style="margin-top: 8px; border-top: solid 1px #c6c6c6;">Cake</p>
                        <p style="color: red">Price: $12</p>
                    </a>
                </div>
                 <div class="col-zm-3 col-sm-3 col-md-3 col-lg-3" style="padding: 10px;">
                    <a href="/ecommerce/product_page.php" class="thumbnail" style="" title="More Detail...">
                        <img src="/ecommerce/img/2-4.png" style="height: 180px;">
                        <p style="margin-top: 8px; border-top: solid 1px #c6c6c6;">Cake</p>
                        <p style="color: red">Price: $12</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include("layout/footer.php");?>
<script type="text/javascript">
    $(document).ready(function () {

    $('.btn-vertical-slider').on('click', function () {
        
        if ($(this).attr('data-slide') == 'next') {
            $('#myCarousel').carousel('next');
        }
        if ($(this).attr('data-slide') == 'prev') {
            $('#myCarousel').carousel('prev')
        }

    });
});
</script>



