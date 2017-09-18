<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

		include("db.php");
	$cat_id = $_GET['cat_id'];
	if($cat_id!="")
	{
		$result = $conn->query("SELECT *
		 FROM tbl_product AS p
		 INNER JOIN tbl_category  AS c
		 ON p.cat_id=c.cat_id INNER JOIN tbl_media AS m ON m.p_id=p.p_id WHERE p.cat_id={$cat_id}");
	}
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"P_id":"'  . $rs["p_id"] . '",';
	    $outp .= '"Short_desc":"'.$rs["short_desc"].'",';
	    $outp .= '"Cat_name":"'.$rs["cat_name"]. '",';
	    $outp .= '"Path":"'.$rs["path"]. '",';
	    $outp .= '"Price":"'.$rs["price"]. '",';
	    $outp .= '"P_name":"'   .$rs["p_name"].'"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>