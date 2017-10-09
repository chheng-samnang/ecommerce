<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

		include("db.php");
	$acc_id = $_GET["acc_id"];
	if($acc_id!="")
	{
		$result = $conn->query("SELECT * FROM tbl_product AS p INNER JOIN tbl_media AS m ON m.p_id=p.p_id WHERE p.acc_id={$acc_id}");
	}
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"P_id":"'  . $rs["p_id"] . '",';
	    $outp .= '"Short_desc":"'.$rs["short_desc"].'",';
	    $outp .= '"Path":"'.$rs["path"]. '",';
	    $outp .= '"Price":"'.$rs["price"]. '",';
	    $outp .= '"P_name":"'   .$rs["p_name"].'"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>