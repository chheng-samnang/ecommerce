<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 $choose=$this->lang->line("choose_one");
?>
</nav>
        <div class="container_fluid" style="margin:40px 25px 0px 25px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
            <div class="row">                                           
                <div class="col-lg-12">
                    <?php if(isset($action)) echo form_open($action,"id='form'")?>
                    <h1 class="page-header"><?php echo $this->lang->line('add');?> <?php echo $pageHeader?></h1>                                
                    <div class="row">
                      <div class="col-lg-2"></div>
              <!--==== start col-lg-8 =====-->                    
                      <div class="col-lg-8">
                        <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h3 class="panel-title"><?php echo $this->lang->line('promotion')?></h3>
                              </div>
                              <div class="panel-body">
                                <div class="row">
                            <!--====Error msg ===-->
                                  <div class="col-lg-12">
                                    <span ng-show="msg_error"> 
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Warning!</strong> Please input form.                                                               
                                        </div>
                                    </span>
                                  </div>
                            <!--====End error msg ===-->
                                  <div class="col-lg-6">
                                    <label class="control-label"><?php echo $this->lang->line("date_from"); ?></label>
                                    <div class='input-group datetimepicker'>
                                         <?php echo form_input("txtFrom","",array("class"=>"form-control datetimepicker","ng-model"=>"txtFrom","id"=>"txtFrom"));?>                                          
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>                                
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                     <label class="control-label"><?php echo $this->lang->line("date_to"); ?></label>
                                    <div class='input-group datetimepicker'>
                                        <?php echo form_input("txtTo","",array("class"=>"form-control datetimepicker","ng-model"=>"txtTo","id"=>"txtTo"));?>                                          
                                        <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                        </span>                                
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label class="control-label"><?php echo $this->lang->line("store_name"); ?></label>
                                    <div class="form-group">                                  
                                       <select class="form-control" id="ddlStore" name="ddlStore" ng-model="ddlStore" ng-change="store()">
                                          <option value="" ><?php echo $choose; ?></option>                                                                                                                                                                                                                                                                    
                                          <?php foreach($stoe_name as $store){?>
                                              <option value="<?php echo $store->str_id;?>"><?php echo $store->str_name;?></option>
                                          <?php }?>                                            
                                       </select>  
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label class="control-label"><?php echo $this->lang->line("category"); ?></label>
                                    <div class="form-group">                                  
                                        <select class="form-control" id="ddlCategory" name="ddlCategory" ng-model="ddlCategory" ng-change="category()">
                                          <option value="" ><?php echo $choose; ?></option>                                                                                                                                                                                                                                                                    
                                          <?php foreach($product_cat as $product_cat1){?>
                                              <option value="<?php echo $product_cat1->cat_id;?>"><?php echo $product_cat1->cat_name;?></option>
                                          <?php }?>                                            
                                        </select>  
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label class="control-label"><?php echo $this->lang->line("promotion_occasion");?></label>
                                    <div class="form-group">
                                        <select class="form-control" name="ddlOcc" id="ddlOcc" ng-model="ddlOcc" ng-change="occasion()" ng-disabled="ddlOcc1">
                                          <option value=""><?php echo $choose; ?></option>
                                           <?php foreach($pro_occasion as $pro_occasion1){?>
                                              <option value="<?php echo $pro_occasion1->occ_id;?>"><?php echo $pro_occasion1->occ_name;?></option>
                                          <?php }?>                                            
                                        </select>   
                                    </div>
                                  </div>
                                   <div class="col-lg-6">
                                    <label class="control-label"><?php echo $this->lang->line("promotion_type");?></label>
                                    <div class="form-group">
                                       <select class="form-control" name="ddlType" id="ddlType" ng-model="ddlType">
                                          <option value=""><?php echo $choose; ?></option>
                                          <option value="d"><?php echo $this->lang->line("discount");?></option>
                                          <option value="a"><?php echo $this->lang->line("add_product") ?></option>                                                                                        
                                       </select>   
                                    </div>                                      
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="control-label"><?php echo $this->lang->line("promotion_name"); ?></label>                                        
                                      <?php echo form_input("txtProName","",array("class"=>"form-control","placeholder"=>$this->lang->line("promotion_name"),"ng-disabled"=>"pro_name","ng-model"=>"pro_name1","ng-blur"=>"pro_name2()"));?>                                                                                
                                    </div>
                                  </div>  
                                  <div class="col-lg-12" style="margin-top:10px;">                                    
                                    <?php echo form_button("btnCancel","".$this->lang->line('cancel')."",array("class"=>"btn btn-defualt pull-right","style"=>"margin-left:5px","id"=>"btnCancel"));?>
                                    <?php echo form_button("btn_go_product","".$this->lang->line('go_product')."",array("class"=>"btn btn-success pull-right","ng-click"=>"validation()"));?>                                   
                                  </div>
                                </div>
                            </div>
                          </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                      </div>
              <!--====end col-lg-8 ====-->
                      <div class="col-lg-2"></div>
                    </div>                                     
                    <?php echo form_close()?>
                </div>
            </div>
        </div>    
<script>
    $("#btnCancel").click(function(){
        window.location.assign('<?php echo base_url().$cancel?>');
    });

  // ------- start angularJS
        var app = angular.module('myApp',[]);
        app.controller('myCtrl',function($scope,$http)
        {                   
        $scope.txtFrom="<?php if(!empty($this->session->userdata['promotion'][0])) echo $this->session->userdata['promotion'][0]; else echo NULL;?>";
        $scope.txtTo="<?php if(!empty($this->session->userdata['promotion'][1])) echo $this->session->userdata['promotion'][1]; else echo NULL;?>";
        $scope.pro_name1="<?php if(!empty($this->session->userdata['promotion'][4])) echo $this->session->userdata['promotion'][4]; else echo NULL;?>";       

        //occasion
        $scope.occasion=function()
        {
          if($scope.ddlOcc==""){$scope.pro_name=false}
          else{$scope.pro_name=true}
        }
        //pro_name                
        $scope.pro_name2=function(){if($scope.pro_name1!="")$scope.ddlOcc1=true;else $scope.ddlOcc1=false;}          
        //validation
        $scope.validation = function()
        {     
          var d_from=document.getElementById("txtFrom").value;
          var d_to=document.getElementById("txtTo").value;                 
            if(              
                ((d_from==undefined || d_from=="") || 
                (d_to==undefined || d_to=="") ||
                ($scope.ddlCategory==undefined || $scope.ddlCategory=="")||                
                ($scope.ddlType==undefined || $scope.ddlType=="") || ($scope.ddlStore==undefined || $scope.ddlStore==""))
                ||
                (($scope.ddlOcc==undefined || $scope.ddlOcc=="") && ($scope.pro_name1==undefined || $scope.pro_name1==""))                                
              )
              {$scope.msg_error=true;}
            else
            {
              document.getElementById("form").submit();
            }

        }                
});  
  //-------- end angularJS
</script>