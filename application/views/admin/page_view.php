<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <?php if(isset($pageHeader)){echo $pageHeader;}?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row"><!--add and search-->
            <div class="col-lg-2">
                <a href="<?php if(isset($action_url)){echo base_url($action_url[0]);}?>" class="btn btn-success" style="margin-bottom:5px;"><?php echo $this->lang->line('add')?> <?php if(isset($page_header)){echo $page_header;}?></a>
            </div>                    
        </div>
        <div class="row">
            <div class="col-lg-12"><!--table-->                        
                <div class="panel panel-primary"><!--panel-->
                    <div class="panel-heading"><?php if(isset($pageHeader)){echo $pageHeader;}?> </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-hover" id="mydata">
                        <thead>
                            <tr>
                                <?php if(isset($tbl_hdr))
                                {
                                    echo "<th>".$this->lang->line("no").".</th>";
                                    foreach($tbl_hdr as $th){echo "<th>".$th."</th>";}
                                    echo "<th>".$this->lang->line("action")."</th>";
                                }?>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;if(!empty($tbl_body[0])){foreach($tbl_body as $body)
                            {
                                echo "<tr>";                                    
                                    echo "<td>".$i."</td>";
                                    $j=0;
                                    foreach($tbl_hdr as $th)
                                    {
                                        echo "<td>".$body[$j]."</td>";
                                        $j++;
                                    }
                                    echo "<td>";
                            ?>
                                        <?php if(isset($action_url[3])){ ?><a href="<?php if(isset($action_url)){echo base_url($action_url[3]).'/'.$body[$j];}?>" style="margin-right:5px" title="<?php echo $this->lang->line("change_password");?>"><i class="fa fa-lock"></i></a><?php }?>
                                        <?php if(isset($action_url[1])){ ?><a href="<?php if(isset($action_url)){echo base_url($action_url[1]).'/'.$body[$j];}?>" style="margin-right:5px" title="<?php echo $this->lang->line("edit");?>"><i class="fa fa-pencil" style="font-size: 20px"></i></a><?php }?>
                                        <?php if(isset($action_url[2])){ ?><a href="<?php if(isset($action_url)){echo base_url($action_url[2]).'/'.$body[$j];}?>" class="btn btn-large confirModal del" title="<?php echo $this->lang->line("delete"); ?>" data-confirm-title="<?php echo $this->lang->line("confirm_delete"); ?> !" data-confirm-message="<?php echo $this->lang->line("sms_delete");?>"><i class="fa fa-trash"  style="color: red; font-size: 20px"></i></a></a><?php }?>                                        
                            <?php
                                    echo "</td>";                                    
                                echo "</tr>";
                            $i++;}}?>                            
                        </tbody>                         
                        </table>
                    </div>
                </div><!--end panel-->    
            </div><!--end table -->
            
        </div>        
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<script>
    $(document).ready(function(){
        //data table
        $('#mydata').DataTable();
        //comfirm delete
        $('.del').confirmModal(); 
    });
</script>  
</body>
</html>

