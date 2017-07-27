<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;charset=UTF-8");
		include("db.php");
	$id = $_GET['id'];


	$result = $conn->query("SELECT mem_phone,mem_email,mem_addr FROM tbl_member WHERE mem_id='$id'");

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Phone":"'  . $rs["mem_phone"] . '",';
	    $outp .= '"Email":"'   . $rs["mem_email"]        . '",';
	    $outp .= '"Address":"'   . $rs["mem_addr"]        . '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
	
?>