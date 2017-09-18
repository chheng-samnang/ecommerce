<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

		include("db.php");
	$id = $_GET['cid'];
	if($id!="")
	{
		$result = $conn->query("SELECT m_id,m_name,img,price FROM tbl_menu where cat_id=$id");
	}else
	{
		$result = $conn->query("SELECT m_id,m_name,img,price FROM tbl_menu");
	}

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["m_name"] . '",';
	    $outp .= '"Id":"'   . $rs["m_id"]        . '",';
	    $outp .= '"Price":"'   . $rs["price"]        . '",'; 
	    $outp .= '"Img":"'   . $rs["img"]        . '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>