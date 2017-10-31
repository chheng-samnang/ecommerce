<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	include("db.php");
	echo $com_id = $_GET['id'];
  echo $acc_id = $_GET['acc_id'];

	if($com_id!="")
	{
		$result = $conn->query("SELECT p.p_id,p.p_name,m.path,c.cat_name,br.brn_name FROM tbl_product AS p INNER JOIN tbl_media AS m ON p.p_id=m.p_id INNER JOIN tbl_category AS c ON p.cat_id=c.cat_id INNER JOIN tbl_brand AS br ON p.brn_id=br.brn_id WHERE acc_id='$acc_id'");
	}
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"P_id":"'  . $rs["p_id"] . '",';
		$outp .= '"Path":"'   . $rs["path"] . '",';
		$outp .= '"Category":"'   . $rs["cat_name"] . '",';
		$outp .= '"Brn_name":"'   . $rs["brn_name"] . '",';
	    $outp .= '"P_name":"'   .$rs["p_name"].'"}';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>
