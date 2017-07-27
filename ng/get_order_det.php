<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;charset=UTF-8");
	
	$id = $_GET['id'];

		include("db.php");

	$result = $conn->query("SELECT p_name,qty,d.price,discount,total,ord_det_id FROM tbl_order_det d INNER JOIN tbl_product p ON d.p_id=p.`p_id` WHERE ord_code='$id'");

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["p_name"] . '",';
	    $outp .= '"Qty":"'   . $rs["qty"]        . '",';
	    $outp .= '"Price":"'   . $rs["price"]        . '",'; 
	    $outp .= '"Discount":"'   . $rs["discount"]        . '",';
	    $outp .= '"ID":"'   . $rs["ord_det_id"]        . '",'; 
	    $outp .= '"Total":"'   . $rs["total"]        . '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>