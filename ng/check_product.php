<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	require_once("db.php");

	$id=$_GET["id"];
	$shop_id=$_GET["shop_id"];
	$result = $conn->query("SELECT * FROM tbl_combind WHERE p_id='$id' AND shop_id='$shop_id'");
	$outp = "false";
	$conn->close();
	echo($outp);
?>
