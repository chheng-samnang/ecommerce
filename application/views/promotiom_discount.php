<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
#get session cat_id and store id
$cat_id=$this->session->userdata["promotion"][2];
$str_id=$this->session->userdata["promotion"][6];
?>
</nav>
        <div class="container_fluid" style="margin:40px 25px 0px 25px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
            <div class="row">                                           
                <div class="col-lg-12">
                    <?php if(isset($action)) echo form_open($action,"id='form' name='form'")?>
                    <!-- <b class="page-header">Form Add <?php echo $pageHeader?></b> -->
              <!--==== start error =====-->
                    <div class="row">
                        <div class="col-lg-6 ">                      
                          <span ng-show="error_p_dublicate"> 
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Warning!</strong>{{msg}}                                                               
                            </div>
                          </span>                        
                        </div>              
                    </div>                    
              <!--==== end msg error =====-->                    
                    <div class="row">
              <!--==== product list =====-->                    
                      <div class="col-lg-6">
                         <div class="row">
                           <div class="col-lg-12">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $this->lang->line('promotion_list')?></h3>
                                </div>
                                <div class="panel-body" style="overflow:scroll; height:320px; overflow-x: hidden;">
                                  <div class="row">                                   
                                    <div class="col-lg-2" ng-repeat="x in product" ng-click="validation(x.P_id,x.P_name,x.Path)">
                                      <div class="thumbnail" style="margin-bottom: 0px">                                                                                         
                                        <img src="<?php echo base_url('assets/uploads/{{x.Path}}"');?>" style="width:100px; height:60px;">
                                      </div>                                                                                                                     
                                      <small style="font-size:10.5px">{{x.P_name}}</small>                                      
                                    </div>                                   
                                  </div>
                                </div>
                            </div>
                           </div>
                         </div>

                         <div class="row">
                         <!--==check all product -->
                         <div class="col-lg-4">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" ng-model="check_all" ng-click="check_all1()" ng-disabled="enable"> Selecte promotion all.
                              </label>
                            </div>
                         </div>
                         <!--==end check all product -->
                          <div class="col-lg-4">
                            <span class="pull-right" style="color:red; margin-top:6px;" ng-show="error">Please enter percent just number only!</span>                        
                          </div>
                          <div class="col-lg-4">
                            <div class='input-group'>
                                 <?php echo form_input("txtPercent",set_value("txtPercent"),array("class"=>"form-control","placeholder"=>"Enter percent","ng-model"=>"percent","id"=>"set_focus"));?>                                          
                                <span class="input-group-addon">%</span>                                
                            </div>
                          </div> 
                         </div>  
                      </div>
              <!--=== end product list ==== -->

              <!--==== product selected promotion =====-->                    
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                  <div class="panel panel-default">
                                      <div class="panel-heading">
                                          <h3 class="panel-title"><?php echo $this->lang->line('promotion_select')?></h3>
                                      </div>
                                      <div class="panel-body" style="overflow:scroll; height:320px; overflow-x: hidden;">
                                        <div class="row">                                        
                                          <div class="col-lg-2" ng-repeat="x in promotion_selected" ng-click="remove($index)">
                                            <div class="thumbnail"  style="margin-bottom: 0px">                                                                                                                                                                                       
                                              <input type="hidden" ng-value="{{x[0]}}" ng-model="txtP_id" name="txtP_id">
                                              <input type="hidden" ng-value="{{x[3]}}" ng-model="txtPercent">                                                                                                                                                                                    
                                              <img src="<?php echo base_url('assets/uploads/{{x[2]}}"');?>"  style="width:100px; height:60px;">                                              
                                            </div>
                                              <small style="font-size: 10.5px">
                                                <span class="pull-left">{{x[1]}}</span>
                                                <span style="color:red;" class="pull-right">{{x[3]}}%</span>
                                              </small>
                                          </div>                                                                                    
                                          <input type="text" name="str" ng-model="str" id="str" value="" style="visibility: hidden;">
                                        </div>
                                      </div>
                                  </div>  
                                </div>
                            </div>
                            <div class="row">                             
                              <div class="col-lg-12">
                                  <?php echo form_button("btnCancel","".$this->lang->line('cancel')."",array("class"=>"btn btn-defaul pull-right","style"=>"margin-left:10px","id"=>"btnCancel"))?>
                                  <?php echo form_button("btnAdd","".$this->lang->line('add')."",array("class"=>"btn btn-success pull-right","ng-click"=>"add_discount()","id"=>"btnAdd"))?>
                              </div>
                            </div>                          
                        </div>
            <!--=== end product selected promotion ==== -->  
                      </div>                  
                    <?php echo form_close()?>
                </div>
            </div>
        </div>    
<script>
    $("#btnCancel").click(function(){
        window.location.assign("<?php echo base_url('admin/memberLogin/add_promotion')?>");
    });
</script>

<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {
  //validation check_all
  $scope.check_all1=function()
  {
    if($scope.percent==undefined || $scope.percent==""){$scope.check_all=false;$scope.error=true;document.getElementById("set_focus").focus();}
    else
    {
      $scope.error=false;
      if($scope.check_all==true)
      {
        $http.get("<?php echo base_url();?>/ng/get_promotion_category.php?cat_id="+"<?php echo $cat_id;?>"+"&str_id="+"<?php echo $str_id;?>"+"")
      .then(function (response)
        { 
          var a = response.data.records;
          for(x in a)
          {
            arr[x]=[];
            arr[x][0]=a[x]['P_id']; 
            arr[x][1]=a[x]['P_name'];
            arr[x][2]=a[x]['Path'];
            arr[x][3]=$scope.percent;   
            $scope.promotion_selected = arr;
             $scope.str=JSON.stringify($scope.promotion_selected);           
          }                        
        });  
      }        
      else
      {
        $http.get("<?php echo base_url();?>/ng/get_promotion_category.php?cat_id="+"<?php echo $cat_id;?>"+"&str_id="+"<?php echo $str_id;?>"+"")
      .then(function (response)
        { 
          var a = response.data.records;
          for(x in a)
          {
            $scope.promotion_selected.splice(0,x);  
              arr1.splice(0,x);
               $scope.str=JSON.stringify($scope.promotion_selected);                                                
          }                        
        }); 
      }
    } 
  };
  //get all product      
      $http.get("<?php echo base_url();?>/ng/get_promotion_category.php?cat_id="+"<?php echo $cat_id;?>"+"&str_id="+"<?php echo $str_id;?>"+"")    
      .then(function (response) {$scope.product = response.data.records;});         
  //validation percent
      var arr = [];
      var arr1 =[];
      var i = 0;
      $scope.validation=function(p_id,p_name,path)
      {
        if(($scope.percent==undefined) || (!(Number.isInteger(Number($scope.percent)))||$scope.percent=="")){$scope.error=true;document.getElementById("set_focus").focus();}
        else
        {
          $scope.error=false;
          $scope.error_p_dublicate=false;

          var result = arr1.indexOf(p_id);
          arr1[i] = p_id;        
          if(result==-1)
          {            
            arr[i] = [];
            arr[i][0] = p_id;
            arr[i][1] = p_name;
            arr[i][2] = path;
            arr[i][3] = $scope.percent;
            $scope.promotion_selected = arr;   
            i = i+1;
            $scope.str=JSON.stringify($scope.promotion_selected);
          }else
          {
             $scope.error_p_dublicate=true;$scope.msg=" This Promotion is already.";
          }
        }
      }                         
    
 //remove product promotion from product discout list       
      $scope.remove=function(index)
      {
          if(index!==undefined)
          {
              $scope.promotion_selected.splice(index,1);  
              arr1.splice(index,1);            
              i = i-1;
              $scope.str=JSON.stringify($scope.promotion_selected);
          }
      }
//add discount
      
      $scope.add_discount=function()
      {
        if($scope.str==undefined || $scope.str=="[]"){$scope.error_p_dublicate="true";$scope.msg=" Please select promotion.";}        
        else{document.getElementById("form").submit();}
      }                       
  });//-------- end angularJS
</script>