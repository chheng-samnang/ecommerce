<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	include("db.php");
	// $result = $conn->query("SELECT * FROM tbl_promotion AS pro LEFT JOIN tbl_promotion_det AS pd ON pd.pro_id=pro.pro_id RIGHT JOIN tbl_product AS p ON p.p_id=pd.p_id INNER JOIN tbl_category AS c ON p.cat_id=c.cat_id INNER JOIN tbl_media AS m ON m.p_id=p.p_id
  //   WHERE SUBSTRING(NOW(),1,LENGTH(NOW())-8 AND p_status='1')");

  $result = $conn->query("SELECT * FROM tbl_product p
                          LEFT JOIN tbl_combind_det c ON p.p_id=c.`p_id`
                          LEFT JOIN tbl_media m ON p.`p_id`=m.`p_id`
                          LEFT JOIN tbl_category ca ON p.`cat_id`=ca.`cat_id` WHERE p_status='1'");
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"P_id":"'  . $rs["p_id"] . '",';
	    $outp .= '"Short_desc":"'.$rs["short_desc"]. '",';
	    $outp .= '"Path":"'.$rs["path"]. '",';
	    $outp .= '"Cat_name":"'.$rs["cat_name"]. '",';
	    // $outp .= '"Dis":"'.$rs["discount_percent"]. '",';
	    $outp .= '"Price":"'.$rs["price"]. '",';
	    $outp .= '"P_name":"'   .$rs["p_name"].'"}';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>
