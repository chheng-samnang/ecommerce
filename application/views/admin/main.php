<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?php echo base_url('assets/canvas/canvas.min.js')?>"></script>   
<script type="text/javascript">
     $(function () {
            var chart1 = new CanvasJS.Chart("chartStock",
            {
                animationEnabled: true,
                theme: "theme2",
                exportEnabled: true,
                title:{
                    text: '<?php echo $this->lang->line("category"); ?>'
                },
                data: [
                {
                    type: "column", //change type to bar, line, area, pie, etc                   
                    indexLabel: "{y}",                    
                    dataPoints: <?php echo json_encode($cat_and_pro, JSON_NUMERIC_CHECK); ?>                                     
                }
                ]
            });

            chart1.render();
        });
</script>>

<div class="row">
    <div class="col-lg-10 col-lg-offset-2">
        <h1 class="page-header">Main Form</h1>
        <div class="col-lg-2 col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa fa-bookmark fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><?php echo $this->lang->line("stock"); ?></div>
                            <div class="huge"><?php echo $stock;?></div>
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $this->lang->line("total");?></span>
                        <span class="pull-right"><?php echo $stock;?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
       <div class="col-lg-2 col-md-5">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list-alt fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><?php echo $this->lang->line("stoee"); ?></div>
                            <div class="huge"> <?php echo $store; ?></div>                            
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $this->lang->line("total");?></span>
                        <span class="pull-right"><?php echo $store?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-5">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-outdent fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><?php echo $this->lang->line("inventory"); ?></div>
                            <div class="huge"><?php echo $inventory;?></div>
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $this->lang->line("total"); ?></span>
                        <span class="pull-right"><?php echo $inventory;?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <?php  $dollar=0; $riels=0;
            if(isset($grand_total))
            {   
                foreach ($grand_total as $value) {
                    if($value->cash_currency=='d'){
                      $dollar+=$value->grand_total;
                    }elseif ($value->cash_currency=='r') {
                       $riels+=$value->grand_total;
                    }
                }
            }
        ?>
        <div class="col-lg-2 col-md-5">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                         <div class="col-xs-3">
                            <i class="fa-3x fa fa-inbox" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><?php echo $this->lang->line("order"); ?></div>
                            <div class="huge"><?php echo $order;?></div>
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $this->lang->line("new");?></span>
                        <span class="pull-right"><?php echo $order;?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa-3x fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><?php echo $this->lang->line("new_member");?></div>
                            <div class="huge"><?php echo $new_mem;?></div>
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $this->lang->line("all");?></span>
                        <span class="pull-right"><?php echo $member?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-5">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-home fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><?php echo $this->lang->line("wallet");?></div>
                            <div class="huge"><?php  //echo $all_room;?></div>                            
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $this->lang->line("new");?></span>
                        <span class="pull-right"><?php // echo $all_room;?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
          <div class="col-lg-5">
            <div class="panel panel-default"  style="height:470px;">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i><?php echo $this->lang->line("category").$this->lang->line("and").$this->lang->line("product"); ?></h3>
                </div>
                <div class="panel-body">
                    <div id="chartStock"></div>                                                   
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i><?php echo $this->lang->line("order"); ?></h3>
                </div>
                <div class="panel-body" style="overflow:scroll; height:450px">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th><?php echo $this->lang->line("order_code"); ?></th>
                                <th><?php echo $this->lang->line("order_date"); ?></th>
                                <th><?php echo $this->lang->line("member_name"); ?></th>
                                <th><?php echo $this->lang->line("product_name"); ?></th>
                            </tr>
                            <?php 
                            if($order_pro!=""){
                            foreach ($order_pro as $value) {
                             ?>
                            <tr>
                                <td><?php echo $value->ord_code; ?></td>
                                <td><?php echo $value->ord_date; ?></td>
                                <td><?php echo $value->mem_name; ?></td>
                                <td><?php echo $value->p_name; ?></td>
                            </tr>
                            <?php }} ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-search fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><?php echo $this->lang->line("visitor"); ?></div>                                                         
                        </div>
                    </div><p></p>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php include("count_visitor.php") ?>
                        </div>                            
                    </div>
                </div>                      
            </div>
        </div>
    </div>

</div>
