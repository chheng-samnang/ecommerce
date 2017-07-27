<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

		include("db.php");

	$result = $conn->query("SELECT cus_id,cus_name,discount,count FROM tbl_customer");

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["cus_name"] . '",';
	    $outp .= '"Discount":"'  . $rs["discount"] . '",';
	    $outp .= '"Count":"'  . $rs["count"] . '",';
	    $outp .= '"Id":"'   . $rs["cus_id"]        . '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>