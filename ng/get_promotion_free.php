<?php
	require_once("db.php");	
	$str_id=$_GET['str_id'];
	if($str_id!="")
	{
		$result = $conn->query("SELECT p_id,p_name FROM tbl_product WHERE str_id={$str_id}");
		$outp = "";
	}
	while($rs = $result->fetch_array(MYSQLI_ASSOC))
		{
			if ($outp != "") {$outp .= ",";}
			$outp .= '{"P_id":"'  . $rs["p_id"] . '",';			
			$outp .= '"P_name":"'   .$rs["p_name"].'"}'; 
		}//get product by category -----------
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>