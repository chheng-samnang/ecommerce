<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	include("db.php");
	
	$result = $conn->query("SELECT * FROM tbl_promotion AS pro LEFT JOIN tbl_promotion_det AS pd ON pd.`pro_id`=pro.`pro_id` RIGHT JOIN tbl_product AS  p ON p.`p_id`=pd.`p_id`  INNER JOIN tbl_category AS c ON p.cat_id=c.cat_id INNER JOIN tbl_media AS m ON m.p_id=p.p_id WHERE SUBSTRING(NOW(),1,LENGTH(NOW())-8)");
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"P_id":"'  . $rs["p_id"] . '",';
	    $outp .= '"Short_desc":"'.$rs["short_desc"]. '",';
	    $outp .= '"Path":"'.$rs["path"]. '",';
	    $outp .= '"Cat_name":"'.$rs["cat_name"]. '",';
	    $outp .= '"Dis":"'.$rs["discount_percent"]. '",';
	    // $outp .= '"Date_from":"'.$rs["date_from"]. '",';
	   	// $outp .= '"Date_to":"'.$rs["date_to"]. '",';
	    $outp .= '"Price":"'.$rs["price"]. '",';
	    $outp .= '"P_name":"'   .$rs["p_name"].'"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>