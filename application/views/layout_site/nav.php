<?php error_reporting(0)?>
<div class="row" id="nav_top" style="background-image: url(<?php echo base_url('assets/uploads/'.$template->key_data1)?>);
    background-repeat: repeat-x; background-color: white;">
    <div class="container" id="nav_container">
		<div class="col-md-3" style="">
		      <a href="<?php echo base_url('');?>"><img id="logo" src="<?php echo base_url('assets/uploads/logo.png');?>"></a>

		</div>

		<div class="col-sm-4 col-md-7" style="padding: 1px;">
			<div class="input-group">
			    <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('seacrh1')."..."?>" style="border-radius: 0px;" ng-model="searchBox"  >
			    <span class="input-group-btn">
			        <button class="btn btn-primary" type="button"> <span class="glyphicon glyphicon-search"></span></button>
			    </span>
			</div><!-- /input-group -->
		</div>
		<div class="col-md-2" style="">
            <div class="dropdown" style="float:right; margin-top: -14px;">
              <h3><a href="" style="text-decoration:none;" data-toggle="modal" data-target="#myModal" ng-click="displayCart()"><i class="glyphicon glyphicon-shopping-cart"></i> <span class="badge"><div id="itemNum">0</div></span></a></h3>
            </div>
        </div>
    </div>
</div><!-- /# logo, Search and My Cart-->
    <nav id="" class="navbar navbar-default">
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
	                <li class="active"><a href="<?php echo base_url('');?>"><?php echo $this->lang->line('home')?></a></li>
	                <li><a href="<?php echo base_url('Product');?>"><?php echo $this->lang->line('product')?></span></a> </li>
                    <?php 
                     $en ="english";
                     $kh ="khmer";
                     $ch ="chinese";
                     $default = "default";
                        switch ($default) {
                            case 'default':
                                    $default ="default";
                                break;
                            case 'english':
                                  $en = "english";
                                break;
                            case 'khmer':
                                    $kh = "khmer";
                                break;
                            case 'chinese':
                                    $ch = "chinese";
                                break;
                            default:
                                # code...
                                break;
                        }
                    ?>
                    <style type="">
                            #lllllll{ display: none; }
                             #kh{ display: none; }
                             #ch{ display: none; }
                             .nav{height: 50px; }
                    </style>
                     <li ng-repeat="x in categories">
                        <a href="" ng-click="loadProduct_by_Cat(x.Id)" id="<?php  if($this->session->site_lang=="english"){ echo "lllllll";}elseif($this->session->site_lang=="khmer"){ echo "kh";}elseif($this->session->site_lang=="chinese"){ echo "ch";} ?>" class="<?php  if($default=="default"){ echo $default;}elseif($en=="english"){ echo $en;}elseif($kh=="khmer"){ echo "kh";}elseif($ch=="chinese"){ echo "ch";} ?>"> {{x.Name}}</a>
                        <a href="" ng-click="loadProduct_by_Cat(x.Id)">
                        <!-- <?php echo $this->session->site_lang?> -->
                            <?php  if($this->session->site_lang=="english"){?>
                                                {{x.Name}}
                                   
                                
                            <?php }elseif( $this->session->site_lang=="khmer"){?>
                                                {{x.Cat_Name_kh}}
                        
                            <?php }elseif($this->session->site_lang=="chinese"){?>
                                                {{x.Cat_Name_ch}}
                            <?php }?>
                        </a>
                    </li>

	            </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('about');?>" ><?php echo $this->lang->line('about')?></a></li>
                    <li><a href="<?php echo base_url('contact');?>"><?php echo $this->lang->line('contact')?></a></li>
                    <li><a href="<?php echo base_url('blog');?>" target="blak"><span class="glyphicon glyphicon-user"></span> <?php echo $this->lang->line('blog')?></a></li>

                </ul>
	        </div>
    	</div><!-- /.container-fluid -->
	</nav>
<!-- <script src="<?php echo base_url()?>assets/bower_components/bootstrap/js/angular.min.js"></script> -->
<script>
    var app = angular.module('myApp',[]);
    app.controller('myCtrl',function($scope,$http){

        $http.get("/ecommerce/ng/get_all_products.php")
        .then(function (response) {$scope.get_product = response.data.records;});

        $http.get("/ecommerce/ng/get_category.php")
        .then(function (response) {$scope.categories = response.data.records;});

        $scope.loadProduct_by_Cat = function(values)
        {
        $http.get("/ecommerce/ng/loadProduct_by_Cat.php?cat_id="+values)
        .then(function (response) {$scope.get_product = response.data.records;});
        }

        $scope.btnAdd = function(name,id,qty,str)
        {
            var xmlhttp = new XMLHttpRequest();
            var xmlhttp2 = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()
             {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("itemNum").innerHTML = this.responseText;
                }
            };
            xmlhttp2.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("display_cart").innerHTML = this.responseText;
                }
            }

            xmlhttp.open("GET", "<?php echo base_url()?>product_c/add_to_cart/"+ name + "/" + id+"/"+qty+"/"+str, true);
            xmlhttp.send();

            xmlhttp2.open("GET", "<?php echo base_url()?>product_c/display_cart", true);
            xmlhttp2.send();
        }
        $scope.removeItem = function(id)
        {
            alert(id);
        }

        $scope.checkout = function()
        {
            window.location.assign("product_c/checkout");
        }
        $scope.itemNum = 1;
});
</script>
<script type="text/javascript">

    function itemRemove(id)
    {
        var xmlhttp = new XMLHttpRequest();
        var xmlhttp2 = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("itemNum").innerHTML = this.responseText;
                }
            };
        xmlhttp2.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display_cart").innerHTML = this.responseText;
                }
            };

        xmlhttp.open("GET", "<?php echo base_url()?>product_c/remove_item/"+ id, true);
        xmlhttp.send();

        xmlhttp2.open("GET", "<?php echo base_url()?>product_c/display_cart", true);
        xmlhttp2.send();
    }
</script>
