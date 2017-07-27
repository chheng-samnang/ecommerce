<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	require_once("db.php");
	
	$result = $conn->query("SELECT cat_id,cat_name,cat_name_kh,cat_name_ch FROM tbl_category");
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["cat_name"] . '",';
	    $outp .= '"Cat_Name_kh":"'  . $rs["cat_name_kh"] . '",';
	    $outp .= '"Cat_Name_ch":"'  . $rs["cat_name_ch"] . '",';
	    $outp .= '"Id":"'. $rs["cat_id"]. '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);