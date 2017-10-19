<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;charset=UTF-8");
	$staff=$_GET["staff"];
	$member=$_GET["member"];
	$order=$_GET["order"];
	$wallet=$_GET["wallet"];
	$outp = "";
	if($staff!=""){
		$result = $conn->query("SELECT COUNT(st_id) AS value FROM tbl_staf");
		if($query->num_rows()>0){return $query->row()->value;}
		while($rs = $result->fetch_array(MYSQLI_ASSOC)){
			if ($outp != "") {$outp .= ",";}
			
			$outp .= '{"Code":"'. $rs["ord_code"].'",';
			'"}';
			
		}
	}

	if($member!=""){
		$query=$this->db->query("SELECT COUNT(ord_id) AS value FROM tbl_order_hdr");
		if($query->num_rows()>0){return $query->row()->value;}
	}

	if($order!=""){
		$query=$this->db->query("SELECT COUNT(mem_id) AS value FROM tbl_member");
		if($query->num_rows()>0){return $query->row()->value;}
	}

	if($wallet!=""){
		$query=$this->db->query("SELECT COUNT(st_id) AS value FROM tbl_wallet_transaction");
		if($query->num_rows()>0){return $query->row()->value;}
	}

	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>
