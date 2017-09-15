<?php
    if(!isset($this->session->userLogin))
    { redirect("logout"); }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Digital Market</title>

    <!-- Bootstrap Core CSS -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/uploads/mobile-cart-icon.png');?>">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/bootstrap-datetimepicker.css">
    <link href="<?php echo base_url()?>assets/drowdown/jquery-select7.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/style/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/moment-with-locals.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>

    <style>
        .border:hover{border:solid 1px blue;}
        .borders{border:solid 1px blue;}
        #page-wrapper{background-color:#fbfbfb;}
        .panel-default{box-shadow: 2px 5px 5px #888888;}
        .panel-primary{box-shadow: 2px 5px 5px #888888;}
        .select7__option_current::before {display: none;}
    </style>
</head>

<body style="font-family: Khmer OS Battambang;">
    <div id="wrapper" style="margin-top: 40px;">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('main');?>"><i class="fa fa-user"></i> Online Digital Market</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <?php echo $this->lang->line('changes_language')?>
                <select class="select7" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
                    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/uploads/en.png');?>"><?php echo $this->lang->line("english"); ?></option>
                    <option value="khmer" <?php if($this->session->userdata('site_lang') == 'khmer') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/leng/Cambodia.png')?>"><?php echo $this->lang->line("khmer");?>  </option>
                    <option disabled="" value="chinese" <?php if($this->session->userdata('site_lang') == 'chinese') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/leng/China.gif')?>"><?php echo $this->lang->line("chinese") ?></option>
                </select>
                <li><strong><?php echo $this->lang->line('welcome');?> <?php echo strtoupper($this->session->userLogin)?></strong></li>
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="fa fa-cog" aria-hidden="true"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url()?>" target="blak"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $this->lang->Line("preveiw");?></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url()?>logout"><i class="fa fa-sign-out fa-fw"></i>​ <?php echo $this->lang->line("logout"); ?></a>
                        </li>
                    </ul><!-- /.dropdown-user -->
                </li><!-- /.dropdown -->
            </ul><!-- /.navbar-top-links -->
