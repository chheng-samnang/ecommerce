<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

		include("db.php");
	$id = $_GET['tab_id'];
	$result = $conn->query("SELECT m_name,qty,cost,discount,comment FROM tbl_order_det d INNER JOIN tbl_menu m ON d.`m_id`=m.`m_id` INNER JOIN tbl_order_hdr h ON d.`ord_id`=h.`ord_id` WHERE paid='0' and tab_id='".$id."'");

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["m_name"] . '",';
	    $outp .= '"Quantity":"'   . $rs["qty"]        . '",';
	    $outp .= '"Price":"'   . $rs["cost"]        . '",'; 
	    $outp .= '"Comment":"'   . $rs["comment"]        . '",'; 
	    $outp .= '"Discount":"'   . $rs["discount"]        . '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>