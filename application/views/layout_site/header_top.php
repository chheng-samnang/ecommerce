<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/uploads/mobile-cart-icon.png');?>">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/animate_category.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/moment-with-locals.js"></script>
    <link href="<?php echo base_url('assets/dist/css/bootstrap-datetimepicker.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/style/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php echo base_url()?>grid and list/css/component.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/drowdown/jquery-select7.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url('assets/dist/js/bootstrap-datetimepicker.js');?>"></script>
    <script src="<?php echo base_url()?>assets/bower_components/bootstrap/js/angular.min.js"></script><div class="row">
    <style media="screen">
      .select7__current
      {
        width: 106px;
      }
    </style>
</head>
<body ng-app="myApp" ng-controller="myCtrl" ng-init="cartItem=0" ng-cloak>
    <noscript>
        <div class="col-md-4 col-sm-offset-4">
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-body">
                   <div style="border-bottom:1px solid #d2d2d2; padding: 10px;">
                        <h4 style="font-weight: bold;">JavaScript Required</h4>
                   </div>
                   <p style="padding: 10px; color: red;">Please enable JavaScript on your web browser!</p>
                </div>
            </div>
        </div><!-- JavaScript enable on  browser-->
        <style type="text/css">
            #main-content { display:none; }
            #myDropdown a:hover{ color: red; }
        </style>
    </noscript>

    <div id="main-content">
        <nav  class="navbar-default navbar-fixed-top">
                    <div class="container" style="color: #fff;">
                        <div class="col-md-6" style=" margin-top: 10px;">
                            <span class="glyphicon glyphicon-earphone"></span> +885 969724745 ||
                            <span class="glyphicon glyphicon-envelope"></span> info@gmail.com
                        </div>
                        <div class="col-md-6" style="">
                	       <div class="navbar-right">
                                <a class="" href="<?php echo base_url()?>memberLogin" style="text-decoration: none; color: white; margin-right: 20px;" ><i class="fa fa-unlock-alt"></i> <?php echo $this->lang->line('login')?></a>
                                <a href="<?php echo base_url('product/registerMember')?>"  style="color: #fff; margin-right: 20px;"><i class="fa fa-user"></i> <?php echo $this->lang->line('register')?>  </a>
                                <select class="select7" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
                                    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/uploads/en.png');?>"><p style="color: red">English</p></option>
                                    <option value="khmer" <?php if($this->session->userdata('site_lang') == 'khmer') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/leng/Cambodia.png')?>">Khmer</option>
                                    <option  value="chinese" <?php if($this->session->userdata('site_lang') == 'chinese') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/leng/China.gif')?>">Chinese</option>
                                </select>
                            </div>
                        </div>
        	        </div>
                </div>
            </div>
        </nav>
</body>
</html>
