<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/style.css">
  </head>
    <body>
		<div class="container">
			<section id="content">
				
				<?php echo form_open('admin/memberLogin')?>
					<h1>Login Form</h1>
					<div>
						<input type="text" placeholder="User Name" required="" <?php set_value("txtUser","")?> name="txtUser" id="username" />
					</div>
					<div>
						<input type="password" name="txtPass" placeholder="Password" required="" id="password" />
						<span style="font-weight:bold;color:red;"><?php echo $msg?></span>
					</div>
					<div>
						<input type="submit" value="Log in" name="btnLogin"/>
						<a href="#">Lost your password?</a>
						<a href="#">Register</a>
					</div>

				</form><!-- form -->
				<h5 style="color:red;"><?php echo validation_errors()?></h5>
			</section><!-- content -->
		</div><!-- container -->
        
    </body>
</html>
