<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/bootstrap-datetimepicker.css">
    <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/moment-with-locals.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
</nav>
        <div class="container_fluid" style="margin:40px 25px 0px 25px;" ng-app="myApp" ng-controller="myCtrl">
            <div class="row">                                           
                <div class="col-lg-12">
                    <?php if(isset($action)) echo form_open($action,array('id'=>'form','name'=>'form','method'=>'post'))?>
                    <h1 class="page-header">Form Add <?php echo $pageHeader?></h1>                                
                    <div class="row">
                      <div class="col-lg-2"></div>                   
                      <div class="col-lg-8"><!--==== start col-lg-8 =====--> 
                        <div class="panel panel-primary">
                              <div class="panel-heading">
                              <h3 class="panel-title">Form member information</h3>
                              </div>
                            <div class="panel-body">
                              <div class="row"><!--====Error msg ===-->
                                <div class="col-lg-12">
                                  <span ng-show="msg_error"> 
                                    <div class="alert alert-warning" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Warning!</strong> Please input form.                                                               
                                    </div>
                                  </span>
                                </div><!--====End error msg ===-->
                                <div class="col-lg-4">
                                  <label class="control-label">Account Code</label>
                                    <?php echo form_input("txtAccCode","",array("class"=>"form-control","placeholder"=>"Account code","ng-model"=>"txtAccCode","id"=>"txtAccCode"));?>                                          
                                </div>
                                <div class="col-lg-4">
                                  <label class="control-label">Password</label>
                                    <?php echo form_password("txtPassword","",array("class"=>"form-control","placeholder"=>"Password","ng-model"=>"txtPassword","id"=>"txtPassword","required"=>""));?>                                          
                                </div>
                                <div class="col-lg-4">
                                  <label class="control-label">Confirm Password</label>
                                    <?php echo form_password("txtConPasswd","",array("class"=>"form-control","placeholder"=>"Confirm password","ng-model"=>"txtConPasswd","valid-txtConPasswd","id"=>"txtConPasswd","required"=>"","onkeyup"=>"checkPass(); return false"));?>                                          
                                     <span id="confirmMessage" class="confirmMessage"></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <label class="control-label">member</label>
                                  <div class="form-group">                                  
                                     <select class="form-control" id="ddlMember" name="ddlMember" ng-model="ddlMember">
                                        <option value="">Chose one</option>         
                                        <?php
                                         foreach($member_list as $value){?>
                                            <option value="<?php echo $value->mem_id;?>"><?php echo $value->mem_name;?></option>
                                        <?php }?>                                            
                                     </select>  
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <label class="control-label">Email</label>
                                    <input type="text" name="txtEmail"  ng-model="txtEmail" class="form-control" placeholder="Email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="txtEmail" required />
                                    <span style="color:Red" ng-show="form.txtEmail.$dirty&&form.txtEmail.$error.pattern">Please enter valid email</span>
                                </div>
                                <div class="col-lg-4">
                                  <label class="control-label">Gender</label>                                        
                                   <select class="form-control" ng-model="ddlGender" name="ddlGender" id="ddlGender">
                                      <option value="">Chose one</option>
                                      <option value="f">F</option>
                                      <option value="m">M</option>
                                    </select>  
                                </div>        
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <label class="control-label">Place Of Birth</label>
                                  <?php echo form_textarea("txtPob","",array("class"=>"form-control","ng-model"=>"txtPob","id"=>"txtPob","required"=>""));?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label class="control-label">Date Of Birth</label> 
                                    <div class='input-group datetimepicker'>
                                      <?php echo form_input("txtDob","",array("class"=>"form-control datetimepicker","placeholder"=>"Data Of Birth","ng-model"=>"txtDob","id"=>"txtDob","required"=>""));?>                                          
                                      <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                      </span>                                
                                    </div>
                                  </div>
                                </div>  
                               
                                <div class="col-lg-4">
                                  <label class="control-label">Account Type</label>
                                  <div class="form-group">
                                     <select class="form-control" name="ddlAccType" id="ddlAccType" ng-model="ddlAccType">
                                        <option value="">Chose one</option>
                                        <option value="general">General</option>
                                        <option value="agent">Agent</option>
                                        <option value="shop-owner">Shop-owner</option>                                            
                                     </select>   
                                  </div>                                      
                                </div>
                                <div class="col-lg-4">
                                    <label class="control-label">Company</label>                                        
                                    <?php echo form_input("txtCompany","",array("class"=>"form-control","placeholder"=>"Company","ng-model"=>"txtCompany","id"=>"txtCompany","required"=>""));?>                                                                   
                                </div>  
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                <label class="control-label">Position</label>
                                <?php echo form_input("txtPosition","",array("class"=>"form-control","placeholder"=>"Position","ng-model"=>"txtPosition","id"=>"txtPosition","required"=>""));?>                                          
                                </div>
                                <div class="col-lg-4">
                                <label class="control-label">Contact Phone</label>
                                <?php echo form_input("txtContact","",array("class"=>"form-control","placeholder"=>"Phone number","ng-model"=>"txtContact","ng-pattern"=>"/^[0-9]{1,10}$/","id"=>"txtContact","required"=>""));?>                                          
                                 <span style="color:Red" ng-show="form.txtContact.$dirty&&form.txtContact.$error.pattern">Only phone number</span>
                                </div>
                                <div class="col-lg-4">
                                  <label class="control-label">Location</label>
                                  <div class="form-group">                                  
                                       <select class="form-control" id="ddlLocation" name="ddlLocation" ng-model="ddlLocation">
                                          <option value="">Chose one</option>         
                                          <?php
                                           foreach($location as $value){?>
                                              <option value="<?php echo $value->loc_id;?>"><?php echo $value->loc_name;?></option>
                                          <?php }?>                                            
                                       </select>  
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-1">
                                  <label class="control-label">Image</label>
                                  <div class="form-group">
                                    <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">
                                    Upload Image
                                    </button>
                                  </div>
                                </div>
                                <div class="col-lg-4 pull-right" style="margin-top:10px;">                                    
                                  <?php echo form_button("btnCancel","Cancel",array("class"=>"btn btn-defualt pull-right","style"=>"margin-left:5px","id"=>"btnCancel"));?>
                                  <?php echo form_button("btn_go_product","Register",array("class"=>"btn btn-success pull-right","ng-click"=>"validation()"));?>                                   
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-lg-12">
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Browse Image</h4>
                                            </div>
                                            <div class="modal-body">
                                            <input  type="file" name="txtUpload" />
                                            <input type="hidden" id="txtImgName" name="txtImgName" />
                                            <div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div><!--====end col-lg-8 ====-->                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                    </div>
                      <div class="col-lg-2"></div>
                    </div>                                     
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">

        </script>
        <script>
            tinymce.init({ selector:'textarea'});
            $("#btnCancel").click(function(){
                window.location.assign('<?php echo base_url().$cancel?>');
            });

          function uploadFile() {
            var formData = new FormData();
            formData.append('image', $('input[type=file]')[0].files[0]); 
            $.ajax({
              url: '<?php echo base_url()?>ng/upload.php',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              // ... Other options like success and etc
              success: function(data) {
                document.getElementById("response").innerText = "Upload Complete!"; 
                document.getElementById("txtImgName").value = data;
              }     
            });
          }
          function checkPass()
          {
            var badColor = "#ff6666";
            var pass1 = document.getElementById('txtPassword');
            var pass2 = document.getElementById('txtConPasswd');
            var message = document.getElementById('confirmMessage');
            if(pass1.value !=pass2.value){
              message.style.color = badColor;
              message.innerHTML = "Passwords not Match!"
            }else{message.innerHTML ="" }
          }
          // ------- start angularJS
        var app = angular.module('myApp',[]);
        app.controller('myCtrl',function($scope,$http)
        {   
            $scope.validation = function()
            { 
              var txtDob=document.getElementById("txtDob").value;
              if(   
                  (($scope.txtAccCode==undefined || $scope.txtAccCode=="") || 
                  ($scope.txtPassword==undefined || $scope.txtPassword=="") ||
                  ($scope.txtConPasswd==undefined || $scope.txtConPasswd=="") ||
                  ($scope.ddlMember==undefined || $scope.ddlMember=="")||
                  ($scope.ddlGender==undefined || $scope.ddlGender=="") ||
                  (txtDob==undefined || txtDob=="")||
                  ($scope.txtEmail==undefined || $scope.txtEmail=="")||                
                  ($scope.ddlAccType==undefined || $scope.ddlAccType=="") ||
                  ($scope.txtCompany==undefined || $scope.txtCompany=="") ||
                  ($scope.txtPosition==undefined || $scope.txtPosition=="") ||
                  ($scope.txtContact==undefined || $scope.txtContact=="") ||
                  ($scope.ddlLocation==undefined || $scope.ddlLocation=="")
                  )
                )
                {$scope.msg_error=true;}
                else
                {
                  passwd_c = $scope.txtConPasswd;
                  passwd = $scope.txtPassword;
                  if(passwd==passwd_c){
                    document.getElementById("form").submit();
                  }
                }
            }                
        });  
          //-------- end angularJS
        </script>