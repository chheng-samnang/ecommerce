<?php
    if(!isset($this->session->userLogin))
    { redirect("logout");}
    include("ng/db.php");
    $st_id="";
    $ord_id="";
    $mem_id="";
    $wallet_id="";

    $sql = "SELECT COUNT(st_id) AS value FROM tbl_staf WHERE admin_status='0'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {$row = mysqli_fetch_assoc($result) ;
        $st_id = $row["value"];
    }

    $sql1 = "SELECT COUNT(ord_id) AS value1 FROM tbl_order_hdr";
    $r1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($r1) > 0) { $row = mysqli_fetch_assoc($r1);
        $ord_id = $row["value1"];
    }

    $sql2 = "SELECT COUNT(mem_id) AS value2 FROM tbl_member WHERE mem_status='0'";
    $r2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($r2) > 0) { $row = mysqli_fetch_assoc($r2);
        $mem_id = $row["value2"];
    }
    $sql3 = "SELECT COUNT(wal_tran_id) AS value3 FROM tbl_wallet_transaction WHERE tran_status='0'";
    $r3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($r3) > 0) { $row = mysqli_fetch_assoc($r3);
        $wallet_id = $row["value3"];
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

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
        .list{
            list-style-type: none;
        }
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
            <div>
                 <ul style="margin-top:15px">
                    <li class="dropdown notifications-menu" style="list-style-type:none;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
                          <span class="label label-danger"><?php echo $st_id+$ord_id+$mem_id+$wallet_id; ?></span>
                        </a>
                        <ul class="dropdown-menu" style="margin-left:6%; margin-top:1%; padding:12px">
                            <li class="header" style="color:#0036ad">You have <?php echo $st_id+$ord_id+$mem_id+$wallet_id; ?> notifications</li>
                                <li>
                                    <ul class="menu">
                                        <?php if($st_id!=""){ ?>
                                        <li class="list">
                                            <a href="<?php echo base_url();?>admin/member_c"><i class="fa fa-users text-aqua"></i> <?php echo $st_id; ?> new staff</a>
                                        </li>
                                        <?php
                                            }
                                        if($mem_id!=""){
                                            ?>
                                        <li class="list">
                                            <a href="<?php echo base_url();?>/admin/wallet_c"><i class="fa fa-users text-aqua"></i> <?php echo $mem_id; ?> new member</a>
                                        </li>
                                        <?php }
                                        if($ord_id!=""){ ?>
                                        <li class="list">
                                            <a href="<?php echo base_url();?>admin/orderController"><i class="fa fa-users text-aqua"></i> <?php echo $ord_id; ?> new order customer</a>
                                        </li>
                                        <?php }
                                        if($wallet_id!=""){
                                        ?>
                                        <li class="list">
                                            <a href="<?php echo base_url();?>admin/wallet_c"><i class="fa fa-users text-aqua"></i> <?php echo $wallet_id; ?> new wattel</a>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </li>
                        </ul>
                    </li>
                </ul>
            </div>
