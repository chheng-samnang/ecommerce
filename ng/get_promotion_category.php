<?php
	require_once("db.php");
	$cat_id = $_GET['cat_id'];
	$str_id =$_GET['str_id'];
	if($cat_id!="" && $str_id!="")
	{
		$result = $conn->query("SELECT p.p_id,p.p_name,me.path 
		FROM tbl_product AS p
		JOIN tbl_media AS me ON p.p_id=me.p_id WHERE cat_id={$cat_id} AND str_id={$str_id}");
		$outp = "";
	}else
	{
		$result = $conn->query("SELECT p.p_id,p.p_name,me.path 
		FROM tbl_product AS p
		JOIN tbl_media AS me ON p.p_id=me.p_id");
		$outp = "";
	}
	while($rs = $result->fetch_array(MYSQLI_ASSOC))
		{
			if ($outp != "") {$outp .= ",";}
			$outp .= '{"P_id":"'  . $rs["p_id"] . '",';
			$outp .= '"Path":"'.$rs["path"]. '",';
			$outp .= '"P_name":"'   .$rs["p_name"].'"}'; 
		}//get product by category -----------
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>