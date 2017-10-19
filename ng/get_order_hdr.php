<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;charset=UTF-8");

	include("db.php");
	$id = $_GET['id'];
	$status = $_GET['stat'];
	$from = $_GET['from'];
	$to = $_GET['to'];
	$str_id = $_GET['str'];

	if($id=="choose one"&&$status=="undefined"&&$from==""&&$to=="")
	{	
		$result = $conn->query("SELECT ord_code,ord_date,h.mem_id,mem_name,ord_status,ord_id FROM tbl_order_hdr h INNER JOIN tbl_member m ON h.mem_id=m.mem_id");
	}
	elseif($id!=""&&$status=="all")
	{
		//$result = $conn->query("SELECT ord_code,ord_date,h.mem_id,mem_name,ord_status,ord_id FROM tbl_order_hdr h INNER JOIN tbl_member m ON h.`mem_id`=m.`mem_id` where h.mem_id='$id'");
	}
	else
	{
		//$result = $conn->query("SELECT ord_code,ord_date,h.mem_id,mem_name,ord_status,ord_id FROM tbl_order_hdr h INNER JOIN tbl_member m ON h.`mem_id`=m.`mem_id` WHERE h.mem_id='$id' and ord_status='$status' or ord_date between '$from' and '$to' ");
	}



	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Code":"'  . $rs["ord_code"] . '",';
	    $outp .= '"ID":"'  . $rs["ord_id"] . '",';
	    $outp .= '"Date":"'   . $rs["ord_date"]        . '",';
	    $outp .= '"Name":"'   . $rs["mem_name"]        . '",';
	    $outp .= '"MemCode":"'   . $rs["mem_id"]        . '",';
	    $outp .= '"Status":"'   . $rs["ord_status"]        . '"}';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>
