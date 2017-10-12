<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	require_once("db.php");
	$p_id=$_GET["p_id"];
	$shop_id=$_GET["shop_id"];
	$loc_id=$_GTE["loc_id"];
	$result = $conn->query("SELECT * FROM tbl_combind AS cm INNER JOIN tbl_account AS acc ON cm.shop_id=acc.acc_id WHERE cm.shop_id='$shop_id' AND p_id='$p_id' AND acc.loc_id='$loc_id'");
	$outp = "";	
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
	    if ($outp != "") {$outp.= ",";}else{ return FALSE;
		   /*	$outp .= '{"Shop":"' . $rs["shop_id"].'",';
		    $outp .= '{"Bussenis":"' . $rs["bus_id"].'",';
		    $outp .= '"Id":"'. $rs["p_id"]. '"}'; */
		}
	}	

	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>