<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

		include("db.php");

	$result = $conn->query("SELECT m_name, m_name_kh, cat_id FROM tbl_menu");

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["m_name"] . '",';
	    $outp .= '"NameKh":"'   . $rs["m_name_kh"]        . '",';
	    $outp .= '"Category":"'. $rs["cat_id"]     . '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>