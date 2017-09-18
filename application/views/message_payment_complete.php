
<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
			  	<div class="panel-body">
			    	<div class="alert alert-success" role="alert">
  						<strong><i class="fa fa-money"></i></strong> <b>Payment processed complete...</b>
					</div>
					<div class="col-md-4 col-md-offset-7">
						<button class="btn btn-primary" id="back_home"><span class="glyphicon glyphicon-arrow-left"></span> Back To Home</button>
					</div>
			  	</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$("#back_home").click(function(){

		window.location.assign("<?php echo base_url('home')?>");

	});
</script>