<?php
	include("ng/connection.php");

	// Get IP

	$ip=$_SERVER['REMOTE_ADDR'];
	$date = date('Y-m-d');

	$sql="SELECT ip FROM tbl_visitor WHERE ip='$ip' and date_view='$date'";

	$Check=$DBH->prepare($sql);
	$Check->execute();
	$CheckIp=$Check->rowCount();
	

	if($CheckIp==0)
	{
		$query = "INSERT INTO tbl_visitor(id,ip,date_view) VALUES(NULL,'$ip','$date')";
		$insertIp=$DBH->prepare($query);
		$insertIp->execute();
	}

	#=================== All =========================================
	
	$number1 = $DBH->query("SELECT ip,date_view FROM tbl_visitor");
	$number1->execute();
	$total = $number1->rowCount();

	#========================= Today ====================================

	$number = $DBH->query("SELECT ip,date_view FROM tbl_visitor where date_view='$date' ORDER BY date_view DESC");
	$number->execute();
	$today = $number->rowCount();

	#==================== Yesterday ===========================

	$number2 = $DBH->query("SELECT * FROM tbl_visitor WHERE date_view = DATE_SUB(CURRENT_DATE(),INTERVAL 1 DAY)");
	$number2->execute();
	$yesterday = $number2->rowCount();

?>

	
			
			<div class="row">
				<div class="col-md-9"><i class="fa fa-clock-o"></i> <?php echo $this->lang->line("today"); ?>:</div>				 				
				<div class="col-md-3">
					<p class="text-right"><?php echo $today."<br />"; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9"><i class="fa fa-clock-o"></i><?php echo $this->lang->line("yesterday"); ?>:</div>							
				<div class="col-md-3">
					<p class="text-right"><?php echo $yesterday?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9">
					<i class="fa fa-signal"></i> <?php echo $this->lang->line("total"); ?>:
				</div>
				<div class="col-md-3">
					<p class="text-right"><?php echo $total; ?></p>
				</div>
			</div>
