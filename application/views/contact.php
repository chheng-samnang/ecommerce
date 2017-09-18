
</nav>
<div class="row">
	<div class="col-sm-12 col-md-6 col-lg-10 col-lg-offset-1">
		<div class="panel panel-default">
		  	<div class="panel panel-body">
		  		<div class="row">
					<div class="col-lg-12">
					<?php
						if(!empty($error) OR validation_errors())
						{
					?>
						<div class="alert alert-warning" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<strong>Attention!</strong><?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
						</div>
					<?php }?>
					</div>
				</div>	
		  		<div class="row" style="padding:15px">
		  			<div class="col-md-6">
			    		<p><b>Contact Us:</b><?php if(isset($contact->contact_desc)){echo $contact->contact_desc;}?></p><hr/>
			    		<div class="row"><b><u>Phone Contact</u></b></div>
			    		<div class="row">
				    		<div class="col-md-2">Tel1:</div>
				    		<div class="col-md-10"><?php if(isset($contact->phone1)){echo $contact->phone1;} ?></div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-2">Tel2:</div>
				    		<div class="col-md-10"><?php if(isset($contact->phone2)){echo $contact->phone2;} ?></div>
				    	</div>
			    		<div class="row" style="margin-top: 20px;">
			    			<div class="col-md-2"><div class="row"><b><u>Email:</u></b></div></div>
			    			<div class="col-md-10"><?php if(isset($contact->email)){echo $contact->email;} ?></div>
			    		</div>
			    		<div class="row" style="margin-top: 20px;">
			    			<div class="col-md-2"><div class="row"><b><u>Address:</u></b></div></div>
			    			<div class="col-md-10"><?php if(isset($contact->addr)){echo $contact->addr;} ?></div>
			    		</div>
			    		<div class="row" style="margin-top: 20px;"><b><u>Contact Online</u></b></div>
			    		<div class="row">
				    		<div class="col-md-4">Facebook Messager:</div>
				    		<div class="col-md-8"><?php if(isset($contact->fb)){echo $contact->fb;} ?></div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-4">Website:</div>
				    		<div class="col-md-8"><?php if(isset($contact->web)){echo $contact->web;} ?></div>
				    	</div>
			    	</div>
			    	<div class="col-md-6" style="border-left: solid #bfbbbb 1px;">
			    		<?php echo form_open('send_email_c/sendEmail',array('class' => 'form-control', 'id' => 'myform'));?>
			    		<b>You can use bellow form for more enquiries:</b><hr />
			    		<div class="col-md-12">
			    			<label>Your Name</label>
						  	<input name="txtName" id="" type="text" class="form-control" placeholder="Input Your Name...">
			    		</div>
			    		<div class="col-md-12" style="margin-top: 15px;">
			    			<label>Your Email</label>
			    			<input type="hidden" value="<?php if(isset($contact->email->email)){echo $contact->email;} ?>" name="toEmail">
						  	<input name="txtEmail" type="text" class="form-control" placeholder="Input Your Email...">
			    		</div>
			    		<div class="col-md-12" style="margin-top: 15px;">
			    			<label>Subject</label>
						  	<input type="text" name="txtSubject" class="form-control" placeholder="Input Subbject...">
			    		</div>
			    		<div class="col-md-12" style="margin-top: 15px;">
			    			<label>Your Message</label>
						  	<textarea class="form-control" name="txtSmg" rows="8" placeholder="Your Message"></textarea>
			    		</div>
			    		<div class="col-md-12" style="margin-top: 15px;">
			    			<button type="sumite" class="btn btn-primary">Send</button>
			    		</div>
			    	</div>
			    	<?php echo form_close();?>
		  		</div>
		  	</div>
		 </div>
	</div>
</div>