<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Log Out Form</title>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/style.css">
  </head>
    <body>
		<div class="container">
			<section id="content">
				
				<?php echo form_open('admin/memberLogin')?>
					<h1>Log Out Form</h1>
					
					<div>
						<input type="text" placeholder="Email" required="" <?php set_value("txtEmail","")?> name="txtEmail" id="username" />
					</div>
					<div>
						<input type="password" name="txtPass" placeholder="Password" required="" id="password" />
						
					</div>
					<h5 style="color:red;">This Member has been logout successfully.</h5>
					<div>
						<input type="submit" value="Log in" name="btnLogin"/>
						<a href="#">Lost your password?</a>
						<a href="#">Register</a>
					</div>

				</form><!-- form -->
				
			</section><!-- content -->
		</div><!-- container -->
        
    </body>
</html>
