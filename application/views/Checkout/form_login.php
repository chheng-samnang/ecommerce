<div class="container">
	<div class="col-md-2 col-md-offset-5" >
		<img src="<?php echo base_url('assets/uploads/logo.png');?>" style="    margin: 25px 0 26px 0;">
	</div>
	
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
  			<div class="panel-body">
  				<form method="post">

					<div class="form-group" style="padding-top: 12px;">		
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="txtEmail" id="txtEmail" required=""  placeholder="Enter your Email"/>
							</div>
						</div>
					</div>

				  	<div class="form-group" style="padding-top: 12px;">
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="txtPass" id="txtPass"  placeholder="Enter your Password"/>
							</div>
						</div>
					</div>
					<h5 style="color:red;"> <?php echo validation_errors()?></h5>
					<span style="font-weight:bold;color:red;"><?php echo $msg?>

				  	<div class="form-group" style="padding-top: 12px;">
					   	<div class="row">
					   		 <div class="col-md-8">
					    		<button class="btn btn-primary" name="btnLogin"><span class="glyphicon glyphicon-circle-arrow-right"></span> Sign in</button>
					    	</div>
					    	
					    </div>
				  	</div>
				  	
				</form><!-- form-->
			</div>
		</div>
	</div>
</div>