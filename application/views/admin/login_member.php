<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    	 <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/style.css">
  </head>
    <body>
		<div class="container">
			<section id="content">
				<?php echo form_open('admin/memberLogin')?>
					<h1>Login Form</h1>

					<div class="row">
						<div class="col-lg-12">
							<div>
							<input type="text" placeholder="Username or Email or Phone number" required="" <?php set_value("txtUser","")?> name="txtUser" id="username" />
							</div>
							<div>
								<input type="password" name="txtPass" placeholder="Password" required="" id="password" />
							</div>
						</div>
					</div>
          <div class="row" style="margin-bottom:10px">
						<div class="col-lg-12">
							<select class="form-control" name="ddlAccType" id="ddlAccType" style="width:288px;margin-left:35px;">
                <option value="General" selected>General</option>
                <option value="Shop">Shop</option>
                <option value="Bussiness">Supplier</option>
                <option value="Association">Association</option>
								<option value="Agent">Agent</option>
								<option value="Staf">Staff</option>
							</select>
						</div>
					</div>

          <div class="row">
            <div class="col-lg-12">
              <?php echo form_dropdown('ddlStore', $option, '','class="form-control" style="width:288px;margin-left:35px;display:none;" id="ddlStore"'); ?>
            </div>
          </div>
					<span style="font-weight:bold;color:red;"><?php echo $msg ;?></span>
					<div>
						<input type="submit" value="Log in" name="btnLogin"/>
						<a href="#">Lost your password?</a>
						<a href="<?php echo base_url('product/registerMember')?>">Register</a>
					</div>
				</form><!-- form -->
				<h5 style="color:red;"><?php echo validation_errors()?></h5>
			</section><!-- content -->
		</div><!-- container -->
    <script src="<?php echo base_url('assets/jquery/jquery.min.js')?>" charset="utf-8"></script>
    <script type="text/javascript">
        $("#ddlAccType").change(function(){
          var val = $("#ddlAccType").val();
          if(val=="Staf"){
            $("#ddlStore").attr("style","display:block;width:288px;margin-left:35px;");
          }else{
            $("#ddlStore").attr("style","display:none;width:288px;margin-left:35px;");
          }
        });
    </script>

    </body>
</html>
