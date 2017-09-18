
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
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Bast Sall -->
        <div class="col-lg-9" style="padding: 1px; margin-top: -180px;">
            <div class="container">
                <div class="col-lg-9" style="padding:1px; margin-top: -380px;">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
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



